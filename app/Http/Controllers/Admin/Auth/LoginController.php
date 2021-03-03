<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function AdminLogin(Request $request)
    {
        $validatedData = $request->validate([
           'email' => 'required',
           'password' => 'required',
        ]);

        if(auth()->guard("admin")->attempt($request->only('email','password'), $request->remember)){
//            dd(auth()->guard("admin")->user()->name);
            return redirect()->route('admin.dashboard');
        }else{
            $notification = array(
                'message' => 'Login credentials incorrect!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }
}
