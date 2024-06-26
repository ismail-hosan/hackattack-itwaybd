<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        if (Auth::guard('customer')->attempt(['name' => $request->username, 'password' => $request->password])) {
            $customer = Auth::guard('customer')->user();
            $response = [
                'id' => $customer->id,
            ];

            return response()->json([
                'success' => true,
                'message' => 'Login Successful',
                'data' => $response,
            ]);
        } else {
            $password = Hash::make($request->password);
            // dd($password);
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

    public function user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

      $customers = Customer::with('scores')->findOrFail($request->id);
      $total = count($customers->scores);

      $malware = $customers->scores->where('game_type', 'malware')->count();
      $fishing = $customers->scores->where('game_type', 'fishing')->count();
      $hack_attack = $customers->scores->where('game_type', 'hack_attack')->count();

        return response()->json([
            'success' => true,
            'username' => $customers->name,
            'image' => $customers->image ?? '',
            'total' => $total ?? '',
            'malware' => $malware??'',
            'fising' => $fishing ?? '',
            'hack_attack' => $hack_attack ?? '',
        ]);
    }
}
