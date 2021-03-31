<?php

    function correct_ans($id = 0){
      $result  =  DB::table('papers')->where('id',$id)->where('question_type', 'm')->first();
//      dd($result->correct);
      return $result->correct;
    }

    function get_teacher_name($id = 0){
      $result  =  DB::table('teachers')->where('id',$id)->first();
//      dd($result->correct);
      return $result->name;
    }

    function get_subject_name($id = 0){
      $result  =  DB::table('subjects')->where('id',$id)->first();
//      dd($result->correct);
      return $result->subject_name;
    }
    function get_total_marks($id = 0){
      $result  =  DB::table('papers')->where('id',$id)->first();
      return $result->text_marks;
    }
    function get_paper_status($id = 0){
      $result  =  DB::table('attempts')->where(['user_id'=>auth()->user()->id,'question_id'=>$id])->first();
      if($result){
          return 'Attempted';
      }else{
          return 'false';
      }
    }
