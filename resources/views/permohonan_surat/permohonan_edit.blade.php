<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" class="form-control @error('users_id') is-invalid @enderror"
                        id="users_id_edit" name="users_id" aria-describedby="emailHelp" required>

                    <input type="hidden" class="form-control @error('status') is-invalid @enderror" id="status_edit"
                        name="status" aria-describedby="emailHelp" required>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea type="number" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan_edit"
                            name="keterangan" aria-describedby="emailHelp" required></textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
