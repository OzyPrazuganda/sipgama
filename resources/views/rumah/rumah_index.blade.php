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
                                <button type="button" class="btn btn-sm btn-primary mb-3 rounded-2 ti ti-home-plus"
                                    data-toggle="modal" data-target="#exampleModal"> Tambah Data
                                </button>
                            @endcan

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-2">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rumah</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/tambah_rumah" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="mb-2">
                                                    <label for="nomor_rumah" class="form-label"
                                                        style="font-size: 11pt">Nomor Rumah</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm @error('nomor_rumah') is-invalid @enderror rounded-2"
                                                        id="nomor_rumah" name="nomor_rumah" aria-describedby="emailHelp"
                                                        required>
                                                    @error('nomor_rumah')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="blok" class="form-label"
                                                        style="font-size: 11pt">Blok</label>
                                                    <div>
                                                        <select
                                                            class="form-control @error('blok') is-invalid @enderror rounded-2 form-control-sm"
                                                            name="blok" id="blok">
                                                            <option value="" selected disabled hidden>Pilih Blok
                                                            </option>
                                                            <option value="a">Blok A</option>
                                                            <option value="b">Blok B</option>
                                                            <option value="c">Blok C</option>
                                                            <option value="d">Blok D</option>
                                                            <option value="e">Blok E</option>
                                                            <option value="f">Blok F</option>
                                                            <option value="g">Blok G</option>
                                                            <option value="h">Blok H</option>
                                                            <option value="i">Blok I</option>
                                                            <option value="j">Blok J</option>
                                                        </select>
                                                    </div>
                                                    @error('blok')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <label for="status" class="form-label" style="font-size: 11pt">
                                                    Status</label>
                                                <div class="ml-2 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="status" value="huni">
                                                        <label class="form-check-label" for="status">
                                                            Huni
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="status2" value="kosong">
                                                        <label class="form-check-label" for="status2">
                                                            Kosong
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="tipe_rumah_id" class="form-label"
                                                        style="font-size: 11pt">Tipe Rumah</label>
                                                    <div>
                                                        <select
                                                            class="form-control form-control-sm @error('tipe_rumah_id') is-invalid @enderror rounded-2"
                                                            name="tipe_rumah_id" id="tipe_rumah_id">
                                                            @foreach ($tipe_rumah as $i)
                                                                <option value="{{ $i->id }}">{{ $i->nomor_tipe }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Tampilan Halaman (Tabels) --}}

                            <table id="tabel" class="table table-sm table-hover">
                                <thead class="text-dark table-light fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nomor Rumah</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Blok</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Status</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tipe Rumah</h6>
                                        </th>
                                        @can('admin')
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semobold mb-0" style="text-align: center">Action</h6>
                                            </th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rumah as $i)
                                        <tr>
                                            <th scope="row">{{ $i->nomor_rumah }}</th>
                                            <th>{{ $i->blok }}</th>
                                            <td>{{ $i->status }}</td>
                                            <td>{{ $i->tipe_rumah->nomor_tipe }}</td>
                                            @can('admin')
                                                <td style="text-align: center">
                                                    <button class="btn btn-warning btn-sm modal_edit" data-toggle="modal"
                                                        data-target="#modal_edit" data-id="{{ $i->id }}"
                                                        data-nomor_rumah="{{ $i->nomor_rumah }}"
                                                        data-blok="{{ $i->blok }}"
                                                        data-status="{{ $i->status }}"
                                                        data-ukuran_rumah="{{ $i->ukuran_rumah }}"
                                                        data-tipe_rumah="{{ $i->tipe_rumah->id }}">
                                                        <i class="ti ti-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm mdoal_verif" data-toggle="modal"
                                                        data-target="#modal_verif" data-id="{{ $i->id }}">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                    {{-- <a href="rumah/delete/{{ $i->id }}"
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

    @include('rumah.edit_rumah')

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });

        // For edit
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var nomor_rumah = $(this).attr('data-nomor_rumah')
            var blok = $(this).attr('data-blok')
            var status = $(this).attr('data-status')
            var tipe_rumah_id = $(this).attr('data-tipe_rumah')

            $('#nomor_rumah_edit').val(nomor_rumah);
            $('#blok_edit').val(blok);
            if (status === 'huni') {
                $('#status_edit_valid').prop('checked', true);
            } else if (status === 'kosong') {
                $('#status_edit_invalid').prop('checked', true);
            }
            $('#tipe_rumah_edit').val(tipe_rumah_id);

            $('#form_update').attr('action', 'rumah/update/' + id);
        });

        // For verif
        $(document).ready(function() {
            $('.modal_verif').on('click', function() {
                var id = $(this).data('id');

                // Menambahkan event handler untuk tombol "Ya" pada modal
                $('#modal_verif').on('click', '.btn-danger', function() {
                    // Jika tombol "Ya" pada modal diklik, arahkan ke URL penghapusan
                    window.location.href = 'rumah/delete/' + id;
                });
            });
        });
    </script>

</body>
