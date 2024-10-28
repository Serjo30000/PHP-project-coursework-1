<?php

use App\Http\Controllers\AdminTeacherController;
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

Route::get('/admin/teachers', [AdminTeacherController::class, 'index'])->name('admin.teachers.index');

Route::get('/admin/teachers/create', [AdminTeacherController::class, 'create'])->name('admin.teachers.create');

Route::get('/admin/teachers/edit', [AdminTeacherController::class, 'edit'])->name('admin.teachers.edit');

Route::post('/admin/teachers', [AdminTeacherController::class, 'store'])->name('admin.teachers.store');

Route::delete('/admin/teachers/{teacher}', [AdminTeacherController::class, 'destroy'])->name('admin.teachers.destroy');

Route::put('/admin/teachers/{teacher}', [AdminTeacherController::class, 'update'])->name('admin.teachers.update');
