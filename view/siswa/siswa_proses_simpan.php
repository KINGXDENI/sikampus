<?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
        $user = mysqli_real_escape_string($db, trim($_POST['nim'])); 
        $pass = mysqli_real_escape_string($db, trim(md5($_POST['nim'])));
        $level = mysqli_real_escape_string($db, trim($_POST['level']));
        $email = mysqli_real_escape_string($db, trim($_POST['email']));
        $code = 0;
        $status = "notverified";
        $nim = mysqli_real_escape_string($db, trim($_POST['nim']));
        $nama = mysqli_real_escape_string($db, trim($_POST['nama']));
        $tempat_lahir = mysqli_real_escape_string($db, trim($_POST['tempat_lahir']));
        $tanggal_lahir = mysqli_real_escape_string($db, trim(date(
            'Y-m-d',
            strtotime($_POST['tanggal_lahir'])
        )));
        $jenis_kelamin = mysqli_real_escape_string($db, trim($_POST['jenis_kelamin']));
        $agama = mysqli_real_escape_string($db, trim($_POST['agama']));
        $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));
        $alamat = mysqli_real_escape_string($db, trim($_POST['alamat']));
        $no_hp = mysqli_real_escape_string($db, trim($_POST['no_hp']));
        $nama_file = $_FILES['foto']['name'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        // Set path folder tempat menyimpan filenya
        $path = "../../foto/" . $nama_file;

        // perintah query untuk menampilkan nim dari tabel siswa berdasarkan nim dari hasil submit form
        $query = mysqli_query($db, "SELECT nim FROM tbl_siswa WHERE nim='$nim'")
            or die('Ada kesalahan pada query tampil data nim: ' . mysqli_error($db));
        $rows = mysqli_num_rows($query);
        // jika nim sudah ada
        if ($rows > 0) {
            // tampilkan pesan gagal simpan data
            header("location: ../../index.php?alert=4&page=siswa&nim=$nim");
        }
        // jika nim belum ada
        else {
            // upload file
            if (move_uploaded_file($tmp_file, $path)) {
            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel siswa
            $insert = mysqli_query($db, "INSERT INTO tbl_siswa(nim,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,kode_jurusan,alamat,no_hp,foto)
VALUES('$nim','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$kode_jurusan','$alamat','$no_hp','$nama_file')");
            $insert .= mysqli_query($db, "INSERT INTO tbl_admin (user,pass,level,email,code,status,foto)
VALUES('$user','$pass','$level','$email','$code','$status','$nama_file')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
            
            
                // cek query
                if ($insert) {

                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../index.php?alert=1&page=siswa");
                }
            }
        }
    }
    // tutup koneksi
    mysqli_close($db);
