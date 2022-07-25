<form class="needs-validation" action="view/kelas/kelas_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-10 d-flex">
                    <a href="?page=kelas" class="btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Tambah Kelas</h1>
                </div>
                <button type="submit" class="btn btn-success btn-md btn-icon-split ml-5 shadow-lg" name="simpan" value="Simpan">
                    <span class="text text-white cap font-weight-bold">Simpan Data
                        <i class="fas fa-save"></i>
                    </span>
                </button>
            </div>
            <div class="d-sm-flex  justify-content-between mb-0">
                <div class="col-lg-6 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-warning shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Kelas</h6>
                        </div>
                        <div class="card-body bg-dark">

                            <!-- form tambah data guru -->
                            <div class="row">
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>Kode Kelas</label>
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <input type="text" class="form-control" id="Input" name="kode_kelas" value="<?= $kode_kat ?>" readonly="readonly">
                                            <div class="btn btn-warning ml-2 cap font-weight-bold" onclick="remop()"><i class="fas fa-pencil-alt"></i></div>
                                            <div class="invalid-feedback">Kode kelas tidak boleh kosong.</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Nama Kelas</label>
                                        <input type="text" class="form-control" name="nama_kelas" autocomplete="off" placeholder="Masukan Nama Kelas" required>
                                        <div class="invalid-feedback">Nama kelas tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Semester</label>
                                        <select class="form-control" name="semester" autocomplete="off" required>
                                            <option value="">---- Pilih Semester ----</option>
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
                                        <label>Jurusan</label>
                                        <select class="form-control" name="kode_jurusan" autocomplete="off" required>
                                            <option value="">---- Pilih Jurusan ----</option>
                                            <?php
                                            $queryg = mysqli_query($db, "SELECT * FROM tbl_jurusan");
                                            while ($data = mysqli_fetch_assoc($queryg)) {
                                                echo "<option value=$data[kode_jurusan]> $data[nama_jurusan] ($data[kode_jurusan]) </option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">Jurusan tidak boleh kosong.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-warning shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">.</h6>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="col cap text-warning font-weight-bold">
                                <div class="form-group col-md-12">
                                    <label>Tingkat</label>
                                    <input type="text" class="form-control" name="tingkat" autocomplete="off" placeholder="Masukan Tingkat" required>
                                    <div class="invalid-feedback">Tingkat kelas tidak boleh kosong.</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Tahun</label>
                                    <input type="text" class="form-control datepicker1" name="tahun" maxlength="4" autocomplete="off" placeholder="Masukan Tahun" required>
                                    <div class="invalid-feedback">Tahun tidak boleh kosong.</div>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label>Wali Kelas</label>
                                    <select class="form-control mb-3" name="wali_kelas" autocomplete="off" required>
                                        <option>---- Pilih Wali kelas ----</option>
                                        <?php
                                        $queryg = mysqli_query($db, "SELECT * FROM tbl_guru");
                                        while ($data = mysqli_fetch_assoc($queryg)) {
                                            echo "<option value='" . $data['nip'] . "'>" . $data['nama'] . "</option>";
                                        }
                                        ?>
                                        <div class="invalid-feedback">Wali kelas tidak boleh kosong.</div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</form>