<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        return view('website.auth.login');
    }

    public function signup()
    {
        $data['title'] = 'ايدي ستور';

        return view('website.auth.register', $data);
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

        return redirect('/login');
    }

    public function loginCheck(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect(url('/'));
        } else {
            return redirect()->route('website.login')->with('error', __('app.login_error'));
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(url('/'));
    }

}
