<?php
require_once "config/database.php";
$query = mysqli_query($db, "SELECT * FROM tbl_admin, pengaturan WHERE id_admin='$id'")
or die('Query Error : ' . mysqli_error($db));
$data = mysqli_fetch_array($query);
$id = $data['id_admin'];
$user = $data['user'];
$email = $data['email'];
$foto = $data['foto'];
$level = $data['level'];
$jumdat = $data['jumlah_data'];

?>
