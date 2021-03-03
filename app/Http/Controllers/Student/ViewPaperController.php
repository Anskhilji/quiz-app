<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Paper;
use Illuminate\Http\Request;
use DB;
class ViewPaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ViewPaper(Request $request, $id)
    {

        $papers = Paper::where('subject_id', $id)->where('question_type', 'm')->get();
        $texts = Paper::where('subject_id', $id)->where('question_type', 't')->get();
//        return $texts;
        if(request()->has("submit")){
//            dd(request()->all());
            $questions = $questions2 = array();
//            dd(\request()->all());
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

//                dd(auth()->user()->id);
                Attempt::create([
                    'user_id' => auth()->id(),
                    'teacher_id' => $request->teacher_id,
                    'subject_id' => $request->subject_id,
                    'text_ans' => json_encode($final_array)
                ]);
            $notification = array(
                'message' => 'Quiz submitted!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            }
            $requests_sub = DB::table('attempts')
                ->join('subjects','attempts.subject_id','subjects.id')
                ->select('attempts.*','subjects.id as sub_id')
                ->where('attempts.user_id', auth()->id())->where('attempts.subject_id', $id)
                ->first();
            $status = isset($requests_sub->subject_id) ? 'attempted' : 'notattempted' ;
       return view('student.paper.view_paper', compact('papers', 'texts','status'));
    }
}
