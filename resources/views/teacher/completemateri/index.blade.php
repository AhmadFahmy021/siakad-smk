@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Complete Materi</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Complete Materi</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Materi</th>
                                <th>Mata Pelajaran</th>
                                <th class="text-center">Description</th>
                                <th>Target Selesai</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Matrix</td>
                                <td>Matematika</td>
                                <td>Perhitungan tentang angka-angka</td>
                                <td>12/12/2023</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success btn-sm">Show</a>
                                    <a href="" class="btn btn-primary btn-sm">Selesai</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
