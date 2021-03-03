<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Teacher;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $auth = \App\Models\Teacher::find(Auth::guard('teacher')->id());
        if ($auth){
            return view('teacher.profile.index', compact('auth'));
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        \App\Models\Teacher::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $notification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ChangePassword()
    {
        return view('teacher.profile.change_password');

    }

    public function UpdatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::guard('teacher')->user()->password;
        if (Hash::check($request->old_password, $hashedPassword))
        {
            \App\Models\Teacher::find(auth()->guard('teacher')->id())->update([
                'password' => Hash::make($request->password),
            ]);

            Auth::guard('teacher')->logout();
            $notification = array(
                'message' => 'Password Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('teacher.login')->with($notification);
        }else {
            $notification = array(
                'message' => 'Old Passwrod is not matched!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }
}
