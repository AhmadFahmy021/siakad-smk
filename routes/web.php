<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CollectTaskController;
use App\Http\Controllers\MaterialCompleteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectGradeController;
use App\Http\Controllers\SubjectMaterialController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UjiController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::prefix('user')->group(function () {
    Route::get('dashboard', function () {
        return view('user.index');
    });
    Route::resource('schedule', ScheduleController::class);
    Route::resource('grade', SubjectGradeController::class);
    Route::resource('absen', AbsenController::class);
    Route::resource('teacher', TeacherController::class);
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.index');
    });
    Route::resource('studentlist', StudentController::class);
    Route::resource('teacherlist', TeacherController::class);
    Route::resource('classroom', ClassroomController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('subjectmaterials', SubjectMaterialController::class);
    Route::get('users', [UserController::class, 'index']);
});

Route::get('teacher/dashboard', function () {
    return view('teacher.index');
});
Route::resource('teacher/absen', AbsenController::class);
Route::resource('teacher/grade', SubjectGradeController::class);
Route::resource('teacher/schedule', ScheduleController::class);
Route::resource('teacher/task', TaskController::class);
Route::resource('teacher/collecttask', CollectTaskController::class);
Route::resource('teacher/completemateri', MaterialCompleteController::class);









// Route::get('siswa', [UjiController::class, 'index']);
// Route::get('siswa/create', [UjiController::class, 'create']);
// Route::post('siswa', [UjiController::class, 'store']);
// Route::get('siswa/{id}', [UjiController::class, 'edit']);
// Route::get('siswa/detail/{id}', [UjiController::class,'show']);
// Route::put('siswa/{id}', [UjiController::class, 'update']);
// Route::delete('siswa/{id}/delete', [UjiController::class, 'destroy']);
