@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Grade</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Grade</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2"><i class='bx bx-plus'></i> Add Grade</a>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="">
                                    <div class="modal-body">

                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Pilih Nama Murid</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Pilih Materi Pelajaran</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Nilai Skill</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Nilai Test</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Nilai Attitude</label>
                                            <input type="text" class="form-control">
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
                    <table class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Murid</th>
                                <th>Materi Pelajaran</th>
                                <th>Skill</th>
                                <th>Test</th>
                                <th>Attitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Ahmad Fahmy Ghifariel Akbar</td>
                                <td>Oop</td>
                                <td>80.00</td>
                                <td>50.00</td>
                                <td>90.00</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
