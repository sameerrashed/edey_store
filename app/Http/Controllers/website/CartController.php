<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\category;
use App\Models\copon;
use App\Models\country;
use App\Models\favorite;
use App\Models\product;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, Request $request)
    {
        $data['title'] = 'ايدي ستور';
        $data['breadcrumb_title'] = 'سلة المشتريات';
        $data['product'] = favorite::where('user_id', $id)->get()->groupBy(function ($item) {

            return $item->product->user_id;

        });

        $data['carts'] = $cart = cart::with([
            'cart_products.product.user.store.paymentMethods',
        ])
            ->where('user_id', auth()->id())
            ->get();

        $data['groupedProducts'] = $data['carts']
            ->flatMap(function ($cart) {
                return $cart->cart_products;
            })
            ->groupBy(function ($item) {
                return $item->product->user_id;
            });

        $cart = cart::with([
            'cart_products.product.user.store.paymentMethods',
        ])
            ->where('user_id', auth()->id())
            ->first();
        $data['categories'] = category::with(['products' => function ($q) {
            $q->latest();
        }])->get();

        if (isset($request->copon_code)) {
            $copon_store = copon::where('code', $request->copon_code)->first();
            $copons = copon::all();
            $val = 0;
            foreach ($copons as $copon) {
                if ($copon->code == $request->copon_code) {
                    $val = 1;

                    return redirect()->back()->with([
                        'discount_percentage' => $copon->discount_percentage,
                        'store_id' => $copon->store_id]);
                }
            }

            if ($val == 0) {
                return back()->with('error', 'الكود لهذا المتجر غير صحيح او غير موجود');
            }

        }

        if (! $cart) {
            return view('website.empty_cart', $data);
        } else {
            return view('website.cart', $data);
        }

    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:cart_products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartProduct = DB::table('cart_products')
            ->where('id', $request->id)
            ->update([
                'quantity' => $request->quantity,
            ]);

        return response()->json([
            'status' => true,
            'message' => 'تم تحديث الكمية',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        if (! auth()->check() || auth()->user()->id != $id) {
            return redirect()->route('website.login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        // if ($request->color_id == 'undefined' || empty($request->color_id)) {
        //     return back()->with('error', 'يجب اختيار اللون');
        // }

        // if ($request->size_id == 'undefined' || empty($request->size_id)) {
        //     return back()->with('error', 'يجب اختيار الحجم');
        // }

        // if ($request->engraving_id == 'undefined' || empty($request->engraving_id)) {
        //     return back()->with('error', 'يجب اختيار النقش');
        // }
        $user_id = auth()->id();

        $user_store_id = product::where('id', $id)->value('user_id');

        $store_id = store::where('user_id', $user_store_id)->value('id');

        // التحقق من كمية الطلب
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'product_variant_id' => 'nullable|integer|min:1',
        ]);

        // إنشاء السلة أو جلبها
        $cart = DB::table('carts')
            ->where('user_id', $user_id)
            ->where('store_id', $store_id)
            ->first();

        if (! $cart) {

            $cart_id = DB::table('carts')->insertGetId([
                'user_id' => $user_id,
                'store_id' => $store_id,
            ]);

        } else {

            $cart_id = $cart->id;
        }

        // ========================================
        // جلب المتغير الخاص بالمنتج
        // ========================================

        $product_variant_id = $request->input('product_variant_id');

        $variants = DB::table('product_variants')
            ->where('product_id', $id)
            ->get();

        if ($variants->isEmpty()) {

            // المنتج ليس لديه أي متغير
            $product_variant_id = null;

        } elseif ($product_variant_id) {

            // التأكد أن المتغير المختار تابع للمنتج
            $variant = $variants->firstWhere(
                'id',
                (int) $product_variant_id
            );

            if (! $variant) {
                return back()->with(
                    'error',
                    'المتغير المحدد غير موجود لهذا المنتج'
                );
            }

            $product_variant_id = $variant->id;

        } elseif ($variants->count() === 1) {

            // يوجد متغير واحد فقط
            // نتأكد أنه لا يحتوي على سمات
            $variant = $variants->first();

            $hasFeatures = DB::table('product_variant_features')
                ->where('product_variant_id', $variant->id)
                ->exists();

            if ($hasFeatures) {
                return back()->with(
                    'error',
                    'يرجى اختيار سمات المنتج'
                );
            }

            // المتغير الوحيد ليس لديه سمات
            $product_variant_id = $variant->id;

        } else {

            // توجد عدة متغيرات ولم يتم اختيار واحد
            return back()->with(
                'error',
                'يرجى اختيار متغير المنتج'
            );
        }

        // ========================================
        // البحث عن المنتج في السلة
        // ========================================

        $cartProduct = DB::table('cart_products')
            ->where('cart_id', $cart_id)
            ->where('product_id', $id)
            ->where('product_variant_id', $product_variant_id)
            ->first();

        // ========================================
        // إضافة المنتج أو تحديث الكمية
        // ========================================

        if ($cartProduct) {

            DB::table('cart_products')
                ->where('id', $cartProduct->id)
                ->update([
                    'quantity' => $cartProduct->quantity
                                + $request->quantity,
                ]);

        } else {

            DB::table('cart_products')->insert([
                'cart_id' => $cart_id,
                'product_id' => $id,
                'product_variant_id' => $product_variant_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
        }

        // ========================================
        // إرجاع النتيجة
        // ========================================

        $data['categories'] = category::with([
            'products' => function ($q) {
                $q->latest();
            },
        ])->get();

        return back()->with(
            'success',
            'تم الإضافة الى السلة بنجاح'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    public function checkout(Request $request)
    {
        $data['title'] = 'إتمام عملية الدفع';
        $data['countries'] = country::orderBy('name')->get();
        $data['page'] = 1;

        return view('website.checkout', $data);
    }

    public function checkout1(Request $request)
    {
        $data['title'] = 'إتمام عملية الدفع';
        $data['page'] = 2;

        DB::table('shipping_addresses')->insert([
            'email' => $request->email,
            'full_name' => $request->full_name,
            'country' => $request->country_id,
            'province' => $request->province_id,
            'city' => $request->city_id,
            'street_address' => $request->street_address,
            'user_id' => auth()->user()->id,
        ]);

        return view('website.checkout1', $data);
    }

    public function checkout2(Request $request)
    {
        $data['title'] = 'إتمام عملية الدفع';
        $data['page'] = 3;

        return view('website.checkout2', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data['title'] = 'ايدي ستور';
        $data['product'] = cart::findOrFail($id)->delete();
        $data['cart'] = cart::where('user_id', auth()->user()->id);

        return back()->with('success', 'تم الحذف الى المفضلة بنجاح');
    }
}
