@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Generate Qr Code</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('teacher/absen', Crypt::encrypt($data->id)) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Masukkan Kode Absen</label>
                        <input type="text" name="kode" class="form-control @error('kode')
                            is-invalid
                        @enderror" >
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection