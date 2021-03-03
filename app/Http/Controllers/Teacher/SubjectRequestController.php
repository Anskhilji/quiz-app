<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\SubRequest;
use Illuminate\Http\Request;
use App\Models\Teacher;
use DB;

class SubjectRequestController extends Controller
{
    public function AllRequest()
    {
        $id = auth()->guard("teacher")->id();
        $requests = DB::table('requests')
            ->leftjoin('subjects', 'requests.subject_id', 'subjects.id')
            ->leftjoin('users', 'requests.user_id', 'users.id')
            ->leftjoin('teachers', 'subjects.teacher_id', 'teachers.id')
            ->select('requests.*', 'subjects.teacher_id', 'subjects.subject_name', 'users.name as user','teachers.name as teacher')
            ->where('teachers.id',$id)
            ->get();
//        return $requests;
        return view('teacher.subject.subject_request', compact('requests'));
    }

    public function InActiveRequest($id)
    {
        SubRequest::where('id',$id)->update([
           'status' => '0',
        ]);

        $notification = array(
            'message' => 'Request Rejected!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ActiveRequest($id)
    {
        SubRequest::where('id',$id)->update([
            'status' => '1',
        ]);

        $notification = array(
            'message' => 'Request Accepted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteRequest($id)
    {
        SubRequest::where('id',$id)->delete();
        $notification = array(
            'message' => 'Request Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
