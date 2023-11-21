<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="tanggal" class="form-label" style="font-size: 11pt">Tanggal Pengeluaran</label>
                        <input type="date"
                            class="form-control form-control-sm rounded-2 @error('tanggal') is-invalid @enderror"
                            id="tanggal_edit" name="tanggal" aria-describedby="emailHelp" required>
                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="jumlah" class="form-label" style="font-size: 11pt">Jumlah</label>
                        <input type="number"
                            class="form-control form-control-sm rounded-2 @error('jumlah') is-invalid @enderror"
                            id="jumlah_edit" name="jumlah" aria-describedby="emailHelp" required>
                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="keterangan" class="form-label" style="font-size: 11pt">keterangan</label>
                        <input type="text"
                            class="form-control form-control-sm rounded-2 @error('keterangan') is-invalid @enderror"
                            id="keterangan_edit" name="keterangan" aria-describedby="emailHelp" required>
                        @error('keterangan')
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
