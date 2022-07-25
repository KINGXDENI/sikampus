<?php
// jika tombol ubah diklik
if (isset($_GET['kode_hari'])) {
    // ambil data get dari form
    $kode_hari = $_GET['kode_hari'];
    // perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_hari
    $query = mysqli_query($db, "SELECT * FROM tbl_hari WHERE kode_hari='$kode_hari'")
        or die('Query Error : ' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampung data
    $kode_hari = $data['kode_hari'];
    $nama_hari = $data['nama_hari'];
}
?>

<form class="needs-validation" action="view/hari/hari_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-10 d-flex">
                    <a href="?page=hari" class="btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Ubah Hari</h1>
                </div>
                <button type="submit" class="btn btn-success btn-md btn-icon-split ml-5 shadow-lg" name="simpan" value="Simpan">
                    <span class="text text-white cap font-weight-bold">Simpan Data
                        <i class="fas fa-save"></i>
                    </span>
                </button>
            </div>
            <div class="d-sm-flex  justify-content-center mb-0">
                <div class="col-lg-12 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-warning shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Hari</h6>
                        </div>
                        <div class="card-body bg-dark">

                            <!-- form tambah data guru -->
                            <div class="row">
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>Kode Hari</label>
                                        <input type="text" class="form-control" name="kode_hari" value="<?=$kode_hari?>" readonly required>
                                        <div class="invalid-feedback">Kode Hari tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Nama Hari</label>
                                        <input type="text" class="form-control" name="nama_hari" autocomplete="off" value="<?=$nama_hari?>" required>
                                        <div class="invalid-feedback">Nama Hari tidak boleh kosong.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>