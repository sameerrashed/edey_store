<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\category;
use App\Models\copon;
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

        return view('website.cart', $data);
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

        if ($request->color_id == 'undefined' || empty($request->color_id)) {
            return back()->with('error', 'يجب اختيار اللون');
        }

        if ($request->size_id == 'undefined' || empty($request->size_id)) {
            return back()->with('error', 'يجب اختيار الحجم');
        }

        if ($request->engraving_id == 'undefined' || empty($request->engraving_id)) {
            return back()->with('error', 'يجب اختيار النقش');
        }
        $user_id = auth()->id();
        $user_store_id = product::where('id', $id)->value('user_id');
        $store_id = store::where('user_id', $user_store_id)->value('id');
        $carts = cart::all();
        $value_check = 0;

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

        $product_color_id = DB::table('product_color')
            ->where('product_id', $id)
            ->where('color_id', $request->color_id)
            ->value('id');

        $product_size_id = DB::table('product_size')
            ->where('product_id', $id)
            ->where('size_id', $request->size_id)
            ->value('id');

        $product_engraving_id = DB::table('product_engraving')
            ->where('product_id', $id)
            ->where('engraving_id', $request->engraving_id)
            ->value('id');

        $cartProduct = DB::table('cart_products')
            ->where('cart_id', $cart_id)
            ->where('product_id', $id)
            ->where('product_color_id', $product_color_id)
            ->where('product_size_id', $product_size_id)
            ->where('product_engraving_id', $product_engraving_id)
            ->first();

        if ($cartProduct) {
            DB::table('cart_products')
                ->where('id', $cartProduct->id)
                ->update([
                    'quantity' => $cartProduct->quantity + $request->quantity,
                ]);
        } else {
            DB::table('cart_products')->insert([
                'cart_id' => $cart_id,
                'product_id' => $id,
                'product_color_id' => $product_color_id,
                'product_size_id' => $product_size_id,
                'product_engraving_id' => $product_engraving_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
        }

        $data['categories'] = category::with(['products' => function ($q) {
            $q->latest();
        }])->get();

        return back()->with('success', 'تم الإضافة الى السلة بنجاح');
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
        $data['page'] = 1;

        return view('website.checkout', $data);
    }

    public function checkout1(Request $request)
    {
        $data['title'] = 'إتمام عملية الدفع';
        $data['page'] = 2;
        return view('website.checkout1', $data);
    }

    public function checkout2(Request $request)
    {
        $data['title'] = 'إتمام عملية الدفع';
        $data['page'] = 3
;
        return view('website.checkout2', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {
        //
    }
}
