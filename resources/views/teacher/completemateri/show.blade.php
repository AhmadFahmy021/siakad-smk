@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Target Materi Pelajaran</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Nama Materi</label>
                    <input class="form-control" type="text" disabled value="{{ $data->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Mata Pelajaran</label>
                    <input class="form-control" type="text" disabled value="{{ $data->subject->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Target Selesai Materi</label>
                    <input class="form-control" type="text" disabled value="{{ date('d/m/Y', strtotime($data->deadline)) }}">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Deskripsi Materi</label>
                    <textarea name="" class="form-control disabled" id="" cols="30" rows="10">{{ $data->description }}</textarea>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
@endsection