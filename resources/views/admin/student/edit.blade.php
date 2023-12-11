@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Student List</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('admin/studentlist', Crypt::encrypt($data->id)) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Pilih User</label>
                        <select name="user" id="" class="form-select select2-form-edit">
                            @foreach ($user as $us)
                                <option value="{{ $us->id }}" @selected($data->user_id == $us->id)>{{ $us->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control" value="{{ $data->nis }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Pilih Kelas</label>
                        <select name="kelas" id="" class="form-select select2-form-edit">
                            @foreach ($classroom as $kelas)
                                <option value="{{ $kelas->id }}" @selected($data->classroom_id == $kelas->id)>{{ $kelas->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection