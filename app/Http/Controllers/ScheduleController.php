<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For role user
        // $schedule = Schedule::all();
        // return view('user.schedule.index', compact('schedule'));
        // For role admin
        $schedule = Schedule::all();
        $subject = Subject::all();
        $classroom = Classroom::all();
        $teacher = Teacher::all();
        return view('admin.schedule.index', compact('schedule', 'subject', 'classroom', 'teacher'));
        // For role teacher
        // $schedule = Schedule::all();
        // return view('teacher.schedule.index', compact('schedule'));
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
        $request->validate([
            'mapel' => 'required',
            'kelas' => 'required',
            'teacher' => 'required',
            'start' => 'required',
            'end' => 'required',
            'room' => 'required',
            'teacher' => 'required',
        ]);

        $req = [
            'subject_id' => $request->mapel,
            'teacher_id' => $request->teacher,
            'classroom_id'=> $request->kelas,
            'time_start'=> $request->start,
            'time_end' => $request->end, 
            'room' => $request->room,
        ];
        Schedule::create($req);
        return redirect('admin/schedule');
        // dd($req);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $schedule)
    {
        $id = Crypt::decrypt($schedule);
        $data = Schedule::find($id);
        $subject = Subject::all();
        $teacher = Teacher::all();
        // dd($data);
        return view('admin.schedule.edit', compact(['data', 'subject','teacher']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $schedule)
    {
        $id = Crypt::decrypt($schedule);
        $data = Schedule::find($id);
        
        $req = [
            'subject_id' => $request->mapel,
            'time_start' => $request->start,
            'time_end' => $request->end,
            'room' => $request->room,
            'teacher_id' => $request->teacher
        ];
        
        $data->update($req);
        return redirect('admin/schedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($schedule)
    {
        $id = Crypt::decrypt($schedule);
        dd($id);
        $data = Schedule::find($id);
        $data->delete();
        return redirect('admin/schedule');
    }
}
