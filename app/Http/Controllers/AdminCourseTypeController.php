<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminCourseTypeController extends Controller
{
    public function index()
    {
        $course_types = CourseType::paginate(10);
        return view('admin.course-types.admin-course-types', compact('course_types'));
    }

    public function show(CourseType $course_type)
    {
        return view('admin.course-types.admin-show-course-type', compact('course_type'));
    }

    public function create()
    {
        return view('admin.course-types.admin-create-course-type');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:course_types,name',
        ]);

        $course_type = CourseType::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.course-types.index')->with('success', 'CourseType created successfully.');
    }

    public function edit(CourseType $course_type)
    {
        return view('admin.course-types.admin-edit-course-type', compact('course_type'));
    }

    public function update(Request $request, CourseType $course_type)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', Rule::unique('course_types', 'name')->ignore($course_type->id)],
        ]);

        $course_type->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.course-types.index')->with('success', 'CourseType updated successfully.');
    }

    public function destroy(CourseType $course_type)
    {
        $course_type->delete();
        return redirect()->route('admin.course-types.index')->with('success', 'CourseType deleted successfully.');
    }
}
