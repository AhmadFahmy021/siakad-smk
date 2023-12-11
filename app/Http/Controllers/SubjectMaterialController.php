<?php

namespace App\Http\Controllers;

use App\Models\SubjectMaterial;
use App\Http\Requests\StoreSubjectMaterialRequest;
use App\Http\Requests\UpdateSubjectMaterialRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SubjectMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $material =  SubjectMaterial::all() ;
        $subject = Subject::all();
        return view('admin.materials.index', compact(['material', 'subject']));
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
            'materi' => 'required',
            'mapel' => 'required',
            'deskripsi' => 'required',
            'target' => 'required',
        ]);

        $req = [
            'name' => $request->materi,
            'subject_id' => $request->mapel,
            'description' => $request->deskripsi,
            'deadline' => $request->target,
        ];
        SubjectMaterial::create($req);
        return redirect('admin/subjectmaterials');
    }

    /**
     * Display the specified resource.
     */
    public function show( $subjectMaterial)
    {
        $id = Crypt::decrypt($subjectMaterial);
        $data = SubjectMaterial::find($id);
        $subject = Subject::all();
        return view('admin.materials.show', compact(['data', 'subject']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $subjectMaterial)
    {
        $id = Crypt::decrypt($subjectMaterial);
        $data = SubjectMaterial::find($id);
        $subject = Subject::all();
        return view('admin.materials.edit', compact(['data', 'subject']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subjectMaterial)
    {
        $id = Crypt::decrypt($subjectMaterial);
        $data = SubjectMaterial::find($id);

        $req = [
            'name' => $request->materi,
            'subject_id' => $request->mapel,
            'description' => $request->deskripsi,
            'deadline' => $request->target,
        ];
        $data->update($req);
        return redirect('admin/subjectmaterials');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $subjectMaterial)
    {
        $id = Crypt::decrypt($subjectMaterial);
        $data = SubjectMaterial::find($id);
        $data->delete();
        return redirect('admin/subjectmaterials');
    }
}
