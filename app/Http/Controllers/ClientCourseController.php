<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\Review;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show(Course $course)
    {
        $courseTeachers = $course->courseTeachers()->pluck('teacher_id');
        $teachers = Teacher::whereIn('id', $courseTeachers)->get();
        $reviews = Review::where('course_id',$course->id)->paginate(10);

        return view('client.client-show-course', compact('course', 'teachers', 'reviews'));
    }

    public function commenting(Request $request){
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'grade' => 'required|integer|min:1',
            'title' => 'required|string',
            'text' => 'required|string',
        ]);

        $user = Auth::user();

        if (!$user){
            return redirect()->route('home')->with('error', 'Review not created successfully.');
        }

        $review = Review::create([
            'grade' => $request->input('grade'),
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'course_id' => $request->input('course_id'),
            'user_id' => $user->id,
        ]);

        $course = Course::find($request->input('course_id'));

        if (!$course){
            return redirect()->route('home')->with('error', 'Review not created successfully.');
        }

        return redirect()->route('client.client-show-course.show', compact('course'))->with('success', 'Review created successfully.');
    }
}
