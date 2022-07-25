 <?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['ganti'])) {
        if (isset($_POST['id'])) {
            // ambil data hasil submit dari form
            $id_pengaturan = mysqli_real_escape_string($db, trim($_POST['id_pengaturan']));
            $jumlah_data = mysqli_real_escape_string($db, trim($_POST['jumlah_data']));
            $id = mysqli_real_escape_string($db, trim($_POST['id']));
            $user = mysqli_real_escape_string($db, trim($_POST['user']));
            $pass = mysqli_real_escape_string($db, trim(md5($_POST['pass'])));
            $level = mysqli_real_escape_string($db, trim($_POST['level']));
            $code = 0;
            $status = "notverified";
            $email = mysqli_real_escape_string($db, trim($_POST['email']));
            // jika foto tidak diubah
            if (empty($pass)) {
                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_admin SET user = '$user',
pass = '$pass',
level = '$level',
status = '$status',
code = '$code',
email = '$email'
WHERE id_admin = '$id'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: ../../index.php?alert=2&page=profile&id=$id");
                }
            }
        }
    }

    if (isset($_POST['simpan'])) {
        if (isset($_POST['id'])) {
            // ambil data hasil submit dari form
            $id_pengaturan = mysqli_real_escape_string($db, trim($_POST['id_pengaturan']));
            $jumlah_data = mysqli_real_escape_string($db, trim($_POST['jumlah_data']));
            $id = mysqli_real_escape_string($db, trim($_POST['id']));
            $user = mysqli_real_escape_string($db, trim($_POST['user']));
            $pass = mysqli_real_escape_string($db, trim(md5($_POST['pass'])));
            $level = mysqli_real_escape_string($db, trim($_POST['level']));
            $code = 0;
            $status = "notverified";
            $email = mysqli_real_escape_string($db, trim($_POST['email']));
            $nama_file = $_FILES['foto']['name'];
            $tmp_file = $_FILES['foto']['tmp_name'];
            // Set path folder tempat menyimpan filenya
            $path = "../../foto/" . $nama_file;

            // jika foto tidak diubah
            if (empty($pass)) {
                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_admin SET user = '$user',
level = '$level',
status = '$status',
email = '$email',
code = '$code'

WHERE id_admin = '$id'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: ../../index.php?alert=2&page=profile&id=$id");
                }
                
            }elseif (!empty($pass)) {
                $update= mysqli_query($db, "UPDATE pengaturan SET jumlah_data = '$jumlah_data' WHERE id_pengaturan = '$id_pengaturan'") or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                
            
            // jika foto diubah

                // upload file
                if (move_uploaded_file($tmp_file, $path)) {
                    // Jika file berhasil diupload, Lakukan : 
                    // perintah query untuk mengubah data pada tabel siswa
                    $update .= mysqli_query($db, "UPDATE tbl_admin SET user = '$user',
level = '$level',
status = '$status',
code = '$code',
email = '$email',
foto = '$nama_file'
WHERE id_admin = '$id'")
                        or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                    // cek query
                    if ($update) {
                        // jika berhasil tampilkan pesan berhasil ubah data
                        header("location: ../../index.php?alert=2&page=profile&id=$id");
                    }
                }
            }
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>