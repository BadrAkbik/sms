<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountmentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PendingAdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FatherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\Student\PendingStudentController;
use App\Http\Controllers\Teacher\PendingTeacherController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Teacher\TeacherController;


require __DIR__.'/auth.php';


Route::apiResource('admin', AdminController::class)->middleware(['auth:sanctum', 'can:admin', 'approved']);

Route::apiResource('teacher', TeacherController::class);

Route::apiResource('student', StudentController::class);

Route::apiResource('accountment', AccountmentController::class);

Route::apiResource('attendance', AttendanceController::class);

Route::apiResource('exam', ExamController::class);

Route::apiResource('father', FatherController::class);

Route::apiResource('mother', MotherController::class);

Route::apiResource('grade', GradeController::class);

Route::apiResource('outcome', OutcomeController::class);

Route::apiResource('result', ResultController::class);

Route::apiResource('section', SectionController::class);

Route::apiResource('subject', SubjectController::class);

Route::apiresource('pending/student', PendingStudentController::class)->only(['index', 'show', 'update']);

Route::apiresource('pending/teacher', PendingTeacherController::class)->only(['index', 'show', 'update']);

Route::apiresource('pending/admin', PendingAdminController::class)->only(['index', 'show', 'update']);

