@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Subject Grade</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Subject Grade</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                                class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No.</th>
                                <th>Mata Pelajaran</th>
                                <th>Materi</th>
                                <th>Keterampilan</th>
                                <th>Pengetahuan</th>
                                <th>Sopan & Santun</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($nilai as $ni)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ni->subject->name }}</td>
                                    <td>{{ $ni->subjectmaterial->name }}</td>
                                    <td>{{ $ni->nilai_skill }}</td>
                                    <td>{{ $ni->nilai_test }}</td>
                                    <td>{{ $ni->nilai_attitude }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
