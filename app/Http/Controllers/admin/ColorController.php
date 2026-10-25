<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Sizes';
        $data['records'] = color::all();
        $data['fields'] = color::get_Fields();

        return view('admin.colors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $color = new color;

        $color->status = '1';
        $record = ManageController::save($request, $color);

        return $record;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        color::where('id', $id)->update([
            'status' => '1',
        ]);

        return back()->with('success', 'اللون اصبع متاحا');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record = color::findOrFail($id);
        $record->delete();

        return back()->with('success', 'تم حذف اللون بنجاح');
    }
}
