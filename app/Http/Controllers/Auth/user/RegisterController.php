<?php

namespace App\Http\Controllers\Auth\user;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{


    protected $redirectTo = RouteServiceProvider::CUSTOMER;


    public function store(Request $request)
    {

    $password = Hash::make($request->password);


    $customer = new Customer();
    $customer->name = $request->name;
    $customer->password = $password; // Assign the hashed password
    $customer->save();
    return redirect()->route('')

    }
}
