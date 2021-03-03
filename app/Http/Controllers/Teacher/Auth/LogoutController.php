<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function TeacherLogout()
    {
        auth()->guard('teacher')->logout();
        $notification = array(
            'message' => 'Teacher Logout successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('teacher.login')->with($notification);
    }
}
