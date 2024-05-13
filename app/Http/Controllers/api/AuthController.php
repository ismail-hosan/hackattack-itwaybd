<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;


class AuthController extends Controller
{
    public function login(Request $request)
    {
            if (Auth::guard('customer')->attempt(['name' => request('username'), 'password' => '12345678'])) {
                $customer = Auth::guard('customer')->user();
                $response = [
                    'id' => $customer->id,
                ];

                return response()->json([
                    'success' => true,
                    'message' => 'Login Successful',
                    'data' => $response,
                ]);
            }else {

                $password = Hash::make('12345678');
                $title_id = Customer::insertGetId([
                    'name' => $request->username,
                    'password' => $password,
                ]);
                 $response = [
                    'id' => $title_id,
                ];

                return response()->json([
                    'success' => true,
                    'message' => 'user create successfully!',
                    'data' => $response,
                ]);
            }
    }
}
