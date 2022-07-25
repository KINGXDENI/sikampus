<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <div class="col-3"></div>
        <div class="col-5">
            <h1 class="h2 text-gray-800 font-weight-bold cap animated bounceInLeft faster">Profile</h1>

        </div>
        <!-- tombol tambah data -->
        <div class="col mr-5">
            <a class="btn btn-warning animated bounceInRight faster" href="?page=ubahpr&id=<?php echo $id ?>" role="button"><i class="fas fa-pen mr-2"></i><span class="font-weight-bold cap">Ubah</span>
            </a>
        </div>
    </div>

    <div class="col-lg-12 mb-4 animated bounceIn fast">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM tbl_admin WHERE id_admin='$id'")
                or die('Query Error : ' . mysqli_error($db));
            $data = mysqli_fetch_array($query);
            $id = $data['id_admin'];
            $user = $data['user'];
            $email = $data['email'];
            $foto = $data['foto'];
            $level = $data['level'];
        }
        ?>
        <!-- Illustrations -->
        <div class="card border-bottom-warning shadow-lg mb-4 col-6 m-auto bg-dark">
            <div class="card-body bg-dark ">
                <center>
                    <div class="col-lg-12 mb-4">
                        <?php if ($_SESSION['level'] == 'Siswa') {?>
                        <div>
                            <a class="btn btn-warning animated bounceInRight faster marl3" href="?page=detailp&id=<?php echo $id ?>"><i class="fas fa-id-card"></i></a>
                        </div>
                       <?php } ?>
                        
                        <div class="box-circle posisi">
                            <img class="img-profile rounded-circle" id="outputImg" width="100%" height="100%" src="<?php if (empty($foto)) {
                                                                                                                        echo "foto/undraw_profile.svg";
                                                                                                                    } else { ?>
                                                                                                                        foto/<?php echo $foto; ?>
                                                                                                                    <?php
                                                                                                                    } ?>">
                        </div>
                        <br>
                        <h1 class="h1 mb-0 text-gray-800 posisi text-warning text-warning cap" id="namaL"><?=

                                                                                                            $user

                                                                                                            ?></h1>
                    </div>
                </center>


                <div class="row posisi3">
                    <div class="col-lg-6">
                        <center>
                            <div class="form-group mb-4 ">
                                <h3 class="h3 mb-0 text-gray-800 d-sm-flex justify-content-center text-warning">
                                    <a>
                                        <i class="fa fa-check-circle"></i>

                                        <span class="div ml-3 cap" id="status"><?php
                                                                                if ($_SESSION['status'] == 'verified') {
                                                                                    echo "Aktif";
                                                                                } else {
                                                                                    echo "Tidak Aktif";
                                                                                }
                                                                                ?></span></a>
                                </h3>
                            </div>
                            <!-- Divider -->
                            <div class="col-6">
                                <center>
                                    <hr class="sidebar-divider bg-warning">
                                </center>
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-6">
                        <center>
                            <h3 class="h3 mb-0 text-gray-800 d-sm-flex justify-content-center text-warning">
                                <a><i class="fa fa-user"></i>
                                    <span class="div ml-3 cap" id="level"> <?= $level
                                                                            ?> </span></a>

                            </h3>
                            <div class="col-6">
                                <center>
                                    <hr class="sidebar-divider bg-warning">
                                </center>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row posisi4">
                    <div class="col-3"></div>
                    <div class="col-lg-6">
                        <center>
                            <h3 class="h3 mb-0 text-gray-800 d-sm-flex justify-content-center text-warning">
                                <a><i class="fa fa-envelope"></i>

                                    <span class="div ml-3" id="email"><?=
                                                                        $email
                                                                        ?></span></a>
                            </h3>
                            <!-- Divider -->
                            <div class="col-12">
                                <center>
                                    <hr class="sidebar-divider bg-warning">
                                </center>
                            </div>
                        </center>
                    </div>

                </div>

            </div>
        </div>
        <br><br><br><br>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->