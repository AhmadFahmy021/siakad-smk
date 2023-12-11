@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Grade</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('teacher/grade', base64_encode($subject->id)) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Murid</label>
                        <input class="form-control" type="text" disabled value="{{ $subject->student->user->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Materi Pelajaran</label>
                        <input class="form-control" type="text" disabled value="{{ $subject->subjectmaterial->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nilai Skill</label>
                        <input class="form-control" type="text" name="skill" value="{{ $subject->nilai_skill }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nilai Test</label>
                        <input class="form-control" type="text" name="test" value="{{ $subject->nilai_test }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nilai Attitude</label>
                        <input class="form-control" type="text" name="attitude" value="{{ $subject->nilai_attitude }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection