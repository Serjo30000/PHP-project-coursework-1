<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'slogan',
        'description',
        'count_week',
        'price',
        'complexity',
        'lecture_status',
        'image_logo',
        'image_banner_course',
        'image_certificate',
        'user_id',
        'course_type_id',
    ];

    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coursePrograms()
    {
        return $this->hasMany(CourseProgram::class);
    }

    public function courseTeachers()
    {
        return $this->hasMany(CourseTeacher::class);
    }

    public function focuses()
    {
        return $this->hasMany(Focus::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
