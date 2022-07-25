<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 100px;
        text-align: center;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        cursor: inherit;
        display: block;
    }

    .cenal {
        margin-left: 110px;
        margin-top: 20px;
    }
</style>
<?php
// jika tombol ubah diklik
if (isset($_GET['nim'])) {
    // ambil data get dari form
    $nim = $_GET['nim'];
    // perintah query untuk menampilkan data dari tabel siswa berdasarkan nim
    $query = mysqli_query($db, "SELECT * FROM tbl_siswa as ts 
    INNER JOIN tbl_jurusan as tj ON ts.kode_jurusan = tj.kode_jurusan
    WHERE ts.nim='$nim'")
        or die('Query Error : ' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampung data
    $nim = $data['nim'];
    $nama = $data['nama'];
    $tempat_lahir = $data['tempat_lahir'];
    $tanggal_lahir = date('d-m-Y', strtotime($data['tanggal_lahir']));
    $jenis_kelamin = $data['jenis_kelamin'];
    $agama = $data['agama'];
    $nama_jurusan = $data['nama_jurusan'];
    $kode_jurusan = $data['kode_jurusan'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $foto = $data['foto'];
}

?>
<form class="needs-validation" action="view/siswa/siswa_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-10 d-flex">
                    <a href="?page=siswa" class="btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Ubah Siswa</h1>
                </div>
                <button type="submit" class="btn btn-success btn-md btn-icon-split ml-5 shadow-lg" name="simpan" value="Simpan">
                    <span class="text text-white cap font-weight-bold">Simpan Data
                        <i class="fas fa-save"></i>
                    </span>
                </button>
            </div>

            <div class="d-sm-flex  justify-content-between mb-0">
                <div class="col-lg-9 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-warning shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Dosen</h6>
                        </div>
                        <div class="card-body bg-dark">
                            <!-- form ubah data guru -->
                            <div class="row pb-4">
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>NIM</label>
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <input type="text" id="Input" class="form-control" name="nim" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $nim; ?>" readonly="readonly" required>
                                            <div class="btn btn-warning ml-2 cap font-weight-bold" onclick="remop()"><i class="fas fa-pencil-alt"></i></div>
                                            <div class="invalid-feedback">NIM tidak boleh kosong.</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Nama Siswa</label>
                                        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
                                        <div class="invalid-feedback">Nama siswa tidak boleh kosong.</div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="mb-3">Jenis Kelamin</label>
                                        <?php
                                        if ($jenis_kelamin == 'Laki-Laki') { ?>
                                            <div>
                                                <div class="custom-control custom-radio custom-control-inline text-white ">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Laki-Laki" checked required>
                                                    <label class="custom-control-label" for="customControlValidation2">Laki-laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline text-white">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="Perempuan" required>
                                                    <label class="custom-control-label" for="customControlValidation3">Perempuan</label>
                                                    <div class="invalid-feedback">Pilih salah satu jenis kelamin.</div>
                                                </div>
                                            </div>
                                        <?php
                                        } else { ?>
                                            <div>
                                                <div class="custom-control custom-radio custom-control-inline text-white">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Laki-Laki" required>
                                                    <label class="custom-control-label" for="customControlValidation2">Laki-laki</label>

                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline text-white">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="Perempuan" checked required>
                                                    <label class="custom-control-label" for="customControlValidation3">Perempuan</label>
                                                    <div class="invalid-feedback">Pilih salah satu jenis kelamin.</div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>


                                    <div class="form-group col-md-12">
                                        <label>Agama</label>
                                        <select class="form-control" name="agama" autocomplete="off" required>
                                            <option value="<?php echo $agama; ?>"><?php echo $agama; ?></option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Kristen Katolik">Kristen Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                        </select>
                                        <div class="invalid-feedback">Agama tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Jurusan</label>
                                        <select class="form-control" name="kode_jurusan" autocomplete="off" required>
                                            <option value="<?= $kode_jurusan ?>"><?= $nama_jurusan ?></option>
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
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" value="<?php echo $tempat_lahir; ?>" required>
                                        <div class="invalid-feedback">Tempat Lahir tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" value="<?php echo $tanggal_lahir; ?>" required>
                                        <div class="invalid-feedback">Tanggal Lahir tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows="2" name="alamat" autocomplete="off" required>
                                    <?php echo $alamat; ?></textarea>
                                        <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>No. HP</label>
                                        <input type="text" class="form-control" name="no_hp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $no_hp; ?>" required>
                                        <div class="invalid-feedback">No. HP tidak boleh kosong.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <!-- Illustrations -->
                    <div class="card border-bottom-warning shadow-lg mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Foto</h6>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="card bg-warning text-dark font-weight-bold shadow">
                                <div class="card-body">
                                    Format
                                    <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <div id="imagePreview"><img class="foto-preview mb-2" src="foto/<?php echo $foto; ?>" width="200" maxheight="300" /></div>
                            </center>
                            <div class="form-group cenal">
                                <span class="btn btn-warning btn-file">
                                    Pilih File<input type="file" class="form-control-filed" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required>
                                </span>
                                <div class="invalid-feedback">Foto siswa tidak boleh kosong.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>