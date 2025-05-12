<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Student\InternshipController;
use App\Http\Controllers\Student\ApplicationController;
use App\Http\Controllers\Student\MessageController;
use App\Http\Controllers\Student\HistoryController;
use App\Http\Controllers\Student\ProfileController;


// Giriş
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Öğrenci kayıt
Route::get('/register/student', [AuthController::class, 'showStudentRegisterForm'])->name('register.student.form');
Route::post('/register/student', [AuthController::class, 'registerStudent'])->name('register.student');

// Şirket kayıt
Route::get('/register/company', [AuthController::class, 'showCompanyRegisterForm'])->name('register.company.form');
Route::post('/register/company', [AuthController::class, 'registerCompany'])->name('register.company');

Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth'])->name('student.dashboard');



Route::middleware(['auth'])->prefix('student')->group(function () {
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::get('/internships', [InternshipController::class, 'index'])->name('student.internships.index');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('student.applications.index');
    Route::get('/messages', [MessageController::class, 'index'])->name('student.messages.index');
    Route::get('/history', [HistoryController::class, 'index'])->name('student.history.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('student.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('student.profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('student.profile.update');
    
});




Route::get('/', function () {
    return view('welcome');
});
