<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\TokenAuthController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['throttle:6,1'])
                ->name('verification.send');

    Route::post('/verify-email', VerifyEmailController::class)
                ->middleware(['throttle:6,1'])
                ->name('verification.verify');

    Route::delete('logout', [TokenAuthController::class, 'destroy'])->name('logout');
});

Route::post('login', [TokenAuthController::class, 'store'])->name('login');

Route::post('/register/student', [StudentController::class, 'store'])->name('student.register');

Route::post('/register/teacher', [TeacherController::class, 'store'])->name('teacher.register');

Route::post('/register/admin', [AdminController::class, 'store'])->name('admin.register');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');