@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Teacher</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Teacher</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Tambah Guru</a>
                    </div>
                    {{-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('teacherlist.store') }}">
                                    <div class="modal-body">

                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Pilih User</label>
                                            <select class="form-select " name="user" >
                                                @foreach ($user as $us)
                                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">NIP</label>
                                            <input type="text" name="nip" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Pilih Mata Pelajaran</label>
                                            <select class="form-select" name="mapel" aria-label="Default select example">
                                                @foreach ($subject as $mapel)
                                                    <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
                                                @endforeach
                                            </select>
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
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>No. Handphone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $guru)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $guru->nip }}</td>
                                    <td>{{ $guru->user->name }}</td>
                                    <td>{{ $guru->subject->name }}</td>
                                    <td>{{ $guru->hp }}</td>
                                    <td>
                                        <form action="{{ url('admin/teacherlist/'. Crypt::encrypt($guru->id)) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/teacherlist/'.Crypt::encrypt($guru->id).'/edit') }}"
                                                class="btn btn-primary btn-sm text-center"><i class='bx bx-edit-alt'></i></a>
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
    <form action="" id="form-add" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih User</label>
            <select class="form-select select2-form" id="select" name="user">
                @foreach ($user as $us)
                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih Mata Pelajaran</label>
            <select class="form-select select2-form" name="mapel">
                @foreach ($subject as $mapel)
                    <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
@endsection
