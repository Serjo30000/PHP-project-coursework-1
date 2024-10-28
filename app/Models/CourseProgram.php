<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProgram extends Model
{
    use HasFactory;

    protected $table = 'course_programs';

    protected $fillable = [
        'count_lectures',
        'count_seminars',
        'count_online_classes',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
