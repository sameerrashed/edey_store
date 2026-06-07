<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['title'] = "Categories";
        $data['records'] = Category::all();

        return view('admin.categories.index', $data);

    }

    public function create()
    {

    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'photo_cover' => 'required',
            'icon' => 'required',
            'category_name' => 'required',
        ]);
        $record = ManageController::save($request, new category());
        return $record;
    }

    public function edit($id)
    {
        $data["title"] = "edit";
        $data['parent_title'] = "Categories";
        $data['fields'] = Category::get_Fields();
        $data['record'] = category::findorfail($id);
        return view('admin.layout.form', $data);
    }

    public function update(Request $request, $id)
    {
        $record = category::query()->findOrFail($id);
        ManageController::save($request, $record);
        return redirect()->back()->with("success", __('app.updated'));
    }

}
