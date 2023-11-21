<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Metode Pembayaran
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="nomor_pembayaran" class="form-label" style="font-size: 11pt">Nomor
                            Pembayaran</label>
                        <input type="text"
                            class="form-control rounded-2 form-control-sm @error('nomor_pembayaran') is-invalid @enderror"
                            id="nomor_pembayaran_edit" name="nomor_pembayaran" aria-describedby="emailHelp" required>
                        @error('nomor_pembayaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="nama" class="form-label" style="font-size: 11pt">Atas Nama</label>
                        <input type="text"
                            class="form-control rounded-2 form-control-sm @error('nama') is-invalid @enderror"
                            id="nama_edit" name="nama" aria-describedby="emailHelp" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="metode_pembayaran" class="form-label" style="font-size: 11pt">Metode
                            Pembayaran</label>
                        <div>
                            <select
                                class="form-control rounded-2 form-control-sm @error('metode_pembayaran') is-invalid @enderror"
                                name="metode_pembayaran" id="metode_pembayaran_edit">
                                <option value="bri">BRI</option>
                                <option value="bca">BCA</option>
                                <option value="mandiri">Mandiri</option>
                                <option value="gopay">Gopay</option>
                                <option value="dana">Dana</option>
                                <option value="shopeepay">ShopeePay</option>
                                <option value="ovo">Ovo</option>
                                <option value="qris">Qris</option>
                                <option value="ditempat">Langsung/Ditempat</option>
                            </select>
                        </div>
                        @error('metode_pembayaran')
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
