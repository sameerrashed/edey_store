<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\copon;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManageController extends Controller
{
    public static function save(Request $request, $data)
    {
        $class_name = get_class($data);
        foreach ($class_name::get_Fields() as $field) {

            if (in_array($field['type'], ['text', 'textarea', 'email', 'checkbox', 'color'])) {
                $data->{$field['name']} = $request->input($field['name']);
            } elseif (in_array($field['type'], ['password'])) {
                $data->{$field['name']} = bcrypt($request->input($field['name']));
            } elseif (in_array($field['type'], ['file'])) {
                if ($request->hasFile($field['name'])) {
                    if (isset($record)) {
                        $data->{$field['name']} = $request->file($field['name'])->store('', 'SaveImg');
                    } else {
                        $data->{$field['name']} = $request->file($field['name'])->store('', 'SaveImg');
                    }
                }
            }
        }

        if (method_exists($class_name, 'get_Address')) {
            foreach ($class_name::get_Address() as $field) {

                if (in_array($field['type'], ['text', 'textarea', 'email', 'checkbox', 'color'])) {
                    $data->{$field['name']} = $request->input($field['name']);
                } elseif (in_array($field['type'], ['password'])) {
                    $data->{$field['name']} = bcrypt($request->input($field['name']));
                } elseif (in_array($field['type'], ['file'])) {
                    if ($request->hasFile($field['name'])) {
                        if (isset($record)) {
                            $data->{$field['name']} = $request->file($field['name'])->store('', 'SaveImg');
                        } else {
                            $data->{$field['name']} = $request->file($field['name'])->store('', 'SaveImg');
                        }
                    }
                }
            }
        }

        if ($request->has('role_id')) {
            $data->role_id = $request->role_id;
        }

        if ($request->has('merchant_id')) {
            $data->merchant_id = $request->merchant_id;
        }

        if ($request->has('category_id')) {
            $data->category_id = $request->category_id;
        }

        do {

            $sku = strtoupper(Str::random(8));

        } while (\App\Models\Product::where('sku', $sku)->exists());

        if (isset($request->price_after)) {
            if (empty($request->price_after) || $request->CheckPrice == 0) {
                $data->price_after = 0;
                $data->discount = 0;
            } else {
                $data->price_after = $request->price_after;
                $data->discount = (($request->price - $request->price_after) / $request->price) * 100;
            }
        }

        if (isset($request->sku)) {
            $data->sku = $sku;
        }

        if (isset($data->user_id)) {
            $data->user_id = auth()->user()->id;
        }

        // $store_id = store::where('user_id', auth()->id())->value('id');
        // if (isset($data->code)) {
        //     dd('d');
        //     do {
        //         $code = strtoupper(Str::random(8));
        //     } while (copon::where('code', $code)->exists());
        //     $data->code = $code;
        //     $data->store_id = $store_id;
        // }

        $data->save();

        return $data;
    }
}
