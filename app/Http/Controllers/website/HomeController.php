<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\feature;
use App\Models\product;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'إيدي ستور';
        $data['features'] = feature::all();
        $data['categories'] = category::with(['products' => function ($q) {
            $q->latest();
        }])->get();
        $category_id = DB::table('product_category')
            ->where('category_id', 1)
            ->pluck('product_id');
        $data['products'] = product::all();
        $data['all_users'] = User::where('role_id', role::RoleName['User'])->get();
        $data['all_merchants'] = User::where('role_id', role::RoleName['Merchant'])->get();
        $data['all_categories'] = category::all();

        return view('website.index', $data);
    }
}
