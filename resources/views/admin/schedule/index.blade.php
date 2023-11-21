@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Schedule</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Schedule</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2"><i class='bx bx-plus'></i> Add Schedule</a>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Schedule</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ url('admin/schedule') }}" method="POST">
                                <div class="modal-body">
                                            @csrf

                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Pilih Mapel</label>
                                            <select class="form-select" name="mapel" aria-label="Default select example">
                                                @foreach ($subject as $sub)
                                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Pilih Guru</label>
                                            <select class="form-select" name="teacher" aria-label="Default select example">
                                                @foreach ($teacher as $guru)
                                                    <option value="{{ $guru->id }}">{{ $guru->user->name }} | {{$guru->subject->name  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Pilih Kelas</label>
                                            <select class="form-select" name="kelas" aria-label="Default select example">
                                                @foreach ($classroom as $kelas)
                                                    <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Waktu Mulai</label>
                                            <input type="time" step="1" name="start" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Waktu Selesai</label>
                                            <input type="time" step="1" name="end" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Ruangan</label>
                                            <input type="text" name="room" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Mapel</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Ruangan</th>
                                <th>Guru</th>
                                <th>Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedule as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->subject->name }}</td>
                                    <td>{{ $s->time_start }}</td>
                                    <td>{{ $s->time_end }}</td>
                                    <td>{{ $s->room }}</td>
                                    <td>{{ $s->teacher->user->name }}</td>
                                    <td>{{ $s->classroom->name }}</td>
                                    <td>
                                        <form action="{{ url('admin/schedule', Crypt::encrypt($s->id)) }}" method="post" id="logout-form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('/admin/schedule/' . Crypt::encrypt($s->id) . '/edit') }}"
                                                class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>
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
