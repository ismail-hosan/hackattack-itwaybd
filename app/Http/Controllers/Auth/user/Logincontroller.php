<?php

namespace App\Http\Controllers\Auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logincontroller extends Controller
{
    public function show_page()
    {
        return view('auth.user_login');
    }


    public function store(Request $request)
    {
        // dd($request->all());


        $credentials = $request->only('name', 'password');
        // dd($credentials);
        if(Auth::guard('customer')->attempt($credentials))
        {
            $customer = Auth::guard('customer')->user();
            $request->session()->regenerate();
            return redirect('/');
        }
        dd('wrong');
    }
}
