<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseTeacher;
use App\Models\CourseType;
use App\Models\Focus;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorCourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user){
            return redirect()->route('home')->with('error', 'Course not created successfully.');
        }

        $courses = Course::where('user_id',$user->id)->paginate(10);

        return view('author.courses.author-courses', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('author.courses.author-show-course', compact('course'));
    }

    public function create()
    {
        $courseTypes = CourseType::all();
        return view('author.courses.author-create-course', compact('courseTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'slogan' => 'required|string',
            'description' => 'required|string',
            'count_week' => 'required|integer|min:1',
            'count_lectures' => 'required|integer|min:1',
            'count_seminars' => 'required|integer|min:1',
            'count_online_classes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'complexity' => 'required|string',
            'lecture_status' => 'required|string',
            'image_logo' => 'required|image',
            'image_banner_course' => 'required|image',
            'image_certificate' => 'required|image',
            'course_type_id' => 'required|integer|exists:course_types,id',
        ]);

        $uuid1 = (string) Str::uuid();
        $fileName1 = $uuid1 . '.jpg';

        if ($request->hasFile('image_logo')) {
            $validated['image_logo'] = $request->file('image_logo')->storeAs('images/dynamic/logo_courses', $fileName1, 'public');
        }

        $uuid2 = (string) Str::uuid();
        $fileName2 = $uuid2 . '.jpg';

        if ($request->hasFile('image_banner_course')) {
            $validated['image_banner_course'] = $request->file('image_banner_course')->storeAs('images/dynamic/banner_courses', $fileName2, 'public');
        }

        $uuid3 = (string) Str::uuid();
        $fileName3 = $uuid3 . '.jpg';

        if ($request->hasFile('image_certificate')) {
            $validated['image_certificate'] = $request->file('image_certificate')->storeAs('images/dynamic/certificates', $fileName3, 'public');
        }

        $user = Auth::user();

        if (!$user){
            return redirect()->route('home')->with('error', 'Course not created successfully.');
        }

        $course = Course::create([
            'title' => $request->input('title'),
            'slogan' => $request->input('slogan'),
            'description' => $request->input('description'),
            'count_week' => $request->input('count_week'),
            'count_lectures' => $request->input('count_lectures'),
            'count_seminars' => $request->input('count_seminars'),
            'count_online_classes' => $request->input('count_online_classes'),
            'price' => $request->input('price'),
            'complexity' => $request->input('complexity'),
            'lecture_status' => $request->input('lecture_status'),
            'image_logo' => $fileName1,
            'image_banner_course' => $fileName2,
            'image_certificate' => $fileName3,
            'course_type_id' => $request->input('course_type_id'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('author.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $courseTypes = CourseType::all();
        return view('author.courses.author-edit-course', compact('course','courseTypes'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'slogan' => 'required|string',
            'description' => 'required|string',
            'count_week' => 'required|integer|min:1',
            'count_lectures' => 'required|integer|min:1',
            'count_seminars' => 'required|integer|min:1',
            'count_online_classes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'complexity' => 'required|string',
            'lecture_status' => 'required|string',
            'image_logo' => 'image',
            'image_banner_course' => 'image',
            'image_certificate' => 'image',
            'course_type_id' => 'required|integer|exists:course_types,id',
        ]);

        $fileName1 = $course->image_logo;

        if ($request->hasFile('logo_courses')) {
            if (Storage::disk('public')->exists('/images/dynamic/logo_courses/' . $fileName1)) {
                Storage::disk('public')->delete('/images/dynamic/logo_courses/' . $fileName1);
            }

            $uuid1 = (string) Str::uuid();
            $fileName1 = $uuid1 . '.jpg';

            $validated['logo_courses'] = $request->file('logo_courses')->storeAs('images/dynamic/logo_courses', $fileName1, 'public');
        }

        $fileName2 = $course->image_banner_course;

        if ($request->hasFile('image_banner_course')) {
            if (Storage::disk('public')->exists('/images/dynamic/banner_courses/' . $fileName2)) {
                Storage::disk('public')->delete('/images/dynamic/banner_courses/' . $fileName2);
            }

            $uuid2 = (string) Str::uuid();
            $fileName2 = $uuid2 . '.jpg';

            $validated['image_banner_course'] = $request->file('image_banner_course')->storeAs('images/dynamic/banner_courses', $fileName2, 'public');
        }

        $fileName3 = $course->image_certificate;

        if ($request->hasFile('image_certificate')) {
            if (Storage::disk('public')->exists('/images/dynamic/certificates/' . $fileName3)) {
                Storage::disk('public')->delete('/images/dynamic/certificates/' . $fileName3);
            }

            $uuid3 = (string) Str::uuid();
            $fileName3 = $uuid3 . '.jpg';

            $validated['image_certificate'] = $request->file('image_certificate')->storeAs('images/dynamic/certificates', $fileName3, 'public');
        }

        $user = Auth::user();

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Course not updated successfully.');
        }

        $course->update([
            'title' => $request->input('title'),
            'slogan' => $request->input('slogan'),
            'description' => $request->input('description'),
            'count_week' => $request->input('count_week'),
            'count_lectures' => $request->input('count_lectures'),
            'count_seminars' => $request->input('count_seminars'),
            'count_online_classes' => $request->input('count_online_classes'),
            'price' => $request->input('price'),
            'complexity' => $request->input('complexity'),
            'lecture_status' => $request->input('lecture_status'),
            'image_logo' => $fileName1,
            'image_banner_course' => $fileName2,
            'image_certificate' => $fileName3,
            'course_type_id' => $request->input('course_type_id'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('author.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $user = Auth::user();

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Course not updated successfully.');
        }

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
        return redirect()->route('author.courses.index')->with('success', 'Course deleted successfully.');
    }

    public function allReviews(Course $course)
    {
        $user = Auth::user();

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Reviews not shows successfully.');
        }

        $reviews = Review::where('course_id', $course->id)->paginate(10);

        return view('author.reviews.author-reviews', compact('reviews', 'course'));
    }

    public function allCourseTeachers(Course $course)
    {
        $user = Auth::user();

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'CourseTeachers not shows successfully.');
        }

        $course_teachers = CourseTeacher::where('course_id', $course->id)->paginate(10);

        return view('author.course-teachers.author-course-teachers', compact('course_teachers', 'course'));
    }

    public function allFocuses(Course $course)
    {
        $user = Auth::user();

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Focuses not shows successfully.');
        }

        $focuses = Focus::where('course_id', $course->id)->paginate(10);

        return view('author.focuses.author-focuses', compact('focuses', 'course'));
    }
}
