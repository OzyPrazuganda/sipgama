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
                                <button type="button" class="btn btn-primary btn-sm mb-3 rounded-2 ti ti-user-plus"
                                    data-toggle="modal" data-target="#exampleModal"> Tambah Data
                                </button>

                                <button class="btn btn-success btn-sm mb-3 rounded-2 ti ti-file-plus" data-toggle="modal"
                                    data-target="#modal_upload"> Import Data</button>
                            @endcan

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Warga</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="/register" method="post">
                                                @csrf
                                                <div class="mb-2">
                                                    <label for="no_kk" class="form-label"
                                                        style="font-size: 11pt">Nomor
                                                        KK</label>
                                                    <input type="number"
                                                        class="form-control @error('no_kk') is-invalid @enderror rounded-2 form-control-sm"
                                                        id="no_kk" name="no_kk" aria-describedby="emailHelp"
                                                        required>
                                                    @error('no_kk')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="nik" class="form-label"
                                                        style="font-size: 11pt">NIK</label>
                                                    <input type="number"
                                                        class="form-control @error('nik') is-invalid @enderror rounded-2 form-control-sm"
                                                        id="nik" name="nik" aria-describedby="emailHelp"
                                                        required>
                                                    @error('nik')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="name" class="form-label"
                                                        style="font-size: 11pt">Nama</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror rounded-2 form-control-sm"
                                                        id="name" name="name" required>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="rumah_id" class="form-label"
                                                        style="font-size: 11pt">Nomor
                                                        Rumah</label>
                                                    <div>
                                                        <select
                                                            class="form-control @error('rumah_id') is-invalid @enderror rounded-2 form-control-sm"
                                                            name="rumah_id" id="rumah_id">
                                                            @foreach ($rumah as $i)
                                                                <option value="{{ $i->id }}">
                                                                    {{ $i->nomor_rumah }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="role" class="form-label"
                                                        style="font-size: 11pt">Role</label>
                                                    <div>
                                                        <select
                                                            class="form-control @error('role') is-invalid @enderror rounded-2 form-control-sm"
                                                            name="role" id="role">
                                                            <option value="admin">Admin</option>
                                                            <option value="pimpinan">Pimpinan</option>
                                                            <option value="bendahara">Bendahara</option>
                                                            <option value="warga">Warga</option>
                                                        </select>
                                                    </div>
                                                    @error('role')
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
                                                            id="status" value="pemilik">
                                                        <label class="form-check-label" for="status">
                                                            Pemilik
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="status2" value="penyewa">
                                                        <label class="form-check-label" for="status2">
                                                            Penyewa
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="no_telp" class="form-label"
                                                        style="font-size: 11pt">Nomor
                                                        Telepon</label>
                                                    <input type="number"
                                                        class="form-control @error('no_telp') is-invalid @enderror rounded-2 form-control-sm"
                                                        id="no_telp" name="no_telp" aria-describedby="emailHelp"
                                                        required>
                                                    @error('no_telp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="tempat_lahir" class="form-label"
                                                        style="font-size: 11pt">Tempat Lahir</label>
                                                    <input type="text"
                                                        class="form-control @error('tempat_lahir') is-invalid @enderror rounded-2 form-control-sm"
                                                        id="tempat_lahir" name="tempat_lahir"
                                                        aria-describedby="emailHelp" required>
                                                    @error('tempat_lahir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="tanggal_lahir" class="form-label"
                                                        style="font-size: 11pt">Tanggal
                                                        Lahir</label>
                                                    <input type="date"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror rounded-2 form-control-sm"
                                                        id="tanggal_lahir" name="tanggal_lahir"
                                                        aria-describedby="emailHelp" required>
                                                    @error('tanggal_lahir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="jenis_kelamin" class="form-label"
                                                        style="font-size: 11pt">Jenis
                                                        Kelamin</label>
                                                    <div>
                                                        <select
                                                            class="form-control @error('jenis_kelamin') is-invalid @enderror rounded-2 form-control-sm"
                                                            name="jenis_kelamin" id="jenis_kelamin">
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    @error('jenis_kelamin')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="agama" class="form-label"
                                                        style="font-size: 11pt">Agama</label>
                                                    <div>
                                                        <select
                                                            class="form-control @error('agama') is-invalid @enderror rounded-2 form-control-sm"
                                                            name="agama" id="agama">
                                                            <option value="islam">Islam</option>
                                                            <option value="hindu">Hindu</option>
                                                            <option value="buddha">Buddha</option>
                                                            <option value="kristen">Kristen</option>
                                                            <option value="konghuchu">Konghuchu</option>
                                                        </select>
                                                    </div>
                                                    @error('agama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="pendidikan_terakhir" class="form-label"
                                                        style="font-size: 11pt">Pendidikan
                                                        Terakhir</label>
                                                    <div>
                                                        <select
                                                            class="form-control @error('pendidikan_terakhir') is-invalid @enderror rounded-2 form-control-sm"
                                                            name="pendidikan_terakhir" id="pendidikan_terakhir">
                                                            <option value="S3">S3</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S1">S1</option>
                                                            <option value="SMA">SMA</option>
                                                            <option value="SMP">SMP</option>
                                                            <option value="SD">SD</option>
                                                        </select>
                                                    </div>
                                                    @error('pendidikan_terakhir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="pekerjaan" class="form-label"
                                                        style="font-size: 11pt">Pekerjaan</label>
                                                    <div>
                                                        <select
                                                            class="form-control @error('pekerjaan') is-invalid @enderror rounded-2 form-control-sm"
                                                            name="pekerjaan" id="pekerjaan">
                                                            <option value="karyawan_swasta">Karyawan Swasta</option>
                                                            <option value="petani">Petani</option>
                                                            <option value="wiraswasta">Wiraswasta</option>
                                                            <option value="PNS">PNS</option>
                                                            <option value="guru/dosen">Guru/Dosen</option>
                                                            <option value="pengemudi">Pengemudi (taksi, ojek online,
                                                                angkutan umum)</option>
                                                            <option value="tenaga_megis">Tenaga Medis</option>
                                                            <option value="nelayan">Nelayan</option>
                                                            <option value="lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    @error('pekerjaan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2">
                                                    <label for="password" class="form-label"
                                                        style="font-size: 11pt">Password</label>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror rounded-2 form-control-sm"
                                                        id="password" name="password" required>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

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

                            <table id="tabel" class="table fs-3 border-bottom-0 table-hover table-responsive">
                                <thead class="table-light text-dark">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">NIK</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Nomor KK</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Nama</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Role</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Status</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Nomor Telepon</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Tempat Lahir</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Tanggal Lahir</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Jenis Kelamin</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Agama</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Pendidikan Terakhir</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Pekerjaan</p>
                                        </th>
                                        <th class="border-bottom-0">
                                            <p class="fw-semibold mb-0">Nomor Rumah</p>
                                        </th>
                                        @can('admin')
                                            <th class="border-bottom-0">
                                                <p class="fw-semibold mb-0">Action
                                                </p>
                                            </th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $i)
                                        <tr>
                                            <th scope="row">{{ $i->nik }}</th>
                                            <td>{{ $i->no_kk }}</td>
                                            <td>{{ $i->name }}</td>
                                            <td>{{ $i->role }}</td>
                                            <td>{{ $i->status }}</td>
                                            <td>{{ $i->no_telp }}</td>
                                            <td>{{ $i->tempat_lahir }}</td>
                                            <td>{{ $i->tanggal_lahir }}</td>
                                            <td>
                                                @if ($i->jenis_kelamin === 'L')
                                                    Laki-Laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>{{ $i->agama }}</td>
                                            <td>{{ $i->pendidikan_terakhir }}</td>
                                            <td>{{ $i->pekerjaan }}</td>
                                            <td>{{ $i->rumah->nomor_rumah }}</td>
                                            @can('admin')
                                                <td style="text-align: center">
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <button class="btn btn-warning btn-sm modal_edit"
                                                            style="margin-right: 4px" data-toggle="modal"
                                                            data-target="#modal_edit" data-id="{{ $i->id }}"
                                                            data-nik="{{ $i->nik }}"
                                                            data-no_kk="{{ $i->no_kk }}"
                                                            data-role="{{ $i->role }}"
                                                            data-status="{{ $i->status }}"
                                                            data-name="{{ $i->name }}"
                                                            data-no_telp="{{ $i->no_telp }}"
                                                            data-tempat_lahir="{{ $i->tempat_lahir }}"
                                                            data-tanggal_lahir="{{ $i->tanggal_lahir }}"
                                                            data-jenis_kelamin="{{ $i->jenis_kelamin }}"
                                                            data-agama="{{ $i->agama }}"
                                                            data-pendidikan_terakhir="{{ $i->pendidikan_terakhir }}"
                                                            data-pekerjaan="{{ $i->pekerjaan }}"
                                                            data-nomor_rumah="{{ $i->rumah->id }}">
                                                            <i class="ti ti-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm modal_verif"
                                                            data-toggle="modal" data-target="#modal_verif"
                                                            data-id="{{ $i->id }}">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                        {{-- <a href="delete/{{ $i->id }}"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="ti ti-trash"></i>
                                                        </a> --}}
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

    @include('register.edit')

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });

        // For edit
        $('.modal_edit').on('click', function(event) {
            var id = $(this).attr('data-id')
            var nik = $(this).attr('data-nik')
            var no_kk = $(this).attr('data-no_kk')
            var name = $(this).attr('data-name')
            var role = $(this).attr('data-role')
            var status = $(this).attr('data-status')
            var no_telp = $(this).attr('data-no_telp')
            var tempat_lahir = $(this).attr('data-tempat_lahir')
            var tanggal_lahir = $(this).attr('data-tanggal_lahir')
            var jenis_kelamin = $(this).attr('data-jenis_kelamin')
            var agama = $(this).attr('data-agama')
            var pendidikan_terakhir = $(this).attr('data-pendidikan_terakhir')
            var pekerjaan = $(this).attr('data-pekerjaan')
            var nomor_rumah = $(this).attr('data-nomor_rumah')

            $('#nik_edit').val(nik);
            $('#no_kk_edit').val(no_kk);
            $('#name_edit').val(name);
            $('#role_edit').val(role);

            if (status === 'pemilik') {
                $('#status_edit_pemilik').prop('checked', true);
            } else if (status === 'penyewa') {
                $('#status_edit_penyewa').prop('checked', true);
            }

            $('#no_telp_edit').val(no_telp);
            $('#jenis_kelamin_edit').val(jenis_kelamin);
            $('#tanggal_lahir_edit').val(tanggal_lahir);
            $('#tempat_lahir_edit').val(tempat_lahir);
            $('#agama_edit').val(agama);
            $('#pendidikan_terakhir_edit').val(pendidikan_terakhir);
            $('#pekerjaan_edit').val(pekerjaan);
            $('#nomor_rumah_edit').val(nomor_rumah);

            $('#form_update').attr('action', 'register/update/' + id);
        });

        // For verif
        $(document).ready(function() {
            $('.modal_verif').on('click', function() {
                var id = $(this).data('id');

                // Menambahkan event handler untuk tombol "Ya" pada modal
                $('#modal_verif').on('click', '.btn-danger', function() {
                    // Jika tombol "Ya" pada modal diklik, arahkan ke URL penghapusan
                    window.location.href = 'delete/' + id;
                });
            });
        });
    </script>

</body>
