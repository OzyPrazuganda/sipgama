<!-- Modal Tambah Data-->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" id="form_update" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="no_kk" class="form-label" style="font-size: 11pt">Nomor KK</label>
                        <input type="string"
                            class="form-control rounded-2 form-control-sm @error('no_kk') is-invalid @enderror"
                            id="no_kk_edit" name="no_kk" aria-describedby="emailHelp" required>
                        @error('no_kk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="nik" class="form-label" style="font-size: 11pt">NIK</label>
                        <input type="string"
                            class="form-control rounded-2 form-control-sm @error('nik') is-invalid @enderror"
                            id="nik_edit" name="nik" aria-describedby="emailHelp" required>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="name" class="form-label" style="font-size: 11pt">Nama</label>
                        <input type="text"
                            class="form-control rounded-2 form-control-sm @error('name') is-invalid @enderror"
                            id="name_edit" name="name" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="role" class="form-label" style="font-size: 11pt">Role</label>
                        <div>
                            <select class="form-control rounded-2 form-control-sm @error('role') is-invalid @enderror"
                                name="role" id="role_edit">
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

                    <div class="ml-2 mb-2">
                        <label for="status" class="form-label" style="font-size: 11pt">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_edit_pemilik"
                                value="valid">
                            <label class="form-check-label" for="status_edit_pemilik">
                                Pemilik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_edit_penyewa"
                                value="invalid">
                            <label class="form-check-label" for="status_edit_penyewa">
                                Penyewa
                            </label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="no_telp" class="form-label" style="font-size: 11pt">Nomor Telepon</label>
                        <input type="number"
                            class="form-control rounded-2 form-control-sm @error('no_telp') is-invalid @enderror"
                            id="no_telp_edit" name="no_telp" aria-describedby="emailHelp" required>
                        @error('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="tempat_lahir" class="form-label" style="font-size: 11pt">Tempat
                            Lahir</label>
                        <input type="text"
                            class="form-control rounded-2 form-control-sm @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir_edit" name="tempat_lahir" aria-describedby="emailHelp" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="tanggal_lahir" class="form-label" style="font-size: 11pt">Tanggal
                            Lahir</label>
                        <input type="date"
                            class="form-control rounded-2 form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir_edit" name="tanggal_lahir" aria-describedby="emailHelp" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="jenis_kelamin" class="form-label" style="font-size: 11pt">Jenis
                            Kelamin</label>
                        <div>
                            <select
                                class="form-control rounded-2 form-control-sm @error('jenis_kelamin') is-invalid @enderror"
                                name="jenis_kelamin" id="jenis_kelamin_edit">
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
                        <label for="agama" class="form-label" style="font-size: 11pt">Agama</label>
                        <div>
                            <select class="form-control rounded-2 form-control-sm @error('agama') is-invalid @enderror"
                                name="agama" id="agama_edit">
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
                        <label for="pendidikan_terakhir" class="form-label" style="font-size: 11pt">Pendidikan
                            Terakhir</label>
                        <div>
                            <select
                                class="form-control rounded-2 form-control-sm @error('pendidikan_terakhir') is-invalid @enderror"
                                name="pendidikan_terakhir" id="pendidikan_terakhir_edit">
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
                        <label for="pekerjaan" class="form-label" style="font-size: 11pt">Pekerjaan</label>
                        <div>
                            <select
                                class="form-control rounded-2 form-control-sm @error('pekerjaan') is-invalid @enderror"
                                name="pekerjaan" id="pekerjaan_edit">
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

                    {{-- <div class="mb-2">
                                                    <label for="password" class="form-label" style="font-size: 11pt">Password</label>
                                                    <input type="password"
                                                        class="form-control rounded-2 form-control-sm @error('password') is-invalid @enderror"
                                                        id="password" name="password" required>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror --}}

                    <div class="mb-2">
                        <label for="rumah_id" class="form-label" style="font-size: 11pt">Nomor Rumah</label>
                        <div>
                            <select
                                class="form-control rounded-2 form-control-sm @error('rumah_id') is-invalid @enderror"
                                name="rumah_id" id="rumah_id_edit">
                                @foreach ($rumah as $i)
                                    <option value="{{ $i->id }}">
                                        {{ $i->nomor_rumah }}</option>
                                @endforeach
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

{{-- Modal Upload --}}

<div class="modal fade" id="modal_upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="register/import" id="form_upload" method="post" enctype="multipart/form-data">
                    @csrf

                    <div style="display: flex; align-items: center;">
                        <input class="form-control form-control-sm rounded-2 @error('file') is-invalid @enderror"
                            type="file" id="file" name="file" style="flex: 1;" required>
                        @error('file')
                            <div class="invalid-feedback" style="font-size: 12px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-sm ml-2 text-align: right">
                            <i class="ti ti-file-upload"></i>
                        </button>
                    </div>
                    <div id="fileDes" class="form-text ml-1" style="font-size: 9pt;">File must be in .XLSX
                        extension.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- End Modal Upload --}}

{{-- Modal Verif --}}
<div class="modal fade" id="modal_verif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div
                style="height:200px; width:500px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h6>Yakin ingin menghapus data?</h6>
                <div class="d-flex mt-4">
                    <button type="button" class="btn btn-danger mr-2" style="width: 100px;">Ya</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        style="width: 100px;">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
