<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //for role admin
        $student = Student::all();
        $user = User::where('role', '=', 'user')->get();
        $classroom = Classroom::all();
        return view('admin.student.index', compact(['student','user','classroom']));
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
        switch (Auth::user()->role) {
            case 'admin':
                $request->validate([
                    'user' => 'required|unique:students,user_id',
                    'nis' => 'required|unique:students',
                    'kelas' => 'required',
                ]);
        
                $req = [
                    'user_id' => $request->user,
                    'nis' => $request->nis,
                    'classroom_id'=> $request->kelas,
                ];
                Student::create($req);
                return redirect('admin/studentlist');
                break;
            case 'user':
                $request->validate([
                    // 'user' => 'required|unique:students,user_id',
                    'nis' => 'required|unique:students',
                    'alamat' => 'required',
                    // 'ayah' => 'required|unique:students',
                    // 'ibu' => 'required|unique:students',
                    // 'wali' => 'required|unique:students',
                    // 'kelas' => 'required',
                ]);
        
                $req = [
                    'user_id' => Auth::user()->id,
                    'nis' => $request->nis,
                    'alamat' => $request->alamat,
                    'ayah' => $request->ayah,
                    'ibu' => $request->ibu,
                    'wali' => $request->wali,
                    // 'classroom_id'=> $request->kelas,
                ];
                Student::create($req);
                return redirect('user/dashboard');
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($student)
    {
        
        $id = Crypt::decrypt($student);
        $data = Student::find($id);
        $user = User::all() ;
        $classroom= Classroom::all() ;

        return view('admin.student.edit', compact(['data', 'user', 'classroom']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$student)
    {
        $id = Crypt::decrypt($student);
        $data = Student::find($id);
        
        $req = [
            'user_id' => $request->user,
            'nis' => $request->nis,
            'classroom_id' => $request->kelas,
        ];

        $data->update($req);
        return redirect('admin/studentlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $student)
    {
        $id = Crypt::decrypt($student);
        $data = Student::find($id);
        $data->delete();
        return redirect('admin/studentlist');
    }
}
