<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::all();
        return view('admin.subject.index', compact('subject'));
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
            'mapel' => 'required|unique:subjects,name',
        ]);
        $req  = [
            'name' => $request->mapel
        ]; 
        Subject::create($req);
        return redirect('admin/subject');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $subject)
    {
        $id = Crypt::decrypt($subject);
        $data = Subject::find($id);

        return view('admin.subject.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subject)
    { 
        $id = Crypt::decrypt($subject);
        $data = Subject::find($id);

        $req = [
            'name' => $request->mapel,
        ];
        $data->update($req);
        return redirect('admin/subject');
        // dd($request->mapel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $subject)
    {
        $id = Crypt::decrypt($subject);
        $data = Subject::find($id);
        $data->delete();
        return redirect('admin/subject');
    }
}
