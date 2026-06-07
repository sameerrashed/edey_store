<?php

namespace App\Http\Controllers\merchant;

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
        $data['title'] = "Sizes";
        $data['records'] = engraving::all();
        $data['fields'] = engraving::get_Fields();
        return view('merchant.engravings.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(engraving $engraving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(engraving $engraving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, engraving $engraving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(engraving $engraving)
    {
        //
    }
}
