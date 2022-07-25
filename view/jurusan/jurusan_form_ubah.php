<?php
// jika tombol ubah diklik
if (isset($_GET['kode_jurusan'])) {
    // ambil data get dari form
    $kode_jurusan = $_GET['kode_jurusan'];
    // perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_jurusan
    $query = mysqli_query($db, "SELECT * FROM tbl_jurusan WHERE kode_jurusan='$kode_jurusan'")
        or die('Query Error : ' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampung data
    $kode_jurusan = $data['kode_jurusan'];
    $nama_jurusan = $data['nama_jurusan'];
}
?>

<form class="needs-validation" action="view/jurusan/jurusan_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-10 d-flex">
                    <a href="?page=jurusan" class="btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Ubah Jurusan</h1>
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
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Jurusan</h6>
                        </div>
                        <div class="card-body bg-dark">

                            <!-- form tambah data guru -->
                            <div class="row">
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>Kode Jurusan</label>
                                        <input type="text" class="form-control" name="kode_jurusan" value="<?=$kode_jurusan?>" required>
                                        <div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Nama Jurusan</label>
                                        <input type="text" class="form-control" name="nama_jurusan" autocomplete="off" value="<?=$nama_jurusan?>" required>
                                        <div class="invalid-feedback">Nama Jurusan tidak boleh kosong.</div>
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