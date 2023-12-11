<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'user':
                // role user
                $teacher = Teacher::all();
                return view('user.teacher.index', compact('teacher'));
                break;
            case 'admin':
                // for role admin
                $teacher = Teacher::all();
                $user = User::where('role', '=', 'teacher')->get();
                $subject = Subject::all();
                return view('admin.teacher.index', compact(['teacher', 'user', 'subject']));
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
        $request->validate([
            'user' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
        ]);

        $req = [
            'user_id' => $request->user,
            'nip' => $request->nip,
            'subject_id' => $request->mapel,
        ];

        Teacher::create($req);
        return redirect('admin/teacherlist');
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $teacher)
    {
        $id = Crypt::decrypt($teacher);
        $data = Teacher::find($id);
        $user = User::all();
        $subject = Subject::all();

        return view('admin.teacher.edit', compact(['data', 'user', 'subject']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $teacher)
    {
        $id = Crypt::decrypt($teacher);
        $data = Teacher::find($id);

        $req = [
            'user_id' => $request->user,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
        ];
        $data->update($req);
        return redirect('admin/teacherlist');
        // dd($req);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $teacher)
    {
        // dd($teacher);
        $id = Crypt::decrypt($teacher);
        $data = Teacher::find($id);
        $data->delete();
        return redirect('admin/teacherlist'); 
    }
}
