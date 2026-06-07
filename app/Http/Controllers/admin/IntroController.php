<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\intro;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Intros";
        $data['records'] = intro::all();
        $data['categories'] = category::all();

        return view('admin.intros.index', $data);
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
        $request->validate([
            'category_id' => 'required',
        ]);

        $record = ManageController::save($request, new intro());
        return $record;
    }

    /**
     * Display the specified resource.
     */
    public function show(intro $intro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(intro $intro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, intro $intro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(intro $intro)
    {
        //
    }
}
