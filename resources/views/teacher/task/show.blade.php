@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items center mb-3">
            <h3>Task Student</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Pilih Kelas</label>
                    <select class="form-select select2-form" aria-label="Default select example" disabled>
                        @foreach ($classroom as $cs)
                            <option value="{{ $cs->id }}" @selected($task->classroom_id == $cs->id)>{{ $cs->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Nama Tugas</label>
                    <input type="text" class="form-control" value="{{ $task->name }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Deskripsi Tugas</label>
                    <textarea name="" id="" class="form-control" cols="15" rows="5" disabled>{{ $task->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" value="{{ $task->deadline }}" disabled>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
@endsection
