<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use App\Models\payment_method;
use App\Models\payment_store_method;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentStoreMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Payment_Methods';

        $store_id = store::where('user_id', auth()->id())->value('id');

        $data['payment_store_methods'] = payment_store_method::with('paymentMethod')
            ->where('store_id', $store_id)
            ->get();

        $usedPaymentIds = DB::table('payment_store_methods')
            ->where('store_id', $store_id)
            ->pluck('payment_id');

        $data['records'] = payment_method::whereNotIn('id', $usedPaymentIds)->get();

        return view('merchant.payment_store.index', $data);
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

        if ($request->has('payment_id')) {
            foreach ($request->payment_id as $payment_id) {
                DB::table('payment_store_methods')->insert([
                    'store_id' => $store_id,
                    'payment_id' => $payment_id,
                ]);
            }
        }

        return back()->with('success', 'تم إضافة المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(payment_store_method $payment_store_method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment_store_method $payment_store_method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment_store_method $payment_store_method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment_store_method $payment_store_method)
    {
        //
    }
}
