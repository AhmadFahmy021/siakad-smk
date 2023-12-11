@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Collect Task</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" value="{{ $collect->student->user->name }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Materi Mata Pelajaran</label>
                    <input type="text" class="form-control" value="{{ $collect->task->subjectmaterial->name }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Nama Tugas</label>
                    <input type="text" class="form-control" value="{{ $collect->task->name }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">DeskripsiTugas</label>
                    <textarea name="" id="" class="form-control" cols="15" rows="5" disabled>{{ $collect->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    @if ($collect->link == null)
                        <label for="" class="form-label">File Tugas</label>
                        <input type="text" value="{{ $collect->nama_file }}" class="form-control">
                    @elseif ($collect->nama_file == null)
                        <label for="" class="form-label">Link Tugas</label>
                        <div class="form-control">
                            <a href="{{ $collect->link }}">{{ $collect->link }}</a>
                        </div>
                    @else
                        <label for="" class="form-label">Siswa Tidak Mengirim Kan Apapun </label>
                        
                    @endif
                </div>
                <form action="{{ url('teacher/collecttask', Crypt::encrypt($collect->id)) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nilai</label>
                        <input type="text" class="form-control" name="nilai" value="{{ $collect->nilai }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
            {{-- <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a> --}}
        </div>
    </div>
    </div>
@endsection
