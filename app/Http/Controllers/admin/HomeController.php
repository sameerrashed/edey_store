<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\role;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->name == 'ادمن') {
            auth()->user()->update([
                'last_login_at' => now(),
            ]);
            $data['title'] = 'Dashboard';
            $data['users'] = User::where('role_id', role::RoleName['User'])->count();
            $users = User::where('role_id', role::RoleName['User'])->count();
            $Max = 500;
            $data['usersPercent'] = min(
                10 + (log10(max($users, 1)) * 20),
                100
            );
            $data['products'] = product::all()->count();
            $products = product::all()->count();
            $data['productsPercent'] = min(
                10 + (log10(max($products, 1)) * 20),
                100
            );

            return view('admin.dashboard.index', $data);
        } else {
            return redirect('/admin');
        }

    }
}
