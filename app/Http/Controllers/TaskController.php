<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Classroom;
use App\Models\SubjectMaterial;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Untuk Role Teacher
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $task = Task::where('teacher_id', $teacher->id)->get();
        $classroom = Classroom::all();
        $materi = SubjectMaterial::all();
        // dd($materi);
        return view('teacher.task.index', compact('task', 'classroom', 'materi'));
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
        $request->validate([
            'kelas' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'target' => 'required',
        ]);

        $req = [
            'classroom_id' => $request->kelas,
            'name' => $request->nama,
            'description' => $request->deskripsi,
            'deadline' => $request->target,
        ];
        Task::create($req);
        return redirect('teacher/task');
    }

    /**
     * Display the specified resource.
     */
    public function show( $task)
    {
        // dd($task);
        $id = Crypt::decrypt($task);
        $task = Task::find($id);
        $classroom = Classroom::all();
        return view('teacher.task.show', compact('task', 'classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($task)
    {
        $id = Crypt::decrypt($task);
        $task = Task::find($id);
        $classroom = Classroom::all();
        return view('teacher.task.edit', compact('task','classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $task)
    {
        $id = Crypt::decrypt($task);
        $task = Task::find($id);
        
        $req  = [
            'classroom_id' => $request->kelas,
            'name' => $request->nama,
            'description' => $request->deskripsi,
            'deadline' => $request->target,
        ];

        $task->update($req);
        return redirect('teacher/task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $task)
    {
        $id = Crypt::decrypt($task);
        $task = Task::find($id);

        $task->delete();

        return redirect('teacher/task');
    }
}
