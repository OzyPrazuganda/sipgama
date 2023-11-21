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
                    <div class="col-md-4">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">Total Pemasukan</h6>

                                <h5 class="card-text">Rp.
                                    {{ number_format($totalPemasukan, 0, ',', '.') }},00
                                </h5>

                                {{-- <div class="mb-0">
                                    <span class="text-danger">
                                        <i class="ti ti-arrow-down-right fs-3">-3.65%</i>
                                    </span>
                                    <span class="text-muted fs-3">Since last week</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">Total Pengeluaran</h6>
                                <h5 class="card-text">Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }},00
                                </h5>

                                {{-- <div class="mt-2 mb-0">
                                    <span class="text-danger">
                                        <i class="ti ti-arrow-down-right fs-3">-3.65%</i>
                                    </span>
                                    <span class="text-muted fs-3">Since last week</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">Saldo Akhir</h6>
                                <h5 class="card-text">Rp. {{ number_format($saldoAkhir, 0, ',', '.') }},00</h5>

                                {{-- <div class="mt-2 mb-0">
                                    <span class="text-danger">
                                        <i class="ti ti-arrow-down-right fs-3">-3.65%</i>
                                    </span>
                                    <span class="text-muted fs-3">Since last week</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    {{-- Card Section End --}}

                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="card-body">

                                <!-- Button trigger modal -->
                                @can('bendahara')
                                    <button type="button" class="btn btn-sm btn-primary mb-3 rounded-2 btn-sm ti ti-plus"
                                        data-toggle="modal" data-target="#exampleModal"> Tambah Pemasukan
                                    </button>
                                @endcan

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-2">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data
                                                    Pemasukan
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="rekapitulasi/register" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="mb-2">
                                                        <label for="tanggal" class="form-label"
                                                            style="font-size: 11pt">Tanggal Pemasukan</label>
                                                        <input type="date"
                                                            class="form-control form-control-sm rounded-2 @error('tanggal') is-invalid @enderror"
                                                            id="tanggal" name="tanggal" aria-describedby="emailHelp"
                                                            required>
                                                        @error('tanggal')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label for="jumlah" class="form-label"
                                                            style="font-size: 11pt">Jumlah</label>
                                                        <input type="number"
                                                            class="form-control form-control-sm rounded-2 @error('jumlah') is-invalid @enderror"
                                                            id="jumlah" name="jumlah" aria-describedby="emailHelp"
                                                            required>
                                                        @error('jumlah')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label for="keterangan" class="form-label"
                                                            style="font-size: 11pt">keterangan</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm rounded-2 @error('keterangan') is-invalid @enderror"
                                                            id="keterangan" name="keterangan"
                                                            aria-describedby="emailHelp" required>
                                                        @error('keterangan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary rounded-2">Save
                                                    changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tampilan Halaman (Tabels) --}}

                                <table id="tabel" class="table table-sm table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Tanggal Pemasukan</th>
                                            <th scope="col">Jumlah Pemasukan</th>
                                            <th scope="col">keterangan</th>
                                            @can('bendahara')
                                                <th scope="col" style="text-align: center">Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekap as $i)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($i->tanggal)->format('d F Y') }}
                                                </td>
                                                <td>Rp. {{ number_format($i->jumlah, 0, ',', '.') }},00</td>
                                                <td>{{ $i->keterangan ? $i->keterangan : 'Pembayaran iuran' }}
                                                </td>
                                                @can('bendahara')
                                                    <td style="text-align: center">
                                                        @if ($i->keterangan)
                                                            <button class="btn btn-warning btn-sm rounded-2 modal_edit"
                                                                data-toggle="modal" data-target="#modal_edit"
                                                                data-id="{{ $i->id }}"
                                                                data-tanggal="{{ $i->tanggal }}"
                                                                data-jumlah="{{ $i->jumlah }}"
                                                                data-keterangan="{{ $i->keterangan }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm rounded-2 modal_verif"
                                                                data-toggle="modal" data-target="#modal_verif"
                                                                data-id="{{ $i->id }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                            {{-- <a href="rekapitulasi/delete/{{ $i->id }}"
                                                                class="btn btn-danger rounded-2 btn-sm">
                                                                <i class="ti ti-trash"></i>
                                                            </a> --}}
                                                        @else
                                                            <a href="daftar_iuran"
                                                                class="btn btn-warning btn-sm rounded-2 ti ti-edit"></a>
                                                        @endif
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('rekapitulasi.edit')

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });

        // For edit
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var tanggal = $(this).attr('data-tanggal')
            var jumlah = $(this).attr('data-jumlah')
            var keterangan = $(this).attr('data-keterangan')

            $('#tanggal_edit').val(tanggal);
            $('#jumlah_edit').val(jumlah);
            $('#keterangan_edit').val(keterangan);

            $('#form_update').attr('action', 'rekapitulasi/update/' + id);
        });

        // For verif
        $(document).ready(function() {
            $('.modal_verif').on('click', function() {
                var id = $(this).data('id');

                // Menambahkan event handler untuk tombol "Ya" pada modal
                $('#modal_verif').on('click', '.btn-danger', function() {
                    // Jika tombol "Ya" pada modal diklik, arahkan ke URL penghapusan
                    window.location.href = 'rekapitulasi/delete/' + id;
                });
            });
        });
    </script>

</body>
