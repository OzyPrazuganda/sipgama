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
                                <button type="button" class="btn btn-sm btn-primary mb-3 rounded-2 ti ti-file-plus"
                                    data-toggle="modal" data-target="#exampleModal"> Tambah Permohonan
                                </button>
                            @endcan

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Permohonan</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="surat/register" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="mb-2">
                                                    <label for="nomor_surat" class="form-label"
                                                        style="font-size: 11pt">No. Surat</label>
                                                    <input type="text" class="form-control rounded-2 form-control-sm"
                                                        id="nomor_surat" name="nomor_surat"
                                                        aria-describedby="emailHelp">
                                                </div>

                                                <div class="mb-2">
                                                    <label for="users_id" class="form-label"
                                                        style="font-size: 11pt">Nama</label>
                                                    <div>
                                                        <select class="form-control rounded-2 form-control-sm"
                                                            name="users_id" id="users_id">
                                                            @foreach ($users as $i)
                                                                <option value="{{ $i->id }}">{{ $i->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="keterangan" class="form-label"
                                                        style="font-size: 11pt">Jenis Surat</label>
                                                    <select class="form-control form-control-sm rounded-2 mb-2"
                                                        name="jenis" id="jenis" required>
                                                        <option value="" selected disabled hidden>Pilih Jenis
                                                            Surat Pengantar
                                                        </option>
                                                        <option value="Surat Pengantar Pembuatan SKCK">Surat Pengantar
                                                            Pembuatan
                                                            SKCK</option>
                                                        <option value="Surat Pengantar Mengurus KTP">Surat Pengantar
                                                            Mengurus KTP
                                                        </option>
                                                        <option value="Surat Pengantar Domisili">Surat Pengantar
                                                            Domisili</option>
                                                        <option value="Surat Pengantar Kematian">Surat Pengantar
                                                            Kematian</option>
                                                        <option value="Surat Pengantar Penelitian">Surat Pengantar
                                                            Penelitian
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="status" class="form-label"
                                                        style="font-size: 11pt">Status</label>
                                                    <div>
                                                        <select
                                                            class="form-control rounded-2 form-control-sm @error('status') is-invalid @enderror"
                                                            name="status" id="status">
                                                            <option value="pengajuan">Pengajuan</option>
                                                            <option value="validasi">Valid</option>
                                                            <option value="proses">Proses</option>
                                                            <option value="selesai">Selesai</option>
                                                            <option value="batal">Batal</option>
                                                        </select>
                                                    </div>
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

                            <table id="tabel" class="table fs-3 table-sm border-bottom-0 table-hover">
                                <thead class="table-light text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
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
                                        @can('admin')
                                            <th class="border-bottom-0 text-center">
                                                <h6 class="fw-semobold mb-0">Action</h6>
                                            </th>
                                        @endcan
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($permohonan_surat as $i)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $i->created_at->format('d F Y') }}</td>
                                            <td>{{ $i->nomor_surat == null ? '' : $i->nomor_surat }}</td>
                                            <td>{{ $i->users->nik }}</td>
                                            <td>{{ $i->users->name }}</td>
                                            <td>{{ $i->jenis }}</td>
                                            <td>
                                                @if ($i->status === 'pengajuan' && auth()->user()->role === 'admin')
                                                    <div style="display: flex; gap: 3pt;">
                                                        <form action="surat/update/{{ $i->id }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="nomor_surat"
                                                                value="{{ $i->nomor_surat == null ? '' : $i->nomor_surat }}">
                                                            <input type="hidden" name="users_id"
                                                                value="{{ $i->users_id }}">
                                                            <input type="hidden" name="jenis"
                                                                value="{{ $i->jenis }}">
                                                            <input type="hidden" name="status" value="proses">
                                                            <input type="hidden" name="file" value="">
                                                            <button type="submit"
                                                                class="btn btn-info btn-sm ti ti-loader"></button>
                                                        </form>
                                                        <form action="surat/update/{{ $i->id }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="nomor_surat"
                                                                value="{{ $i->nomor_surat == null ? '' : $i->nomor_surat }}">
                                                            <input type="hidden" name="users_id"
                                                                value="{{ $i->users_id }}">
                                                            <input type="hidden" name="jenis"
                                                                value="{{ $i->jenis }}">
                                                            <input type="hidden" name="status" value="batal">
                                                            <input type="hidden" name="file" value="">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm ti ti-x"></button>
                                                        </form>
                                                    </div>
                                                @elseif ($i->status === 'pengajuan')
                                                    <span class="badge badge-secondary rounded-2 fw-semibold fs-2">
                                                        {{ $i->status }}
                                                    </span>
                                                @elseif ($i->status === 'proses')
                                                    <span class="badge badge-warning rounded-2 fw-semibold fs-2">
                                                        {{ $i->status }}
                                                    </span>
                                                @elseif ($i->status === 'selesai')
                                                    <span class="badge badge-success rounded-2 fw-semibold fs-2">
                                                        {{ $i->status }}
                                                    </span>
                                                @elseif ($i->status === 'batal')
                                                    <span class="badge badge-danger rounded-2 fw-semibold fs-2">
                                                        {{ $i->status }}
                                                    </span>
                                                @endif
                                            </td>

                                            @can('admin')
                                                <td>
                                                    <div style="display: flex; gap: 3px; justify-content: center;">
                                                        @if ($i->status === 'proses')
                                                            <button class="btn btn-sm btn-success ti ti-checks modal_verif"
                                                                data-toggle="modal" data-target="#modal_verif"
                                                                data-id = "{{ $i->id }}"
                                                                data-users_id="{{ $i->users_id }}"
                                                                data-nomor_surat="{{ $i->nomor_surat }}"
                                                                data-status="{{ $i->status }}"
                                                                data-jenis="{{ $i->jenis }}"
                                                                data-oldfile="{{ $i->file }}">
                                                            </button>
                                                        @elseif ($i->status === 'selesai')
                                                            <a href="storage/{{ $i->file }}" target="_blank"
                                                                class="btn btn-secondary btn-sm">
                                                                <i class="ti ti-eye text-white"></i>
                                                            </a>
                                                            <button
                                                                class="btn btn-info btn-sm modal_upload ti ti-file-upload"
                                                                data-toggle="modal" data-target="#modal_upload"
                                                                data-id="{{ $i->id }}"
                                                                data-users_id="{{ $i->users_id }}"
                                                                data-nomor_surat="{{ $i->nomor_surat }}"
                                                                data-status="{{ $i->status }}"
                                                                data-jenis="{{ $i->jenis }}"
                                                                data-oldfile="{{ $i->file }}">
                                                            </button>
                                                        @endif

                                                        <button class="btn btn-warning btn-sm modal_edit"
                                                            data-toggle="modal" data-target="#modal_edit"
                                                            data-id="{{ $i->id }}"
                                                            data-users_id="{{ $i->users_id }}"
                                                            data-nomor_surat="{{ $i->nomor_surat }}"
                                                            data-status="{{ $i->status }}"
                                                            data-jenis="{{ $i->jenis }}">
                                                            <i class="ti ti-edit"></i>
                                                        </button>
                                                        {{-- <button class="btn btn-danger btn-sm modal_verif"
                                                            data-toggle="modal" data-target="#modal_verif"
                                                            data-id="{{ $i->id }}">
                                                            <i class="ti ti-trash"></i>
                                                        </button> --}}
                                                    </div>
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

    @include('surat.edit')

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });

        // For Edit
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var nomor_surat = $(this).attr('data-nomor_surat')
            var status = $(this).attr('data-status')
            var jenis = $(this).attr('data-jenis')
            var users_id = $(this).attr('data-users_id')

            $('#nomor_surat_edit').val(nomor_surat);
            $('#status_edit').val(status);
            $('#jenis_edit').val(jenis);
            $('#users_id_edit').val(users_id);

            $('#form_update').attr('action', 'surat/update/' + id);

        });

        // For upload file
        $('.modal_upload').on('click', function(event) {
            var id = $(this).attr('data-id')
            var nomor_surat = $(this).attr('data-nomor_surat')
            var status = $(this).attr('data-status')
            var jenis = $(this).attr('data-jenis')
            var users_id = $(this).attr('data-users_id')
            var oldfile = $(this).attr('data-oldfile')

            $('#nomor_surat_upload').val(nomor_surat);
            $('#status_upload').val(status);
            $('#jenis_upload').val(jenis);
            $('#users_id_upload').val(users_id);
            $('#oldfile').val(oldfile);

            $('#form_upload').attr('action', 'surat/update/' + id);
        });

        // For Verif
        $('.modal_verif').on('click', function(event) {
            var id = $(this).attr('data-id')
            var status = $(this).attr('data-status')
            var jenis = $(this).attr('data-jenis')
            var users_id = $(this).attr('data-users_id')

            $('#jenis_verif').val(jenis);
            $('#users_id_verif').val(users_id);

            $('#form_verif').attr('action', 'surat/update/' + id);

        });

        // For Verif
        // $(document).ready(function() {
        //     $('.modal_verif').on('click', function() {
        //         var id = $(this).data('id');

        //         $('#modal_verif').on('click', '.btn-primary', function() {
        //             window.location.href = 'surat/update/' + id;
        //         });
        //     });
        // });

        // For show image
        $(document).on('click', '.modal_show', function() {
            var id = $(this).attr('id')
            var file = $(this).attr('file')

            $('#file').attr('src', 'storage/' + file);
        });
    </script>

</body>
