<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function AllSubject()
    {
        $subjects = Subject::with('teacher')->get();
        return view('admin.subject.index', compact('subjects'));
    }

    public function AddSubject()
    {
        $teachers = Teacher::all();
        return view('admin.subject.create', compact('teachers'));
    }

    public function StoreSubject(Request $request)
    {
        $validatedData = $request->validate([
           'subject_name' => 'required|max:50',
           'subject_code' => 'required|max:50',
           'teacher_id' => 'required|numeric',
        ]);

        $check = Subject::where('teacher_id', $request->teacher_id)
                ->where('subject_name', $request->subject_name)
                ->first();

        if(!$check){
            Subject::create([
                'teacher_id' => $request->teacher_id,
                'subject_name' => $request->subject_name,
                'subject_code' => $request->subject_code,
            ]);
            $notification = array(
                'message' => 'Subject added successfully!',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Already assigned to this teacher',
                'alert-type' => 'success'
            );
        }


        return redirect()->back()->with($notification);
    }

    public function EditSubject($id)
    {
        $subjects = Subject::where('id',$id)->first();
        $teachers = Teacher::all();
        return view('admin.subject.edit', compact('subjects','teachers'));
    }

    public function UpdateSubject(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject_name' => 'required|max:50',
            'subject_code' => 'required|max:50',
            'teacher_id' => 'required',
        ]);

        Subject::where('id', $id)->update([
            'teacher_id' => $request->teacher_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        $notification = array(
            'message' => 'Subject updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subject')->with($notification);
    }

    public function DeleteSubject(Subject $subjects)
    {
        $subjects->delete();
        $notification = array(
            'message' => 'Subject removed successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}
