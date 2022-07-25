<?php
if (isset($_POST['search'])) {
    include "config/database.php";
    $no = 1;
    $search = $_POST['search'];
    $query = mysqli_query($db, "SELECT * FROM tbl_jurusan WHERE kode_jurusan LIKE '%" . $search . "%'");
    while ($data = mysqli_fetch_array($query)) {



?>
        <tr class="cap centr">
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['kode_jurusan']; ?></td>
            <td><?php echo $data['nama_jurusan']; ?></td>
            <td>
                <a title="Ubah" class="btn btn-outline-success" href="?page=ubahj&kode_jurusan=<?php echo $data['kode_jurusan']; ?>"><i class="fas fa-edit"></i></a>
                <a title="Hapus" class="btn btn-outline-danger" href="jurusan_proses_hapus.php?kode_jurusan=<?php echo $data['kode_jurusan']; ?>" onclick="return confirm('Anda yakin ingin menghapus jurusan <?php echo $data['nama_jurusan']; ?>?');"><i class="fas fa-trash"></i></a>
            </td>
        </tr><?php
                $no++;
                ?>

    <?php }
} ?>