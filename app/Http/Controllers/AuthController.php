<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\EmailRule;
use App\Rules\PhoneNumberRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function showRegisterForm()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    public function showEditAccountForm()
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.edit-account');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.users.index')->with('success', 'Добро пожаловать в админ панель!');
            }
            else if ($user->role == 'author') {
                return redirect()->route('author.courses.index')->with('success', 'Добро пожаловать, автор панель!');
            }
            else{
                return redirect()->route('home')->with('success', 'Добро пожаловать!');
            }
        }

        return back()->withErrors(['login' => 'Неверные учетные данные.']);
    }

    public function register(Request $request)
    {
        $request->validate([
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
        ]);

        $uuid = (string) Str::uuid();
        $fileName = $uuid . '.jpg';

        if ($request->hasFile('image_avatar')) {
            $validated['image_avatar'] = $request->file('image_avatar')->storeAs('images/dynamic/avatars', $fileName, 'public');
        }

        User::create([
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
            'role' => 'client',
        ]);

        return redirect()->route('login')->with('success', 'Регистрация успешна. Вы можете войти в систему.');
    }

    public function editAccount(Request $request)
    {
        $user = Auth::user();

        if (!$user){
            return redirect()->route('home')->with('error', 'User not edit successfully.');
        }

        $request->validate([
            'login' => ['required', 'string', 'max:255', Rule::unique('users', 'login')->ignore($user->id)],
            'email' => ['required', 'string', 'max:255', Rule::unique('users', 'email')->ignore($user->id),new EmailRule],
            'phone' => ['required', 'string', 'max:15', Rule::unique('users', 'phone')->ignore($user->id), new PhoneNumberRule],
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'sex' => 'required|string',
            'date_birth' => 'required|date',
            'image_avatar' => 'image',
            'password' => 'required|string|min:8|confirmed',
            'description' => 'required|string',
        ]);

        $fileName = $user->image_avatar;

        if ($request->hasFile('avatars')) {
            if (Storage::disk('public')->exists('/images/dynamic/avatars/' . $fileName)) {
                Storage::disk('public')->delete('/images/dynamic/avatars/' . $fileName);
            }

            $uuid = (string) Str::uuid();
            $fileName = $uuid . '.jpg';

            $validated['image_avatar'] = $request->file('image_avatar')->storeAs('images/dynamic/avatars', $fileName, 'public');
        }

        $userUpdated = User::find($user->id);

        if (!$userUpdated){
            return redirect()->route('home')->with('error', 'User not edit successfully.');
        }

        $userUpdated->update([
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
            'role' => $user->role,
        ]);

        session()->forget('cart');

        Auth::logout();

        return redirect()->route('login')->with('success', 'Изменение аккаунта прошло успешно. Вы можете войти в систему.');
    }

    public function logout()
    {
        session()->forget('cart');

        Auth::logout();
        return redirect()->route('home')->with('success', 'Вы вышли из системы.');
    }
}
