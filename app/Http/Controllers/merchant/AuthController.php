<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $data['title'] = 'ايدي ستور';
        return view('merchant.auth.login', $data);
    }

    public function loginCheck(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if (auth()->user()->role_id == 2) {
                return redirect('/merchant/dashboard');
            } else {
                return redirect()
                    ->route('merchant.login')
                    ->with('error', 'يجب ان تكون تاجر للدخول الى لوحة التحكم');
            }


        } else {

            return redirect()
                ->route('merchant.login')
                ->with('error', __('app.login_error'));
        }
    }
}
