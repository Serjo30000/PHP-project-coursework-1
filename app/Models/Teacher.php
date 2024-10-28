<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'first_name',
        'second_name',
        'last_name',
        'sex',
        'date_birth',
        'phone',
        'email',
        'description',
        'image_photo',
    ];

    public function courseTeachers()
    {
        return $this->hasMany(CourseTeacher::class);
    }
}
