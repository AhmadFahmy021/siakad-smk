<?php

namespace App\Http\Controllers;

use App\Models\CollectTask;
use App\Http\Requests\StoreCollectTaskRequest;
use App\Http\Requests\UpdateCollectTaskRequest;

class CollectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Digunakan untuk role teacher
        return view('teacher.collecttask.index');
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
    public function store(StoreCollectTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CollectTask $collectTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollectTask $collectTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectTaskRequest $request, CollectTask $collectTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollectTask $collectTask)
    {
        //
    }
}
