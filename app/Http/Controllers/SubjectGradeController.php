<?php

namespace App\Http\Controllers;

use App\Models\SubjectGrade;
use App\Http\Requests\StoreSubjectGradeRequest;
use App\Http\Requests\UpdateSubjectGradeRequest;

class SubjectGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Akses role user
        // return view('user.grade.index');
        // Akses role teacher
        return view('teacher.grade.index');
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
    public function store(StoreSubjectGradeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectGrade $subjectGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectGrade $subjectGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectGradeRequest $request, SubjectGrade $subjectGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectGrade $subjectGrade)
    {
        //
    }
}
