@extends('layouts.admin')

@section('content')
    <h1>Teachers</h1>
    <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">Add Teacher</a>
    <table>
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->first_name }}</td>
                <td>{{ $teacher->last_name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>
                    <a href="{{ route('admin.teachers.edit', $teacher->id) }}">Edit</a>
                    <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
