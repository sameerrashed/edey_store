<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $data['title'] = 'ايدي ستور';

        auth()->user()->update([
            'last_login_at' => now(),
        ]);

        return view('merchant.dashboard.index', $data);
    }
}
