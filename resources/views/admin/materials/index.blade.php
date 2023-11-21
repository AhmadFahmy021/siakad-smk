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
                            @section('modal')
                                <div class="formgroup mb-3">
                                    <label for="" class="form-label">Nama Materi</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="formgroup mb-3">
                                    <label for="" class="form-label">Pilih Mata Pelajaran</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="formgroup mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="" class="form-control" id="" rows="5"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Target Selesai</label>
                                    <input type="date" name="" id="" class="form-control">
                                </div>
                            @endsection
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
                            <tr>
                                <td>1.</td>
                                <td>Matrix</td>
                                <td>Matematika</td>
                                <td>Perhitungan tentang angka-angka</td>
                                <td>12/12/2023</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">Show</a>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
