@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Classroom</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Classroom</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Add Classroom</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classroom as $kelas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kelas->name }}</td>
                                    <td>{{ $kelas->guardian_teacher }}</td>
                                    <td>
                                        <form action="{{ url('admin/classroom', Crypt::encrypt($kelas->id)) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/classroom/' . Crypt::encrypt($kelas->id) . '/edit') }}"
                                                class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class='bx bx-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('modal')
    <form action="{{ url('admin/classroom') }}" id="form-add" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="" class="form-label">Nama Kelas</label>
            <input type="text" name="nama" class="form-control @error('nama')
                is-invalid
            @enderror">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Wali Kelas</label>
            <input type="text" name="wali_kelas" class="form-control @error('wali_kelas')
                is-invalid
            @enderror">
            @error('wali_kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </form>
@endsection
