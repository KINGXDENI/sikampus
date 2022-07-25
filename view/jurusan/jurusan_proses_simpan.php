<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));
        $nama_jurusan = mysqli_real_escape_string($db, trim($_POST['nama_jurusan']));

        // perintah query untuk menampilkan kode_jurusan dari tabel siswa berdasarkan kode_jurusan dari hasil submit form
        $query = mysqli_query($db, "SELECT kode_jurusan FROM tbl_jurusan WHERE kode_jurusan='$kode_jurusan'")
            or die('Ada kesalahan pada query tampil data kode_jurusan: ' . mysqli_error($db));
        $rows = mysqli_num_rows($query);
        // jika kode_jurusan sudah ada
        if ($rows > 0) {
            // tampilkan pesan gagal simpan data
            header("location: ../../index.php?alert=4&kode_jurusan=$kode_jurusan");
        }
        // jika kode_jurusan belum ada  
        else {
            // upload file
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk menyimpan data ke tabel siswa
                $insert = mysqli_query($db, "INSERT INTO tbl_jurusan(kode_jurusan,nama_jurusan)
VALUES('$kode_jurusan','$nama_jurusan')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../index.php?alert=1&page=jurusan");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>
