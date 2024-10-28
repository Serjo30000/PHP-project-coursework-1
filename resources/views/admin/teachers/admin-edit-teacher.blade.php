@extends('layouts.admin')

@section('content')
    <h1>Edit Teacher</h1>
    <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $teacher->first_name ?? '') }}" required>
        </div>
        <div>
            <label for="second_name">Second Name</label>
            <input type="text" name="second_name" value="{{ old('second_name', $teacher->second_name ?? '') }}" required>
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $teacher->last_name ?? '') }}" required>
        </div>
        <div>
            <label for="sex">Sex</label>
            <select name="sex" required>
                <option value="male" {{ (old('sex', $teacher->sex ?? '') == 'male') ? 'selected' : '' }}>Male</option>
                <option value="female" {{ (old('sex', $teacher->sex ?? '') == 'female') ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div>
            <label for="date_birth">Date of Birth</label>
            <input type="date" name="date_birth" value="{{ old('date_birth', $teacher->date_birth ?? '') }}" required>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $teacher->phone ?? '') }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $teacher->email ?? '') }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description">{{ old('description', $teacher->description ?? '') }}</textarea>
        </div>
        <div>
            <label for="image_photo">Image Photo</label>
            <input type="file" name="image_photo">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
