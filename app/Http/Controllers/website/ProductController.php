<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\favorite;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = product::with([
            'variants.features',
        ])->findOrFail($id);

        $data['title'] = 'ايدي ستور';
        $data['product'] = $product;

        $data['products'] = product::where(
            'user_id', $product->user_id
        )->get();

        $data['engravings'] = DB::table('product_engraving')
            ->where('product_id', $id)
            ->get();

        $data['slider'] = DB::table('product_slider')
            ->where('product_id', $id)
            ->get();

        $variants = $product->variants;

        // معرفات السمات والجداول المرتبطة بها
        $featureTypes = [
            1 => [
                'name' => 'اللون',
                'table' => 'colors',
            ],
            2 => [
                'name' => 'النقش',
                'table' => 'engravings',
            ],
            3 => [
                'name' => 'المقاس',
                'table' => 'sizes',
            ],
        ];

        $groupedFeatures = collect();
        $variantOptions = collect();

        foreach ($variants as $variant) {

            $features = collect();

            // استخراج السمات من العلاقة أولاً
            foreach ($variant->features as $feature) {

                $features->push([
                    'feature_id' => (int) $feature->feature_id,
                    'value_id' => (int) $feature->value_id,
                ]);
            }

            // إذا لم توجد سمات محفوظة نقرأها من variant_key
            if (
                $features->isEmpty() &&
                ! empty($variant->variant_key)
            ) {

                $parts = explode('|', $variant->variant_key);

                foreach ($parts as $part) {

                    $ids = explode(':', $part, 2);

                    if (
                        count($ids) !== 2 ||
                        ! ctype_digit(trim($ids[0])) ||
                        ! ctype_digit(trim($ids[1]))
                    ) {
                        continue;
                    }

                    $features->push([
                        'feature_id' => (int) trim($ids[0]),
                        'value_id' => (int) trim($ids[1]),
                    ]);
                }
            }

            foreach ($features as $feature) {
                $groupedFeatures->push($feature);
            }

            // بيانات كل نوع لاستخدامها داخل JavaScript
            $variantOptions->push([
                'id' => $variant->id,
                'variant_key' => $variant->variant_key,
                'quantity' => (int) $variant->quantity,
                'stock_status' => $variant->stock_status,

                'features' => $features->mapWithKeys(
                    function ($item) {
                        return [
                            (string) $item['feature_id'] => (string) $item['value_id'],
                        ];
                    }
                )->all(),
            ]);
        }

        // تجميع السمات ومنع تكرار القيم
        $groupedFeatures = $groupedFeatures
            ->groupBy('feature_id')
            ->map(function ($values) {
                return $values->unique('value_id')->values();
            });

        // تجهيز أسماء القيم والألوان وصور النقوش
        $productFeatures = collect();

        foreach ($featureTypes as $featureId => $config) {

            $values = $groupedFeatures->get(
                $featureId,
                collect()
            );

            if ($values->isEmpty()) {
                continue;
            }

            $ids = $values->pluck('value_id')->all();

            $records = DB::table($config['table'])
                ->whereIn('id', $ids)
                ->get()
                ->keyBy('id');

            $options = collect();

            foreach ($values as $value) {

                $record = $records->get(
                    $value['value_id']
                );

                if (! $record) {
                    continue;
                }

                $options->push([
                    'id' => $record->id,
                    'name' => $record->name,

                    'color' => $featureId == 1
                        ? ($record->color ?? null)
                        : null,

                    'avatar' => $featureId == 2
                        ? ($record->avatar ?? null)
                        : null,
                ]);
            }

            if ($options->isNotEmpty()) {

                $productFeatures->push([
                    'id' => $featureId,
                    'name' => $config['name'],
                    'options' => $options,
                ]);
            }
        }

        $data['variants'] = $variants;
        $data['productFeatures'] = $productFeatures;
        $data['variantOptions'] = $variantOptions->values();

        return view('website.product', $data);
    }

    public function addFavorites($id)
    {
        $product = product::findOrFail($id);
        $data['title'] = 'ايدي ستور';
        $data['cart'] = cart::where('user_id', auth()->user()->id);
        $data['product'] = product::findOrFail($id);
        DB::table('favorites')
            ->insert([
                'product_id' => $product->id,
                'user_id' => auth()->user()->id,
            ]);

        return back()->with('success', 'تم الإضافة الى المفضلة بنجاح');
    }

    public function favorites($id)
    {
        $data['title'] = 'ايدي ستور';
        $data['product'] = favorite::where('user_id', $id)->get();

        return view('website.favorites', $data);
    }

    public function cart($id)
    {
        $data['title'] = 'ايدي ستور';
        $data['cart'] = cart::where('user_id', auth()->user()->id);
        $data['product'] = favorite::where('user_id', $id)->get()->groupBy(function ($item) {

            return $item->product->user_id;

        });
        if (auth()->check()) {
            $data['fav'] = favorite::where('user_id', auth()->user()->id)->get();
        } else {
            $data['fav'] = favorite::all();
        }

        return view('website.cart', $data);
    }

    public function deletefavorites($id)
    {
        $data['title'] = 'ايدي ستور';
        $data['product'] = favorite::findOrFail($id)->delete();
        $data['cart'] = cart::where('user_id', auth()->user()->id);

        return back()->with('success', 'تم الحذف الى المفضلة بنجاح');
    }
}
