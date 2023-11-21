@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Absensi</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Absensi</h5>
                    </div>
                    <div class="ms-auto">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Kelas</th>
                                <th>Ruangan</th>
                                <th>Kode Qr Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>XII-RPLA</td>
                                <td>A-3.1</td>
                                <td>3e</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Generate Qr Code</a>
                                    <a href="" class="btn btn-success btn-sm">Show Qr Code</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
