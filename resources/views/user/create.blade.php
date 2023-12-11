<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets') }}/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    {{-- <link href="{{ asset('assets') }}/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('assets') }}/js/pace.min.js"></script> --}}
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/app.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/icons.css" rel="stylesheet">
    <title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row ">

                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('assets') }}/images/logo-icon.png" width="60"
                                        alt="" />
                                </div>
                                <div class="text-center mb-4">
                                    <h5 class="">Create Data Student</h5>
                                    <p class="mb-0">Please Input Your Data Student</p>
                                </div>

                                <form action="{{ url('user/studentcreate', []) }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">NIS</label>
                                        <input type="text" name="nis" class="form-control @error('nis')
                                            is-invalid
                                        @enderror">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="" cols="30" rows="5"></textarea>
                                        {{-- <input type="text" name="alamat" class="form-control @error('alamat')
                                            is-invalid
                                        @enderror"> --}}
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Nama Ayah</label>
                                        <input type="text" name="ayah" class="form-control @error('ayah')
                                            is-invalid
                                        @enderror">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Nama Ibu</label>
                                        <input type="text" name="ibu" class="form-control @error('ibu')
                                            is-invalid
                                        @enderror">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Nama Wali</label>
                                        <input type="text" name="wali" class="form-control @error('wali')
                                            is-invalid
                                        @enderror">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end wrapper-->
        <!-- Bootstrap JS -->
        <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <!--Password show & hide js -->

        <!--app JS-->
        <script src="{{ asset('assets') }}/js/app.js"></script>
</body>

</html>
