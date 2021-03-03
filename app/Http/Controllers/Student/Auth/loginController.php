<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function LoginView()
    {
        return view('student.auth.login');
    }

    public function StudentLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

            $verify = User::where(['email' => $request->email, 'status' => 1])->first();

            if ($verify && auth()->attempt($request->only('email','password'),$request->remember)){
                $notification = array(
                    'message' => 'Logged in successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->route('dashboard')->with($notification);
            }else{
                $notification = array(
                    'message' => 'incorrect Credentials',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

    }

}
