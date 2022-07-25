<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $kode_mapel = mysqli_real_escape_string($db, trim($_POST['kode_mapel']));
        $nama_mapel = mysqli_real_escape_string($db, trim($_POST['nama_mapel']));
        $semester = mysqli_real_escape_string($db, trim($_POST['semester']));
        $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

        // perintah query untuk menampilkan kode_mapel dari tabel siswa berdasarkan kode_mapel dari hasil submit form
        $query = mysqli_query($db, "SELECT kode_mapel FROM tbl_matapelajaran WHERE kode_mapel='$kode_mapel'")
            or die('Ada kesalahan pada query tampil data kode_mapel: ' . mysqli_error($db));
        $rows = mysqli_num_rows($query);
        // jika kode_mapel sudah ada
        if ($rows > 0) {
            // tampilkan pesan gagal simpan data
            header("location: ../../index.php?alert=4&kode_mapel=$kode_mapel");
        }
        // jika kode_mapel belum ada  
        else {
            // upload file
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk menyimpan data ke tabel siswa
                $insert = mysqli_query($db, "INSERT INTO tbl_matapelajaran(kode_mapel,nama_mapel,semester,kode_jurusan)
VALUES('$kode_mapel','$nama_mapel','$semester','$kode_jurusan')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../index.php?alert=1&page=mapel");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>
