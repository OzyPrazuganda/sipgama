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
                                <h5 class="card-title fw-semibold mb-4">Forms Pembayaran</h5>
                                <form action="pembayaran/iuran" id="pembayaran" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="bulan">Jumlah Bulan</label>
                                        <select
                                            class="form-control form-control-sm @error('bulan') is-invalid @enderror rounded-2"
                                            id="bulan" name="bulan">
                                            <option value="" selected disabled hidden>Pilih Jumlah Bulan
                                            </option>
                                            <option value="1">1 Bulan</option>
                                            <option value="3">3 Bulan</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="9">9 Bulan</option>
                                        </select>
                                        <div class="form-text" style="font-size: 12px">Pilih jumlah bulan yang akan
                                            dibayarkan.
                                        </div>
                                        @error('bulan')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="total_bayar">Total Pembayaran</label>
                                        <input type="text" class="form-control form-control-sm rounded-2"
                                            id="total_bayar_view" name="total_bayar" style="background-color: white"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="metode_pembayaran_id">Metode Pembayaran</label>
                                        <div>
                                            <select
                                                class="form-control form-control-sm @error('metode_pembayaran_id') is-invalid @enderror rounded-2"
                                                name="metode_pembayaran_id" id="metode_pembayaran_id" required>
                                                <option value="" selected disabled hidden>Pilih Nomor Rekening
                                                </option>

                                                @foreach ($metode_pembayaran as $q)
                                                    <option value="{{ $q->id }}">{{ $q->metode_pembayaran }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="informasi_pembayaran">Informasi Pembayaran</label>
                                        <input type="text" class="form-control form-control-sm rounded-2"
                                            id="informasi_pembayaran" style="background-color: white" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="bukti_pembayaran_label">Bukti Pembayaran</label>
                                        <input
                                            class="form-control form-control-sm @error('bukti_pembayaran') is-invalid @enderror rounded-2"
                                            type="file" id="bukti_pembayaran" name="bukti_pembayaran" required>
                                        @error('bukti_pembayaran')
                                            <div class="invalid-feedback" style="font-size: 12px;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- hidden --}}
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-sm rounded-2"
                                            id="total_bayar" name="total_bayar" style="background-color: white" hidden>
                                    </div>

                                    <input type="hidden" class="form-control" id="rumah_id" name="rumah_id"
                                        value="{{ auth()->user()->rumah->id }}">

                                    <input type="hidden" id="status" name="status" value="validasi">

                                    {{-- end hidden --}}

                                    <button type="submit" class="btn btn-primary btn-sm rounded-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Tampilan Halaman (Tabels) --}}

                    <div id="tabel" class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100 rounded-3">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-4">Riwayat Pembayaran.
                                </h5>
                                <div>
                                    <table
                                        class="table text-nowrap mb-0 align-middle fs-3 table-hover table-responsive">
                                        <thead class="text-dark">
                                            @if (count($pembayaran) == 0)
                                                {{-- empty header --}}
                                            @else
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Tanggal Bayar</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Nomor Rumah</h6>
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
                                                    <th class="border-bottom-0 text-center">
                                                        <h6 class="fw-semibold mb-0">Bukti Bayar</h6>
                                                    </th>
                                                </tr>
                                            @endif
                                        </thead>

                                        <tbody>
                                            @foreach ($pembayaran as $i)
                                                {{-- @if ($i->rumah_id === auth()->user()->rumah->id) --}}
                                                <tr>
                                                    <td>{{ $i->created_at->format('d F Y') }}</td>
                                                    <td>{{ $i->rumah->nomor_rumah }}</td>
                                                    <td>{{ $i->bulan }}</td>
                                                    <td>{{ $i->metode_pembayaran->metode_pembayaran }}</td>
                                                    <td>Rp. {{ number_format($i->total_bayar, 0, ',', '.') }}
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

                                                    <td style="text-align: center">
                                                        <button class="btn btn-info btn-sm modal_show"
                                                            data-toggle="modal" data-target="#modal_show"
                                                            data-id="{{ $i->id }}"
                                                            data-file="{{ $i->bukti_pembayaran }}">
                                                            <i class="ti ti-receipt"></i>
                                                        </button>
                                                        {{-- <button class="btn btn-warning btn-sm modal_edit"
                                                                data-toggle="modal" data-target="#modal_edit"
                                                                data-id="{{ $i->id }}"
                                                                data-rumah_id="{{ auth()->user()->rumah->id }}"
                                                                data-bulan="{{ $i->bulan }}"
                                                                data-metode_pembayaran="{{ $i->id }}"
                                                                data-total="{{ $i->total_bayar }}"
                                                                data-status="{{ $i->status }}"
                                                                data-bukti_bayar="{{ $i->bukti_pembayaran }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <a href="pembayaran/delete/{{ $i->id }}"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="ti ti-trash"></i> --}}
                                                        </a>
                                                    </td>
                                                </tr>
                                                {{-- @endif --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if (count($pembayaran) == 0)
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

                    {{-- Table end --}}
                </div>
            </div>
        </div>
    </div>

    @include('pembayaran.edit')

    @include('pembayaran.script')

</body>
