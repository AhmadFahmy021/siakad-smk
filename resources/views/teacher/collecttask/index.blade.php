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
                        <select class="form-select" onchange="tugasK(value)" aria-label="Default select example">
                            <option selected>Pilih Kelas</option>
                            @foreach ($kelas as $ks)
                                <option value="{{ $ks->classroom_id }}">{{ $ks->classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 ">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Nama Tugas</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="response">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        function tugasK(val) {
            $.ajax({
                type: "get",
                url: `${location.origin}/teacher/kelas`,
                data: {
                    kode: val
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('.response').empty();
                    data.map((e, i) => {
                        $('.response').append(`
                         <tr>
                            <td class="text-center">${i + 1}</td>
                            <td class="text-center">${e.student.user.name}</td>
                            <td class="text-center">${e.task.name}</td>
                            <td class="text-center">
                                <a href='${location.origin}/teacher/collecttask/${btoa(e.id)}' class="btn btn-success" target="_blank"><i class='bx bxs-chevrons-right' ></i></a>
                            </td>
                        </tr>
                                    `);
                    })
                }
            });
        }
    </script>
@endsection
