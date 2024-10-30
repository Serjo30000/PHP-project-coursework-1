<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $randomCourse = Course::with(['courseTeachers', 'focuses'])
            ->has('courseTeachers')
            ->has('focuses')
            ->inRandomOrder()
            ->first();

        $courseTypes = CourseType::all();

        return view('home', compact('randomCourse', 'courseTypes'));
    }
}
