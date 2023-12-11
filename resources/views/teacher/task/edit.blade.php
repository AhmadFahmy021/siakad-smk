@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Task Student</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('teacher/task', Crypt::encrypt($task->id)) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Pilih Kelas</label>
                        <select class="form-select select2-form" aria-label="Default select example" name="kelas">
                            @foreach ($classroom as $cs)
                                <option value="{{ $cs->id }}" @selected($task->classroom_id == $cs->id)>{{ $cs->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Tugas</label>
                        <input type="text" class="form-control" value="{{ $task->name }}" name="nama">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deskripsi Tugas</label>
                        <textarea name="deskripsi" id="" class="form-control" cols="15" rows="5" >{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tanggal Selesai</label>
                        <input type="date" name="target" class="form-control" value="{{ $task->deadline }}" >
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection