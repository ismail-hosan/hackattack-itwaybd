<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function change_password()
    {
        // $token = csrf_token();
        // dd($token);
        return view('auth.passwords.reset');
    }

    public function update_password(Request $request)
    {
        $id = Auth::user()->id;

        $update = User::find($id);
        $update->password = Hash::make($request->password_confirmation);
        $update->update();
        return redirect()->back();

    }

    public function profile()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('admin.profile.profile',compact('data'));
    }

    public function profile_update(Request $request)
    {
        $id = Auth::user()->id;
        $update = User::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->update();
        return redirect()->back();

    }
}
