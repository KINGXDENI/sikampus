 <?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        if (isset($_POST['nim'])) {
            // ambil data hasil submit dari form
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

            // jika foto tidak diubah
            if (empty($nama_file)) {
                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_siswa SET nama = '$nama',
tempat_lahir = '$tempat_lahir',
tanggal_lahir = '$tanggal_lahir',
jenis_kelamin = '$jenis_kelamin',
agama = '$agama',
kode_jurusan = '$kode_jurusan',
alamat = '$alamat',
no_hp = '$no_hp'
WHERE nim = '$nim'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: ../../index.php?alert=2&page=siswa");
                }
            }
            // jika foto diubah
            else {
                // upload file
                if (move_uploaded_file($tmp_file, $path)) {
                    // Jika file berhasil diupload, Lakukan : 
                    // perintah query untuk mengubah data pada tabel siswa
                    $update = mysqli_query($db, "UPDATE tbl_admin SET foto = '$nama_file'
                    WHERE nim = '$nim'");
                    $update .= mysqli_query($db, "UPDATE tbl_siswa SET nama = '$nama',
tempat_lahir = '$tempat_lahir',
tanggal_lahir = '$tanggal_lahir',
jenis_kelamin = '$jenis_kelamin',
agama = '$agama',
kode_jurusan = '$kode_jurusan',
alamat = '$alamat',
no_hp = '$no_hp',
foto = '$nama_file'
WHERE nim = '$nim'")
                        or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                    // cek query
                    if ($update) {
                        // jika berhasil tampilkan pesan berhasil ubah data
                        header("location: ../../index.php?alert=2&page=siswa");
                    }
                }
            }
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>