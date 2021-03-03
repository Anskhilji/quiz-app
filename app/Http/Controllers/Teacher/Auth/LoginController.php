<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('teacher')->check()){
            return redirect()->route('teacher.dashboard');
        }
        return view('teacher.auth.login');
    }

    public function TeacherLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->guard("teacher")->attempt($request->only('email','password'), $request->remember)){
//            dd(auth()->guard("teacher")->user()->name);
            return redirect()->route('teacher.dashboard');
        }else{
            $notification = array(
                'message' => 'Login credentials incorrect!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }
}
