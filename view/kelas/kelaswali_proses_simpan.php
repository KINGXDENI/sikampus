<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $kode_kelas = mysqli_real_escape_string($db, trim($_POST['kode_kelas']));
        
        foreach ($_POST['nim'] as $nim) {
        $insert = mysqli_query($db, "INSERT INTO tbl_kelasdetail(kode_kelas,nim)
VALUES('$kode_kelas','$nim')")
        or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
        // cek query
        if ($insert) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../index.php?alert=1&page=kelasWali&kode_kelas=$kode_kelas");
        }
        }
                
            
        }
    
    // tutup koneksi
    mysqli_close($db);
