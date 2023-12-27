<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#tabel').DataTable();
    });

    // For Edit Form
    $('.modal_edit').on('click', function(event) {
        var id = $(this).attr('data-id')
        var rumah_id = $(this).attr('data-rumah_id')
        var status = $(this).attr('data-status')
        var metode_pembayaran = $(this).attr('data-metode_pembayaran')
        var total = $(this).attr('data-total')
        var bulan = $(this).attr('data-bulan')
        var bukti_pembayaran = $(this).attr('data-bukti_pembayaran')

        $('#bulan_edit').val(bulan);
        $('#total_bayar_edit').val(total);
        $('#metode_pembayaran_edit').val(metode_pembayaran);
        $('#status_edit').val(status);

        $('#form_update').attr('action', 'pembayaran/update/' + id);
    });

    // for Doc Form
    document.addEventListener('DOMContentLoaded', function() {
        var currentUserBiaya = {!! json_encode(auth()->user()->rumah->tipe_rumah->biaya) !!};
        var metodePembayaran = {!! json_encode($metode_pembayaran->keyBy('id')) !!};

        var metodePembayaranSelect = document.getElementById('metode_pembayaran_id');
        var informasiPembayaranInput = document.getElementById('informasi_pembayaran');
        var bulanSelect = document.getElementById('bulan');
        var totalBayarInputView = document.getElementById('total_bayar');
        var totalBayarInput = document.getElementById('total_bayar_view');

        bulanSelect.addEventListener('change', function() {
            var selectedBulan = bulanSelect.value;

            if (selectedBulan && selectedBulan > 0) {
                var totalPembayaran = currentUserBiaya * selectedBulan;

                totalBayarInput.value = totalPembayaran.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

            } else {
                totalBayarInput.value = '';
            }
        });

        bulanSelect.addEventListener('change', function() {
            var selectedBulan = bulanSelect.value;

            if (selectedBulan && selectedBulan > 0) {
                var totalPembayaran = currentUserBiaya * selectedBulan;

                totalBayarInputView.value = totalPembayaran;

            } else {
                totalBayarInput.value = '';
            }
        });

        metodePembayaranSelect.addEventListener('change', function() {
            var selectedMetode = metodePembayaranSelect.value;

            if (selectedMetode in metodePembayaran) {
                var namaPembayaran = metodePembayaran[selectedMetode].nama;
                var nomorPembayaran = metodePembayaran[selectedMetode].nomor_pembayaran;
                var informasiPembayaran = nomorPembayaran + ' - ' + 'A/N ' + namaPembayaran;
                informasiPembayaranInput.value = informasiPembayaran;
            } else {
                informasiPembayaranInput.value = '';
            }
        });
    });

    // Show Image
    $(document).on('click', '.modal_show', function() {
        var fileId = $(this).data('id');
        var filePath = $(this).data('file');

        // Update the iframe source
        $('#image').attr('src', 'storage/' + filePath);
    });
</script>
