@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Subject Material</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Subject Material</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Add Subject Materials</a>

                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped  text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Materi</th>
                                <th>Mata Pelajaran</th>
                                <th>Description</th>
                                <th>Target Selesai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($material as $mt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mt->name }}</td>
                                    <td>{{ $mt->subject->name }}</td>
                                    <td>{{ Str::limit($mt->description, 25, '...') }}</td>
                                    <td>{{ date('d/m/Y', strtotime($mt->deadline)) }}</td>
                                    <td>
                                        <form action="{{ url('admin/subjectmaterials', Crypt::encrypt($mt->id)) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/subjectmaterials', Crypt::encrypt($mt->id)) }}"
                                                class="btn btn-success btn-sm">Show</a>
                                            <a href="{{ url('admin/subjectmaterials/' . Crypt::encrypt($mt->id) . '/edit') }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <button type="" class="btn btn-danger btn-sm">Delete</button>
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
    <form action="{{ url('admin/subjectmaterials') }}" id="form-add" method="POST">
        @csrf
        <div class="formgroup mb-3">
            <label for="" class="form-label">Nama Materi</label>
            <input type="text" name="materi"
                class="form-control @error('materi')
                is-invalid
            @enderror">
            @error('materi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="formgroup mb-3">
            <label for="" class="form-label">Pilih Mata Pelajaran</label>
            <select name="mapel" id=""
                class="form-select select2-form @error('mapel')
                is-invalid
            @enderror">
                @foreach ($subject as $su)
                    <option value="{{ $su->id }}">{{ $su->name }}</option>
                @endforeach
            </select>
            @error('mapel')
                <div class="invaid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="formgroup mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="deskripsi" class="form-control @error('deskripisi')
                is-invalid
            @enderror"
                id="" rows="5"></textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Target Selesai</label>
            <input type="date" name="target" id=""
                class="form-control @error('target')
                is-invalid                
            @enderror">
            @error('target')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </form>
@endsection
