<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function UpdateProfile()
    {
        $auth = Admin::find(Auth::guard('admin')->id());
        if ($auth){
            return view('admin.profile.index', compact('auth'));
        }
    }

    public function ChangeProfile(Request $request, $id)
    {
        $validatedData = $request->validate([
           'name' => 'required',
           'email' => 'required',
        ]);

        Admin::where('id',$id)->update([
           'name' => $request->name,
           'email' => $request->email,
        ]);
        $notification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


//    Change password

    public function ChangePassword()
    {
        return view('admin.profile.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;
        if (Hash::check($request->old_password, $hashedPassword))
        {
            Admin::find(auth()->guard('admin')->id())->update([
               'password' => Hash::make($request->password),
            ]);

            Auth::guard('admin')->logout();
            $notification = array(
                'message' => 'Password Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.login')->with($notification);
        }else {
            $notification = array(
                'message' => 'Old Passwrod is not matched!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }

}
