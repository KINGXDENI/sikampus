<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $kode_jadwal = mysqli_real_escape_string($db, trim($_POST['kode_jadwal']));
        $semester = mysqli_real_escape_string($db, trim($_POST['semester']));
        $tahun_ajaran = mysqli_real_escape_string($db, trim($_POST['tahun_ajaran']));

        // perintah query untuk menampilkan kode_jadwal dari tabel siswa berdasarkan kode_jadwal dari hasil submit form
        $query = mysqli_query($db, "SELECT kode_jadwal FROM tbl_jadwal WHERE kode_jadwal='$kode_jadwal'")
            or die('Ada kesalahan pada query tampil data kode_jadwal: ' . mysqli_error($db));
        $rows = mysqli_num_rows($query);
        // jika kode_jadwal sudah ada
        if ($rows > 0) {
            // tampilkan pesan gagal simpan data
            header("location: ../../index.php?alert=4&kode_jadwal=$kode_jadwal");
        }
        // jika kode_jadwal belum ada  
        else {
            // upload file
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk menyimpan data ke tabel siswa
                $insert = mysqli_query($db, "INSERT INTO tbl_jadwal(kode_jadwal,semester,tahun_ajaran)
VALUES('$kode_jadwal','$semester','$tahun_ajaran')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../index.php?alert=1&page=jadwal");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>
