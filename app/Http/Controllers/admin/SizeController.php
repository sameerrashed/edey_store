<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Sizes';
        $data['records'] = size::all();
        $data['fields'] = size::get_Fields();

        return view('admin.sizes.index', $data);
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

        $size = new size;

        $size->status = '1';
        $record = ManageController::save($request, $size);

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
        size::where('id', $id)->update([
            'status' => '1',
        ]);

        return back()->with('success', 'المقاس اصبع متاحا');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = size::findOrFail($id);
        $record->delete();

        return back()->with('success', 'تم حذف الحجم بنجاح');
    }
}
