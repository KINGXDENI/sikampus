<?php
include "config/database.php";

$wauto = mysqli_query($db, "SELECT MAX(id_waktu) as max_codew FROM tbl_waktu");
$data = mysqli_fetch_array($wauto);
$codew = $data['max_codew'];
$codew++;
$hurufw = "";
$kodew_kat = $hurufw . sprintf("%03s", $codew);
?>
<form class="needs-validation" action="view/waktu/waktu_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex mb-3">
                <div class="col-10 d-flex">
                    <a href="?page=waktu" class="btn btn-md btn-circle btn-dark text-warning shadow-lg">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Tambah Waktu</h1>
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
                            <h6 class="m-0 font-weight-bold text-dark text-center cap">Form Waktu</h6>
                        </div>
                        <div class="card-body bg-dark">

                            <!-- form tambah data guru -->
                            <div class="row">
                                <div class="col cap text-warning font-weight-bold">
                                    <div class="form-group col-md-12">
                                        <label>Id waktu</label>
                                        <input type="text" class="form-control" name="id_waktu" value="<?= $kodew_kat ?>" readonly required>
                                        <div class="invalid-feedback">id waktu tidak boleh kosong.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Jam Masuk</label>
                                        <input type='time' class="form-control" name="jam_masuk" autocomplete="off" required>
                                        <div class="invalid-feedback">Jam boleh kosong.</div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Jam keluar</label>
                                        <input type='time' class="form-control" name="jam_keluar" autocomplete="off" required>
                                        <div class="invalid-feedback">Jam boleh kosong.</div>
                                    </div>
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