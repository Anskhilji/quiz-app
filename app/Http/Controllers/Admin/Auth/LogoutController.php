<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function AdminLogout()
    {
        auth()->guard('admin')->logout();
        $notification = array(
            'message' => 'Admin Logout successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.login')->with($notification);
    }
}
