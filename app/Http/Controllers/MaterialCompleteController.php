<?php

namespace App\Http\Controllers;

use App\Models\MaterialComplete;
use App\Http\Requests\StoreMaterialCompleteRequest;
use App\Http\Requests\UpdateMaterialCompleteRequest;
use App\Models\SubjectMaterial;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MaterialCompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $com = array();
        $teacher = Teacher::where('user_id', '=', Auth::user()->id)->first();
        $com = array_column(MaterialComplete::where('teacher_id', '=', $teacher->id)->get('subjectmaterial_id')->toArray(), 'subjectmaterial_id');
        $subjectMaterial = SubjectMaterial::whereNotIn('id',$com)->get();        
        // dd($subjectMaterial);
        return view('teacher.completemateri.index', compact('subjectMaterial'));
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
    public function store(StoreMaterialCompleteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $materialComplete)
    {
        $id = Crypt::decrypt($materialComplete);
        $data = SubjectMaterial::find($id);

        return view('teacher.completemateri.show', compact('data'));
        // dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialComplete $materialComplete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(  $materialComplete)
    {
        $id = Crypt::decrypt($materialComplete);
        $teacher = Teacher::where('user_id', '=', 11)->get();
        MaterialComplete::create([
            'subjectmaterial_id' => $id,
            'teacher_id' => $teacher[0]->id,
            'status' => 'selesai',
        ]);
        return redirect('teacher/completemateri');
        // dd($materialComplete);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialComplete $materialComplete)
    {
        //
    }
}
