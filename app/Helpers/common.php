<?php

    function correct_ans($id = 0){
      $result  =  DB::table('papers')->where('id',$id)->where('question_type', 'm')->first();
//      dd($result->correct);
      return $result->correct;
    }
