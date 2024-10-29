<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Focus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorFocusController extends Controller
{
    public function show(Focus $focus)
    {
        $user = Auth::user();

        $course = Course::find($focus->course_id);

        if (!$user || !$course || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Focus not show successfully.');
        }

        return view('author.focuses.author-show-focus', compact('focus'));
    }

    public function create(Course $course)
    {
        $user = Auth::user();

        if (!$user || !$course || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Focus not create successfully.');
        }

        $courses = Course::where('user_id',$user->id)->get();

        return view('author.focuses.author-create-focus', compact('courses', 'course'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'for_whom' => 'required|string',
        ]);

        $user = Auth::user();

        $course = Course::find($request->input('course_id'));

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Focus not create successfully.');
        }

        $existingFocus = Focus::where('course_id', $request->input('course_id'))
            ->where('for_whom', $request->input('for_whom'))
            ->exists();

        if ($existingFocus) {
            return redirect()->back()->withErrors(['for_whom' => 'This target audience already exists for the selected course.']);
        }

        $focus = Focus::create([
            'course_id' => $request->input('course_id'),
            'for_whom' => $request->input('for_whom'),
        ]);

        return redirect()->route('author.focuses.allFocuses', ['course' => $focus->course_id])->with('success', 'Focus created successfully.');
    }

    public function edit(Focus $focus)
    {
        $user = Auth::user();

        $course = Course::find($focus->course_id);

        if (!$user || !$course || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Focus not show successfully.');
        }

        $courses = Course::where('user_id',$user->id)->get();

        return view('author.focuses.author-edit-focus', compact('courses', 'focus'));
    }

    public function update(Request $request, Focus $focus)
    {
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'for_whom' => 'required|string',
        ]);

        $user = Auth::user();

        $course = Course::find($request->input('course_id'));
        $old_course = Course::find($focus->course_id);

        if (!$user || !$focus || $course->user_id!=$user->id || $old_course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Focus not updated successfully.');
        }

        $existingFocus = Focus::where('course_id', $request->input('course_id'))
            ->where('for_whom', $request->input('for_whom'))
            ->where('id', '!=', $focus->id)
            ->exists();

        if ($existingFocus) {
            return redirect()->back()->withErrors(['for_whom' => 'This target audience already exists for the selected course.']);
        }

        $focus->update([
            'course_id' => $request->input('course_id'),
            'for_whom' => $request->input('for_whom'),
        ]);

        return redirect()->route('author.focuses.allFocuses', ['course' => $focus->course_id])->with('success', 'Focus updated successfully.');
    }

    public function destroy(Focus $focus)
    {
        $user = Auth::user();

        $course = Course::find($focus->course_id);

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Focus not updated successfully.');
        }

        $focus->delete();
        return redirect()->route('author.focuses.allFocuses', ['course' => $course->id])->with('success', 'Focus deleted successfully.');
    }
}
