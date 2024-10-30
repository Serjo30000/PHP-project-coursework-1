<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Http\Request;

class ClientCourseController extends Controller
{
    public function index(Request $request)
    {
        $courseTypes = CourseType::all();
        $courses = [];

        if ($request->has('type_id')) {
            $typeId = $request->input('type_id');

            $courses = Course::where('course_type_id', $typeId)
                ->with(['courseTeachers', 'focuses'])
                ->has('courseTeachers')
                ->has('focuses')
                ->get();
        }

        return view('client.client-course-types', compact('courseTypes', 'courses'));
    }
}
