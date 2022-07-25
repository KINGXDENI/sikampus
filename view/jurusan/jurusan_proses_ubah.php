 <?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        if (isset($_POST['kode_jurusan'])) {
            // ambil data hasil submit dari form
            $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));
            $nama_jurusan = mysqli_real_escape_string($db, trim($_POST['nama_jurusan']));

                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_jurusan SET nama_jurusan = '$nama_jurusan'


WHERE kode_jurusan = '$kode_jurusan'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: ../../index.php?alert=2&page=jurusan");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>