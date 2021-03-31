<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
class TeacherControlelr extends Controller
{

    public function AllTeacher()
    {
        $teachers = Teacher::all();
        return view('admin.teacher.index',compact('teachers'));
    }

    public function AddTeacher()
    {
        return view('admin.teacher.create');
    }

    public function StoreTeacher(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:2',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|confirmed',
        ]);

        $teacher  = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $get_pre_id = Teacher::where('id',$teacher->id)->first();
        $teacher_prefix     = $get_pre_id->prefix;
        $id                 = $get_pre_id->id;
        $teacher_id         = $teacher_prefix.$id;

        Mail::send('admin.teacher.email_template', array('id' => $teacher_id, 'password' => $request->password), function ($message) {
            $message->to(\request('email'),\request('name'))->subject('Teacher Login Info');
            $message->from('common@unifyp.com','Quiz');
        });

        $notification = array(
            'message' => 'Teacher is added and email notification is sent successfully to the teacher',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }

    public function EditTeacher($id)
    {
        $teachers = Teacher::find($id);
        return view('admin.teacher.edit', compact('teachers'));
    }

    public function UpdateTeacher(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:2',
            'email' => 'required|email',
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if (!empty(request('password'))){
            $data['password'] = Hash::make($request->password);
        }
        Teacher::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Teacher updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.teacher')->with($notification);
    }

    public function DeleteTeacher($id)
    {
        Teacher::find($id)->delete();
        $notification = array(
            'message' => 'Teacher deleted successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
