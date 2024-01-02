{{-- Modal Add --}}

<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Iuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="iuran/register" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="warga_id">Warga</label>
                        <div>
                            <select class="form-control form-control-sm rounded-2" name="warga_id" id="warga_id">
                                @foreach ($warga->sortBy('name') as $i)
                                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="rumah_id">Nomor Rumah</label>
                        <div>
                            <select class="form-control form-control-sm rounded-2" name="rumah_id" id="rumah_id">
                                @foreach ($rumah as $i)
                                    <option value="{{ $i->id }}">{{ $i->nomor_rumah }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bulan">Jumlah Bulan</label>
                        <select class="form-control form-control-sm @error('bulan') is-invalid @enderror rounded-2"
                            id="bulan" name="bulan">
                            <option value="" disabled hidden>Pilih Jumlah Bulan
                            </option>
                            <option value="1">1 Bulan</option>
                            <option value="2">2 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="4">4 Bulan</option>
                            <option value="5">5 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="7">7 Bulan</option>
                            <option value="8">8 Bulan</option>
                            <option value="9">9 Bulan</option>
                            <option value="10">10 Bulan</option>
                            <option value="11">11 Bulan</option>
                            <option value="12">12 Bulan</option>
                        </select>
                        <div class="form-text" style="font-size: 12px">Pilih jumlah bulan yang akan
                            dibayarkan.
                        </div>
                        @error('bulan')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total_bayar">Total Pembayaran</label>
                        <input type="number" class="form-control form-control-sm rounded-2" id="total_bayar"
                            name="total_bayar">
                    </div>

                    <div class="mb-3">
                        <label for="metode_pembayaran_id">Metode Pembayaran</label>
                        <div>
                            <select
                                class="form-control form-control-sm @error('metode_pembayaran_id') is-invalid @enderror rounded-2"
                                name="metode_pembayaran_id" id="metode_pembayaran_id" required>

                                @foreach ($metode_pembayaran as $q)
                                    <option value="{{ $q->id }}">{{ $q->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status_edit">Status</label>
                        <select class="form-control form-control-sm rounded-2" name="status" id="status">
                            <option value="validasi">Validasi</option>
                            <option value="valid">Valid</option>
                            <option value="invalid">Invalid</option>
                        </select>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="informasi_pembayaran">Informasi Pembayaran</label>
                        <input type="text" class="form-control form-control-sm rounded-2"
                            id="informasi_pembayaran_edit" style="background-color: white" readonly>
                    </div> --}}

                    {{-- hidden --}}

                    <input
                        class="form-control form-control-sm @error('bukti_pembayaran') is-invalid @enderror rounded-2"
                        type="hidden" id="bukti_pembayaran" name="bukti_pembayaran" value="">

                    {{-- end hidden --}}

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Add End --}}


{{-- Modal Edit --}}

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
                <form action="" id="form_update" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="status_edit">Status</label>
                        <select class="form-control form-control-sm rounded-2" name="status" id="status_edit">
                            <option value="validasi">Validasi</option>
                            <option value="valid">Valid</option>
                            <option value="invalid">Invalid</option>
                        </select>
                    </div>

                    {{-- hidden --}}

                    <div class="mb-3" hidden>
                        <label for="bulan">Jumlah Bulan</label>
                        <select class="form-control form-control-sm @error('bulan') is-invalid @enderror rounded-2"
                            id="bulan_edit" name="bulan">
                            <option value="" disabled hidden>Pilih Jumlah Bulan
                            </option>
                            <option value="1">1 Bulan</option>
                            <option value="2">2 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="4">4 Bulan</option>
                            <option value="5">5 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="7">7 Bulan</option>
                            <option value="8">8 Bulan</option>
                            <option value="9">9 Bulan</option>
                            <option value="10">10 Bulan</option>
                            <option value="11">11 Bulan</option>
                            <option value="12">12 Bulan</option>
                        </select>
                        <div class="form-text" style="font-size: 12px">Pilih jumlah bulan yang akan
                            dibayarkan.
                        </div>
                        @error('bulan')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3" hidden>
                        <label for="total_bayar">Total Pembayaran</label>
                        <input type="number" class="form-control form-control-sm rounded-2" id="total_bayar_edit"
                            name="total_bayar">
                    </div>

                    <div class="mb-3" hidden>
                        <label for="metode_pembayaran_id">Metode Pembayaran</label>
                        <div>
                            <select
                                class="form-control form-control-sm @error('metode_pembayaran_id') is-invalid @enderror rounded-2"
                                name="metode_pembayaran_id" id="metode_pembayaran_id_edit">

                                @foreach ($metode_pembayaran as $q)
                                    <option value="{{ $q->id }}">{{ $q->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="rumah_id_edit" name="rumah_id">

                    <input type="hidden" class="form_control" id="warga_id_edit" name="warga_id">

                    {{-- end hidden --}}

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit End --}}

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
