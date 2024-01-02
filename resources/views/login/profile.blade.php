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

                <div class="col-sm-4" style="margin-left: -1%">
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
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card rounded-4">

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">No KK</h5>
                                <h6>{{ auth()->user()->no_kk }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">NIK</h5>
                                <h6>{{ auth()->user()->nik }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Jenis Kelamin</h5>
                                <h6>
                                    @if (auth()->user()->jenis_kelamin == 'L')
                                        Laki-Laki
                                    @else
                                        Perempuan
                                    @endif
                                </h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">No Telepon</h5>
                                <h6>{{ auth()->user()->no_telp }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Tanggal Lahir</h5>
                                <h6>{{ auth()->user()->tanggal_lahir }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Tempat Lahir</h5>
                                <h6>{{ auth()->user()->tempat_lahir }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Agama</h5>
                                <h6>{{ auth()->user()->agama }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Pendidikan Terakhir</h5>
                                <h6>{{ auth()->user()->pendidikan_terakhir }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Pekerjaan</h5>
                                <h6>{{ auth()->user()->pekerjaan }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Role</h5>
                                <h6>{{ auth()->user()->role }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">No. Rumah</h5>
                                <h6>{{ auth()->user()->rumah->nomor_rumah }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Status</h5>
                                <h6>{{ auth()->user()->status }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Blok</h5>
                                <h6>Blok {{ auth()->user()->rumah->blok }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Tipe Rumah</h5>
                                <h6>{{ auth()->user()->rumah->tipe_rumah->nomor_tipe }}</h6>
                            </div>

                            <div class="card-body">
                                <h5 class="card-subtitle text-muted">Biaya Iuran Bulanan</h5>
                                <h6>Rp.
                                    {{ number_format(auth()->user()->rumah->tipe_rumah->biaya, 0, ',', '.') }},00
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        {{-- End Card Section --}}
    </div>
</body>
