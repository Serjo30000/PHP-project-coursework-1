<?php

use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCourseTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorCourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/teachers', [AdminTeacherController::class, 'index'])->name('admin.teachers.index');

    Route::get('/admin/teachers/create', [AdminTeacherController::class, 'create'])->name('admin.teachers.create');

    Route::get('/admin/teachers/{teacher}', [AdminTeacherController::class, 'show'])->name('admin.teachers.show');

    Route::get('/admin/teachers/edit/{teacher}', [AdminTeacherController::class, 'edit'])->name('admin.teachers.edit');

    Route::post('/admin/teachers', [AdminTeacherController::class, 'store'])->name('admin.teachers.store');

    Route::delete('/admin/teachers/{teacher}', [AdminTeacherController::class, 'destroy'])->name('admin.teachers.destroy');

    Route::put('/admin/teachers/{teacher}', [AdminTeacherController::class, 'update'])->name('admin.teachers.update');

    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');

    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');

    Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');

    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');

    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');

    Route::get('/admin/reviews/{review}', [AdminReviewController::class, 'show'])->name('admin.reviews.show');

    Route::delete('/admin/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');

    Route::get('/admin/course-types', [AdminCourseTypeController::class, 'index'])->name('admin.course-types.index');

    Route::get('/admin/course-types/create', [AdminCourseTypeController::class, 'create'])->name('admin.course-types.create');

    Route::get('/admin/course-types/{course_type}', [AdminCourseTypeController::class, 'show'])->name('admin.course-types.show');

    Route::get('/admin/course-types/edit/{course_type}', [AdminCourseTypeController::class, 'edit'])->name('admin.course-types.edit');

    Route::post('/admin/course-types', [AdminCourseTypeController::class, 'store'])->name('admin.course-types.store');

    Route::delete('/admin/course-types/{course_type}', [AdminCourseTypeController::class, 'destroy'])->name('admin.course-types.destroy');

    Route::put('/admin/course-types/{course_type}', [AdminCourseTypeController::class, 'update'])->name('admin.course-types.update');

    Route::get('/admin/courses', [AdminCourseController::class, 'index'])->name('admin.courses.index');

    Route::get('/admin/courses/{course}', [AdminCourseController::class, 'show'])->name('admin.courses.show');

    Route::delete('/admin/courses/{course}', [AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');
});

Route::middleware(['role:author'])->group(function () {
    Route::get('/author/courses', [AuthorCourseController::class, 'index'])->name('author.courses.index');

    Route::get('/author/courses/create', [AuthorCourseController::class, 'create'])->name('author.courses.create');

    Route::get('/author/courses/{course}', [AuthorCourseController::class, 'show'])->name('author.courses.show');

    Route::get('/author/courses/edit/{course}', [AuthorCourseController::class, 'edit'])->name('author.courses.edit');

    Route::post('/author/courses', [AuthorCourseController::class, 'store'])->name('author.courses.store');

    Route::delete('/author/courses/{course}', [AuthorCourseController::class, 'destroy'])->name('author.courses.destroy');

    Route::put('/author/courses/{course}', [AuthorCourseController::class, 'update'])->name('author.courses.update');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
