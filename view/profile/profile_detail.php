<?php
// jika tombol ubah diklik
if (isset($_GET['id'])) {
    // ambil data get dari form
    $nim = $_SESSION['user'];
    // perintah query untuk menampilkan data dari tabel siswa berdasarkan nim
    $query = mysqli_query($db, "SELECT * FROM tbl_siswa WHERE nim='$nim'")
        or die('Query Error : ' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampung data
    $nim = $data['nim'];
    $nama = $data['nama'];
    $tempat_lahir = $data['tempat_lahir'];
    $tanggal_lahir = date('d-m-Y', strtotime($data['tanggal_lahir']));
    $jenis_kelamin = $data['jenis_kelamin'];
    $agama = $data['agama'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $foto = $data['foto'];
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="d-sm-flex mb-2 ml-4 ">
            <div class="col-11 d-flex">
                <a href="?page=profile&id=<?php echo $id ?>" class="btn-circle btn-dark text-warning animated bounceInLeft delay-1s">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap bounceIn">Detail Profile</h1>
            </div>
        </div>
        <div class="d-sm-flex justify-content-between mb-0">
            <div class="col-lg-9 mb-4">
                <!-- buku -->
                <div class="card shadow border-bottom-warning mb-4 animated bounceIn">
                    <div class="card-header py-3 bg-warning">
                        <h4 class="mm-0 font-weight-bold text-dark text-center cap ">Biodata</h4>
                    </div>
                    <div class="card-body bg-dark text-warning d-sm-flex">
                        <br>

                        <div class="col-lg-5 mt-3 ml-5">
                            <!-- ID Buku -->
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">NIM</label>
                                <h4 class="h5 text-white"><b><?= $nim ?></b></h4>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <!-- Judul Buku -->
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">Nama</label>
                                <h4 class="h5 text-white"><?= $nama ?></h4>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <!-- Kategori -->
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">Jenis Kelamin</label>
                                <h4 class="h5 text-white"><?= $jenis_kelamin ?></h4>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <!-- Pengarang -->
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">Agama</label>
                                <h4 class="h5 text-white"><?= $agama ?></h4>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <!-- ISBN -->

                            <!-- Divider -->

                        </div>
                        <div class="col-lg-5 mt-3">
                            <!-- Jumlah Hal -->
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">Alamat</label>
                                <h4 class="h5 text-white"><?= $alamat ?></h4>
                            </div>
                            <hr class="sidebar-divider">
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">Tempat Lahir</label>
                                <h4 class="h5 text-white"><?= $tempat_lahir ?></h4>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <!-- Jumlah Buku -->
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">Tanggal Lahir</label>
                                <h4 class="h5 text-white"><?= $tanggal_lahir ?></h4>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">


                            <!-- Sinopsis -->
                            <div class="form-group"><label class="cap font-weight-bold" style="font-size: 20px;">No. Hp</label>
                                <h4 class="h5 text-white"><?= $no_hp ?></h4>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-3 mb-4">
                <!-- buku -->
                <div class="card shadow border-bottom-dark mb-4 animated bounceIn">
                    <div class="card-header py-3 bg-warning">
                        <h4 class="m-0 font-weight-bold text-dark text-center cap ">Foto</h4>
                    </div>
                    <div class="card-body bg-dark">
                        <center>
                            <div id="imagePreview"><img class="foto-preview mb-3" src="foto/<?php echo $foto; ?>" width="100%" /></div>
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>