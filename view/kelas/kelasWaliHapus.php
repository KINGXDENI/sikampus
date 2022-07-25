<?php
// panggil file database.php untuk koneksi ke database
require_once "../../config/database.php";
// jika tombol hapus diklik
if (isset($_GET['kode_kelas']) && isset($_GET['nim'])) {
    // ambil data get dari form
    $kode_kelas = $_GET['kode_kelas'];
    $nim = $_GET['nim'];

        // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel kelas
        $delete = mysqli_query($db, "DELETE FROM tbl_kelasdetail WHERE kode_kelas='$kode_kelas' AND nim='$nim'")
            or die('Ada kesalahan pada query delete :' . mysqli_error($db));
        // cek hasil query
        if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ../../index.php?alert=3&page=kelasWali&kode_kelas=$kode_kelas");
        }
    
}
// tutup koneksi
