<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Http\Requests\StoreAbsenRequest;
use App\Http\Requests\UpdateAbsenRequest;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'user':
                // Akses Route user
                $student = Student::where('user_id', Auth::user()->id)->first();
                $schedule = array_column(Schedule::where('classroom_id', $student->classroom_id)->get()->toArray(), 'id');
                $absen = Absen::whereIn('schedule_id', $schedule)->get();
                // dd($absen);
                return view('user.absen.index', compact('absen'));
                break;
            case 'teacher':
                // Akses Route teacher
               $schedule =  Schedule::all();
                return view('teacher.absen.index', compact('schedule'));
                break;
            
            default:
                return abort(500);
                break;
        }
    }

    public function scanner() {
        $data = Schedule::all();
        return view('user.absen.scan', compact('data'));
    }

    public function scannerCheck(Request $request){
        $data = Schedule::where('code','=', $request->code)->get();
       
        Absen::create([
            'schedule_id' => $data[0]->id,
            'class_time' => '3'
        ]);
        return response()->json(['success' => true]);
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
    public function store(StoreAbsenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $absen)
    {
        $id = Crypt::decrypt($absen);
        $data = Schedule::find($id);

        return view('teacher.absen.generateqr', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($absen)
    {
        $id = Crypt::decrypt($absen);
        $data = Schedule::find($id);

        return view('teacher.absen.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $absen)
    {
        // dd($absen);
        $id = Crypt::decrypt($absen);
        $data = Schedule::find($id);
        // $request->validate([
        //     'kode' => 'required',
        // ]);
        if ($request->kode != null) {
            $code = $request->kode;
        } else {
            $code = Str::upper(Str::random(5));
        }
        // dd($code);
        $req = [
            'code' => $code,
        ];
        $data->update($req);
        return redirect()->route('absen.show', $absen);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absen $absen)
    {
        //
    }

    
}
