@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Mata Pelajaran</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('admin/subject', Crypt::encrypt($data->id)) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Mapel</label>
                        <input type="text" name="mapel" oninput="this.value = this.value.toUpperCase()" class="form-control" value="{{ $data->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection