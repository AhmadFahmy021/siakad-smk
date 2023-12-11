<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Classroom;
use App\Models\CollectTask;
use App\Models\MaterialComplete;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectGrade;
use App\Models\SubjectMaterial;
use App\Models\Task;
use App\Models\Teacher;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'user') {
            // dd('coba');
            $student = Student::where('user_id', Auth::user()->id)->first();
            // dd($student);
            if ($student == null) {
                return abort(403, 'Data Siswa Anda Belum Di Input Silahkan Hubungi Admin');
                // return view('user.create');
            }
            return redirect('user/dashboard');
            // return view('home');
        } else if (Auth::user()->role == 'admin') {
            return redirect('admin/dashboard');
        } else if (Auth::user()->role == 'teacher') {
            $teacher = Teacher::where('user_id', Auth::user()->id)->first();
            if ($teacher == null) {
                return abort(403, 'Data Guru Anda Belum Di Input Silahkan Hubungi Admin');
            }
            return redirect('teacher/dashboard');
        }
    }

    public function show()
    {
        switch (Auth::user()->role) {
            case 'user':
                $student = Student::where('user_id', '=', Auth::user()->id)->first();
                $gradeTest = SubjectGrade::where('student_id', '=', $student->id)->where('nilai_test', '<', 75)->get()->count();
                $gradeSkill = SubjectGrade::where('student_id', '=', $student->id)->where('nilai_skill', '<', 75)->get()->count();
                $gradeAttitude = SubjectGrade::where('student_id', '=', $student->id)->where('nilai_attitude', '<', 75)->get()->count();
                $schedule = array_column(Schedule::where('classroom_id', '=', $student->classroom_id)->get()->toArray(), 'id');
                $absen = Absen::whereIn('schedule_id', $schedule)->get()->count();

                
                return view('user.index', compact('gradeTest', 'gradeSkill', 'gradeAttitude', 'absen'));
                break;
            case 'teacher':
                $teacher = Teacher::where('user_id', '=', Auth::user()->id)->first();
                $today = Carbon::now()->isoFormat('dddd');
                $hours = Carbon::now()->locale('id_ID')->format('H:i:s');
                $schedule = Schedule::where('teacher_id', '=', $teacher->id)->where('day', $today)->where('time_start', '>',$hours)->first();
                
                $kelas = array_column(Schedule::where('teacher_id', $teacher->id)->get()->toArray(), 'classroom_id');
                $task = array_column(Task::whereIn('classroom_id', $kelas)->get()->toArray(), 'id') ;
                $collect = CollectTask::whereIn('task_id', $task)->where('nilai', 0)->get()->count();
                $countKelas = Schedule::where('teacher_id', $teacher->id)->get()->count();
                
                $materiComplete = MaterialComplete::where('teacher_id', $teacher->id)->get()->count();
                $materi = SubjectMaterial::where('subject_id', $teacher->subject_id)->get()->count();
                $persen =  $materiComplete/$materi*100 ; 

                $target = array_column(Schedule::where('teacher_id', $teacher->id)->get()->toArray(), 'classroom_id');
                $grade = SubjectGrade::whereIn('classroom_id', $target)->where('nilai_test', '<', 75)->get()->count();
                // dd($grade);
                return view('teacher.index', compact('schedule', 'collect', 'countKelas', 'persen', 'grade'));
                # code...
                break;
            case 'admin':
                $countClass = Classroom::all()->count();
                $student = Student::all()->count();
                $teacher = Teacher::all()->count();
                $guru = array_column(Teacher::all()->toArray(), 'id');
                $countTarget = MaterialComplete::select('teacher_id', DB::raw('COUNT(*) as countt'))->whereIn('teacher_id', $guru)->where('status', '=', 'selesai')->groupBy('teacher_id')->get()->toArray();
                $counting = 0;
                foreach ($countTarget as $ct) {
                    if ($ct['countt'] < 2) {
                        $counting++;
                    }
                }
                // die();
                return view('admin.index', compact('countClass', 'student', 'teacher', 'counting'));
                break;

            default:
                # code...
                break;
        }
    }
}
