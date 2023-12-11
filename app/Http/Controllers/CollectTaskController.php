<?php

namespace App\Http\Controllers;

use App\Models\CollectTask;
use App\Http\Requests\StoreCollectTaskRequest;
use App\Http\Requests\UpdateCollectTaskRequest;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectGrade;
use App\Models\Task;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CollectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'user':
                $student = Student::where('user_id', Auth::user()->id)->first();
                $collect = Task::where('classroom_id', $student->classroom_id)->get();
                // dd($collect);
                return view('user.collecttask.index', compact('collect'));
                break;
            case 'teacher':
                //Digunakan untuk role teacher
                $teacher = Teacher::where('user_id', '=', Auth::user()->id)->first();
                $kelas = Schedule::where('teacher_id', '=', $teacher->id)->get();
                // dd($schedule);
                $collecttask = CollectTask::all();
                $subject = Subject::all();
                return view('teacher.collecttask.index', compact('collecttask', 'subject', 'kelas'));
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $task = base64_decode($request->kode);
        $student = Student::where('user_id', Auth::user()->id)->first();
        $request->validate([
            'file' => 'mimes:pdf,docx'
        ]);
        $req = [
            'task_id' => $task,
            'student_id' => $student->id,
            'information' => $request->deskripsi,
            'link' => $request->link,
            'nama_file' => $request->file('file')->store('tugas'),
        ];
        // dd($req['nama_file']);
        CollectTask::create($req);
        return redirect('user/collecttask');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($collectTask)
    {
        $id = base64_decode($collectTask);
        switch (Auth::user()->role) {
            case 'user':
                $data = Task::find($id); 
                return view('user.collecttask.show', compact('data'));
                break;
            case 'teacher':
                $collect = CollectTask::find($id);

                return view('teacher.collecttask.show', compact('collect'));

                break;

            default:
                # code...
                break;
        }
        // dd($collectTask);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollectTask $collectTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $collectTask)
    {
        $id = Crypt::decrypt($collectTask);
        $data = CollectTask::find($id);

        $req = [
            'nilai' => $request->nilai,
        ];

        $data->update($req);
        return redirect('teacher/collecttask');
        // dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollectTask $collectTask)
    {
        //
    }

    public function kelas(Request $request)
    {
        $task = array_column(Task::where('classroom_id', $request->kode)->get()->toArray(), 'id');
        $collect = CollectTask::with(['student.user', 'task'])->whereIn('task_id', $task)->get();

        // dd($collect);
        return json_encode($collect);
    }
}
