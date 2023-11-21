@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Collect Task</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Collect Task</h6>
                    </div>
                    <div class="ms-auto">
                        <select class="form-select" aria-label="Default select example">
                            <option >Open this select menu</option>
                            <option value="1" selected>One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Siswa</th>
                                <th>Nama Tugas</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Ahmad Fahmy</td>
                                <td>Membuat Database</td>
                                <td>Membuat database dengan kategori berikut ini</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
