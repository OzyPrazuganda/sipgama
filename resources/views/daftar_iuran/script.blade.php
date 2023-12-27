<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#tabel').DataTable();
    });

    // For Edit
    $('.modal_edit').on('click', function(event) {
        var id = $(this).attr('data-id')
        var rumah_id = $(this).attr('data-rumah_id')
        var status = $(this).attr('data-status')
        var metode_pembayaran = $(this).attr('data-metode_pembayaran')
        var total = $(this).attr('data-total')
        var bulan = $(this).attr('data-bulan')
        var bukti_pembayaran = $(this).attr('data-bukti_bayar')

        $('#rumah_id_edit').val(rumah_id);
        $('#bulan_edit').val(bulan);
        $('#total_bayar_edit').val(total);
        $('#metode_pembayaran_id_edit').val(metode_pembayaran);
        $('#status_edit').val(status);
        $('#bukti_pembayaran_edit').val(bukti_pembayaran);

        $('#form_update').attr('action', 'iuran/update/' + id);
    });

    // For Add Form

    document.addEventListener('DOMContentLoaded', function() {
        var Biaya = {!! json_encode($pembayaran->keyBy('id')) !!};
        var bulanSelect = document.getElementById('bulan');
        var totalBayarInput = document.getElementById('total_bayar');

        bulanSelect.addEventListener('change', function() {
            var selectedBulan = bulanSelect.value;

            if (selectedBulan && selectedBulan > 0) {
                var totalPembayaran = Biaya * selectedBulan;

                totalBayarInput.value = totalPembayaran;

            } else {
                totalBayarInput.value = '';
            }
        })
    });

    // For view the image (Bukti Pembayaran)
    $(document).ready(function() {
        var lastShownImageId = null;

        $(document).on('click', '.image_show', function() {
            var targetImageId = $(this).data('target');
            var filePath = $(this).data('file');
            var $targetImage = $('#' + targetImageId);

            // If the same image button is clicked again
            if (lastShownImageId === targetImageId) {
                $targetImage.attr('src', ''); // Hide the image
                lastShownImageId = null;
            } else {
                // Hide the previously shown image
                if (lastShownImageId) {
                    $('#' + lastShownImageId).attr('src', '');
                }

                // Show the new image
                $targetImage.attr('src', 'storage/' + filePath);
                lastShownImageId = targetImageId;
            }
        });
    });

    // For verif
    $(document).ready(function() {
        $('.modal_verif').on('click', function() {
            var id = $(this).data('id');

            // Menambahkan event handler untuk tombol "Ya" pada modal
            $('#modal_verif').on('click', '.btn-danger', function() {
                // Jika tombol "Ya" pada modal diklik, arahkan ke URL penghapusan
                window.location.href = 'iuran/delete/' + id;
            });
        });
    });
</script>
