<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- hidden --}}
                    <input type="hidden" class="form-control" id="rumah_id" name="rumah_id"
                        value="{{ auth()->user()->rumah->id }}" readonly>

                    <input type="hidden" class="form-control" id="total_bayar" name="total_bayar">

                    <input type="hidden" id="status" name="status" value="validasi">
                    {{-- hidden end --}}

                    <div class="mb-2 display: flex; align-items: center;">
                        <label for="bulan" class="form-label" style="font-size: 11pt">Jumlah Bulan</label>
                        <select class="form-control form-control-sm @error('bulan') is-invalid @enderror rounded-2"
                            id="bulan_edit" name="bulan">
                            <option value="1">1 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="9">9 Bulan</option>
                        </select>
                        <div id="keteranganDes" class="form-text">Pilih jumlah bulan yang akan
                            dibayarkan.
                        </div>
                        @error('bulan')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="total_bayar" class="form-label" style="font-size: 11pt">Total Pembayaran</label>
                        <input type="text" class="form-control form-control-sm rounded-2" id="total_bayar_view"
                            name="total_bayar" style="background-color: white" readonly>
                    </div>

                    <div class="mb-2">
                        <label for="metode_pembayaran_id" class="form-label" style="font-size: 11pt">Metode
                            Pembayaran</label>
                        <div>
                            <select
                                class="form-control form-control-sm @error('metode_pembayaran_id') is-invalid @enderror rounded-2"
                                name="metode_pembayaran_id" id="metode_pembayaran_edit">
                                @foreach ($metode_pembayaran as $q)
                                    <option value="{{ $q->id }}">{{ $q->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="informasi_pembayaran" class="form-label" style="font-size: 11pt">Informasi
                            Pembayaran</label>
                        <input type="text" class="form-control form-control-sm rounded-2" id="informasi_pembayaran"
                            style="background-color: white" readonly>
                    </div>

                    <div class="mb-2">
                        <label for="bukti_pembayaran" class="form-label" style="font-size: 11pt">Bukti
                            Pembayaran</label>
                        <input type="file"
                            class="form-control form-control-sm @error('bukti_pembayaran') is-invalid @enderror rounded-2"
                            type="file" id="bukti_pembayaran" name="bukti_pembayaran">
                        @error('bukti_pembayaran')
                            <div class="invalid-feedback" style="font-size: 12px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Show --}}
<div class="modal fade" id="modal_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="image-container">
                    <img id="image" src="" alt="Image" style="width: 100%; height: auto;">
                </div>
            </div>

        </div>
    </div>
</div>
