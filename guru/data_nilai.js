    // AutoLoad Nama Siswa Saat Pilih Kelas
    $(document).ready(function () {
        $('#semester').change(function () { // Jika Select Box kode_kelas dipilih
            document.getElementById('kode_kelas').value=0;          
        });
        //Menampilkan kelas saat pelajaran dipilih
        $('#kode_pelajaran').change(function () { // Jika Select Box kode_kelas dipilih
            var kode_pelajaran = $('#kode_pelajaran').val();
            var idgr = $('#id_guru').val();
            $.ajax({
                type: 'POST', // Metode pengiriman data menggunakan POST
                url: 'data_kelas.php', // File yang akan memproses data
                data: 'kdpl=' + kode_pelajaran + '&idgr=' + idgr, // Data yang akan dikirim ke file pemroses
                success: function (response) { // Jika berhasil
                    $('#kode_kelas').html(response); // Berikan hasil ke kode_siswa
                }
            });
            $.ajax({
                type: 'POST', // Metode pengiriman data menggunakan POST
                url: 'nilai_kkm.php', // File yang akan memproses data
                data: 'kdpl=' + kode_pelajaran, // Data yang akan dikirim ke file pemroses
                success: function (response) { // Jika berhasil
                    $('#kkm').val(response); // Berikan hasil ke kode_siswa
                }
            });                      
        });

        //Menampilkan nama siswa saat kelas dipilih
        $('#kode_kelas').change(function () { // Jika Select Box kode_kelas dipilih
            var kode_kelas  = $('#kode_kelas').val();
            var idgr        = $('#id_guru').val();
            var kdpl        = $('#kode_pelajaran').val();
            var smt         = $('#semester').val();
            $.ajax({
                type: 'POST', // Metode pengiriman data menggunakan POST
                url: 'data_siswa.php', // File yang akan memproses data
                data: 'kdkl=' + kode_kelas + '&smt=' + smt + '&idgr=' + idgr + '&kdpl=' + kdpl, // Data yang akan dikirim ke file pemroses
                success: function (response) { // Jika berhasil
                    $('#kode_siswa').html(response); // Berikan hasil ke kode_siswa
                }
            });
            $.ajax({
                type: 'POST', // Metode pengiriman data menggunakan POST
                url: 'data_jadwal.php', // File yang akan memproses data
                data: 'kdkl=' + kode_kelas + '&idgr=' + idgr + '&kdpl=' + kdpl, // Data yang akan dikirim ke file pemroses
                success: function (response) { // Jika berhasil
                    $('#id_jadwal').val(response); // Berikan hasil ke kode_siswa
                }
            });
        });
    }); //End Function