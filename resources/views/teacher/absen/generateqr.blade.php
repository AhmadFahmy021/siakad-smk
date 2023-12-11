@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
             <h3>Scan Qr Code Absen</h3>
        </div>

        <div class="card">
            <div class="card-body text-center mt-2">
                <div class=" d-flex justify-content-center">
                    {!! QrCode::size(500)->generate($data->code) !!}
                </div>
                <a href="{{ url('teacher/absen') }}" class="btn btn-danger mt-3 mb-2">Stop Using Qr Code</a>
            </div>
        </div>
    </div>
@endsection