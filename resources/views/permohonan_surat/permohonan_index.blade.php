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
                                <h5 class="card-title fw-semibold mb-4">Forms Permohonan Surat</h5>
                                <form action="/tambah_permohonan" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="users_id">Nama Pemohon</label>
                                        <input type="text" class="form-control rounded-2"
                                            aria-describedby="emailHelp" style="background-color: white"
                                            value="{{ auth()->user()->name }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="keterangan">Jenis Surat</label>
                                        <select class="form-control mb-2 rounded-2" name="jenis" id="jenis">
                                            <option value="" selected disabled hidden>Pilih Jenis Surat Pengantar
                                            </option>
                                            <option value="Surat Pengantar Pembuatan SKCK">Surat Pengantar Pembuatan
                                                SKCK</option>
                                            <option value="Surat Pengantar Mengurus KTP">Surat Pengantar Mengurus KTP
                                            </option>
                                            <option value="Surat Pengantar Domisili">Surat Pengantar Domisili</option>
                                            <option value="Surat Pengantar Kematian">Surat Pengantar Kematian</option>
                                            <option value="Surat Pengantar Penelitian">Surat Pengantar Penelitian
                                            </option>
                                        </select>
                                    </div>

                                    {{-- hidden --}}

                                    <input type="hidden" class="form-control" id="users_id" name="users_id"
                                        aria-describedby="emailHelp" style="background-color: white"
                                        value="{{ auth()->user()->id }}">

                                    <input type="hidden" class="form-control" id="status" name="status"
                                        aria-describedby="emailHelp" style="background-color: white" value="pengajuan">

                                    {{-- hidden --}}

                                    <button type="submit" class="btn btn-primary btn-sm rounded-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Tampilan Halaman (Tabels) --}}

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100 rounded-4">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold" style="margin: 0;">Daftar surat yang anda ajukan.
                                </h5>
                                @if ($permohonan_surat->where('users_id', auth()->user()->id)->isEmpty())
                                    {{-- empty header --}}
                                @else
                                    <i
                                        style="font-size:
                                    8pt; margin-bottom: 4px; display: block;">Download
                                        file
                                        surat akan bisa dilakukan jika
                                        status
                                        <span class="badge rounded-1 fw-semibold fs-1 badge-success">selesai</span> dan
                                        file
                                        telah di upload oleh administrator.
                                    </i>
                                @endif
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 mt-3 align-middle table-hover">
                                        <thead class="text-dark fs-4">
                                            @if ($permohonan_surat->where('users_id', auth()->user()->id)->isEmpty())
                                                {{-- empty header --}}
                                            @else
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Tanggal Pengajuan</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Nomor Surat</h6>
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
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Surat</h6>
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

                                                        <td style="text-align: center">
                                                            {{-- <button class="btn btn-warning btn-sm modal_edit"
                                                                data-toggle="modal" data-target="#modal_edit"
                                                                data-id="{{ $i->id }}"
                                                                data-users_id="{{ $i->users_id }}"
                                                                data-status="{{ $i->status }}"
                                                                data-keterangan="{{ $i->keterangan }}">
                                                                <i class="ti ti-edit"></i>
                                                            </button>
                                                            <a href="permohonan/delete/{{ $i->id }}"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="ti ti-trash"></i>
                                                            </a> --}}
                                                            @if ($i->status === 'selesai')
                                                                <a href="storage/{{ $i->file }}" target="_blank"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="ti ti-file-download text-white"></i>
                                                                </a>
                                                            @else
                                                                <a href="#" target="_blank"
                                                                    class="btn btn-info btn-sm disabled">
                                                                    <i class="ti ti-file-download text-white"></i>
                                                                </a>
                                                            @endif
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
                </div>
            </div>
        </div>
    </div>

    @include('permohonan_surat.permohonan_edit')

    <script>
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var users_id = $(this).attr('data-users_id')
            var status = $(this).attr('data-status')
            var keterangan = $(this).attr('data-keterangan')

            $('#users_id_edit').val(users_id);
            $('#status_edit').val(status);
            $('#keterangan_edit').val(keterangan);

            $('#form_update').attr('action', 'permohonan/update/' + id);
        });
    </script>

</body>
