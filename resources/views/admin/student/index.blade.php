@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Student</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Student</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Add Student</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Murid</th>
                                <th>Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $st)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $st->nis }}</td>
                                    <td>{{ $st->user->name }}</td>
                                    <td>{{ $st->classroom->name ?? null   }}</td>
                                    <td>
                                        <form action="{{ url('admin/studentlist', Crypt::encrypt($st->id)) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/studentlist/'.Crypt::encrypt($st->id).'/edit') }}" class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></button>
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
    <form action="{{ url('admin/studentlist') }}" id="form-add" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih User</label>
            <select class="form-select select2-form @error('user')
                is-invalid
            @enderror" name="user" aria-label="Default select example">
                @foreach ($user as $us)
                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                @endforeach
            </select>
            @error('user')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">NIS</label>
            <input type="text" class="form-control @error('nis')
                is-invalid
            @enderror" name="nis" placeholder="Tuliskan NIS Murid">
            @error('nis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih Kelas</label>
            <select class="form-select select2-form @error('kelas')
                is-invalid
            @enderror" name="kelas" aria-label="Default select example">
                @foreach ($classroom as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                @endforeach
            </select>
            @error('kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </form>
@endsection
