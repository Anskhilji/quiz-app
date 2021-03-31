<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Paper;
use App\Models\Question;
use Illuminate\Http\Request;
use DB;
class ViewPaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllPapersList()
    {
        $all_papers = DB::table('requests')->where('user_id', auth()->id())->where('status',1)->get();

        $multiplied = $all_papers->map(function ($item, $key) {
              return DB::table('questions')
                  ->where('subject_id', $item->subject_id)
                  ->where('date', '>=', date('Y-m-d') )
                  ->orderBy('id','desc')->get();
        });
        return view('student.paper.all_paper_list',compact('multiplied'));
    }

    public function ViewPaper(Request $request, $id)
    {
        $questions = Question::where('id', $id)->first();
        $convert_str_to_arr = explode(',', $questions->question_id);

        $select_questions  =  DB::table('papers')
                        ->whereIn('id', $convert_str_to_arr)
                        ->get();
        $papers = $select_questions->where('question_type', 'm')->all();
        $texts = $select_questions->where('question_type', 't')->all();
//        dd($texts);
        if(request()->has("submit")){
            $questions = $questions2 = array();
            if (!empty(request('q'))){
                foreach(request("q") as $q){
                    $questions[] = array(
                        "id" => $q,
                        "type" => request("q$q-type"),
                        "select" => request("q$q-option")
                    );
                }
            }
            if (!empty(request('t'))){
                foreach(request("t") as $t){
                    $questions2[] = array(
                        "id" => $t,
                        "type" => request("t$t-type"),
                        "ans" => request("t$t-ans"),
                    );
                }
            }
            $final_array = array_merge($questions,$questions2);
                Attempt::create([
                    'user_id' => auth()->id(),
                    'teacher_id' => $request->teacher_id,
                    'subject_id' => $request->subject_id,
                    'question_id' => $request->question_id,
                    'text_ans' => json_encode($final_array)
                ]);
            $notification = array(
                'message' => 'Quiz submitted!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            }
            $requests_sub = DB::table('attempts')
                ->join('questions','attempts.question_id','questions.id')
                ->select('attempts.*','questions.id as q_id')
                ->where('attempts.user_id', auth()->id())->where('attempts.question_id', $id)
                ->first();
            $status = isset($requests_sub->q_id) ? 'attempted' : 'notattempted' ;
       return view('student.paper.view_paper', compact('papers', 'texts','status', 'questions'));
    }
}
