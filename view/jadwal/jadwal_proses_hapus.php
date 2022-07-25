<?php
// panggil file database.php untuk koneksi ke database
require_once "../../config/database.php";
// jika tombol hapus diklik
if (isset($_GET['kode_jadwal'])) {
    // ambil data get dari form
    $kode_jadwal = $_GET['kode_jadwal'];
    
        // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel kelas
        $delete = mysqli_query($db, "DELETE FROM tbl_jadwal WHERE kode_jadwal='$kode_jadwal'")
            or die('Ada kesalahan pada query delete :' . mysqli_error($db));
        // cek hasil query
        if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ../../index.php?alert=3&page=jadwal");
        }
    
}
// tutup koneksi
mysqli_close($db);
?>