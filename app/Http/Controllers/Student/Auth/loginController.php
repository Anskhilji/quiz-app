<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function LoginView()
    {
        return view('student.auth.login');
    }

    public function StudentLogin(Request $request)
    {

        $validatedData = $request->validate([
            'id' => 'required|max:50',
            'password' => 'required|max:120',
        ]);
            if(Str::startsWith($request->id, 'stu')){

                $student_id = Str::replaceFirst('stu','', $request->id);
                $verify = User::where(['id' => $student_id, 'status' => 1])->first();

                if ($verify && auth()->attempt(['id' => $student_id, 'password' => $request->password],$request->remember)){
                    $notification = array(
                        'message' => 'Logged in successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('dashboard')->with($notification);
                }

                else{
                    $notification = array(
                        'message' => 'incorrect Credentials',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'message' => 'Id and password not matched',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }


    }

}
