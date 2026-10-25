<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\engraving;
use Illuminate\Http\Request;

class EngravingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Engravings';
        $data['records'] = engraving::all();
        $data['fields'] = engraving::get_Fields();

        return view('admin.engravings.index', $data);
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
        $engraving = new engraving;
        $engraving->status = '1';
        $record = ManageController::save($request, $engraving);

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
        engraving::where('id', $id)->update([
            'status' => '1',
        ]);

        return back()->with('success', 'النقش اصبع متاحا');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = engraving::findOrFail($id);
        $record->delete();

        return back()->with('success', 'تم حذف النقش بنجاح');
    }
}
