@include('layouts.navbar')

<body>

    @include('sweetalert::alert')

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        @include('layouts.sidebar')
        <!-- Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!-- Header Start -->
            @include('layouts.header')
            <!-- Header End-->

            {{-- Card Section --}}
            <div class="container-fluid">
                <div class="card rounded-4">

                    <div class="card-body">
                        <h6 class="card-title">Profil Warga</h6>
                    </div>

                    <div class="row">
                        <div class="col-5 d-flex">
                            <div class="col-sm-10">

                                <div class="card rounded-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <img src="{{ asset('Modernize-1.0.0') }}/src/assets/images/profile/user-1.jpg"
                                                    alt="" width="65" class="rounded-circle">
                                            </div>

                                            <div class="col-auto mt-3">
                                                <div>
                                                    <h5>{{ auth()->user()->name }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-subtitle text-muted">NIK</h5>
                                    <h6>{{ auth()->user()->nik }}</h6>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-subtitle text-muted">No KK</h5>
                                    <h6>{{ auth()->user()->no_kk }}</h6>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-subtitle text-muted">No Telepon</h5>
                                    <h6>{{ auth()->user()->no_telp }}</h6>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-subtitle text-muted">Tempat Lahir</h5>
                                    <h6>{{ auth()->user()->tempat_lahir }}</h6>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-subtitle text-muted">Tanggal Lahir</h5>
                                    <h6>{{ auth()->user()->tanggal_lahir }}</h6>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-subtitle text-muted">No. Rumah</h5>
                                    <h6>{{ auth()->user()->rumah->nomor_rumah }}</h6>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- End Card Section --}}
        </div>
    </div>
</body>
