<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AllSubjectController extends Controller
{
    public function AllSubject()
    {
        $subjects = Subject::where('teacher_id', auth()->guard('teacher')->id())->get();
        return view('teacher.subject.index', compact('subjects'));
    }
}
