@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Users</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Users</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2"><i class='bx bx-plus'></i> Add User</a>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="">
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Username</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Role</label>
                                            <select name="role" id="" class="form-select">
                                                <option value="">User</option>
                                                <option value="">Teacher</option>
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
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Ahmad Fahmy</td>
                                <td>fahmyga_21</td>
                                <td>ahmadfahmy219@gmail.com</td>
                                <td>Admin</td>
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
