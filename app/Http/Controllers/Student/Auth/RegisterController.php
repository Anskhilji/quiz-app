<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function RegisterView()
    {
        return view('student.auth.register');
    }
    public function StudentRegister(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|max:25|min:3',
           'email' => 'required|email|unique:users',
           'password' => 'required|confirmed|min:3|max:8',
        ],[
            'name.regex' => 'Only characters and spaces allowed.',
        ]);

        $token = bin2hex(random_bytes(32));
        User::create([
           'name' => $request->name,
           'email' => $request->email,
           'token' => $token,
           'password' => Hash::make($request->password),
        ]);

        Mail::send('student.email_template', array('token' => $token,'email'=>request('email')), function ($message){
            $message->to(request('email'),request('name'))->subject('Verify your email');
            $message->from('anskhilji900@gmail.com','Quiz');

        });

        $notification = array(
            'message' => 'Check your email!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
