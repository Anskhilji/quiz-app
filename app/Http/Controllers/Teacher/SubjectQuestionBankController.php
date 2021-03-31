<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;

class SubjectQuestionBankController extends Controller
{
    public function SubjectAllQuestion($id)
    {
        $mcsqs = Paper::where('teacher_id', auth()
            ->guard('teacher')->id())
            ->where('subject_id', $id)
            ->where('question_type', 'm')
            ->get();

        $subjective = Paper::where('teacher_id', auth()
            ->guard('teacher')->id())
            ->where('subject_id', $id)
            ->where('question_type', 't')
            ->get();
//        dd($mcsqs);
        return view('teacher.subject.subject_quesion_bank', compact('mcsqs', 'subjective'));
    }

    public function CreateQuiz(Request $request)
    {
        $validatedData = $request->validate([
           'date' => 'required|date|after:-1day',
           'start_time' => 'required',
           'end_time' => 'required',
           'select_m' => 'required',
        ],[
            'select_m.required' => 'Please select Mcq\'s',
        ]);

        $array = Arr::collapse([$request->select_m,$request->select_t]);
        $data['question_id'] = implode(',', $array);
        $data['subject_id'] = $request->subject_id;
        $data['start_time'] = $request->start_time;
        $data['end_time'] = $request->end_time;
        $data['teacher_id'] = auth()->guard('teacher')->id();
        $data['date'] = $request->date;
        Question::create($data);

        $notification = array(
            'message' => 'Quiz Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

//    created paper
    public function CreatedPaperList()
    {
//        $subjects = Subject::where('teacher_id', auth()->guard('teacher')->id())->get();
        $subjects = DB::table('questions')
            ->leftjoin('subjects', 'questions.subject_id','subjects.id')
            ->select('questions.*', 'subjects.subject_name','subjects.subject_code','subjects.id as subject_id')
            ->where('questions.teacher_id', auth()->guard('teacher')->id())
            ->orderBy('id','desc')
            ->get();
        return view('teacher.createdpaper.index', compact('subjects'));
    }


    public function CreatedPaperEdit($id)
    {

         $questions = Question::where('id', $id)->first();

        $all_paper_question = DB::table('papers')
            -> where('subject_id', $questions->subject_id)
            ->get();
        $mcsqs = $all_paper_question->where('question_type','m')->all();
        $subjective = $all_paper_question->where('question_type','t')->all();

        $find_questions = explode(',', $questions->question_id);

        return view('teacher.createdpaper.created_paper_edit', compact('mcsqs', 'subjective', 'find_questions','questions'));
    }

    public function CreatedPaperEditStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'select_m' => 'required',
        ],[
            'select_m.required' => 'Please select Mcq\'s',
        ]);

        $array = Arr::collapse([$request->select_m,$request->select_t]);
        $data['question_id'] = implode(',', $array);
        $data['subject_id'] = $request->subject_id;
        $data['teacher_id'] = auth()->guard('teacher')->id();
        $data['start_time'] = $request->start_time;
        $data['end_time'] = $request->end_time;
        $data['date'] = $request->date;
        Question::where('id',$id)->update($data);

        $notification = array(
            'message' => 'Quiz Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
