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

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary mb-3 rounded-2 ti ti-wallet"
                                data-toggle="modal" data-target="#exampleModal"> Tambah Metode Pembayaran
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Metode Pembayaran
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="register_metode_pembayaran" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="mb-2">
                                                    <label for="nomor_pembayaran" class="form-label"
                                                        style="font-size: 11pt">Nomor
                                                        Pembayaran</label>
                                                    <input type="text"
                                                        class="form-control rounded-2 form-control-sm @error('nomor_pembayaran') is-invalid @enderror"
                                                        id="nomor_pembayaran" name="nomor_pembayaran"
                                                        aria-describedby="emailHelp" required>
                                                    @error('nomor_pembayaran')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="nama" class="form-label"
                                                        style="font-size: 11pt">Atas Nama</label>
                                                    <input type="text"
                                                        class="form-control rounded-2 form-control-sm @error('nama') is-invalid @enderror"
                                                        id="nama" name="nama" aria-describedby="emailHelp"
                                                        required>
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="metode_pembayaran" class="form-label"
                                                        style="font-size: 11pt">Metode
                                                        Pembayaran</label>
                                                    <div>
                                                        <select
                                                            class="form-control rounded-2 form-control-sm @error('metode_pembayaran') is-invalid @enderror"
                                                            name="metode_pembayaran" id="metode_pembayaran">
                                                            <option value="bri">BRI</option>
                                                            <option value="bca">BCA</option>
                                                            <option value="mandiri">Mandiri</option>
                                                            <option value="gopay">Gopay</option>
                                                            <option value="dana">Dana</option>
                                                            <option value="shopeepay">ShopeePay</option>
                                                            <option value="ovo">Ovo</option>
                                                            <option value="qris">Qris</option>
                                                            <option value="ditempat">Langsung/Ditempat</option>
                                                        </select>
                                                    </div>
                                                    @error('metode_pembayaran')
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

                            <table id="tabel" class="table table-sm">
                                <thead class="table-light text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nomor Pembayaran</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Atas Nama</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Metode Pembayaran</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0" style="text-align: center">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metode_pembayaran as $i)
                                        <tr>
                                            <th scope="row">{{ $i->nomor_pembayaran }}</th>
                                            <td>{{ $i->nama }}</td>
                                            <td>{{ $i->metode_pembayaran }}</td>
                                            <td style="text-align: center">
                                                <button class="btn btn-warning btn-sm modal_edit" data-toggle="modal"
                                                    data-id="{{ $i->id }}"
                                                    data-nomor_pembayaran="{{ $i->nomor_pembayaran }}"
                                                    data-nama="{{ $i->nama }}"
                                                    data-metode_pembayaran="{{ $i->metode_pembayaran }}"
                                                    data-target="#modal_edit">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm modal_verif" data-toggle="modal"
                                                    data-target="#modal_verif" data-id="{{ $i->id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                                {{-- <a href="metode_pembayaran/delete/{{ $i->id }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="ti ti-trash"></i>
                                                </a> --}}
                                            </td>
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

    @include('metode_pembayaran.edit_metode_pembayaran')

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });

        // For edit
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var nomor_pembayaran = $(this).attr('data-nomor_pembayaran')
            var nama = $(this).attr('data-nama')
            var metode_pembayaran = $(this).attr('data-metode_pembayaran')

            $('#nomor_pembayaran_edit').val(nomor_pembayaran);
            $('#nama_edit').val(nama);
            $('#metode_pembayaran_edit').val(metode_pembayaran);

            $('#form_update').attr('action', 'metode_pembayaran/update/' + id);
        });

        // For verif
        $(document).ready(function() {
            $('.modal_verif').on('click', function() {
                var id = $(this).data('id');

                // Menambahkan event handler untuk tombol "Ya" pada modal
                $('#modal_verif').on('click', '.btn-danger', function() {
                    // Jika tombol "Ya" pada modal diklik, arahkan ke URL penghapusan
                    window.location.href = 'metode_pembayaran/delete/' + id;
                });
            });
        });
    </script>

</body>
