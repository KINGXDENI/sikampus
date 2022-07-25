<?php
// pengecekan pencarian data
// jika dilakukan pencarian data, maka tampilkan kata kunci pencarian
if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
}
// jika tidak maka kosong
else {
    $cari = "";
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <?php
            // fungsi untuk menampilkan pesan
            // jika alert = "" (kosong)
            // tampilkan pesan "" (kosong)
            if (empty($_GET['alert'])) {
                echo "";
            }
            // jika alert = 1
            // tampilkan pesan Sukses "Data guru berhasil disimpan"
            elseif ($_GET['alert'] == 1) { ?>
                <div class="flash-data1" data-flashdata1="<?= $_GET['alert'] == 1; ?>"></div>
            <?php
            }
            // jika alert = 2
            // tampilkan pesan Sukses "Data guru berhasil diubah"
            elseif ($_GET['alert'] == 2) { ?>
                <div class="flash-data2" data-flashdata2="<?= $_GET['alert'] == 2; ?>"></div>
            <?php
            }
            // jika alert = 3
            // tampilkan pesan Sukses "Data guru berhasil dihapus"
            elseif ($_GET['alert'] == 3) { ?>
                <div class="flash-data3" data-flashdata3="<?= $_GET['alert'] == 3; ?>"></div>

            <?php
            }
            // jika alert = 4
            // tampilkan pesan Gagal "nip sudah ada"
            elseif ($_GET['alert'] == 4) { ?>
                <div class="flash-data4" data-flashdata4="<?= $_GET['alert'] == 4; ?>"></div>
    </div>
<?php
            }
?>

<?php if (isset($_GET['m'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
<?php endif; ?>
<form class="mb-2" action="" method="post">
    <div class="form-row">
        <div class="col-2">
            <h1 class="h2 text-gray-800 font-weight-bold cap animated bounceInLeft faster">Data Guru</h1>

        </div>
        <!-- form cari -->
        <div class="col-3">
            <input type="text" class="form-control" name="cari" placeholder="Cari NIP atau Nama" value="<?php echo $cari; ?>">
        </div>
        <!-- tombol cari -->
        <div class="col-6">
            <button type="submit" class="btn btn-dark">Cari</button>
        </div>
        <!-- tombol tambah data -->
        <div class="col"><?php
                            if ($level == 'Admin') { ?>
                <td>
                    <a class="btn btn-warning shadow-lg animated bounceInRight faster" href="?page=tambahg" role="button"><i class="fas fa-plus"></i><span class="font-weight-bold cap">Tambah</span>
                    </a>
                <?php
                            } ?>

        </div>
    </div>
</form>
<!-- <a href="?page=tambahg" class="btn btn-sm btn-warning btn-icon-split mr-5">
                    <span class="text text-dark"><i class="fas fa-plus mr-2"></i><strong>Tambah</strong></span>
                </a>
            </div> -->
<!-- Tabel guru untuk menampilkan data guru dari database -->
<div class="card shadow mb-4 border-bottom-dark animated bounceIn faster">
    <div class="card-body bg-dark">
        <table id="datatables" class="table table-dark mt-3 style='width:100%'">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>FOTO</th>
                    <th>NIP</th>
                    <th>NAMA GURU</th>
                    <th>TEMPAT,TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th>STATUS</th>
                    <th>AGAMA</th>
                    <th>EMAIL</th>
                    <th>NO. HP</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tampil">
                <?php
                // Pagination -------------------------------------------------------------------------------
                // jumlah data yang ditampilkan setiap halaman
                $batas = $jumdat;
                // jika dilakukan pencarian data
                if (isset($cari)) {
                    // perintah query untuk menampilkan jumlah data guru dari database berdasarkan nip atau nama yang sesuai dengan kata kunci pencarian
                    $query_jumlah = mysqli_query($db, "SELECT count(nip) as jumlah FROM tbl_guru
WHERE nip LIKE '%$cari%' OR nama LIKE '%$cari%' OR agama LIKE '%$cari%' OR jenis_kelamin LIKE '%$cari%' OR email LIKE '%$cari%' OR tempat_lahir LIKE '%$cari%'
OR tanggal_lahir LIKE '%$cari%' OR no_hp LIKE '%$cari%' ")
                        or die('Ada kesalahan pada query jumlah:' . mysqli_error($db));
                }
                // jika tidak dilakukan pencarian data
                else {
                    // perintah query untuk menampilkan jumlah data guru dari database
                    $query_jumlah = mysqli_query($db, "SELECT count(nip) as jumlah FROM tbl_guru")
                        or die('Ada kesalahan pada query jumlah:' . mysqli_error($db));
                }
                // tampilkan jumlah data
                $data_jumlah = mysqli_fetch_assoc($query_jumlah);
                $jumlah = $data_jumlah['jumlah'];
                $halaman = ceil($jumlah / $batas);
                $page = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
                $mulai = ($page - 1) * $batas;
                // ------------------------------------------------------------------------------------------
                // nomor urut tabel
                $no = $mulai + 1;
                // jika dilakukan pencarian data
                if (isset($cari)) {
                    // perintah query untuk menampilkan data guru dari database berdasarkan nip atau nama yang sesuai dengan kata kunci pencarian
                    // data yang ditampilkan mulai = $mulai sampai dengan batas = $batas
                    $query = mysqli_query($db, "SELECT * FROM tbl_guru
WHERE nip LIKE '%$cari%' OR nama LIKE '%$cari% ' OR agama LIKE '%$cari%' OR jenis_kelamin LIKE '%$cari%' OR email LIKE '%$cari%' OR tempat_lahir LIKE '%$cari%'
OR tanggal_lahir LIKE '%$cari%' OR no_hp LIKE '%$cari%'  
ORDER BY nip DESC LIMIT $mulai, $batas")
                        or die('Ada kesalahan pada query guru: ' . mysqli_error($db));
                }
                // jika tidak dilakukan pencarian data
                else {
                    // perintah query untuk menampilkan data guru dari database
                    // data yang ditampilkan mulai = $mulai sampai dengan batas = $batas
                    $query = mysqli_query($db, "SELECT * FROM tbl_guru ORDER BY nip DESC LIMIT $mulai, $batas")
                        or die('Ada kesalahan pada query guru: ' . mysqli_error($db));
                }
                // tampilkan data
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr class="cap centr">
                        <td><?php echo $no; ?></td>
                        <td><a href="?page=detailg&nip=<?php echo $data['nip']; ?>"><img class="foto-thumbnail" src='foto/<?php echo $data['foto']; ?>' alt="Foto Guru" width="110" maxheight="200"></a></td>
                        <td><?php echo $data['nip']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tempat_lahir']; ?>, <?php echo date(
                                                                        'd-m-Y',
                                                                        strtotime($data['tanggal_lahir'])
                                                                    ); ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td><?php echo $data['agama']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['no_hp']; ?></td>
                        <?php
                        if ($level == 'Admin') { ?>
                            <td>
                                <a title="Ubah" class="btn btn-success" href="?page=ubahg&nip=<?php echo $data['nip']; ?>"><i class="fas fa-edit"></i></a>
                                <a title=" Hapus" class="btn btn-danger" id="btn-del" href="view/guru/guru_proses_hapus.php?nip=<?php echo $data['nip']; ?>"><i class="fas fa-trash"></i></a>
                            <?php
                        } ?>

                            </td>
                    </tr>
                <?php
                    $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- Tampilkan Pagination -->
<?php
// fungsi untuk pengecekan halaman aktif
// jika halaman kosong atau tidak ada yang dipilih
if (empty($_GET['hal'])) {
    // halaman aktif = 1
    $halaman_aktif = '1';
}
// selain itu
else {
    // halaman aktif = sesuai yang dipilih
    $halaman_aktif = $_GET['hal'];
}
?>
<div class="row">
    <div class="col">
        <!-- tampilkan informasi jumlah halaman dan jumlah data -->
        <a>
            Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> -
            Total <?php echo $jumlah; ?> data
        </a>
    </div>
    <div class="col">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <!-- Button untuk halaman sebelumnya -->
                <?php
                // jika halaman aktif = 0 atau = 1, maka button Sebelumnya = disable
                if ($halaman_aktif <= '1') { ?>
                    <li class="page-item disabled"> <span class="page-link text-white bg-dark">Sebelumnya</span></li>
                <?php
                }
                // jika halaman aktif > 1, maka button Sebelumnya = aktif
                else { ?>
                    <li class="page-item"><a class="page-link text-warning bg-dark" href="?page=guru&hal=<?php echo $page - 1 ?>">Sebelumnya</a></li>
                <?php } ?>
                <!-- Button untuk link halaman 1 2 3 ... -->
                <?php
                for ($x = 1; $x <= $halaman; $x++) { ?>
                    <li class="page-item"><a class="page-link text-warning bg-dark" href="?page=guru&hal=<?php echo $x ?>"><?php echo $x ?></a></li>
                <?php } ?>
                <!-- Button untuk halaman selanjutnya -->
                <?php
                // jika halaman aktif >= jumlah halaman, maka button Selanjutnya = disable
                if ($halaman_aktif >= $halaman) { ?>
                    <li class="page-item disabled"> <span class="page-link text-white bg-dark">Selanjutnya</span></li>
                <?php
                }
                // jika halaman aktif <= jumlah halaman, maka button Selanjutnya = aktif
                else { ?>
                    <li class="page-item"><a class="page-link text-warning bg-dark" href="?page=guru&hal=<?php echo $page + 1 ?>">Selanjutnya</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
</div>
</div>