<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('teacher')->check()){
            return redirect()->route('teacher.dashboard');
        }
        return view('teacher.auth.login');
    }

    public function TeacherLogin(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);

        if(Str::startsWith($request->id, 'tc')){
            $teacher_id = Str::replaceFirst('tc','', $request->id);
            $verify = Teacher::where(['id' => $teacher_id])->first();

            if ($verify && auth()->guard('teacher')->attempt(['id' => $teacher_id, 'password' => $request->password],$request->remember)){
                $notification = array(
                    'message' => 'Logged in successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->route('teacher.dashboard')->with($notification);
            }
            else{
                $notification = array(
                    'message' => 'incorrect Credentials',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else{
            $notification = array(
                'message' => 'Login credentials incorrect!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }
}
