<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id','id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id','id');
    }
}
