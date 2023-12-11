@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Pengumpulan Tugas</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Pengumpulan Tugas</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tugas</th>
                                <th>Deskripsi</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collect as $ct)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ct->name }}</td>
                                    <td>{{ Str::limit($ct->description, 25, '...') }}</td>
                                    <td >{{ date('d/m/Y', strtotime($ct->deadline)) }}</td>
                                    <td>
                                        <a href="{{ url('user/collecttask', base64_encode($ct->id)) }}" class="btn btn-success"><i class='bx bxs-chevrons-right'></i></a>
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