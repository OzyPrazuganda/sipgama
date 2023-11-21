<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Villa Gading</title>
    <link rel="stylesheet" href="{{ asset('Modernize-1.0.0') }}/src/assets/css/styles.min.css" />
</head>

<body>
    @include('sweetalert::alert')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="logo-img text-center d-block">
                                    <a href="./">
                                        <img src="{{ asset('storage/files/Logo sipgama bulat.png') }}" width="140"
                                            alt="">
                                    </a>
                                </div>
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="nik" class="form-control autofocus required" id="nik"
                                            name="nik" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Sign
                                        In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
