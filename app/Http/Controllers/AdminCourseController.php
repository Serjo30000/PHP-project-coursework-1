<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);

        return view('admin.courses.admin-courses', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('admin.courses.admin-show-course', compact('course'));
    }

    public function destroy(Course $course)
    {
        if (Storage::disk('public')->exists('/images/dynamic/logo_courses/' . $course->image_logo)) {
            Storage::disk('public')->delete('/images/dynamic/logo_courses/' . $course->image_logo);
        }

        if (Storage::disk('public')->exists('/images/dynamic/banner_courses/' . $course->image_banner_course)) {
            Storage::disk('public')->delete('/images/dynamic/banner_courses/' . $course->image_banner_course);
        }

        if (Storage::disk('public')->exists('/images/dynamic/certificates/' . $course->image_certificate)) {
            Storage::disk('public')->delete('/images/dynamic/certificates/' . $course->image_certificate);
        }

        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
