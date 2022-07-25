<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        if (isset($_POST['kode_hari'])) {
            // ambil data hasil submit dari form
            $kode_hari = mysqli_real_escape_string($db, trim($_POST['kode_hari']));
            $nama_hari = mysqli_real_escape_string($db, trim($_POST['nama_hari']));

                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_hari SET nama_hari = '$nama_hari'


WHERE kode_hari = '$kode_hari'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: ../../index.php?alert=2&page=hari");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>