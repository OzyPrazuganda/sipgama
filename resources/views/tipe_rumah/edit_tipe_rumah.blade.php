<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-2">
            <div class="modal-header">
                <h5 class="modal-title" id="ModaleditLabel">Edit Data Tipe Rumah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="nomor_tipe" class="form-label" style="font-size: 11pt">Tipe Rumah</label>
                        <input type="text"
                            class="form-control rounded-2 form-control-sm @error('nomor_tipe') is-invalid @enderror"
                            id="nomor_tipe_edit" name="nomor_tipe" aria-describedby="emailHelp" required>
                        @error('nomor_tipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="keterangan" class="form-label" style="font-size: 11pt">Keterangan</label>
                        <input type="text"
                            class="form-control rounded-2 form-control-sm @error('keterangan') is-invalid @enderror"
                            id="keterangan_edit" name="keterangan" aria-describedby="emailHelp">
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="biaya" class="form-label" style="font-size: 11pt">Jumlah Iuran</label>
                        <input type="number"
                            class="form-control rounded-2 form-control-sm @error('biaya') is-invalid @enderror"
                            id="biaya_edit" name="biaya" aria-describedby="emailHelp" required>
                        @error('biaya')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary rounded-2">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal verif --}}
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
