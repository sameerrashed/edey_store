<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->name == 'ادمن') {
            auth()->user()->update([
                'last_login_at' => now()
            ]);
            return view('admin.dashboard.index');
        } else {
            return redirect('/admin');
        }


    }
}
