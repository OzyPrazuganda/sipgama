<!-- Modal Edit -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="nomor_surat" class="form-label" style="font-size: 11pt">No. Surat</label>
                        <input type="text"
                            class="form-control form-control-sm rounded-2 @error('nomor_surat') is-invalid @enderror"
                            id="nomor_surat_edit" name="nomor_surat" aria-describedby="emailHelp">
                        @error('nomor_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2" hidden>
                        <label for="users_id" class="form-label" style="font-size: 11pt">Nama</label>
                        <div>
                            <select class="form-control form-control-sm rounded-2" name="users_id" id="users_id_edit">
                                @foreach ($users as $i)
                                    <option value="{{ $i->id }}">{{ $i->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-2" hidden>
                        <label for="jenis" class="form-label" style="font-size: 11pt">Jenis Surat</label>
                        <select class="form-control form-control-sm rounded-2 mb-2" name="jenis" id="jenis_edit">
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
                        <label for="status" class="form-label" style="font-size: 11pt">Status</label>
                        <div>
                            <select class="form-control form-control-sm rounded-2 @error('status') is-invalid @enderror"
                                name="status" id="status_edit">
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
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Upload -->
<div class="modal fade" id="modal_upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Dokumen Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_upload" method="post" enctype="multipart/form-data">
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
                    <div id="fileDes" class="form-text ml-1" style="font-size: 9pt;">Max size 2MB with PDF
                        extension.
                    </div>

                    {{-- hidden --}}

                    <input type="file" class="form-control @error('oldfile') is-invalid @enderror" id="oldfile"
                        name="oldfile" aria-describedby="emailHelp" hidden>

                    <input type="text"
                        class="form-control form-control-sm rounded-2 @error('nomor_surat') is-invalid @enderror"
                        id="nomor_surat_upload" name="nomor_surat" aria-describedby="emailHelp" hidden>

                    <select class="form-control" name="users_id" id="users_id_upload" hidden>
                        @foreach ($users as $i)
                            <option value="{{ $i->id }}">{{ $i->name }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text"
                        class="form-control form-control-sm rounded-2 @error('jenis') is-invalid @enderror"
                        id="jenis_upload" name="jenis" aria-describedby="emailHelpjenis" hidden>

                    <select class="form-control @error('status') is-invalid @enderror" name="status"
                        id="status_upload" hidden>
                        <option value="pengajuan">Pengajuan</option>
                        <option value="validasi">Valid</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="batal">Batal</option>
                    </select>

                    {{-- end hidden --}}
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Show --}}
<div class="modal fade" id="modal_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dokumen Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="file" name="file" src="" frameborder="0"
                    style="width: 100%; height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>

{{-- Modal Verification --}}
<div class="modal fade" id="modal_verif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div
                style="height:200px; width:500px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h6>Masukkan nomor surat</h6>

                <form action="" id="form_verif" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-2">
                        <input type="text" class="form-control form-control-sm rounded-2" id="nomor_surat"
                            name="nomor_surat" aria-describedby="emailHelpjenis" required>
                    </div>

                    <input type="hidden" id="users_id_verif" name="users_id" value="{{ $i->users_id }}">
                    <input type="hidden" id="jenis_verif" name="jenis" value="{{ $i->jenis }}">
                    <input type="hidden" name="status" value="selesai">
                    <input type="hidden" id="file_verif" name="file" value="">

                    <div class="d-flex mt-4">
                        <button type="submit" class="btn btn-primary mr-2" style="width: 100px;">Selesai</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            style="width: 100px;">Batal</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
