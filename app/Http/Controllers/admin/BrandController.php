<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Brands';
        $data['records'] = brand::all();

        return view('admin.brands.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $record = ManageController::save($request, new brand);

        return $record;
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['title'] = 'edit';
        $data['parent_title'] = 'Brands';
        $data['fields'] = brand::get_Fields();
        $data['record'] = brand::findorfail($id);

        return view('admin.layout.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = brand::query()->findOrFail($id);
        ManageController::save($request, $record);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(brand $brand)
    {
        //
    }
}
