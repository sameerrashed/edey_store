<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Statistics';
        $data['records'] = statistic::all();

        return view('admin.statistics.index', $data);
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
            'image' => 'required',
            'title' => 'required',
        ]);

        $record = ManageController::save($request, new statistic);

        return back()->with('success', 'تم الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(statistic $statistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(statistic $statistic)
    {
        //
    }
}
