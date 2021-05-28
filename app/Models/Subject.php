<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubRequest;
class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'subject_name',
        'subject_code',
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class,'id', 'teacher_id');
    }

    public function request()
    {
        return $this->hasOne(SubRequest::class,'id', 'subject_id');
    }



}
