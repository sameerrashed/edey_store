<?php

namespace App\Http\Controllers\merchant;

use App\Ai\Agents\ProductWriter;
use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\engraving;
use App\Models\product;
use App\Models\productfeature;
use App\Models\ProductVariant;
use App\Models\ProductVariantFeature;
use App\Models\related_product;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Laravel\Ai\Enums\Lab;
use Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Products';
        $userId = auth()->id();

        $data['records'] = Cache::remember(
            'merchant_products_'.$userId,
            600,
            function () use ($userId) {
                return product::with('categories', 'inventory')
                    ->where('user_id', $userId)
                    ->get();
            }
        );

        return view('merchant.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['parent_title'] = 'Products';
        $data['title'] = 'AddProduct';
        $data['records'] = product::where('user_id', auth()->user()->id)->get();
        $data['fields'] = product::get_Fields();
        $data['categories'] = category::all();
        $data['brands'] = brand::all();
        $data['features'] = productfeature::all();
        $data['colors'] = color::all();
        $data['sizes'] = size::all();
        $data['engravings'] = engraving::all();
        $data['products'] = product::all();
        $data['products1'] = product::all();

        return view('merchant.products.add_', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input('variants'));
        $product = new product;
        $product->product_name = $request->product_name;
        try {
            $response = (new ProductWriter)->prompt(
                'اكتب وصفًا للمنتج التالي: '.$product->product_name,
                provider: Lab::Ollama,
                model: 'llama3.2',
            );

            $product->description = trim((string) $response);

            $product->save();

        } catch (\Throwable $e) {
            Log::error('AI Product Description Error', [
                'message' => $e->getMessage(),
            ]);
        }

        $record = ManageController::save($request, $product);
        if ($request->has('color_id')) {
            foreach ($request->color_id as $color_id) {
                DB::table('product_color')->insert([
                    'product_id' => $product->id,
                    'color_id' => $color_id,
                ]);
            }
        }

        if ($request->has('size_id')) {
            foreach ($request->size_id as $size_id) {
                DB::table('product_size')->insert([
                    'product_id' => $product->id,
                    'size_id' => $size_id,
                ]);
            }
        }

        if ($request->has('engraving_id')) {
            foreach ($request->engraving_id as $engraving_id) {
                DB::table('product_engraving')->insert([
                    'product_id' => $product->id,
                    'engraving_id' => $engraving_id,
                ]);
            }
        }

        if ($request->has('related_id')) {
            foreach ($request->related_id as $related_id) {
                DB::table('related_products')->insert([
                    'product_id' => $product->id,
                    'related_id' => $related_id,
                ]);
            }
        }

        if ($request->has('category')) {
            foreach ($request->category as $category_id) {
                DB::table('product_category')->insert([
                    'product_id' => $product->id,
                    'category_id' => $category_id,
                ]);
            }
        }

        if ($request->has('image')) {
            foreach ($request->image as $image) {

                $image_name = $image->store('', 'SaveImg');
                DB::table('pruduct_slider')->insert([
                    'product_id' => $product->id,
                    'image' => $image_name,
                ]);
            }
        }

        if ($request->has('stock_status')) {
            DB::table('inventories')->insert([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'min_quantity' => $request->min_quantity,
                'max_quantity' => $request->max_quantity,
                'stock_status' => $request->stock_status,
            ]);
        }

        if ($request->has('variants')) {

            foreach ($request->input('variants', []) as $variantData) {

                $variantKey = $variantData['key']
                    ?? $variantData['variant_key']
                    ?? null;

                // إنشاء النوع
                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'variant_key' => $variantKey,
                    'stock_status' => $variantData['stock_status']
                        ?? 'available',
                    'quantity' => $variantData['quantity'] ?? 0,
                ]);

                // جلب السمات المرسلة، إن وجدت
                $features = $variantData['features'] ?? [];

                // في حال لم تصل السمات من JavaScript
                // نستخرجها من variant_key
                if (empty($features) && ! empty($variantKey)) {

                    $combinations = explode('|', $variantKey);

                    foreach ($combinations as $combination) {

                        $parts = explode(':', $combination);

                        if (count($parts) !== 2) {
                            continue;
                        }

                        $featureId = trim($parts[0]);
                        $valueId = trim($parts[1]);

                        if (
                            ! ctype_digit($featureId) ||
                            ! ctype_digit($valueId) ||
                            (int) $featureId <= 0 ||
                            (int) $valueId <= 0
                        ) {
                            continue;
                        }

                        $features[] = [
                            'feature_id' => (int) $featureId,
                            'value_id' => (int) $valueId,
                        ];
                    }
                }

                // حفظ السمات داخل product_variant_features
                foreach ($features as $featureData) {

                    $featureId = $featureData['feature_id'] ?? null;
                    $valueId = $featureData['value_id'] ?? null;

                    if (! $featureId || ! $valueId) {
                        continue;
                    }

                    ProductVariantFeature::create([
                        'product_variant_id' => $variant->id,
                        'feature_id' => $featureId,
                        'value_id' => $valueId,
                    ]);
                }
            }
        }

        return back()->with('success', 'تم إضافة المنتج بنجاح');
    }

    public function getFeatureValues($feature_id)
    {
        // نجيب السمة نفسها أولاً
        $feature = DB::table('productfeatures')
            ->where('id', $feature_id)
            ->first();

        if (! $feature) {
            return response()->json([
                'status' => false,
                'message' => 'السمة غير موجودة',
            ], 404);
        }

        // تحديد الجدول حسب السمة
        switch ($feature->name) {

            case 'اللون':

                $values = DB::table('colors')
                    ->select('id', 'name', 'color')
                    ->get();

                break;

            case 'المقاس':

                $values = DB::table('sizes')
                    ->select('id', 'name')
                    ->get();

                break;

            case 'النقش':

                $values = DB::table('engravings')
                    ->select('id', 'name', 'avatar')
                    ->get();

                break;

            default:

                $values = collect();

                break;
        }

        return response()->json([
            'status' => true,
            'feature_id' => $feature->id,
            'feature_name' => $feature->name,
            'values' => $values,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['brands'] = brand::all();
        $data['products'] = product::all();
        $data['parent_title'] = 'Products';
        $data['title'] = 'EditProduct';
        $data['records'] = product::where('user_id', auth()->user()->id)->get();
        $data['value'] = product::where('id', $id)->first();
        $data['product'] = product::with('categories', 'colors', 'engravings', 'sizes', 'relateds', 'inventory', 'variants.features')->find($id);
        $data['relation'] = related_product::all();
        $data['fields'] = product::get_Fields();
        $data['categories'] = category::all();
        $data['features'] = productfeature::all();
        $product = $data['product'];
        $data['variants'] = $product->variants;
        $data['savedVariants'] = $product->variants
            ->map(function ($variant) {

                return [
                    'id' => $variant->id,

                    'key' => $variant->variant_key,

                    'stock_status' => $variant->stock_status,

                    'quantity' => $variant->quantity,

                    'features' => $variant->features
                        ->map(function ($feature) {
                            return [
                                'feature_id' => $feature->feature_id,
                                'value_id' => $feature->value_id,
                            ];
                        })
                        ->values()
                        ->toArray(),
                ];
            })
            ->values()
            ->toArray();

        return view('merchant.products.edit_', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // dd($request->CheckPrice);

        $product = product::where('id', $id)->first();

        // $request->validate([
        //     'avatar' => $product->avatar
        //         ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        //         : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        //     'image' => 'array|max:5',
        //     'product_name' => 'required',
        //     'price' => 'required',
        //     'count' => 'required',
        //     'color_id' => 'required',
        //     'size_id' => 'required',
        //     'engraving_id' => 'required',
        // ]);

        $product->product_name = $request->product_name;
        $record = ManageController::save($request, $product);
        if ($request->has('color_id')) {

            $product->colors()->sync($request->color_id);
        }

        if ($request->has('size_id')) {
            $product->sizes()->sync($request->size_id);
        }

        if ($request->has('engraving_id')) {
            $product->engravings()->sync($request->engraving_id);
        }

        if ($request->has('related_id')) {
            $product->relateds()->sync($request->related_id);
        }

        if ($request->has('category')) {
            $product->categories()->sync($request->category);
        }

        if ($request->has('image')) {
            foreach ($request->image as $image) {

                $image_name = $image->store('', 'SaveImg');
                DB::table('pruduct_slider')->insert([
                    'product_id' => $product->id,
                    'image' => $image_name,
                ]);
            }
        }

        if ($request->has('stock_status')) {
            DB::table('inventories')->where('product_id', $product->id)->update([
                'quantity' => $request->quantity,
                'min_quantity' => $request->min_quantity,
                'max_quantity' => $request->max_quantity,
                'stock_status' => $request->stock_status,
            ]);
        }

        if ($request->boolean('sync_variants')) {

            $variants = $request->input('variants', []);

            DB::transaction(function () use ($product, $variants) {

                $savedIds = [];

                foreach ($variants as $variantData) {

                    $key = $variantData['key'] ?? null;

                    if (! $key) {
                        continue;
                    }

                    $variant = ProductVariant::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'variant_key' => $key,
                        ],
                        [
                            'quantity' => $variantData['quantity'] ?? 0,
                            'stock_status' => $variantData['stock_status'] ?? 'available',
                        ]
                    );

                    $savedIds[] = $variant->id;

                    $features = $variantData['features'] ?? [];

                    // دعم توليد السمات من المفتاح
                    if (empty($features)) {

                        foreach (explode('|', $key) as $part) {

                            $ids = explode(':', $part);

                            if (
                                count($ids) === 2 &&
                                ctype_digit(trim($ids[0])) &&
                                ctype_digit(trim($ids[1]))
                            ) {
                                $features[] = [
                                    'feature_id' => (int) trim($ids[0]),
                                    'value_id' => (int) trim($ids[1]),
                                ];
                            }
                        }
                    }

                    // تحديث سمات النوع الحالي
                    ProductVariantFeature::where(
                        'product_variant_id',
                        $variant->id
                    )->delete();

                    foreach ($features as $feature) {

                        ProductVariantFeature::create([
                            'product_variant_id' => $variant->id,
                            'feature_id' => $feature['feature_id'],
                            'value_id' => $feature['value_id'],
                        ]);
                    }
                }

                // حذف الأنواع التي أزالها المستخدم من هذا المنتج فقط
                $obsoleteVariants = ProductVariant::where(
                    'product_id',
                    $product->id
                )->whereNotIn('id', $savedIds);

                $obsoleteIds = (clone $obsoleteVariants)
                    ->pluck('id');

                ProductVariantFeature::whereIn(
                    'product_variant_id',
                    $obsoleteIds
                )->delete();

                $obsoleteVariants->delete();
            });
        }

        return back()->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
            ->back()
            ->with('success', 'تم حذف المنتج بنجاح');
    }
}
