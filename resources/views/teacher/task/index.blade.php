@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Task Student</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Task Student</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Add Task</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Tugas</th>
                                <th>Kelas</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $tk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tk->name }}</td>
                                    <td>{{ $tk->classroom->name }}</td>
                                    <td>{{  date('d-m-Y', strtotime($tk->deadline))  }}</td>
                                    <td>
                                        <form action="{{ url('teacher/task', Crypt::encrypt($tk->id)) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('teacher/task', Crypt::encrypt($tk->id)) }}" class="btn btn-success btn-sm"><i class='bx bx-show-alt'></i></a>
                                            <a href="{{ url('teacher/task/'. Crypt::encrypt($tk->id) .'/edit') }}" class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>
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
    <form action="{{ url('teacher/task') }}" id="form-add" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih Kelas</label>
            <select name="kelas" class="form-select select2-form" aria-label="Default select example">
                @foreach ($classroom as $cs)
                    <option value="{{ $cs->id }}">{{ $cs->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih Materi Mata Pelajaran</label>
            <select name="kelas" class="form-select select2-form" aria-label="Default select example">
                @foreach ($materi as $mt)
                    <option value="{{ $mt->id }}">{{ $mt->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Nama Tugas</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Deskripsi Tugas</label>
            <textarea name="deskripsi" id="" class="form-control" cols="15" rows="5"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Tanggal Selesai</label>
            <input type="date" name="target" class="form-control">
        </div>
    </form>
@endsection
