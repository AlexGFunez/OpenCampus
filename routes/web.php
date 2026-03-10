<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AcademicPeriodController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index'); 
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create'); 
     
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
    Route::get('/enrollments', [EnrollmentsController::class, 'index'])->name('enrollments.index');
    Route::get('/enrollments/create', [EnrollmentsController::class, 'index'])->name('enrollments.create');


    Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties.index');
    Route::get('/AcademicPeriods', [AcademicPeriodController::class, 'index'])->name('academicperiods.index');




});

require __DIR__.'/auth.php';
