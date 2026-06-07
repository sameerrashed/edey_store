<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\color;
use App\Models\engraving;
use App\Models\product;
use App\Models\related_product;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Products';
        $data['records'] = product::with('categories')->where('user_id', auth()->user()->id)->get();
        $data['fields'] = product::get_Fields();
        $data['categories'] = category::all();
        $data['colors'] = color::all();
        $data['sizes'] = size::all();
        $data['engravings'] = engraving::all();

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
        $data['colors'] = color::all();
        $data['sizes'] = size::all();
        $data['engravings'] = engraving::all();
        $data['products'] = product::all();

        return view('merchant.products.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'avatar' => 'required',
            'image' => 'array|max:5',
            'product_name' => 'required',
            'price' => 'required',
            'count' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'engraving_id' => 'required',
        ]);

        $product = new product;
        $product->product_name = $request->product_name;
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

        return back()->with('success', 'تم إضافة المنتج بنجاح');
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
        $data['parent_title'] = 'Products';
        $data['title'] = 'EditProduct';
        $data['records'] = product::where('user_id', auth()->user()->id)->get();
        $data['value'] = product::where('id', $id)->first();
        $data['product'] = product::with('categories', 'colors', 'engravings', 'sizes', 'relateds')->find($id);
        $data['relation'] = related_product::all();
        $data['fields'] = product::get_Fields();
        $data['categories'] = category::all();
        $data['colors'] = color::all();
        $data['sizes'] = size::all();
        $data['engravings'] = engraving::all();
        $data['products'] = product::all();

        return view('merchant.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // dd($request->CheckPrice);

        $product = product::where('id', $id)->first();

        $request->validate([
            'avatar' => $product->avatar
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
                : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image' => 'array|max:5',
            'product_name' => 'required',
            'price' => 'required',
            'count' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'engraving_id' => 'required',
        ]);

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
            DB::table('product_slider')
                ->where('product_id', $product->id)
                ->delete();

            foreach ($request->image as $image) {
                $image_name = $image->store('', 'SaveImg');
                DB::table('pruduct_slider')->insert([
                    'product_id' => $product->id,
                    'image' => $image_name,
                ]);
            }
        }

        return back()->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
