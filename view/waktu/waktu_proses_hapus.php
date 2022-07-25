<?php
// panggil file database.php untuk koneksi ke database
require_once "../../config/database.php";
// jika tombol hapus diklik
if (isset($_GET['id_waktu'])) {
    // ambil data get dari form
    $kode_waktu = $_GET['id_waktu'];

        // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel waktu
        $delete = mysqli_query($db, "DELETE FROM tbl_waktu WHERE id_waktu='$kode_waktu'")
            or die('Ada kesalahan pada query delete :' . mysqli_error($db));
        // cek hasil query
        if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ../../index.php?alert=3&page=waktu");
        }
    
}
// tutup koneksi
mysqli_close($db);
?>