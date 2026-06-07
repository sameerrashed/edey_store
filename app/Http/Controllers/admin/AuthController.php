<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $data['title'] = 'ايدي ستور';
        return view('admin.auth.login', $data);
    }



    public function create(Request $request)
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/admin');
    }

    public function logout()
    {

    }

    public function loginCheck(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect(url('/admin/dashboard'));
        } else {
            return redirect()->route('admin.login')->with('error', __('app.login_error'));
        }
    }
}
