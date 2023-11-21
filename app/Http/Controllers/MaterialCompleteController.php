<?php

namespace App\Http\Controllers;

use App\Models\MaterialComplete;
use App\Http\Requests\StoreMaterialCompleteRequest;
use App\Http\Requests\UpdateMaterialCompleteRequest;

class MaterialCompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teacher.completemateri.index');
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
    public function show(MaterialComplete $materialComplete)
    {
        //
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
    public function update(UpdateMaterialCompleteRequest $request, MaterialComplete $materialComplete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialComplete $materialComplete)
    {
        //
    }
}
