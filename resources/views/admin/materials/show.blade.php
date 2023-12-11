@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Materi Mata Pelajaran</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Nama Materi</label>
                    <input type="text" name="materi" class="form-control" disabled value="{{ $data->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Pilih Mapel</label>
                    <select name="mapel" id="" class="form-select select2-form-edit" disabled>
                        @foreach ($subject as $su)
                            <option value="{{ $su->id }}" @selected($data->subject_id == $su->id)>{{ $su->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" disabled id="" cols="30" rows="5">{{ $data->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Target Selesai</label>
                    <input disabled type="date" name="target" class="form-control" value="{{ $data->deadline }}">
                </div>
                <div class="form-group mb-3">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
