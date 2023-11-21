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

                {{-- Line Chart --}}
                <div class="col-lg">
                    <div class="card w-100 rounded-4">
                        <div class="card-body p-4">
                            {!! $WargaLineChart->container() !!}
                        </div>
                    </div>
                </div>
                {{-- Line Chart End --}}

                {{-- Table List Permohonan Views --}}
                <div class="col">
                    <div class="card w-100 rounded-4">
                        <div class="card-body p-4">
                            <h3 class="card-subtitle text-muted">Daftar surat yang anda
                                ajukan.
                            </h3>
                            @if ($permohonan_surat->where('users_id', auth()->user()->id)->isEmpty())
                                {{-- empty header --}}
                            @endif
                            <div class="table-responsive">
                                <table class="table text-nowrap mb-0 mt-3 align-middle">
                                    <thead class="text-dark fs-4">
                                        @if ($permohonan_surat->where('users_id', auth()->user()->id)->isEmpty())
                                            {{-- empty header --}}
                                        @else
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Tgl Pengajuan</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">No. Surat</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">NIK</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Jenis</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Status</h6>
                                                </th>
                                            </tr>
                                        @endif
                                    </thead>

                                    <tbody>
                                        @foreach ($permohonan_surat as $i)
                                            @if ($i->users_id === auth()->user()->id)
                                                <tr>
                                                    <td>{{ $i->created_at->format('d F Y') }}</td>
                                                    <td>{{ $i->nomor_surat == null ? ' ' : $i->nomor_surat }}
                                                    </td>
                                                    <td>{{ $i->users->nik }}</td>
                                                    <td>{{ $i->users->name }}</td>
                                                    <td>{{ $i->jenis }}</td>
                                                    <td>
                                                        <span
                                                            class="badge rounded-1 fw-semibold fs-2
                                                            @if ($i->status === 'pengajuan') badge-secondary
                                                            @elseif ($i->status === 'validasi')
                                                                badge-info
                                                            @elseif ($i->status === 'proses')
                                                                badge-warning
                                                            @elseif ($i->status === 'selesai')
                                                                badge-success
                                                            @elseif ($i->status === 'batal')
                                                                badge-danger @endif
                                                            ">
                                                            {{ $i->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($permohonan_surat->where('users_id', auth()->user()->id)->isEmpty())
                                    <div colspan="6" style="text-align: center">
                                        <img src="{{ asset('storage/files/Add tasks-pana.svg') }}"
                                            alt="Empty Table Image" width="300">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Table End --}}

                {{-- Table List Pembayaran Iuran --}}
                <div class="col">
                    <div class="card w-100 rounded-3">
                        <div class="card-body p-4">
                            <h5 class="card-subtitle text-muted">Riwayat Pembayaran.
                            </h5>
                            <div class="table-responsive">
                                <table class="table text-nowrap mb-0 mt-3 align-middle fs-3">
                                    <thead class="text-dark">
                                        @if ($pembayaran->where('rumah_id', auth()->user()->rumah->id)->isEmpty())
                                            {{-- empty header --}}
                                        @else
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Tgl Bayar</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">No. Rumah</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Bulan</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Metode</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Total</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Status</h6>
                                                </th>
                                            </tr>
                                        @endif
                                    </thead>

                                    <tbody>
                                        @foreach ($pembayaran as $i)
                                            @if ($i->rumah_id === auth()->user()->rumah->id)
                                                <tr>
                                                    <td>{{ $i->created_at->format('d F Y') }}</td>
                                                    <td>{{ $i->rumah->nomor_rumah }}</td>
                                                    <td>{{ $i->bulan }}</td>
                                                    <td>{{ $i->metode_pembayaran->metode_pembayaran }}</td>
                                                    <td>Rp. {{ number_format($i->total_bayar, 0, ',', '.') }},00
                                                    </td>

                                                    <td>
                                                        <span
                                                            class="badge rounded-2 fw-semibold fs-2
                                                            @if ($i->status === 'validasi') badge-secondary
                                                            @elseif ($i->status === 'valid')
                                                                badge-success
                                                            @elseif ($i->status === 'invalid')
                                                                badge-danger @endif
                                                            ">
                                                            {{ $i->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($pembayaran->where('rumah_id', auth()->user()->rumah->id)->isEmpty())
                                    <div colspan="6"
                                        style="display: flex; justify-content: center; align-items: center; min-height: 60vh;">
                                        <img src="{{ asset('storage/files/Add tasks-pana.svg') }}"
                                            alt="Empty Table Image" width="400">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Table End --}}

            </div>

        </div>
    </div>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="{{ $WargaLineChart->cdn() }}"></script>

    {{ $WargaLineChart->script() }}

</body>
