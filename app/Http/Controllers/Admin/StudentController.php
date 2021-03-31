<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
class StudentController extends Controller
{
    public function StudentRequestList()
    {
        $students = User::where('status', NULL)->orderBy('id','desc')->get();
        return view('admin.student.show_requests', compact('students'));
    }

    public function RequestApprove($id, $name, $email)
    {
        $student_prefix = User::where('id',$id)->first();
        $prefix = $student_prefix->prefix;
        $std_id = $student_prefix->id;

        $student_id = $prefix.$std_id;

        $studentApprove = User::where('id',$id)->update([
           'status' => 1
        ]);

            Mail::send('admin.student.student_email_template', array('id' => $student_id), function ($message) use ($name, $email){
            $message->to($email,$name)->subject('Registration Approved');
            $message->from('common@unifyp.com','Quiz');
        });

        $notification = array(
            'message' => 'Email Notification is send successfully to approved Student',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function RequestDelete($id)
    {
        $studentDelete = User::where('id',$id)->delete();
        $notification = array(
            'message' => 'Request Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
