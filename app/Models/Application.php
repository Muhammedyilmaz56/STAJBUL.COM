<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'student_id',
        'internship_posting_id',
        'cv_path',
        'cover_letter',
        'status'
    ];
    

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function internshipPosting()
    {
        return $this->belongsTo(InternshipPosting::class);
    }
}

