@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Pengumpulan Tugas</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('user/collecttask') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ base64_encode($data->id) }}" name="kode">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Tugas</label>
                        <input type="text" disabled value="{{ $data->name }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deskripsi Tugas</label>
                        <textarea name="" class="form-control" id="" cols="30" rows="5" disabled>{{ $data->description }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deadline</label>
                        <input type="text" disabled value="{{ date('d/m/Y', strtotime($data->deadline)) }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deskripsi Hasil Pengerjaan</label>
                        <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Upload File Tugas</label>
                        <input type="file" name="file"  class="form-control @error('file')
                            is-invalid
                        @enderror" id="inputGroupFile02">
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Link Tugas</label>
                        <input type="text" name="link" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection