<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\requestUpgradeMerchant;
use App\Models\role;
use App\Models\store;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class RequestUpgradeMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'update_to_merchant';
        $data['records'] = requestUpgradeMerchant::all();

        return view('admin.upgradeMerchant.index', $data);
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
    public function show($id)
    {
        $data['title'] = 'update_to_merchant';
        $data['merchant'] = requestUpgradeMerchant::findOrFail($id);
        $data['roles'] = role::all();

        return view('admin.upgradeMerchant.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(requestUpgradeMerchant $requestUpgradeMerchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request_id = requestUpgradeMerchant::findOrFail($id);
        $store_id = $request_id->store_id;
        $store = store::where('id', $store_id)->first();

        if ($store->status == 0) {
            $update = store::where('id', $request_id->store_id)->update([
                'status' => 1,
            ]);

            $user = User::where('id', $request_id->user_id)->update([
                'role_id' => role::RoleName['Merchant'],
            ]);
            requestUpgradeMerchant::findOrFail($id)->update([
                'status' => requestUpgradeMerchant::StatusName['Accepted'],
                'accepted_at' => now(),
                'reason' => $request->reason,
            ]);
            if ($update) {
                $merchant_count = User::where('role_id', role::RoleName['Merchant'])->count();

                DB::table('statistics')->where('id', 3)->update([
                    'num_of' => $merchant_count,
                ]);

                return redirect()->route('admin.update_to_merchant.index')
                    ->with('success', 'تم قبول طلبك بنجاح');
            } else {
                requestUpgradeMerchant::findOrFail($id)->update([
                    'status' => requestUpgradeMerchant::StatusName['Rejected'],
                ]);

                return back()->with('error', 'لم يتم قبول الطلب');
            }
        }

        return back()->with('error', 'المتجر موجود مسبقا , حدث خطأ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $destroy = requestUpgradeMerchant::findOrFail($id)->update([
            'status' => requestUpgradeMerchant::StatusName['Rejected'],
            'reason' => $request->reason,
            'rejected_at' => now(),
        ]);

        if ($destroy) {
            return back()->with('error', 'تم رفض طلب الترقية بنجاح');
        } else {
            return back()->with('error', 'حدث خطأ أو لم يتم العثور على الطلب');
        }
    }
}
