<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $kode_hari = mysqli_real_escape_string($db, trim($_POST['kode_hari']));
        $nama_hari = mysqli_real_escape_string($db, trim(strtoupper($_POST['nama_hari'])));

        // perintah query untuk menampilkan kode_hari dari tabel siswa berdasarkan kode_hari dari hasil submit form
        $query = mysqli_query($db, "SELECT kode_hari FROM tbl_hari WHERE kode_hari='$kode_hari'")
            or die('Ada kesalahan pada query tampil data kode_hari: ' . mysqli_error($db));
        $rows = mysqli_num_rows($query);
        // jika kode_hari sudah ada
        if ($rows > 0) {
            // tampilkan pesan gagal simpan data
            header("location: ../../index.php?alert=4&kode_hari=$kode_hari");
        }
        // jika kode_hari belum ada  
        else {
            // upload file
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk menyimpan data ke tabel siswa
                $insert = mysqli_query($db, "INSERT INTO tbl_hari(kode_hari,nama_hari)
VALUES('$kode_hari','$nama_hari')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../index.php?alert=1&page=hari");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>
