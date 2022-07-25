 <?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        if (isset($_POST['kode_mapel'])) {
            // ambil data hasil submit dari form
            $kode_mapel = mysqli_real_escape_string($db, trim($_POST['kode_mapel']));
            $nama_mapel = mysqli_real_escape_string($db, trim($_POST['nama_mapel']));
            $semester = mysqli_real_escape_string($db, trim($_POST['semester']));
            $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_matapelajaran SET nama_mapel = '$nama_mapel',
semester = '$semester',
kode_jurusan = '$kode_jurusan'

WHERE kode_mapel = '$kode_mapel'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: ../../index.php?alert=2&page=mapel");
                }
            
            // jika foto diubah
            else {
                // upload file
                    // Jika file berhasil diupload, Lakukan : 
                    // perintah query untuk mengubah data pada tabel siswa
                    $update = mysqli_query($db, "UPDATE tbl_matapelajaran SET nama_mapel = '$nama_mapel',
semester = '$semester',
kode_jurusan = '$kode_jurusan'
WHERE kode_mapel = '$kode_mapel'")
                        or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                    // cek query
                    if ($update) {
                        // jika berhasil tampilkan pesan berhasil ubah data
                        header("location: ../../index.php?alert=2&page=mapel");
                    }
                
            }
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>