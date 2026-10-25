<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Users';
        $data['records'] = User::where('role_id', 4)->get();
        $data['fields'] = User::get_Fields();

        $data['roles'] = role::all();

        return view('admin.users.index', $data);
    }

    public function show(Request $request, $id)
    {

        $data['title'] = 'Users';
        $data['record'] = User::findOrFail($id);
        $data['fields'] = User::get_Fields();
        $data['roles'] = role::all();

        return view('admin.users.view', $data);
    }

    public function store(Request $request)
    {
        $record = ManageController::save($request, new User);
        $user_count = User::where('role_id', role::RoleName['User'])->count();

        DB::table('statistics')->where('id', 1)->update([
            'num_of' => $user_count,
        ]);

        return $record;
    }

    public function update(Request $request, $id)
    {
        $record = User::query()->findOrFail($request->id);
        ManageController::save($request, $record);

        return redirect()->back()->with('success', 'تم بنجاح');
    }
}
