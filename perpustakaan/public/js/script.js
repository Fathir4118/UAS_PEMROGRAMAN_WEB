$(function() {

    // Tombol Tambah
    $('.tombolTambahData').on('click', function() {
        $('#judulModal').html('Tambah Data Buku');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        // Reset isi form
        $('#judul').val('');
        $('#penulis').val('');
        $('#penerbit').val('');
        $('#tahun').val('');
        $('#id').val('');
        // Ganti Action Form ke Tambah
        $('.modal-body form').attr('action', 'http://localhost/perpustakaan/buku/tambah');
    });

    // Tombol Ubah
    $('.tampilModalUbah').on('click', function() {
        
        $('#judulModal').html('Ubah Data Buku');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/perpustakaan/buku/ubah');

        const id = $(this).data('id');
        
        // Ambil data via AJAX
        $.ajax({
            url: 'http://localhost/perpustakaan/buku/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#judul').val(data.judul);
                $('#penulis').val(data.penulis);
                $('#penerbit').val(data.penerbit);
                $('#tahun').val(data.tahun);
                $('#id').val(data.id);
            }
        });
        
    });

});