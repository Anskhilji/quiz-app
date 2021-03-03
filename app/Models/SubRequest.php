<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
class SubRequest extends Model
{
    use HasFactory;
    protected $table = 'requests';

    protected $fillable = ['user_id','subject_id','status'];




}
