<?php

namespace App\Http\Controllers\Auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Logincontroller extends Controller
{

    protected $redirectTo = RouteServiceProvider::CUSTOMER;

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

        return redirect()->back()->with('message', 'Wrong User or password');

    }
}
