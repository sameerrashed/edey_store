<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\Controller;
use App\Models\setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data['title'] = 'Settings';
        $data['fields'] = setting::get_Fields();
        $data['record'] = User::query()->findOrFail(auth()->user()->id);

        return view('merchant.account.settings', $data);
    }

    public function save(Request $request)
    {
        $data['title'] = 'Setting';
        $record = User::query()->findOrFail(auth()->user()->id);
        ManageController::save($request, $record);

        return redirect()->back()->with('success', 'تم الحفظ بنجاح');
    }
}
