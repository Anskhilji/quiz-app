<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class EmailVerifyController extends Controller
{


    public function VerifyEmailView($token,$email)
    {
        $check = User::where('token', $token)->where('email', $email)->first();
//        dd($check);
        if ($check){
            User::where(['token'=>$token, 'email'=>$email])->update([
                'token' => NULL,
                'status' => '1'
            ]);
            $notification = array(
                'message' => 'Email verify successfull!',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Token Expire!',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('login')->with($notification);
    }
}
