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
                            @foreach ($subjectMaterial as $sm)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sm->name }}</td>
                                    <td>{{ $sm->subject->name }}</td>
                                    <td>{{ Str::limit($sm->description, 25, '...') }}</td>
                                    <td>{{ date('d/m/Y', strtotime($sm->deadline)) }}</td>
                                    <td class="text-center">
                                        <form action="{{ url('teacher/completemateri', Crypt::encrypt($sm->id)) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <a href="{{ url('teacher/completemateri', Crypt::encrypt($sm->id)) }}"
                                                class="btn btn-success btn-sm">Show</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Selesai</button>
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
