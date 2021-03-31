<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'question_id',
        'date',
        'start_time',
        'end_time',
        'total_marks',
    ];
    public $timestamps = false;
}
