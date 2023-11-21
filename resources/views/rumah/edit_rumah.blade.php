<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rumah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="nomor_rumah" class="form-label" style="font-size: 11pt">Nomor Rumah</label>
                        <input type="number"
                            class="form-control rounded-2 form-control-sm @error('nomor_rumah') is-invalid @enderror"
                            id="nomor_rumah_edit" name="nomor_rumah" aria-describedby="emailHelp" required>
                        @error('nomor_rumah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="ml-2 mb-2">
                        <label for="status" class="form-label" style="font-size: 11pt">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_edit_valid"
                                value="valid">
                            <label class="form-check-label" for="status_edit_valid">
                                Valid
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_edit_invalid"
                                value="invalid">
                            <label class="form-check-label" for="status_edit_invalid">
                                Invalid
                            </label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="tipe_rumah_id" class="form-label" style="font-size: 11pt">Tipe Rumah</label>
                        <div>
                            <select
                                class="form-control rounded-2 form-control-sm @error('tipe_rumah_id') is-invalid @enderror"
                                name="tipe_rumah_id" id="tipe_rumah_edit">
                                @foreach ($tipe_rumah as $i)
                                    <option value="{{ $i->id }}">{{ $i->nomor_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
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
