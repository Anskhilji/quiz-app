<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ResultController extends Controller
{
    public function StudentResult()
    {
        $attempted = DB::table('attempts')
            ->join('users','attempts.user_id','users.id')
            ->join('subjects','attempts.subject_id','subjects.id')
            ->join('teachers','attempts.teacher_id','teachers.id')
            ->select('attempts.*','users.name','subjects.subject_name','teachers.name as teacher_name')
            ->where('attempts.user_id', auth()->id())
            ->where('attempts.status', 1)
            ->get();
//            return $attempted;
        return view('student.result.view_result', compact('attempted'));
    }
}
