<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CollectTaskController;
use App\Http\Controllers\HomeController;
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
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

// Route::get('/register', function () {
//     return view('auth.register');
// });
Route::middleware(['auth'])->group(function () {

    Route::prefix('user')->middleware('user')->group(function () {
        Route::get('dashboard', [HomeController::class, 'show']);
        Route::resource('schedule', ScheduleController::class);
        Route::resource('grade', SubjectGradeController::class);
        Route::resource('absen', AbsenController::class);
        Route::get('scan/qrcode', [AbsenController::class, 'scanner']);
        Route::get('checkScan', [AbsenController::class, 'scannerCheck']);
        Route::resource('teacher', TeacherController::class);
        Route::resource('collecttask', CollectTaskController::class);
        Route::resource('studentcreate', StudentController::class);
    });

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('dashboard', [HomeController::class, 'show']);
        Route::resource('studentlist', StudentController::class);
        Route::resource('teacherlist', TeacherController::class);
        Route::resource('classroom', ClassroomController::class);
        Route::resource('schedule', ScheduleController::class);
        Route::get('tampilguru', [ScheduleController::class, 'guruT']);
        Route::resource('subject', SubjectController::class);
        Route::resource('subjectmaterials', SubjectMaterialController::class);
        Route::get('users', [UserController::class, 'index']);
        Route::post('users', [UserController::class, 'store']);
        Route::get('role', [UserController::class, 'role']);
    });

    Route::prefix('teacher')->middleware('teacher')->group(function () {

        Route::get('dashboard', [HomeController::class, 'show']);
        Route::resource('absen', AbsenController::class);
        Route::get('absen/{absen}/generateqr', [AbsenController::class, 'update']);
        Route::resource('grade', SubjectGradeController::class);
        Route::get('murid', [SubjectGradeController::class, 'murid']);
        Route::get('data/tampil', [SubjectGradeController::class, 'tampil']);
        Route::resource('schedule', ScheduleController::class);
        Route::resource('task', TaskController::class);
        Route::resource('collecttask', CollectTaskController::class);
        Route::get('kelas', [CollectTaskController::class, 'kelas']);
        Route::resource('completemateri', MaterialCompleteController::class);
        // Route::get('status/completemateri/{materialComplete}/selesai', [MaterialCompleteController::class, 'update']);
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


