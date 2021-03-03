<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogoutController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Log out successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notification);
    }
}
