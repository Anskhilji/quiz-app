<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Paper;
use Illuminate\Http\Request;
use DB;
class ExamController extends Controller
{
    public function ExamAttempt()
    {
        $attempted = DB::table('attempts')
            ->join('users','attempts.user_id','users.id')
            ->join('subjects','attempts.subject_id','subjects.id')
            ->select('attempts.*','users.name','subjects.subject_name')
            ->where('attempts.teacher_id', auth()->guard('teacher')->id())
            ->where('attempts.status', 0)
            ->get();
//        return $attempted;
        return view('teacher.exam.attempted_exam', compact('attempted'));
    }

    public function ViewAttemptedPaper($id)
    {
        $get_data = DB::table('attempts')->where('id',$id)->first();
        $papers = Paper::where(['question_type'=>'m','subject_id'=>$get_data->subject_id,'teacher_id'=>$get_data->teacher_id])->get();
        $texts = Paper::where(['question_type'=>'t','subject_id'=>$get_data->subject_id,'teacher_id'=>$get_data->teacher_id])->get();
        $attempted = DB::table('attempts')
            ->join('users','attempts.user_id','users.id')
            ->join('subjects','attempts.subject_id','subjects.id')
            ->select('attempts.*','users.name','subjects.subject_name')
            ->where('attempts.teacher_id', auth()->guard('teacher')->id())
            ->where('attempts.status', 0)
            ->where('attempts.id', $id)
            ->first();
//        dd($attempted);
        return view('teacher.exam.view_attempted_exam',compact('papers', 'texts','attempted','id'));
    }

    public function StoreMarks(Request $request, $id)
    {
        $validatedData = $request->validate([
           'obj_total' => 'required',
           'obj_abtained' => 'required',
           'sbj_total' => 'required',
           'sbj_obtained' => 'required',
        ]);

        $total_obj = $request->obj_total;
        $total_sbj = $request->sbj_total;

        $total_obj_obtained = $request->obj_abtained;
        $total_sbj_obtained = $request->sbj_obtained;


        $total_marks = $total_obj + $total_sbj;

        $total_obtained_marks = $total_obj_obtained + $total_sbj_obtained;
        Attempt::where('id',$id)->update([
            'total_marks' => $total_marks,
            'obtained_marks' => $total_obtained_marks,
            'status' => 1
        ]);

        $notification = array(
            'message' => 'Result inserted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.exam.attempted')->with($notification);

    }

//    Marked Paper

    public function MarkedPaper()
    {
        $attempted = DB::table('attempts')
            ->join('users','attempts.user_id','users.id')
            ->join('subjects','attempts.subject_id','subjects.id')
            ->select('attempts.*','users.name','subjects.subject_name')
            ->where('attempts.teacher_id', auth()->guard('teacher')->id())
            ->where('attempts.status', 1)
            ->get();
//        return $attempted;
        return view('teacher.exam.marked_paper', compact('attempted'));
    }

    public function EditMarkedPaper($id)
    {
        $get_data = DB::table('attempts')->where('id',$id)->first();
        $papers = Paper::where(['question_type'=>'m','subject_id'=>$get_data->subject_id,'teacher_id'=>$get_data->teacher_id])->get();
        $texts = Paper::where(['question_type'=>'t','subject_id'=>$get_data->subject_id,'teacher_id'=>$get_data->teacher_id])->get();
        $attempted = DB::table('attempts')
            ->join('users','attempts.user_id','users.id')
            ->join('subjects','attempts.subject_id','subjects.id')
            ->select('attempts.*','users.name','subjects.subject_name')
            ->where('attempts.teacher_id', auth()->guard('teacher')->id())
            ->where('attempts.status', 1)
            ->where('attempts.id', $id)
            ->first();
//        dd($attempted);
        return view('teacher.exam.edit_marked_result',compact('papers', 'texts','attempted','id'));
    }

    public function StoreMarkedPaper(Request $request, $id)
    {
        $validatedData = $request->validate([
            'obj_total' => 'required',
            'obj_abtained' => 'required',
            'sbj_total' => 'required',
            'sbj_obtained' => 'required',
        ]);

        $total_obj = $request->obj_total;
        $total_sbj = $request->sbj_total;

        $total_obj_obtained = $request->obj_abtained;
        $total_sbj_obtained = $request->sbj_obtained;


        $total_marks = $total_obj + $total_sbj;

        $total_obtained_marks = $total_obj_obtained + $total_sbj_obtained;
        Attempt::where('id',$id)->update([
            'total_marks' => $total_marks,
            'obtained_marks' => $total_obtained_marks,
            'status' => 1
        ]);

        $notification = array(
            'message' => 'Result updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.exam.marked')->with($notification);

    }

}
