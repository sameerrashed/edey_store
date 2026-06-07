<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\Controller;
use App\Models\category;
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
        $data['categories'] = category::all();

        return view('merchant.colors.index', $data);
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
        $record = ManageController::save($request, new color);

        return $record;
    }

    /**
     * Display the specified resource.
     */
    public function show(color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(color $color)
    {
        //
    }
}
