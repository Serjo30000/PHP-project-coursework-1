<?php

use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCourseTypeController;
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

//Route::middleware(['role:admin'])->group(function () {
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
//});

//Route::middleware(['role:author'])->group(function () {
    Route::get('/author/courses', [AuthorCourseController::class, 'index'])->name('author.courses.index');
//});
