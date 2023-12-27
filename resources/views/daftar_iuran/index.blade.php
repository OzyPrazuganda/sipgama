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
                <div class="row">

                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100 rounded-4">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-4">Bukti Pembayaran</h5>
                                @foreach ($pembayaran as $i)
                                    <div class="image-container">
                                        <img id="image_{{ $i->id }}" src=""
                                            style="width: 100%; height: auto;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Tampilan Halaman (Tabels) --}}

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100 rounded-3">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title fw-semibold mb-3 mt-1">Daftar Pembayaran.</h5>
                                    @can('bendahara')
                                        <button type="button"
                                            class="btn btn-primary btn-sm ti ti-plus mb-3 rounded-5 modal_add"
                                            data-toggle="modal" data-target="#modal_add"></button>
                                    @endcan
                                </div>

                                <div class="table-responsive">
                                    <table id="tabel" class="table text-nowrap mb-0 align-middle fs-3 table-hover">
                                        <thead class="text-dark">
                                            @if ($pembayaran->isEmpty())
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
                                                    @can('bendahara')
                                                        <th class="border-bottom-0 text-center">
                                                            <h6 class="fw-semibold mb-0">Status</h6>
                                                        </th>
                                                        <th class="border-bottom-0 text-center">
                                                            <h6 class="fw-semibold mb-0">Action</h6>
                                                        </th>
                                                    @endcan
                                                </tr>
                                            @endif
                                        </thead>

                                        <tbody>
                                            @foreach ($pembayaran as $i)
                                                <tr>
                                                    <td>{{ $i->created_at->format('d F Y') }}</td>
                                                    <td>{{ $i->rumah->nomor_rumah }}</td>
                                                    <td>{{ $i->bulan }}</td>
                                                    <td>{{ $i->metode_pembayaran->metode_pembayaran }}</td>
                                                    <td>Rp. {{ number_format($i->total_bayar, 0, ',', '.') }},00
                                                    </td>

                                                    @can('bendahara')
                                                        <td>
                                                            @if ($i->status === 'validasi')
                                                                <div style="display: flex; gap: 3px">
                                                                    <form action="iuran/update/{{ $i->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="status" value="valid">
                                                                        <input type="hidden" name="rumah_id"
                                                                            value="{{ auth()->user()->rumah->id }}">
                                                                        <input type="hidden" name="bulan"
                                                                            value="{{ $i->bulan }}">
                                                                        <input type="hidden" name="metode_pembayaran_id"
                                                                            value="{{ $i->metode_pembayaran_id }}">
                                                                        <input type="hidden" name="total_bayar"
                                                                            value="{{ $i->total_bayar }}">
                                                                        <input type="hidden" name="file"
                                                                            value="{{ $i->bukti_pembayaran }}">
                                                                        <button type="submit"
                                                                            class="btn btn-success btn-sm ti ti-check"></button>
                                                                    </form>
                                                                    <form action="iuran/update/{{ $i->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="status"
                                                                            value="invalid">
                                                                        <input type="hidden" name="rumah_id"
                                                                            value="{{ auth()->user()->rumah->id }}">
                                                                        <input type="hidden" name="bulan"
                                                                            value="{{ $i->bulan }}">
                                                                        <input type="hidden" name="metode_pembayaran_id"
                                                                            value="{{ $i->metode_pembayaran_id }}">
                                                                        <input type="hidden" name="total_bayar"
                                                                            value="{{ $i->total_bayar }}">
                                                                        <input type="hidden" name="file"
                                                                            value="{{ $i->bukti_pembayaran }}">
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm ti ti-x"></button>
                                                                    </form>
                                                                </div>
                                                            @elseif ($i->status === 'valid')
                                                                <span
                                                                    class="badge badge-success rounded-2 fw-semibold fs-2">
                                                                    {{ $i->status }}
                                                                </span>
                                                            @elseif ($i->status === 'invalid')
                                                                <span class="badge badge-danger rounded-2 fw-semibold fs-2">
                                                                    {{ $i->status }}
                                                                </span>
                                                            @endif
                                                        </td>

                                                        <td style="text-align: center">
                                                            <button class="btn btn-info btn-sm image_show"
                                                                data-target="image_{{ $i->id }}"
                                                                data-file="{{ $i->bukti_pembayaran }}">
                                                                <i class="ti ti-receipt"></i>
                                                            </button>
                                                            <button class="btn btn-warning btn-sm modal_edit"
                                                                data-toggle="modal" data-target="#modal_edit"
                                                                data-id="{{ $i->id }}"
                                                                data-rumah_id="{{ $i->rumah_id }}"
                                                                data-bulan="{{ $i->bulan }}"
                                                                data-metode_pembayaran="{{ $i->metode_pembayaran_id }}"
                                                                data-total="{{ $i->total_bayar }}"
                                                                data-status="{{ $i->status }}"
                                                                data-bukti_bayar="{{ $i->bukti_pembayaran }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            {{-- <button class="btn btn-danger btn-sm modal_verif"
                                                                data-toggle="modal" data-target="#modal_verif"
                                                                data-id="{{ $i->id }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button> --}}
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if ($pembayaran->isEmpty())
                                        <div colspan="6" style="text-align: center">
                                            <img src="{{ asset('storage/files/Add tasks-pana.svg') }}"
                                                alt="Empty Table Image" width="300">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('daftar_iuran.edit')

    @include('daftar_iuran.script')

</body>
