@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Users</h3>
        </div>

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Users</h6>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><i class='bx bx-plus'></i> Add User</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody id="table-boy">
                            @foreach ($user as $us)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->username }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>
                                        <select class="form-select" onchange="roleSelect({{ $us->id }}, value)" aria-label="Default select example">
                                            <option value="user" @selected($us->role == 'user')>User</option>
                                            <option value="teacher" @selected($us->role == 'teacher')>Teacher</option>
                                            <option value="admin" @selected($us->role == 'admin')>Admin</option>
                                          </select>
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
@section('modal')
<form action="{{ url('admin/users') }}" id="form-add" method="POST">
    @csrf
        <div class="form-group mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control @error('name')
                is-invalid
            @enderror">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" name="username" class="form-control @error('username')
                is-invalid
            @enderror">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email')
                is-invalid
            @enderror">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password')
            is-invalid
        @enderror">
        @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label ">Role</label>
            <select name="role" id="" class="form-select @error('role')
            is-invalid
        @enderror">
                <option value="user">User</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Admin</option>
            </select>
            @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </form>
@endsection
@section('js')
    <script>
        function roleSelect(id, status) {
            // console.log(status);
//             $('#table-boy').empty();
//             $('#table-boy').append(` <div class="d-flex justify-content-center">
//   <div class="spinner-border" role="status">
//     <span class="visually-hidden">Loading...</span>
//   </div>
// </div>`);
            let role;
            if (status == 'admin') {
                role = 'admin';
            }  else if(status == 'teacher') {
                role = 'teacher';
            }  else if(status == 'user') {
                role = 'user';
            } 
            $.ajax({
                type: "get",
                url: "/admin/role",
                data: {
                    id: id,
                    role: role,
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    location.reload()

                   
                }
            });
        }
    </script>
@endsection
