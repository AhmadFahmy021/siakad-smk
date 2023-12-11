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
                        <select name="" onchange="tampilD(value)" class="form-select" id="">
                            <option value="" selected>Pilih Data Kelas</option>
                            @foreach ($schedule as $ks)
                                <option value="{{ Crypt::encrypt($ks->classroom_id) }}">{{ $ks->classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Add Grade</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <div class="text-center">
                        <h5 class="text-secondary">Data Not Found</h5>
                    </div> --}}
                    <table id="example" class="table align-middle mb-0 text-center">
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
                        <tbody id="table-response">
                            <tr>
                                <td colspan="7">
                                    <h4 class="text-secondary">Data Belum Tersedia</h4>
                                </td>
                            </tr>
                            {{-- @foreach ($nilai as $nl)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nl->student->user->name }}</td>
                                    <td>{{ $nl->subjectmaterial->name }}</td>
                                    <td>{{ $nl->nilai_skill }}</td>
                                    <td>{{ $nl->nilai_test }}</td>
                                    <td>{{ $nl->nilai_attitude }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('modal')
    <form action="{{ url('teacher/grade', []) }}" id="form-add" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih Kelas</label>
            <select class="form-select" onchange="muridGj(value)" aria-label="Default select example">
                <option value=""></option>
                @foreach ($schedule as $st)
                    <option value="{{ Crypt::encrypt($st->classroom_id) }}">
                        {{ $st->classroom->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih Murid</label>
            <select name="murid" id="select-murid" class="form-select ">
                <option value="">Data Murid Belum Ada</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Pilih Materi Pelajaran</label>
            <select class="form-select select2-form" name="materi" aria-label="Default select example">
                @foreach ($mapel as $ml)
                    <option value="{{ $ml->id }}">{{ $ml->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Nilai Skill</label>
            <input type="text" name="skill" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Nilai Test</label>
            <input type="text" name="test" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Nilai Attitude</label>
            <input type="text" name="attitude" class="form-control">
        </div>
    </form>
@endsection
@section('js')
    <script>
        function tampilD(val) {
            $.ajax({
                type: "get",
                url: location.origin + "/teacher/data/tampil",
                data: {
                    kelas: val
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $('#table-response').empty();
                    data.map((e, i) => {
                        // console.log(e);
                        $('#table-response').append(`
                        <tr>
                            <td>${i + 1}</td>
                            <td>${e.student.user.name}</td>
                            <td>${e.subjectmaterial.name}</td>
                            <td>${e.nilai_skill === null ? '0' : e.nilai_skill}</td>
                            <td>${e.nilai_test === null ? '0' : e.nilai_test}</td>
                            <td>${e.nilai_attitude === null ? '0' : e.nilai_attitude}</td>

                            <td>
                                <form action="${location.origin}/teacher/grade/${btoa(e.id)}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <a href="${location.origin}/teacher/grade/${btoa(e.id)}/edit" class="btn btn-primary btn-sm"><i class='bx bx-edit-alt'></i></a>    
                                <button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></button>
                                </form>    
                            </td>
                        </tr>
                        `);
                    });
                },

            });
            // console.log(location.origin);
            // console.log(val);
        }

        function muridGj(val) {

            $.ajax({
                type: "get",
                url: location.origin + "/teacher/murid",
                data: {
                    kelas: val
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    // return
                    if (data.length == 0) {
                        $('#select-murid').empty();
                        $('#select-murid').append("<option>Data Murid Belum Ada</option>");
                    } else {
                        $('#select-murid').empty();
                        data.map((e) => {
                            // console.log(e);
                            $('#select-murid').append(
                                ` <option value="${e.id}">${e.user.name}</option>`);
                        })
                        // location.reload()
                    }
                }
            });
        }
    </script>
@endsection
