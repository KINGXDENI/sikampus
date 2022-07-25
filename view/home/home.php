<section class="jumbotron text-center bg-light mat">
    <div class="container">
        <h1 class="font-weight-bold animated bounceInLeft slower">SELAMAT DATANG</h1>
        <h3 class="animated bounceInRight slower">SISTEM INFORMASI SEKOLAH</h3>
        <br>


    </div>
    <div class="row">
        <?php
        if ($level == 'Admin') {
        ?>

            <div class="col-3 animated bounceInDown delay-1s faster">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header py-3 bg-dark">
                        <span>
                            <i class="fas fa-chalkboard-teacher fa-3x mr-2 "></i> <span class="mr-3 font-weight-bold cap">
                                Data Guru : <span style="font-size:50px;" class="text-warning"><?= $countguru ?></span></span><br>
                        </span>
                    </div>
                    <h6 class="m-2"> <a href="?page=guru" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
                </div>
            </div>
            <div class="col-3 animated bounceInDown delay-1s faster">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header py-3 bg-dark">
                        <span>
                            <i class="fas fa-book-reader fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Siswa : <span style="font-size:50px;" class="text-warning"> <?= $countsiswa ?></span></span>
                        </span>
                    </div>
                    <h6 class="m-2"> <a href="?page=siswa" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
                </div>
            </div>
            <div class="col-3 animated bounceInDown delay-1s faster">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header py-3 bg-dark">
                        <span>
                            <i class="fas fa-book fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data MaPel : <span style="font-size:50px;" class="text-warning"><?= $countmapel ?></span></span>
                        </span>
                    </div>
                    <h6 class="m-2"> <a href="?page=mapel" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
                </div>
            </div>
            <div class="col-3 animated bounceInDown delay-1s faster">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header py-3 bg-dark">
                        <span>
                            <i class="fas fa-chalkboard fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Kelas : <span style="font-size:50px;" class="text-warning"><?= $countkelas ?></span></span>
                        </span>
                    </div>
                    <h6 class="m-2"> <a href="?page=kelas" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
                </div>
            </div>
    </div>
    <div class="row mt-4">
        <div class="col-3 animated bounceInDown delay-2s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fas fa-clock fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Waktu : <span style="font-size:50px;" class="text-warning"><?= $countwaktu ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=waktu" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
        <div class="col-3 animated bounceInDown delay-2s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fas fa-calendar-alt fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Hari : <span style="font-size:50px;" class="text-warning"><?= $counthari ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=hari" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
        <div class="col-3 animated bounceInDown delay-2s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fab fa-accusoft fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Jurusan : <span style="font-size:50px;" class="text-warning"><?= $countjurusan ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=jurusan" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
        <div class="col-3 animated bounceInDown delay-2s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fas fa-bell fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Jadwal : <span style="font-size:50px;" class="text-warning"><?= $countjadwal ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=jadwal" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
        <div class="col-3">
            <div>
                <div>
                    <span>

                    </span>
                </div>

            </div>
        </div>
    <?php
        }
    ?>

    <?php
    if ($level == 'Siswa') {
    ?>

        <div class="col-4 animated bounceInDown delay-1s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fas fa-chalkboard-teacher fa-3x mr-2 "></i> <span class="mr-3 font-weight-bold cap">
                            Data Guru : <span style="font-size:50px;" class="text-warning"><?= $countguru ?></span></span><br>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=guru" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>

        <div class="col-4 animated bounceInDown delay-1s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fas fa-book fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data MaPel : <span style="font-size:50px;" class="text-warning"><?= $countmapel ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=mapel" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
        <div class="col-4 animated bounceInDown delay-1s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fas fa-chalkboard fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Kelas : <span style="font-size:50px;" class="text-warning"><?= $countkelas ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=kelas" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3">
            <div>
                <div>
                    <span>

                    </span>
                </div>

            </div>
        </div>
        <div class="col-3 animated bounceInDown delay-2s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fab fa-accusoft fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Jurusan : <span style="font-size:50px;" class="text-warning"><?= $countjurusan ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=jurusan" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
        <div class="col-3 animated bounceInDown delay-2s faster">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header py-3 bg-dark">
                    <span>
                        <i class="fas fa-bell fa-3x mr-2"></i> <span class="mr-3 font-weight-bold cap"> Data Jadwal : <span style="font-size:50px;" class="text-warning"><?= $countjadwal ?></span></span>
                    </span>
                </div>
                <h6 class="m-2"> <a href="?page=jadwal" class="text-dark"><i class="fa fa-arrow-circle-right mr-2"></i>Lihat Selengkapnya</a> </h6>
            </div>
        </div>
        <div class="col-3">
            <div>
                <div>
                    <span>

                    </span>
                </div>

            </div>
        </div>
    <?php
    }
    ?>
    </div>
</section>