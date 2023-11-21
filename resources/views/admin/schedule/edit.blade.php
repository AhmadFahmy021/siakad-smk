@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Schedule</h3>
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <form action="{{ url('admin/schedule', Crypt::encrypt($data->id)) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="formEditMapel" class="form-label">Pilih Mapel</label>
                        <select class="form-select" id="formEditMapel" name="mapel" aria-label="Default select example">
                            @foreach ($subject as $sub)
                                <option value="{{ $sub->id }}" @selected($sub->id == $data->subject_id)>{{ $sub->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="formEditTimeStart" class="form-label">Waktu Mulai</label>
                        <input type="time" id="formEditTimeStart" name="start" step="1" class="form-control" value="{{ $data->time_start }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="formEditTimeEnd" class="form-label">Waktu Selesai</label>
                        <input type="time" id="formEditTimeEnd" name="end" step="1" class="form-control" value="{{ $data->time_end }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="FormEditRoom" class="form-label">Ruangan</label>
                        <input type="text" id="formEditRoom" name="room" class="form-control" value="{{ $data->room }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="formEditTeacher" class="form-label">Pilih Guru</label>
                        <select class="form-select" id="formEditTeacher" name="teacher" aria-label="Default select example">
                            @foreach ($teacher as $t)
                                <option value="{{ $t->id }}" @selected($t->id == $data->teacher_id)>{{ $t->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
