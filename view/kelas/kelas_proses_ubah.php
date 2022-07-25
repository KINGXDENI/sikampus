 <?php
    // panggil file database.php untuk koneksi ke database
    require_once "../../config/database.php";
    // jika tombol simpan diklik
    if (isset($_POST['simpan'])) {
        if (isset($_POST['kode_kelas'])) {
            // ambil data hasil submit dari form
            $kode_kelas = mysqli_real_escape_string($db, trim($_POST['kode_kelas']));
            $nama_kelas = mysqli_real_escape_string($db, trim($_POST['nama_kelas']));
            $wali_kelas = mysqli_real_escape_string($db, trim($_POST['wali_kelas']));
            $tingkat = mysqli_real_escape_string($db, trim($_POST['tingkat']));
            $semester = mysqli_real_escape_string($db, trim($_POST['semester']));
            $tahun = mysqli_real_escape_string($db, trim($_POST['tahun']));
            $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

            // perintah query untuk mengubah data pada tabel siswa
            $update = mysqli_query($db, "UPDATE tbl_kelass SET nama_kelas = '$nama_kelas',
wali_kelas = '$wali_kelas',
tingkat = '$tingkat',
semester = '$semester',
tahun = '$tahun',
kode_jurusan = '$kode_jurusan'
WHERE kode_kelas = '$kode_kelas'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                header("location: ../../index.php?alert=2&page=kelas");
            }
        }
    }
    // tutup koneksi
    mysqli_close($db);
    ?>