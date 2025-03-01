<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'student_teacher');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
