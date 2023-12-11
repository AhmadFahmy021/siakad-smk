<?php

namespace App\Http\Controllers;

use App\Models\SubjectGrade;
use App\Http\Requests\StoreSubjectGradeRequest;
use App\Http\Requests\UpdateSubjectGradeRequest;
use App\Models\Classroom;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectMaterial;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SubjectGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'user':
                // Akses role 
                $student = Student::where('user_id', Auth::user()->id)->first();
                $nilai = SubjectGrade::where('student_id', $student->id)->get();
                // dd($nilai);
                return view('user.grade.index', compact('nilai'));
                break;
            case 'teacher':
                // Akses role teacher
                $teacher = Teacher::where('user_id','=', Auth::user()->id)->get();
                $nilai = SubjectGrade::all();
                $mapel = SubjectMaterial::where('subject_id', '=', $teacher[0]->subject_id)->get();
                // dd($teacher);
                // $kelas = Schedule::where('teacher_id', '=', $teacher[0]->id)->get();
                $schedule = Schedule::where('teacher_id', '=', $teacher[0]->id)->get();
                // dd($schedule);
                return view('teacher.grade.index', compact(['mapel', 'schedule', 'nilai']));
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
        // dd($request);
        $subject = SubjectMaterial::find($request->materi);
        $req = [
            'subject_id' => $subject->subject_id,
            'student_id' => $request->murid,
            'subjectmaterial_id' => $request->materi,
            'nilai_skill' => $request->skill,
            'nilai_test' => $request->test,
            'nilai_attitude' => $request->attitude,
        ];
        SubjectGrade::create($req);
        return redirect('teacher/grade');
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
    public function edit( $subjectGrade)
    {
        $id = base64_decode($subjectGrade);
        $subject = SubjectGrade::find($id);
        // dd($subject);
        return view('teacher.grade.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $subjectGrade)
    {
        $id = base64_decode($subjectGrade);
        $subject = SubjectGrade::find($id);

        $req = [
            'nilai_skill' => $request->skill,
            'nilai_test' => $request->test,
            'nilai_attitude' => $request->attitude,
        ];

        // dd($subject);
        $subject->update($req);
        return redirect('teacher/grade');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subjectGrade)
    {
        $id = base64_decode($subjectGrade);
        $sGrade = SubjectGrade::find($id);
        $sGrade->delete();
        return redirect('teacher/grade');
        // dd($sGrade);
    }

    public function murid(Request $request) {
        $id = Crypt::decrypt($request->kelas);
        $student = Student::with('User')->where('classroom_id', '=', $id)->get();
        
        return json_encode($student);
    }

    public function tampil(Request $request) {
        $id = Crypt::decrypt($request->kelas);
        // $schedule = Schedule::find($id);
        $nilai = SubjectGrade::with(['student.user','subject', 'subjectmaterial'])->where('classroom_id', '=', $id)->get();
        // dd($nilai);
        return json_encode($nilai);
    }
}
