<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\Controller;
use App\Models\copon;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CoponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Sizes';
        $data['records'] = copon::all();
        $data['fields'] = copon::get_Fields();

        return view('merchant.copons.index', $data);
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
        $store_id = store::where('user_id', auth()->id())->value('id');

        do {
            $code = strtoupper(Str::random(8));
        } while (copon::where('code', $code)->exists());

        $request->merge([
            'code' => $code,
            'store_id' => $store_id,
        ]);

        $record = copon::create([
            'code' => $code,
            'name' => $request->name,
            'discount_percentage' => $request->discount_percentage,
            'count' => $request->count,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'store_id' => $store_id,
        ]);

        // $record = ManageController::save($request, new copon);

        return back()->with('success', 'تم إضافة الكوبون بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(copon $copon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(copon $copon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, copon $copon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(copon $copon)
    {
        //
    }
}
