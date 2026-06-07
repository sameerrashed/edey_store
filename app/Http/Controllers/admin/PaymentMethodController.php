<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\payment_method;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Payment_Methods';
        $data['records'] = payment_method::all();

        return view('admin.payment_method.index', $data);
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
    public function show(payment_method $payment_method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment_method $payment_method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment_method $payment_method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment_method $payment_method)
    {
        //
    }
}
