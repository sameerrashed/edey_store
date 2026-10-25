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
        $product = product::findOrFail($id);
        $data['title'] = 'ايدي ستور';
        $data['product'] = product::findOrFail($id);
        $data['products'] = product::where('user_id', $product->user_id)->get();
        $data['engravings'] = DB::table('product_engraving')
            ->where('product_id', $id)
            ->get();
        $data['slider'] = DB::table('pruduct_slider')
            ->where('product_id', $id)
            ->get();

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
