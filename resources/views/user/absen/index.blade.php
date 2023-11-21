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
                        <h6 class="mb-0">Absensi</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary">Scan QR Code</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Ruangan</th>
                                <th>Total Waktu Ikut Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>IPAS</td>
                                <td>Soebariadi, S.Si</td>       
                                <td>08:00:00</td>
                                <td>11:00:00</td>
                                <td> A-31</td>                         
                                <td>3 Jam</td>                         
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
