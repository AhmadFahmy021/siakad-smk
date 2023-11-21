<?php

namespace App\Http\Controllers;

use App\Models\SubjectMaterial;
use App\Http\Requests\StoreSubjectMaterialRequest;
use App\Http\Requests\UpdateSubjectMaterialRequest;

class SubjectMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.materials.index');
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
    public function store(StoreSubjectMaterialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectMaterial $subjectMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectMaterial $subjectMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectMaterialRequest $request, SubjectMaterial $subjectMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectMaterial $subjectMaterial)
    {
        //
    }
}
