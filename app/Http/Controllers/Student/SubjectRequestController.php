<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Paper;
use App\Models\Subject;
use App\Models\SubRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectRequestController extends Controller
{
    public function ChooseSubject()
    {
        $subjects = Subject::all();
//        return $subjects;
        return view('student.subject.request_subject', compact('subjects'));
    }

    public function StoreSubRequest(Request $request)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required|numeric',
        ],[
            'subject_id.numeric' => 'Please select the valid input.',
        ]);
        $check = Subject::where('id', $request->subject_id)->first();
        $request_exist = SubRequest::where('user_id', \auth()->id())->where('subject_id', $request->subject_id)->first();
        if ($check){
           if (!$request_exist){
               SubRequest::create([
                   'user_id' => Auth::id(),
                   'subject_id' => $request->subject_id
               ]);
               $notification = array(
                   'message' => 'Subject request submitted successfully!',
                   'alert-type' => 'success'
               );
           }else{
               $notification = array(
                   'message' => 'Already requested!',
                   'alert-type' => 'error'
               );
           }
        }else{
            $notification = array(
                'message' => 'Subject not exist!',
                'alert-type' => 'error'
            );
        }

        return redirect()->back()->with($notification);

    }
}
