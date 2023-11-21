<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/register" id="form_update" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="nama_barang" class="form-label" style="font-size: 11pt">Nama Barang</label>
                        <input type="string"
                            class="form-control form-control-sm rounded-2 @error('nama_barang') is-invalid @enderror"
                            id="nama_barang_edit" name="nama_barang" aria-describedby="emailHelp" required>
                        @error('nama_barang')
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

                    <label for="kondisi" class="form-label" style="font-size: 11pt">Kondisi</label>
                    <div class="ml-2 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kondisi" id="kondisi_edit"
                                value="rusak">
                            <label class="form-check-label" for="kondisi">
                                Rusak
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kondisi" id="kondisi2_edit"
                                value="hilang">
                            <label class="form-check-label" for="kondisi2">
                                Hilang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kondisi" id="kondisi3_edit"
                                value="ganti">
                            <label class="form-check-label" for="kondisi3">
                                Perlu diganti
                            </label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="keterangan" class="form-label" style="font-size: 11pt">Keterangan</label>
                        <input type="text"
                            class="form-control form-control-sm rounded-2 @error('keterangan') is-invalid @enderror"
                            id="keterangan_edit" name="keterangan" required>
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
