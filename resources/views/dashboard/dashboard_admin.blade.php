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

            <div class="container-fluid">

                {{-- Card Section --}}
                <div class="row">
                    <div class="col-xxl-5 d-flex">

                        <div class="col-sm-10">
                            <div class="card rounded-4">
                                <div class="card-body">
                                    <h6 class="card-title">Jumlah Warga</h6>

                                    <div class="row">
                                        <div class="col">
                                            <h4>{{ $users }}</h4>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle ti ti-users"
                                                    style="font-size: 24pt; color: black"></i>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-0">
                                        <span class="text-danger">
                                            <i class="ti ti-arrow-down-right">-3.65%</i>
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="card rounded-4">
                                <div class="card-body">
                                    <h6 class="card-title">Rumah Dihuni</h6>

                                    <div class="row">
                                        <div class="col">
                                            <h4>{{ $rumah_valid }}</h4>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle ti ti-home"
                                                    style="font-size: 24pt; color: black"></i>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-0">
                                        <span class="text-danger">
                                            <i class="ti ti-arrow-down-right">-3.65%</i>
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="card rounded-4">
                                <div class="card-body">
                                    <h6 class="card-title">Permohonan Surat</h6>

                                    <div class="row">
                                        <div class="col">
                                            <h4>{{ $permohonan }}</h3>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle ti ti-mail"
                                                    style="font-size: 24pt; color: black"></i>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-0">
                                        <span class="text-danger">
                                            <i class="ti ti-arrow-down-right">-3.65%</i>
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="col-lg-12">
                            <div class="card rounded-4">
                                <div class="card-body mb-3">
                                    <h6 class="card-subtitle mb-3 text-muted">Pemasukan</h6>

                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-text">Rp.
                                                {{ number_format($totalPemasukan, 0, ',', '.') }},00
                                            </h3>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-user">
                                                <i class="ti ti-wallet" style="font-size: 30pt"></i>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-0">
                                        <span class="text-danger">
                                            <i class="ti ti-arrow-down-right fs-3">-3.65%</i>
                                        </span>
                                        <span class="text-muted fs-3">Since last week</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card rounded-4">
                                <div class="card-body mb-3">
                                    <h6 class="card-subtitle mb-3 text-muted">Pengeluaran</h6>

                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-text">Rp.
                                                {{ number_format($totalPengeluaran, 0, ',', '.') }},00
                                            </h3>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-user">
                                                <i class="ti ti-businessplan" style="font-size: 30pt"></i>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-0">
                                        <span class="text-danger">
                                            <i class="ti ti-arrow-down-right fs-3">-3.65%</i>
                                        </span>
                                        <span class="text-muted fs-3">Since last week</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card rounded-4">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-3 text-muted">Perbandingan</h6>

                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-text">{!! $pieChart->container() !!}
                                            </h3>
                                        </div>

                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card w-100 rounded-4">
                            <div class="card-body p-4">
                                {{-- Line Chart --}}
                                {!! $lineChart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script src="{{ $pieChart->cdn() }}"></script>
    <script src="{{ $lineChart->cdn() }}"></script>

    {{ $pieChart->script() }}
    {{ $lineChart->script() }}

</body>
