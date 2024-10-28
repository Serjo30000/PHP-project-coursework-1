<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\EmailRule;
use App\Rules\PhoneNumberRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.admin-users', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.admin-show-user', compact('user'));
    }

    public function create()
    {
        return view('admin.users.admin-create-user');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required|string|unique:users,login',
            'email' => ['required', 'string', 'max:255', 'unique:users', new EmailRule],
            'phone' => ['required', 'string', 'max:15', 'unique:users', new PhoneNumberRule],
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'sex' => 'required|string',
            'date_birth' => 'required|date',
            'image_avatar' => 'required|image',
            'password' => 'required|string|min:8|confirmed',
            'description' => 'required|string',
            'role' => 'required|string',
        ]);

        $uuid = (string) Str::uuid();
        $fileName = $uuid . '.jpg';

        if ($request->hasFile('image_avatar')) {
            $validated['image_avatar'] = $request->file('image_avatar')->storeAs('images/dynamic/avatars', $fileName, 'public');
        }

        $user = User::create([
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'last_name' => $request->input('last_name'),
            'sex' => $request->input('sex'),
            'date_birth' => $request->input('date_birth'),
            'image_avatar' => $fileName,
            'password' => Hash::make($request->input('password')),
            'description' => $request->input('description'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function destroy(User $user)
    {
        if (Storage::disk('public')->exists('/images/dynamic/avatars/' . $user->image_avatar)) {
            Storage::disk('public')->delete('/images/dynamic/avatars/' . $user->image_avatar);
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
