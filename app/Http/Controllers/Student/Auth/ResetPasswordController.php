<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function ResetIndex()
    {
         return view('student.auth.reset_password');
    }

    public function SendLink(Request $request)
    {
        $validatedData = $request->validate([
           'old_email' => 'required'
        ],[
            'old_email.required' => 'Email is required',
        ]);

        $user = User::where('email',$request->old_email)->first();

        if ($user){
            $token = bin2hex(random_bytes(32));

            User::where('email',$request->old_email)->update([
                'token' => $token,
            ]);
            $userName = $user->name;
            Mail::send('student.auth.reset_template', array('token' => $token,'email'=>request('old_email')), function ($message) use ($userName){
                $message->to(request('old_email'),$userName)->subject('Verify your email');
                $message->from('anskhilji900@gmail.com', 'Quiz');
            });
            $notification = array(
                'message' => 'Please check your email to verify you!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'incorrect email',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function VerifyLink($token, $email)
    {
        $user = User::where('token',$token)->where('email',$email)->first();
        if(isset($user->id)){
            $notification = array(
                'message' => 'Email verify successfully!',
                'alert-type' => 'success'
            );

        }else{
            $notification = array(
                'message' => 'Token is invalid',
                'alert-type' => 'error'
            );
        }

        return view('student.auth.change_password')->with($notification);
    }




    public function StoreResetPassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed'
        ]);

        User::where('token', $request->pass_token)->where('status', 1)->update([
            'password' => Hash::make($request->password),
            'token' => '',
        ]);
        $notification = array(
            'message' => 'Password reset successfully! Please login with new password.',
            'alert-type' => 'success'
        );

        return view('student.auth.login')->with($notification);

    }
}
