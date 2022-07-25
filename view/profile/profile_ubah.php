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
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM tbl_admin, pengaturan WHERE id_admin='$id'")
        or die('Query Error : ' . mysqli_error($db));
    $data = mysqli_fetch_array($query);
    $id_pengaturan = $data['id_pengaturan'];
    $jumlah_data = $data['jumlah_data'];
    $id = $data['id_admin'];
    $user = $data['user'];
    $email = $data['email'];
    $foto = $data['foto'];
    $level = $data['level'];
}
?>
<form class="needs-validation" action="view/profile/profile_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-7 d-flex marl">
                    <a href="?page=profile&id=<?php echo $id ?>" class="btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Ubah Profile</h1>
                </div>
                <button type="submit" class="btn btn-success btn-md btn-icon-split marl2 shadow-lg " name="simpan" value="Simpan">
                    <span class="text text-white cap font-weight-bold">Simpan Data
                        <i class="fas fa-save"></i>
                    </span>
                </button>
            </div>

            <div class="d-sm-flex  justify-content-between mb-0">
                <div class="col-lg-6 mb-4 marl">
                    <!-- Illustrations -->
                    <div class="card border-bottom-warning shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Ubah</h6>
                        </div>
                        <div class="card-body bg-dark">
                            <!-- form ubah data guru -->
                            <div class="row pb-3">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>Username</label>
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <input type="text" id="Input" class="form-control" name="user" value="<?= $user ?>" readonly="readonly" placeholder="Masukan Username" required>
                                            <div class="btn btn-warning ml-2 cap font-weight-bold" onclick="remop()"><i class="fas fa-pencil-alt"></i></div>
                                            <div class="invalid-feedback">Username tidak boleh kosong.</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Password</label>
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <input type="password" class="form-control" name="pass" autocomplete="off" placeholder="Masukan Password" required>
                                            <button type="submit" class="btn btn-warning ml-2 font-weight-bold" name="ganti" value="Ganti"><i class="fas fa-retweet"></i> Pass </button>
                                            <div class="invalid-feedback">Password tidak boleh kosong.</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" autocomplete="off" value="<?= $email ?>" placeholder="Masukan Password" required>
                                        <div class="invalid-feedback">Email tidak boleh kosong.</div>
                                    </div>


                                    <div class="form-group col-md-12 " <?php
                                                                        if ($level == 'Admin') { ?> <?php
                                                                                                } else { ?> hidden <?php
                                                                                                } ?>>
                                        <label>Level</label>
                                        <select class="form-control" name="level" autocomplete="off" required>
                                            <option value="<?= $level ?>"><?= $level ?></option>
                                            <option value="Admin">Admin</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Siswa">Siswa</option>
                                        </select>
                                        <div class="invalid-feedback">Level tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12" <?php
                                                                        if ($level == 'Admin') { ?> <?php
                                                                                                } else { ?> hidden <?php
                                                                                                } ?>>
                                        <label>Jumlah Data Yang DiTampilkan</label>
                                        <input type="hidden" name="id_pengaturan" value="<?= $id_pengaturan ?>">
                                        <input type="number" class="form-control" name="jumlah_data" value="<?= $jumlah_data ?>">
                                        <div class="invalid-feedback">Jumlah Data tidak boleh kosong.</div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 marr">
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
                                <div id="imagePreview"><img class="foto-preview mb-2 rounded-circle" src="<?php if (empty($foto)) {
                                                                                                                echo "foto/undraw_profile.svg";
                                                                                                            } else { ?>
                                                                                                            foto/<?php echo $foto; ?>
                                                                                                        <?php
                                                                                                            } ?>" width="200" maxheight="300" /></div>
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