<?php
// jika tombol ubah diklik
if (isset($_GET['kode_mapel'])) {
    // ambil data get dari form
    $kode_mapel = $_GET['kode_mapel'];
    // perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_mapel
    $query = mysqli_query($db, "SELECT * FROM tbl_matapelajaran INNER JOIN tbl_jurusan 
ON tbl_matapelajaran.kode_jurusan = tbl_jurusan.kode_jurusan WHERE tbl_matapelajaran.kode_mapel='$kode_mapel'")
        or die('Query Error : ' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampung data
    $kode_mapel = $data['kode_mapel'];
    $nama_mapel = $data['nama_mapel'];
    $semester = $data['semester'];
    $kode_jurusan = $data['kode_jurusan'];
}
// tutup koneksi
?>
<form class="needs-validation" action="mapel_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-10 d-flex">
                    <a href="?page=mapel" class="btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Ubah Mata Pelajaran</h1>
                </div>
                <button type="submit" class="btn btn-success btn-md btn-icon-split ml-5 shadow-lg" name="simpan" value="Simpan">
                    <span class="text text-white cap font-weight-bold">Simpan Data
                        <i class="fas fa-save"></i>
                    </span>
                </button>
            </div>
            <div class="d-sm-flex  justify-content-between mb-0">
                <div class="col-lg-12 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-warning shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Mata Pelajaran</h6>
                        </div>
                        <div class="card">
                            <div class="card-body bg-dark">
                                <!-- form tambah data guru -->
                                <div class="row">
                                    <div class="col cap text-warning font-weight-bold">
                                        <div class="form-group col-md-12">
                                            <label>Kode Mapel</label>
                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                <input type="text" class="form-control" name="kode_mapel" value="<?= $kode_mapel ?>" readonly required>
                                                <div class="btn btn-warning ml-2 cap font-weight-bold" onclick="remop()"><i class="fas fa-pencil-alt"></i></div>
                                                <div class="invalid-feedback">Kode mapel tidak boleh kosong.</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Nama Mapel</label>
                                            <input type="text" class="form-control" name="nama_mapel" autocomplete="off" value="<?= $nama_mapel ?>" placeholder="Masukan Nama" required>
                                            <div class="invalid-feedback">Nama mapel tidak boleh kosong.</div>
                                        </div>
                                    </div>

                                    <div class="col cap text-warning font-weight-bold">
                                        <div class="form-group col-md-12">
                                            <label>Semester</label>
                                            <select class="form-control" name="semester" autocomplete="off" required>
                                                <option value="<?= $semester ?>"><?= $semester ?></option>
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
                                            <label>Kode Jurusan</label>
                                            <select class="form-control mb-3" name="kode_jurusan" autocomplete="off" required>
                                                <?php
                                                echo "<option value=$data[kode_jurusan]>$data[nama_jurusan] ($data[kode_jurusan])</option>";

                                                $query = mysqli_query($db, "SELECT * FROM tbl_jurusan") or die(mysqli_error($db));
                                                while ($data = mysqli_fetch_array($query)) {
                                                    echo "<option value=$data[kode_jurusan]> $data[nama_jurusan] ($data[kode_jurusan]) </option>";
                                                }
                                                ?>
                                                <div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
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