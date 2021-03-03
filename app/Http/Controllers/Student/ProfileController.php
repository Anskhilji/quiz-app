<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function EditProfile()
    {
        $auth = User::find(auth()->id());
        return view('student.profile.index', compact('auth'));
    }

    public function UpdateProfile(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|max:25|min:3',
//            'email' => 'required',
        ]);

        User::where('id',$id)->update([
            'name' => $request->name,
//            'email' => $request->email,
        ]);
        $notification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ChangePassword()
    {
        return view('student.profile.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword))
        {
            User::find(auth()->id())->update([
                'password' => Hash::make($request->password),
            ]);

            Auth::logout();
            $notification = array(
                'message' => 'Password Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('student.login')->with($notification);
        }else {
            $notification = array(
                'message' => 'Old Passwrod is not matched!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
