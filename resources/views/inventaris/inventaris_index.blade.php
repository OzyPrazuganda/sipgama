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
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="card-body">

                            @can('admin')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary mb-3 rounded-2 ti ti-clipboard-plus"
                                    data-toggle="modal" data-target="#exampleModal"> Tambah Data
                                </button>
                            @endcan

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-4">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="inventaris/register" method="post">
                                                @csrf
                                                <div class="mb-2">
                                                    <label for="nama_barang" class="form-label"
                                                        style="font-size: 11pt">Nama Barang</label>
                                                    <input type="string"
                                                        class="form-control form-control-sm rounded-2 @error('nama_barang') is-invalid @enderror"
                                                        id="nama_barang" name="nama_barang" aria-describedby="emailHelp"
                                                        required>
                                                    @error('nama_barang')
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

                                                <label for="kondisi" class="form-label"
                                                    style="font-size: 11pt">Kondisi</label>
                                                <div class="ml-2 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kondisi"
                                                            id="kondisi" value="rusak">
                                                        <label class="form-check-label" for="kondisi">
                                                            Rusak
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kondisi"
                                                            id="kondisi2" value="hilang">
                                                        <label class="form-check-label" for="kondisi2">
                                                            Hilang
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kondisi"
                                                            id="kondisi3" value="ganti">
                                                        <label class="form-check-label" for="kondisi3">
                                                            Perlu diganti
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="keterangan" class="form-label"
                                                        style="font-size: 11pt">Keterangan</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm rounded-2 @error('keterangan') is-invalid @enderror"
                                                        id="keterangan" name="keterangan" required>
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

                            {{-- Tampilan Halaman (Tabel) --}}

                            <table id="tabel" class="table table-sm table-hover">
                                <thead class="table-light text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nama Barang</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Jumlah</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Kondisi</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Keterangan</h6>
                                        </th>
                                        @can('admin')
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0" style="text-align: center">Action</h6>
                                            </th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventaris as $i)
                                        <tr>
                                            <th scope="row">{{ $i->nama_barang }}</th>
                                            <td>{{ $i->jumlah }}</td>
                                            <td>{{ $i->kondisi }}</td>
                                            <td>{{ $i->keterangan }}</td>
                                            @can('admin')
                                                <td style="text-align: center">
                                                    <button class="btn btn-warning btn-sm modal_edit" data-toggle="modal"
                                                        data-target="#modal_edit" data-id="{{ $i->id }}"
                                                        data-nama_barang="{{ $i->nama_barang }}"
                                                        data-jumlah="{{ $i->jumlah }}"
                                                        data-kondisi="{{ $i->kondisi }}"
                                                        data-keterangan="{{ $i->keterangan }}">
                                                        <i class="ti ti-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm modal_verif" data-toggle="modal"
                                                        data-target="#modal_verif" data-id="{{ $i->id }}">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                    {{-- <a href="inventaris/delete/{{ $i->id }}"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="ti ti-trash"></i>
                                                    </a> --}}
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

    @include('inventaris.inventaris_edit')

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });

        // For edit
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var nama_barang = $(this).attr('data-nama_barang')
            var jumlah = $(this).attr('data-jumlah')
            var kondisi = $(this).attr('data-kondisi')
            var keterangan = $(this).attr('data-kondisi')

            $('#nama_barang_edit').val(nama_barang);
            $('#jumlah_edit').val(jumlah);

            if (kondisi === 'rusak') {
                $('#kondisi_edit').prop('checked', true);
            } else if (kondisi === 'hilang') {
                $('#kondisi2_edit').prop('checked', true);
            } else if (kondisi === 'ganti') {
                $('#kondisi3_edit').prop('checked', true);
            }

            $('#keterangan_edit').val(keterangan);

            $('#form_update').attr('action', 'inventaris/update/' + id);
        });

        // For verif
        $(document).ready(function() {
            $('.modal_verif').on('click', function() {
                var id = $(this).data('id');

                // Menambahkan event handler untuk tombol "Ya" pada modal
                $('#modal_verif').on('click', '.btn-danger', function() {
                    // Jika tombol "Ya" pada modal diklik, arahkan ke URL penghapusan
                    window.location.href = 'inventaris/delete/' + id;
                });
            });
        });
    </script>

</body>
