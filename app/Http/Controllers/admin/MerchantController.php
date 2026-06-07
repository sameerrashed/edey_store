<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\merchant;
use App\Models\requestUpgradeMerchant;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = "Merchants";
        $data['records'] = User::where('role_id',2)->get();
        $data['fields'] = merchant::get_Fields();
        $data['roles'] = role::all();

        return view('admin.merchants.index', $data);
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
        $record = ManageController::save($request, new merchant());

        return $record;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $request_id = requestUpgradeMerchant::where('user_id', $id)->first();
        $data['title'] = "Merchants";
        $data['record'] = User::findOrFail($id);
        $data['merchant'] = requestUpgradeMerchant::findOrFail($request_id->id);
        $data['fields'] = merchant::get_Fields();
        $data['address_details'] = User::findOrFail($id);
        $data['address'] = merchant::get_Address();
        $data['roles'] = role::all();

        return view('admin.merchants.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = merchant::query()->findOrFail($request->id);
        ManageController::save($request, $record);
        return redirect()->back()->with("success", __('app.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(merchant $merchant)
    {
        //
    }
}
