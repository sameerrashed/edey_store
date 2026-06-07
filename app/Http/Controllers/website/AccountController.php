<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\favorite;
use App\Models\requestUpgradeMerchant;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $data['title'] = 'Account';
        $data['record'] = auth()->user();
        $data['requests'] = requestUpgradeMerchant::all();
        if (auth()->check()) {

            $data['product'] = favorite::where('user_id', auth()->user()->id)->get();
        } else {
            $data['product'] = favorite::all();
        }

        return view('website.account.index', $data);
    }

    public function update(Request $request)
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required',
        ]);

        $user = auth()->user();

        User::find($user->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('', 'SaveImg');
            User::find($user->id)->update($data);
        }

        return redirect('/account/details');
    }

    public function updateToMerchant()
    {

        $requests = requestUpgradeMerchant::all();
        $data['requests'] = requestUpgradeMerchant::all();
        $data['title'] = 'Account';
        $data['record'] = auth()->user();
        if (auth()->check()) {

            $data['product'] = favorite::where('user_id', auth()->user()->id)->get();
        } else {
            $data['product'] = favorite::all();
        }

        foreach ($requests as $req) {
            if ($req->user_id == auth()->user()->id) {
                if (requestUpgradeMerchant::status[$req->status] == 'قيد الإنتظار' or requestUpgradeMerchant::status[$req->status] == 'مقبول') {
                    return view('website.account.index', $data);
                }
            }
        }

        return view('website.account.merchant_upgrade', $data);
    }

    public function updateToMerchantPost(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'store_name' => 'required|string|',
            'store_phone' => 'required|string|max:255',
            'whatsApp_number' => 'required|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'X_link' => 'nullable|string|max:255',
            'instagram_link' => 'nullable|string|max:255',
            'merchant_first_name' => 'required|string|max:20',
            'merchant_last_name' => 'required|string|max:30',
            'merchant_phone' => 'required|string|max:255',
            'merchant_identity' => 'required|string|max:255',
            'about_merchant' => 'required|string',
            'commercial_register' => 'nullable|string',
            'known_number' => 'nullable|string|max:255',
            'bank_account_name' => 'required|string|max:255',
            'bank_name' => 'required|string',
            'iban' => 'required|string',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'area' => 'required|string',
            'address' => 'required|string',
            'street' => 'required|string|max:255',
            'nearest_landmark' => 'nullable|string',
        ],
            [
                'store_name.required' => 'اسم المتجر مطلوب',
                'store_phone.required' => 'رقم جوال المتجر مطلوب',
                'whatsApp_number.required' => 'رقم الواتس اب مطلوب',
                'merchant_first_name.required' => 'الاسم الأول مطلوب',
                'merchant_last_name.required' => 'اسم العائلة مطلوب',
                'merchant_phone.required' => 'رقم جوال التاجر مطلوب',
                'merchant_identity.required' => 'رقم هوية التاجر مطلوب',
                'about_merchant.required' => 'وصف التاجر مطلوب',
                'bank_account_name.required' => 'اسم الحساب البنكي مطلوب',
                'bank_name.required' => 'اسم البنك مطلوب',
                'iban.required' => 'رقم الآيبان مطلوب',
                'country.required' => 'اسم الدولة مطلوب',
                'city.required' => 'اسم المدينة مطلوبة',
                'area.required' => 'المنطقة مطلوبة',
                'address.required' => 'العنوان مطلوب',
                'street.required' => 'الشارع مطلوب', ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('', 'SaveImg');
        } else {
            return back()->with('error', 'يرجى اختيار أيقونة المتجر');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('', 'SaveImg');
        } else {
            return back()->with('error', 'يرجى اختيار بانر المتجر');
        }

        $exists =
            DB::table('request_upgrade_merchants')
                ->where('user_id', $user->id)
                ->exists();

        if ($exists) {
            return back()->with('error', 'تم إرسال الطلب مسبقاً');
        } else {
            if (auth()->user()->role_id == 4) {
                $data['user_id'] = $user->id;

                DB::table('users')->where('id', $data['user_id'])->update([
                    'first_name' => $data['merchant_first_name'],
                    'last_name' => $data['merchant_last_name'],
                    'identity' => $data['merchant_identity'],
                    'phone' => $data['merchant_phone'],
                    'commercial_register' => $data['commercial_register'],
                    'known_number' => $data['known_number'],
                    'info' => $data['about_merchant'],
                ]);

                DB::table('stores')->insert([
                    'icon' => $data['icon'],
                    'banner' => $data['banner'],
                    'name' => $data['store_name'],
                    'phone' => $data['store_phone'],
                    'whatsApp_number' => $data['whatsApp_number'],
                    'facebook_link' => $data['facebook_link'],
                    'instagram_link' => $data['instagram_link'],
                    'user_id' => $data['user_id'],
                    'bank_account_name' => $data['bank_account_name'],
                    'bank_name' => $data['bank_name'],
                    'iban' => $data['iban'],
                    'country' => $data['country'],
                    'city' => $data['city'],
                    'area' => $data['area'],
                    'address' => $data['address'],
                    'street' => $data['street'],
                    'nearest_landmark' => $data['nearest_landmark'],
                ]);

                $store_id = store::where('name', $data['store_name'])->first()->id;

                DB::table('request_upgrade_merchants')->insert([
                    'user_id' => $data['user_id'],
                    'store_id' => $store_id,
                ]);

                return back()->with('success', 'تم إرسال طلبك بنجاح');
            } else {
                return redirect('/account/upgrade')->with('error', 'يجب ان تكون مستخدم لإرسال الطلب');
            }
        }

    }
}
