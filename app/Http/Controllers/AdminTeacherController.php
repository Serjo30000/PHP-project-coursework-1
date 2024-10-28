<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Rules\EmailRule;
use App\Rules\PhoneNumberRule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.admin-teachers', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.admin-create-teacher');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|string',
            'date_birth' => 'required|date',
            'phone' => ['required', 'string', 'max:15', 'unique:teachers', new PhoneNumberRule],
            'email' => ['required', 'string', 'max:255', 'unique:teachers', new EmailRule],
            'description' => 'required|string',
            'image_photo' => 'required|image',
        ]);

        $uuid = (string) Str::uuid();
        $fileName = $uuid;

        if ($request->hasFile('image_photo')) {
            $validated['image_photo'] = $request->file('image_photo')->storeAs('images/dynamic/photos', $fileName, 'public');
        }

        $teacher = Teacher::create([
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'last_name' => $request->input('last_name'),
            'sex' => $request->input('sex'),
            'date_birth' => $request->input('date_birth'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'image_photo' => $fileName,
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.admin-edit-teacher', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|string',
            'date_birth' => 'required|date',
            'phone' => ['required', 'string', 'max:15', Rule::unique('users', 'phone')->ignore($teacher->id), new PhoneNumberRule],
            'email' => ['required', 'string', 'max:255', Rule::unique('users', 'email')->ignore($teacher->id), new EmailRule()],
            'description' => 'required|string',
            'image_photo' => 'required|image',
        ]);

        if ($request->hasFile('image_photo')) {
            $validated['image_photo'] = $request->file('image_photo')->store('images/dynamic/photos', 'public');
        }

        $teacher->update([
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'last_name' => $request->input('last_name'),
            'sex' => $request->input('sex'),
            'date_birth' => $request->input('date_birth'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'image_photo' => $teacher->image_photo,
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
