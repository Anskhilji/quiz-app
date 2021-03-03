<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaperController extends Controller
{
    public function AddQuestion()
    {
        $subjects = Subject::where('teacher_id', auth()->guard('teacher')->id())->get();
        return view('teacher.paper.create_question', compact('subjects'));
    }

    public function StoreQuestion(Request $request)
    {
        $validatedData = $request->validate([
           'subject_id' => 'required',
           'question' => 'required',
           'question_type' => 'required',

        ], [
            'subject_id.required' => 'Please choose subject',
        ]);

        Paper::create([
           'teacher_id' => Auth::guard('teacher')->id(),
           'subject_id' => $request->subject_id,
           'question' => $request->question,
           'question_type' => $request->question_type,
           'option_1' => $request->option_1,
           'option_2' => $request->option_2,
           'option_3' => $request->option_3,
           'option_4' => $request->option_4,
           'correct' => $request->correct,
           'text' => $request->text,
        ]);

        $notification = array(
            'message' => 'Question added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllQuestion()
    {
        $papers = Paper::where('teacher_id', auth()->guard('teacher')->id())
            ->where('question_type', 'm')
            ->with('subject')
            ->get();
        $texts = Paper::where('teacher_id', auth()->guard('teacher')->id())->where('question_type', 't')
            ->with('subject')
            ->get();

        return view('teacher.paper.all_paper', compact('papers', 'texts'));

    }

    public function EditQuestion($id)
    {
        $subjects = Subject::where('teacher_id', auth()->guard('teacher')->id())->get();
        $mcqs = Paper::where('id', $id)->first();
//        dd($subjects);
        return view('teacher.paper.edit_mcqs', compact('subjects','mcqs'));
    }

    public function UpdateQuestion(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required',
            'question' => 'required',
            'question_type' => 'required',

        ], [
            'subject_id.required' => 'Please choose subject',
        ]);

        Paper::where('id', $id)->update([
            'teacher_id' => Auth::guard('teacher')->id(),
            'subject_id' => $request->subject_id,
            'question' => $request->question,
            'question_type' => $request->question_type,
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'correct' => $request->correct,
            'text' => $request->text,
        ]);

        $notification = array(
            'message' => 'MCQ,s updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.all.question')->with($notification);

    }

    public function DeleteQuestion($id)
    {
        Paper::find($id)->delete();
        $notification = array(
            'message' => 'MCQ,s deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

//    Text

    public function EditText($id)
    {
        $subjects = Subject::where('teacher_id', auth()->guard('teacher')->id())->get();
        $texts = Paper::where('id', $id)->first();
//        dd($texts);
        return view('teacher.paper.edit_text', compact('subjects', 'texts'));

    }

    public function UpdateText(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required',
            'question' => 'required',
            'question_type' => 'required',

        ], [
            'subject_id.required' => 'Please choose subject',
        ]);

        Paper::where('id', $id)->update([
            'teacher_id' => Auth::guard('teacher')->id(),
            'subject_id' => $request->subject_id,
            'question' => $request->question,
            'question_type' => $request->question_type,
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'correct' => $request->correct,
            'text' => $request->text,
        ]);

        $notification = array(
            'message' => 'Question updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.all.question')->with($notification);
    }

    public function DeleteText($id)
    {
        Paper::find($id)->delete();
        $notification = array(
            'message' => 'Question deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
