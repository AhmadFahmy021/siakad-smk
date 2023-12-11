<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroom = Classroom::all();
        return view('admin.classroom.index', compact('classroom'));
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
            'nama' => 'required',
            'wali_kelas' => 'required',
        ]);

        $req = [
            'name' => $request->nama,
            'guardian_teacher' => $request->wali_kelas, 
        ];
        Classroom::create($req);
        return redirect('admin/classroom');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $classroom)
    {
        $id = Crypt::decrypt($classroom);
        $data = Classroom::find($id);

        return view('admin.classroom.edit', compact(['data']));
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $classroom)
    {
        $id = Crypt::decrypt($classroom);
        $data = Classroom::find($id);

        $req = [
            'name' => $request->nama,
            'guardian_teacher' => $request->wali_kelas, 
        ];

        $data->update($req);
        return redirect('admin/classroom');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $classroom)
    {
        $id = Crypt::decrypt($classroom);
        $data = Classroom::find($id);
        $data->delete();

        return redirect('admin/classroom');
    }
}
