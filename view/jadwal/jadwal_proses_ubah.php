 <?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        if (isset($_POST['kode_jadwal'])) {
            // ambil data hasil submit dari form
            $kode_jadwal = mysqli_real_escape_string($db, trim($_POST['kode_jadwal']));
            $semester = mysqli_real_escape_string($db, trim($_POST['semester']));
            $tahun_ajaran = mysqli_real_escape_string($db, trim($_POST['tahun_ajaran']));
                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_jadwal SET semester = '$semester',
                tahun_ajaran = '$tahun_ajaran'
                WHERE kode_jadwal = '$kode_jadwal'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: ../../index.php?alert=2&page=jadwal");
                }
            
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>