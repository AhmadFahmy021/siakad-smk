@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            Classroom
        </div>

        <div class="card radius-10">
            <div class="card-body">
                <form action="{{ url('admin/classroom', Crypt::encrypt($data->id)) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama" value="{{ $data->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Wali Kelas</label>
                        <input type="text" class="form-control" name="wali_kelas" value="{{ $data->guardian_teacher }}">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection