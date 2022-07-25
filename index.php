<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login.php");
    exit;
}
$id = $_SESSION['id'];
$fotop = $_SESSION['foto'];
require_once "config/database.php";
require "jmlhdata.php";
include "kode_auto.php";
include "admin.php";

// panggil file database.php untuk koneksi ke database


?>

<!doctype html> <!-- HTML 5 Tag -->
<html lang="en">
<!-- tag pembuka HTML -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Pengelolaan Data Siswa dengan PHP 7, MySQLi, dan Bootstrap 4">
    <meta name="keywords" content="Aplikasi Pengelolaan Data Siswa dengan PHP 7, MySQLi, dan Bootstrap 4">
    <meta name="author" content="Indra Styawantoro">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/utm.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <!-- datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.2-web/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styleeeee.css">
    <link rel="stylesheet" type="text/css" href="assets/css/profileee.css">
    <link rel="stylesheet" type="text/css" href="assets/css/timepicker.css">

    <link rel="stylesheet" type="text/css" href="assets/css/sb-admin-biru.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sb-admin-cokelat.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />

    <link rel="stylesheet" type="text/css" href="assets/datatab/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/datatab/dataTables.bootstrap4.min.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.compat.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylenavvvv.css">
    <link rel="stylesheet" type="text/css" href="assets/summernote/summernote.min.css">
    <!-- title -->
    <title>Data Sekolah</title>
</head>

<body class="bg-light">
    <?php if (empty($_GET['alert'])) {
        echo "";
    }
    // jika alert = 1
    // tampilkan pesan Sukses "Data guru berhasil disimpan"
    elseif ($_GET['alert'] == 11) { ?>
        <div class="flash-data11" data-flashdata11="<?= $_GET['alert'] == 11; ?>"></div>
    <?php
    } elseif ($_GET['alert'] == 55) { ?>
        <div class="flash-data55" data-flashdata55="<?= $_GET['alert'] == 55; ?>"></div>
    <?php
    }
    ?>
    <div class="mynav">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom shadow-sm">
            <?php $page = @$_GET['page'];
            if (empty($page)) {
                $penggunaaktif = 'activee';
            }
            if ($page == "jadwal") {
                $jawalaktif = 'activee';
            }
            if ($page == "guru") {
                $guruaktif = 'activeee cap';
                $aktif = 'activeee2';
            } elseif ($page == "siswa") {
                $siswaaktif = 'activeee cap';
                $aktif = 'activeee2';
            } elseif ($page == "kelas") {
                $kelasaktif = 'activeee cap';
                $aktif = 'activeee2';
            } elseif ($page == "jurusan") {
                $jurusanaktif = 'activeee cap';
                $aktif = 'activeee2';
            } elseif ($page == "mapel") {
                $mapelaktif = 'activeee cap';
                $aktif = 'activeee2';
            } elseif ($page == "waktu") {
                $waktuaktif = 'activeee cap';
                $aktif = 'activeee2';
            } elseif ($page == "hari") {
                $hariaktif = 'activeee cap';
                $aktif = 'activeee2';
            } elseif ($page == "profile") {
                $profileaktif = 'activeee';
            } elseif ($page == "rencana") {
                $rencanaaktif = 'activeee';
            } elseif ($page == "kelasWaliSiswa") {
                $kelaswaliaktif = 'activeee cap';
                $aktif = 'activeee2';
            }     ?>
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="./">
                    <h5 class="my-0 mr-md-auto font-weight-bold"><i class="fas fa-user title-icon"></i> DATA
                        SEKOLAH</h5>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= $penggunaaktif ?> ">
                            <a class="nav-link text-white" href="./"><i class="fas fa-home"></i> Home <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item dropdown no-arrow  ">
                            <a class="nav-link text-white dropdown-toggle <?= $aktif ?> >" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-book-reader"></i> Data Sekolah
                            </a>
                            <?php
                            if ($level == 'Admin') {

                            ?>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item <?= $guruaktif ?> " href="?page=guru"> <i class="fas fa-chalkboard-teacher aa mr-2"></i> <span class="aa bb ">Data Guru</span></a>
                                    <a class="dropdown-item <?= $siswaaktif ?>" href="?page=siswa"> <i class="fas fa-user-graduate aa mr-2"></i> <span class="aa bb ml-1">Data Siswa</span></a>
                                    <a class="dropdown-item <?= $kelasaktif ?>" href="?page=kelas"> <i class="fas fa-chalkboard aa mr-2"></i> <span class="aa bb ">Data Kelas</span></a>
                                    <a class="dropdown-item <?= $jurusanaktif ?>" href="?page=jurusan"> <i class="fab fa-accusoft aa mr-2"></i> <span class="aa bb">Data Jurusan</span></a>
                                    <a class="dropdown-item <?= $mapelaktif ?>" href="?page=mapel"> <i class="fas fa-book aa mr-2"></i> <span class="aa bb ml-1">Data MaPel</span></a>
                                    <a class="dropdown-item <?= $waktuaktif ?>" href="?page=waktu"> <i class="fas fa-clock aa mr-2"></i> <span class="aa bb">Data Waktu</span></a>
                                    <a class="dropdown-item <?= $hariaktif ?>" href="?page=hari"> <i class="fas fa-calendar-alt aa mr-2"></i> <span class="aa bb">Data Hari</span></a>
                                </div>

                            <?php
                            } ?>

                            <?php
                            if ($level == 'Siswa') {

                            ?>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item <?= $guruaktif ?>" href="?page=guru"> <i class="fas fa-chalkboard-teacher aa mr-2"></i> <span class="aa bb ">Data Guru</span></a>
                                    <a class="dropdown-item <?= $kelaswaliaktif ?>" href="?page=kelasWaliSiswa"> <i class="fas fa-chalkboard aa mr-2"></i> <span class="aa bb ">Data Kelas</span></a>
                                    <a class="dropdown-item <?= $jurusanaktif ?>" href="?page=jurusan"> <i class="fab fa-accusoft aa mr-2"></i> <span class="aa bb">Data Jurusan</span></a>
                                    <a class="dropdown-item <?= $mapelaktif ?>" href="?page=mapel"> <i class="fas fa-book aa mr-2"></i> <span class="aa bb ml-1">Data MaPel</span></a>
                                </div>
                            <?php
                            } ?>
                        </li>
                        <li class="nav-item <?= $jawalaktif ?>">
                            <a class="nav-link text-white" href="?page=jadwal"><i class="fas fa-bell aa mr-2"></i>Jadwal</a>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-book-open"></i> Raport
                            </a>
                            <?php
                            if ($level == 'Admin') {

                            ?>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="?page=guru"> <i class="fas fa-chalkboard-teacher aa mr-2"></i> <span class="aa bb ">Data Guru</span></a>
                                    <a class="dropdown-item" href="?page=siswa"> <i class="fas fa-user-graduate aa mr-2"></i> <span class="aa bb ml-1">Data Siswa</span></a>
                                    <a class="dropdown-item" href="?page=kelas"> <i class="fas fa-chalkboard aa mr-2"></i> <span class="aa bb ">Data Kelas</span></a>
                                </div>

                            <?php
                            } ?>

                            <?php
                            if ($level == 'Siswa') {

                            ?>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="?page=guru"> <i class="fas fa-chalkboard-teacher aa mr-2"></i> <span class="aa bb ">Data Guru</span></a>
                                    <a class="dropdown-item" href="?page=kelasWaliSiswa"> <i class="fas fa-chalkboard aa mr-2"></i> <span class="aa bb ">Data Kelas</span></a>
                                    <a class="dropdown-item" href="?page=jurusan"> <i class="fab fa-accusoft aa mr-2"></i> <span class="aa bb">Data Jurusan</span></a>
                                </div>
                            <?php
                            } ?>
                        </li>
                        <li class="nav-item dropdown no-arrow ml-kiri">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="mr-2 d-none d-lg-inline text-warning cap font-weight-bold"><?= $level
                                                                                                        ?></span>
                                <img class=" img-profile rounded-circle" id="img" src="<?php if (empty($foto)) {
                                                                                            echo "foto/undraw_profile.svg";
                                                                                        } else { ?>
                                                                                            foto/<?php echo $foto; ?>
                                                                                        <?php
                                                                                        } ?>" width="30px" height="30px">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item <?= $profileaktif ?>" href="?page=profile&id=<?php echo $id ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                    <span class="cap font-weight-bold">Profile</span>
                                </a>
                                <?php
                                if ($level == 'Admin') { ?>
                                    <a class="dropdown-item <?= $rencanaaktif ?>" href="?page=rencana">
                                        <i class="fas fa-tasks fa-sm fa-fw mr-2"></i>
                                        <span class="cap font-weight-bold">Rencana</span>
                                    </a>
                                    <a class="dropdown-item" href="view/music/musik.php" target="blank">
                                        <i class="fas fa-music fa-sm fa-fw mr-2"></i>
                                        <span class="cap font-weight-bold">Musik</span>
                                    </a>
                                <?php
                                }
                                ?>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout" href="?page=logout" id="btn-log">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
                                    <span class="cap font-weight-bold">Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>

                </div>


            </nav>

        </div>
    </div>

    <div class="container-fluid" id="container">
        <?php
        // fungsi untuk pemanggilan halaman
        // jika page = kosong atau saat aplikasi pertama dijalankan, tampilkan halaman tampil_data.php
        if (empty($_GET["page"])) {
            include "view/home/home.php";
        } elseif ($_GET['page'] == 'logout') {
            include "logout.php";
        }

        // jika page = tambah, maka tampilkan halaman form_tambah_data.php
        elseif ($_GET['page'] == 'tambahs') {
            include "view/siswa/siswa_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahg') {
            include "view/guru/guru_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahk') {
            include "view/kelas/kelas_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahj') {
            include "view/jurusan/jurusan_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahm') {
            include "view/mapel/mapel_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahw') {
            include "view/waktu/waktu_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahjd') {
            include "view/jadwal/jadwal_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahh') {
            include "view/hari/hari_form_tambah.php";
        } elseif ($_GET['page'] == 'tambahwali') {
            include "view/kelas/kelasWaliTambah.php";
        }
        // jika page = ubah, maka tampilkan halaman form_ubah_data.php
        elseif ($_GET['page'] == 'ubahs') {
            include "view/siswa/siswa_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahg') {
            include "view/guru/guru_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahk') {
            include "view/kelas/kelas_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahj') {
            include "view/jurusan/jurusan_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahm') {
            include "view/mapel/mapel_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahw') {
            include "view/waktu/waktu_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahjd') {
            include "view/jadwal/jadwal_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahh') {
            include "view/hari/hari_form_ubah.php";
        } elseif ($_GET['page'] == 'ubahpr') {
            include "view/profile/profile_ubah.php";
        }

        ///
        elseif ($_GET['page'] == 'siswa') {
            include "view/siswa/siswa.php";
        } elseif ($_GET['page'] == 'guru') {
            include "view/guru/guru.php";
        } elseif ($_GET['page'] == 'kelas') {
            include "view/kelas/kelas.php";
        } elseif ($_GET['page'] == 'jurusan') {
            include "view/jurusan/jurusan.php";
        } elseif ($_GET['page'] == 'mapel') {
            include "view/mapel/mapel.php";
        } elseif ($_GET['page'] == 'waktu') {
            include "view/waktu/waktu.php";
        } elseif ($_GET['page'] == 'jadwal') {
            include "view/jadwal/jadwal.php";
        } elseif ($_GET['page'] == 'hari') {
            include "view/hari/hari.php";
        }

        //
        elseif ($_GET['page'] == 'detailg') {
            include "view/guru/guru_detail.php";
        } elseif ($_GET['page'] == 'details') {
            include "view/siswa/siswa_detail.php";
        } elseif ($_GET['page'] == 'detailp') {
            include "view/profile/profile_detail.php";
        } elseif ($_GET['page'] == 'kelasWali') {
            include "view/kelas/kelasWali.php";
        } elseif ($_GET['page'] == 'jadwaldetail') {
            include "view/jadwal/jadwal_detail.php";
        } elseif ($_GET['page'] == 'kelasWaliSiswa') {
            include "view/kelas/kelasWaliSiswa.php";
        } elseif ($_GET['page'] == 'profile') {
            include "view/profile/profile.php";
        } elseif ($_GET['page'] == 'rencana') {
            include "rencana.php";
        }



        ?>
    </div>

    <footer class="p-4 pt-md-mt-3 bg-dark footer" id="footer">
        <div class="container-fluid bg-dark text-white">
            <div class="row">
                <div class="col-12 col-md center">
                    &copy; 2022 - <a class="text-warning" href="https://akademik.utmmataram.ac.id" target="blank">UNIVERSITAS TEKNOLOGI MATARAM</a>
                </div>
            </div>
        </div>
    </footer>



    <!-- Pemanggilan Library jQuery -->

    <!-- pertama jQuery, kemudian Bootstrap js -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/timepicker.js"></script>


    <script type="text/javascript" src="assets/plugins/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>

    <!-- fontawesome js -->
    <script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.1-web/js/all.min.js"></script>

    <!-- datepicker js -->
    <script type="text/javascript" src="assets/datatab/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="assets/datatab/jquery.dataTables.minn.js"></script>
    <script type="text/javascript" src="assets/datatab/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" src="assets/js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <!-- sweetalert js -->
    <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>

    <script type="text/javascript" src="assets/summernote/summernote.min.js"></script>
    <script type="text/javascript">
        // initiate plugin ============================================================================
        // --------------------------------------------------------------------------------------------
        $(document).ready(function() {
            // datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true

            });

        });
        $(document).ready(function() {
            $('#search').keyup(function() {
                $.ajax({
                    type: 'POST',
                    url: 'search.php',
                    data: {
                        search: $(this).val()

                    },
                    cache: false,
                    success: function(data) {
                        $('#tampil').html(data);
                    }
                });
            });
        });
        $(document).ready(function() {
            $(".datepicker1").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
        $(document).ready(function() {
            $(".berhasilsimpan").Swal.fire("Our First Alert", "With some body text and success icon!", "success");
        });
        $(document).ready(function() {
            $(".datepicker1").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#datatables').DataTable();
        });

        window.setTimeout(function() {
            $(".alert1").fadeTo(500, 0), slideUp(500, function() {
                $(this).remove();

            });

        }, 5000);
        $(document).on('click', '#btn-del', function(e) {
            e.preventDefault();
            const link = $(this).attr('href');

            Swal.fire({

                title: 'Anda yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak bisa di kembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya Yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = link;
                }

            })


        })
        $(document).on('click', '#btn-log', function(e) {
            e.preventDefault();
            const link = $(this).attr('href');

            Swal.fire({

                title: "<span  class='cap text-warning'>" + "<?= $_SESSION['user'] ?>" + "</span>" + "<div style='color:#fff' class='cap'>" + " yakin ingin keluar?" + "</div>",
                color: '#ffc107',
                icon: 'warning',
                iconColor: '#ffc107',
                background: '#343a40',
                showCancelButton: true,
                confirmButtonColor: '#ffc107',
                cancelButtonColor: '#d33',
                cancelButtonText: "<span  class='cap font-weight-bold text-dark'>" + "Tidak" + "</span>",
                confirmButtonText: "<span  class='cap font-weight-bold text-dark'>" + "Ya" + "</span>"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = link;
                }

            })


        })

        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $(function() {
            $("#idchk").change(function() {
                var st = this.checked;
                if (st) {
                    $("idtxt").prop("disabled", false);
                } else {
                    $("idtxt").prop("disabled", true);
                }
            });
        });

        $('#tombl').on('click', function() {
            Swal.fire({
                icon: 'success',
                title: 'your title',
                text: 'youer txt'
            })

        })

        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Berhasil Dihapus'
            })
        }

        const flashdata4 = $('.flash-data4').data('flashdata4')
        if (flashdata4) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data Sudah Ada'
            })
        }
        const flashdata1 = $('.flash-data1').data('flashdata1')
        if (flashdata1) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data Berhasil Disimpan'
            })
        }
        const flashdata3 = $('.flash-data3').data('flashdata3')
        if (flashdata3) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data Berhasil Dihapus'
            })
        }

        const flashdata2 = $('.flash-data2').data('flashdata2')
        if (flashdata2) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data Berhasil Diubah'
            })
        }

        const flashdata11 = $('.flash-data11').data('flashdata11')
        if (flashdata11) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Berhasil Login'
            })
        }
        const flashdata55 = $('.flash-data55').data('flashdata55')
        if (flashdata55) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Anda Belum Memiliki Kelas'
            })
        }
        $(document).ready(function() {
            $(".tidakadakelas").Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Anda Belum Memiliki Kelas'
            })
        });

        function hapuss() {
            Swal.fire({
                title: 'Apakah Anda Yakin ?',
                text: "Data Anda Tidak Dapat di Kembalikan ..",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data ini!',
                cancelButtonText: 'Tidak..',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Berhasil Dihapus.',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Warning..!',
                        'Gagal Dihapus.',
                        'warning'
                    )
                }
            })
        }
        $(document).ready(function() {
            $('ul li a').click(function() {
                $('li a').removeClass("activee");
                $(this).addClass("activee");
            });
        });

        $('.custom-file-input').on('change', function() {
            var fileName = document.getElementById("exampleInputFile").files[0].name;
            $(this).next('.form-control-file').addClass("selected").html(fileName);
        })
        // ============================================================================================

        const realFileBtn = document.getElementById("real-file");
        const customBtn = document.getElementById("custom-button");
        const customTxt = document.getElementById("custom-text");

        customBtn.addEventListener("click", function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener("change", function() {
            if (realFileBtn.value) {
                customTxt.innerHTML = realFileBtn.value.match(
                    /[\/\\]([\w\d\s\.\-\(\)]+)$/
                )[1];
            } else {
                customTxt.innerHTML = "No file chosen, yet.";
            }
        });

        // Validasi Form Tambah dan Form Ubah =========================================================
        // --------------------------------------------------------------------------------------------
        // Validasi form input tidak boleh kosong
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();

                        }
                        form.classList.add('was-validated');

                    }, false);

                });

            }, false);

        })();

        function getnip() {
            var char =
                "0123456789";
            var nipLenght = 15;
            var nip = "";

            for (var i = 0; i < nipLenght; i++) {
                var randomNumber = Math.floor(Math.random() * char.length);
                nip += char.substring(randomNumber, randomNumber + 1);
            }
            document.getElementById("nip").value = nip;

        }

        // Validasi karakter yang boleh diinpukan pada form

        function getkey(e) {
            if (window.event)
                return window.event.keyCode;
            else if (e)
                return e.w
            else
                return null;

        }

        function goodchars(e, goods, field) {
            var key, keychar;
            key = getkey(e);
            if (key == null) return true;
            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();
            // check goodkeys
            if (goods.indexOf(keychar) != -1)
                return true;
            // control keys
            if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
                return true;
            if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                    if (field == field.form.elements[i])
                        break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;

            };
            // else return false
            return false;

        }

        // validasi image dan preview image sebelum upload
        function validasiFile() {
            var fileInput = document.getElementById('foto');
            var filePath = fileInput.value;
            var fileSize = $('#foto')[0].files[0].size;
            // tentukan extension yang diperbolehkan
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            // Jika tipe file yang diupload tidak sesuai dengan allowedExtensions, tampilkan pesan :
            if (!allowedExtensions.exec(filePath)) {
                alert('Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png ');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png "/>';
                return false;
            }
            // jika ukuran file yang diupload lebih dari sama dengan 1 Mb
            else if (fileSize >= 1000000) {
                alert('Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png "/>';
                return false;
            }
            // selain itu
            else {
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src = "' + e.target.result + '"/>';

                    };
                    reader.readAsDataURL(fileInput.files[0]);

                }

            }
        }

        function remop() { 
            document.getElementById('Input').removeAttribute('readonly');
        }

        function darkmode() {
            var element = document.body;
            element.classList.toggle("dark-mode");
        }
            // ============================================================================================
    </script>
</body>

</html> <!-- tag penutup HTM -->