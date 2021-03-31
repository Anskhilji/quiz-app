<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
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
        return $this->hasOne(SubRequest::class,'subject', 'id');
    }
}
