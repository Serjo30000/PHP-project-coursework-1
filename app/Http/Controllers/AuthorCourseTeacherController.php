<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseTeacher;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorCourseTeacherController extends Controller
{
    public function show(CourseTeacher $course_teacher)
    {
        $user = Auth::user();

        $course = Course::find($course_teacher->course_id);

        if (!$user || !$course || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'CourseTeacher not show successfully.');
        }

        return view('author.course-teachers.author-show-course-teacher', compact('course_teacher'));
    }

    public function create(Course $course)
    {
        $user = Auth::user();

        if (!$user || !$course || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'CourseTeacher not create successfully.');
        }

        $teachers = Teacher::all();
        $courses = Course::where('user_id',$user->id)->get();

        return view('author.course-teachers.author-create-course-teacher', compact('courses', 'teachers', 'course'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'teacher_id' => 'required|integer|exists:teachers,id',
        ]);

        $user = Auth::user();

        $course = Course::find($request->input('course_id'));

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'CourseTeacher not create successfully.');
        }

        $existingCourseTeacher = CourseTeacher::where('course_id', $request->input('course_id'))
            ->where('teacher_id', $request->input('teacher_id'))
            ->exists();

        if ($existingCourseTeacher) {
            return redirect()->back()->withErrors(['teacher_id' => 'This teacher is already assigned to the selected course.']);
        }

        $course_teacher = CourseTeacher::create([
            'course_id' => $request->input('course_id'),
            'teacher_id' => $request->input('teacher_id'),
        ]);

        return redirect()->route('author.course-teachers.allCourseTeachers', ['course' => $course_teacher->course_id])->with('success', 'CourseTeacher created successfully.');
    }

    public function edit(CourseTeacher $course_teacher)
    {
        $user = Auth::user();

        $course = Course::find($course_teacher->course_id);

        if (!$user || !$course || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'CourseTeacher not show successfully.');
        }

        $teachers = Teacher::all();
        $courses = Course::where('user_id',$user->id)->get();
        return view('author.course-teachers.author-edit-course-teacher', compact('courses','teachers', 'course_teacher'));
    }

    public function update(Request $request, CourseTeacher $course_teacher)
    {
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'teacher_id' => 'required|integer|exists:teachers,id',
        ]);

        $user = Auth::user();

        $course = Course::find($request->input('course_id'));
        $old_course = Course::find($course_teacher->course_id);

        if (!$user || !$course_teacher || $course->user_id!=$user->id || $old_course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'CourseTeacher not updated successfully.');
        }

        $existingCourseTeacher = CourseTeacher::where('course_id', $request->input('course_id'))
            ->where('teacher_id', $request->input('teacher_id'))
            ->where('id', '!=', $course_teacher->id)
            ->exists();

        if ($existingCourseTeacher) {
            return redirect()->back()->withErrors(['teacher_id' => 'This teacher is already assigned to the selected course.']);
        }

        $course_teacher->update([
            'course_id' => $request->input('course_id'),
            'teacher_id' => $request->input('teacher_id'),
        ]);

        return redirect()->route('author.course-teachers.allCourseTeachers', ['course' => $course_teacher->course_id])->with('success', 'CourseTeacher updated successfully.');
    }

    public function destroy(CourseTeacher $course_teacher)
    {
        $user = Auth::user();

        $course = Course::find($course_teacher->course_id);

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'CourseTeacher not updated successfully.');
        }

        $course_teacher->delete();
        return redirect()->route('author.course-teachers.allCourseTeachers', ['course' => $course->id])->with('success', 'CourseTeacher deleted successfully.');
    }
}
