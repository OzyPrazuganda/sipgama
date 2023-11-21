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
                            <button type="button" class="btn btn-sm btn-primary mb-3 rounded-2 ti ti-home-plus"
                                data-toggle="modal" data-target="#exampleModal"> Tambah Data
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-2">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tipe Rumah</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/register_tipe_rumah" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="mb-2">
                                                    <label for="nomor_tipe" class="form-label"
                                                        style="font-size: 11pt">Tipe Rumah</label>
                                                    <input type="text"
                                                        class="form-control rounded-2 form-control-sm @error('nomor_tipe') is-invalid @enderror"
                                                        id="nomor_tipe" name="nomor_tipe" aria-describedby="emailHelp"
                                                        required>
                                                    @error('nomor_tipe')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="keterangan" class="form-label"
                                                        style="font-size: 11pt">Keterangan</label>
                                                    <input type="text"
                                                        class="form-control rounded-2 form-control-sm @error('keterangan') is-invalid @enderror"
                                                        id="keterangan" name="keterangan" aria-describedby="emailHelp">
                                                    @error('keterangan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="biaya" class="form-label"
                                                        style="font-size: 11pt">Jumlah Iuran</label>
                                                    <input type="number"
                                                        class="form-control rounded-2 form-control-sm @error('biaya') is-invalid @enderror"
                                                        id="biaya" name="biaya" aria-describedby="emailHelp"
                                                        required>
                                                    @error('biaya')
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
                                <thead class="text-dark table-light fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tipe</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Keterangan</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Jumlah Iuran</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0" style="text-align: center">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipe_rumah as $i)
                                        <tr>
                                            <th scope="row">{{ $i->nomor_tipe }}</th>
                                            <td>{{ $i->keterangan }}</td>
                                            <td>Rp. {{ number_format($i->biaya, 0, ',', '.') }},00
                                            <td style="text-align: center">
                                                <button class="btn btn-warning btn-sm modal_edit" data-toggle="modal"
                                                    data-id="{{ $i->id }}" data-nomor_tipe="{{ $i->nomor_tipe }}"
                                                    data-keterangan="{{ $i->keterangan }}"
                                                    data-biaya="{{ $i->biaya }}" data-target="#modal_edit">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm modal_verif" data-toggle="modal"
                                                    data-target="#modal_verif" data-id="{{ $i->id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                                {{-- <a href="tipe_rumah/delete/{{ $i->id }}"
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

    @include('tipe_rumah.edit_tipe_rumah')

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });

        // For edit
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var nomor_tipe = $(this).attr('data-nomor_tipe')
            var keterangan = $(this).attr('data-keterangan')
            var biaya = $(this).attr('data-biaya')

            $('#nomor_tipe_edit').val(nomor_tipe);
            $('#keterangan_edit').val(keterangan);
            $('#biaya_edit').val(biaya);

            $('#form_update').attr('action', 'edit_tipe_rumah/update/' + id);
        });

        // For verif
        $(document).ready(function() {
            $('.modal_verif').on('click', function() {
                var id = $(this).data('id');

                // Menambahkan event handler untuk tombol "Ya" pada modal
                $('#modal_verif').on('click', '.btn-danger', function() {
                    // Jika tombol "Ya" pada modal diklik, arahkan ke URL penghapusan
                    window.location.href = 'tipe_rumah/delete/' + id;
                });
            });
        });
    </script>

</body>
''
