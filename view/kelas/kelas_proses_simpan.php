<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $kode_kelas = mysqli_real_escape_string($db, trim($_POST['kode_kelas']));
        $nama_kelas = mysqli_real_escape_string($db, trim($_POST['nama_kelas']));
        $wali_kelas = mysqli_real_escape_string($db, trim($_POST['wali_kelas']));
        $tingkat = mysqli_real_escape_string($db, trim($_POST['tingkat']));
        $semester = mysqli_real_escape_string($db, trim($_POST['semester']));
        $tahun = mysqli_real_escape_string($db, trim($_POST['tahun']));
        $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

        // perintah query untuk menampilkan kode_kelas dari tabel siswa berdasarkan kode_kelas dari hasil submit form
        $query = mysqli_query($db, "SELECT kode_kelas FROM tbl_kelass WHERE kode_kelas='$kode_kelas'")
            or die('Ada kesalahan pada query tampil data kode_kelas: ' . mysqli_error($db));
        $rows = mysqli_num_rows($query);
        // jika kode_kelas sudah ada
        if ($rows > 0) {
            // tampilkan pesan gagal simpan data
            header("location: ../../index.php?alert=4&page=kelas&kode_kelas=$kode_kelas");
        }
        // jika kode_kelas belum ada  
        else {
            // upload file
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk menyimpan data ke tabel siswa
                $insert = mysqli_query($db, "INSERT INTO tbl_kelass(kode_kelas,nama_kelas,wali_kelas,tingkat,semester,tahun,kode_jurusan)
VALUES('$kode_kelas','$nama_kelas','$wali_kelas','$tingkat','$semester','$tahun','$kode_jurusan')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../index.php?alert=1&page=kelas");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>
