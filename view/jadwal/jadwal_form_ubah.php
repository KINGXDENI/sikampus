<?php
// jika tombol ubah diklik
if (isset($_GET['kode_jadwal'])) {
    // ambil data get dari form
    $kode_jadwal = $_GET['kode_jadwal'];
    // perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_jadwal
    $query = mysqli_query($db, "SELECT * FROM tbl_jadwal as tj
    WHERE kode_jadwal='$kode_jadwal'")
        or die('Query Error : ' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampung data
    $kode_jadwal = $data['kode_jadwal'];
    $semester = $data['semester'];
    $tahun_ajaran = $data['tahun_ajaran'];
}
?>

<form class="needs-validation" action="view/jadwal/jadwal_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-10 d-flex">
                    <a href="?page=jadwal" class="btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Ubah Jadwal</h1>
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
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Jadwal</h6>
                        </div>
                        <div class="card-body bg-dark">

                            <!-- form tambah data guru -->
                            <div class="row">
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>Kode Jadwal</label>
                                        <input type="text" class="form-control" name="kode_jadwal" autocomplete="off" value="<?= $kode_jadwal ?>" readonly>
                                        <div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Semester</label>
                                        <select class="form-control" name="semester" autocomplete="off" required>
                                            <option value="<?= $semester ?>"> Semester <?= $semester ?></option>
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>
                                            <option value="3">Semester 3</option>
                                            <option value="4">Semester 4</option>
                                            <option value="5">Semester 5</option>
                                            <option value="6">Semester 6</option>
                                            <option value="7">Semester 7</option>
                                            <option value="8">Semester 8</option>
                                        </select>
                                        <div class="invalid-feedback">Semester tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Tahun Ajaran </label>
                                        <input type="text" class="form-control datepicker1" name="tahun_ajaran" maxlength="4" autocomplete="off" value="<?= $tahun_ajaran ?>" placeholder="Masukan Tahun Ajaran" required>
                                        <div class="invalid-feedback">Tahun Ajaran tidak boleh kosong.</div>
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