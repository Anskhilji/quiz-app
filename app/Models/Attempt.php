<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','teacher_id','subject_id','text_ans','status','total_marks','obtained_marks'];
}
