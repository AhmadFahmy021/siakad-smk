@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Teacher</h3>
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <form action="{{ url('admin/teacherlist', Crypt::encrypt($data->id)) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Pilih User</label>
                        <select class="form-select select2-form"  name="user" aria-label="Default select example">
                            @foreach ($user as $us)
                                <option value="{{ $us->id }}" @selected($data->user_id == $us->id)>{{ $us->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $data->nip }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Pilih Mata Pelajaran</label>
                        <select class="form-select select2-form" name="mapel" aria-label="Default select example">
                            @foreach ($subject as $mapel)
                                
                            <option value="{{ $mapel->id }}" @selected($data->subject_id == $mapel->id)>{{ $mapel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
