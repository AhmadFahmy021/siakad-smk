@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Mata Perlajaran</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Mata Perlajaran</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Add Mata Pelajaran</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Mapel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject as $su)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $su->name }}</td>
                                    <td>
                                        <form action="{{ url('admin/subject', Crypt::encrypt($su->id)) }}" method="post"
                                            id="logout-form">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('/admin/subject/' . Crypt::encrypt($su->id) . '/edit') }}"
                                                class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i> Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i>
                                                Delete</button>
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
    <form action="{{ url('admin/subject') }}" id="form-add" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="" class="form-label">Nama Mapel</label>
            <input type="text" name="mapel" class="form-control">
        </div>
    </form>
@endsection
