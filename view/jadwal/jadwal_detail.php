	<?php
    if (isset($_GET['kode_jadwal'])) {
        // ambil data get dari form
        $kode_jadwal = $_GET['kode_jadwal'];
        // perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_kelas
        $query = mysqli_query($db, "SELECT * FROM tbl_jadwal WHERE kode_jadwal='$kode_jadwal'")
            or die('Query Error : ' . mysqli_error($db));
        $data = mysqli_fetch_assoc($query);
        // buat variabel untuk menampung data
        $kode_jadwal = $data['kode_jadwal'];
        $semester = $data['semester'];
        $tahun = $data['tahun_ajaran'];
    }
    ?>
	<?php
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
        echo "";
    }
    // jika alert = 1
    // tampilkan pesan Sukses "Data guru berhasil disimpan"
    elseif ($_GET['alert'] == 1) { ?>
	    <div class="flash-data1" data-flashdata1="<?= $_GET['alert'] == 1; ?>"></div>
	<?php
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data guru berhasil diubah"
    elseif ($_GET['alert'] == 2) { ?>
	    <div class="flash-data2" data-flashdata2="<?= $_GET['alert'] == 2; ?>"></div>
	<?php
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data guru berhasil dihapus"
    elseif ($_GET['alert'] == 3) { ?>
	    <div class="flash-data3" data-flashdata3="<?= $_GET['alert'] == 3; ?>"></div>
	<?php
    }
    // jika alert = 4
    // tampilkan pesan Gagal "nip sudah ada"
    elseif ($_GET['alert'] == 4) { ?>
	    <div class="flash-data4" data-flashdata4="<?= $_GET['alert'] == 4; ?>"></div>
	<?php
    }
    ?><form class="needs-validation" action="view/jadwal/proses_simpan_jadwaldetail.php" method="post" enctype="multipart/form-data" novalidate>
	    <div class="row">
	        <div class="col-md-12">
	            <div class="d-sm-flex mb-3">
	                <div class="col-10 d-flex">
	                    <a href="?page=jadwal" class="btn-circle btn-dark text-warning shadow-lg">
	                        <i class="fas fa-arrow-left"></i>
	                    </a>
	                    <h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Data Jadwal Detail</h1>
	                </div>
	                <button type="submit" class="btn btn-success btn-md btn-icon-split ml-5 shadow-lg" name="simpan" value="Simpan">
	                    <span class="text text-white cap font-weight-bold">Simpan Data
	                        <i class="fas fa-save"></i>
	                    </span>
	                </button>
	            </div>

	            <div class="card border-bottom-warning shadow mb-4 animated bounceIn faster">
	                <div class="card-body bg-dark">
	                    <table class="table table-dark">
	                        <thead>
	                            <tr>
	                                <td width="150" class="bg-warning text-dark cap font-weight-bold">Kode Kelas</td>
	                                <td>: <?php echo $kode_jadwal; ?></td>
	                            </tr>
	                            <tr>
	                                <td width="150" class="bg-warning text-dark cap font-weight-bold">Semester</td>
	                                <td>: <?php echo $semester; ?></td>
	                            </tr>
	                            <tr>
	                                <td width="150" class="bg-warning text-dark cap font-weight-bold">Tahun Ajaran</td>
	                                <td>: <?php echo $tahun; ?></td>
	                            </tr>
	                        </thead>

	                    </table>
	                </div>
	            </div>
	            <div class="card border-bottom-warning shadow mb-4 animated bounceIn faster">
	                <div class="card-body bg-dark">

	                    <div class="row">
	                        <div class="col cap text-warning font-weight-bold">
	                            <div class="form-group col-md-12">
	                                <label>Kode Jadwal</label>
	                                <input type="text" class="form-control" name="kode_jadwal" autocomplete="off" value="<?= $kjd_kat ?>" placeholder="Masukan ID Jadwal" required readonly="readonly">
	                                <div class="invalid-feedback">ID Jadwal tidak boleh kosong.</div>
	                            </div>
	                            <div class="form-group col-md-12">
	                                <label>ID Waktu</label>
	                                <select class="form-control mb-3" name="id_waktu" autocomplete="off" required>
	                                    <option> ---Pilih Id Waktu--- </option>
	                                    <?php
                                        $querywkt = mysqli_query($db, "SELECT * FROM tbl_waktu") or die(mysqli_error($db));
                                        while ($data = mysqli_fetch_assoc($querywkt)) {
                                            echo "<option value=' " . $data['id_waktu'] . "'>" . $data['id_waktu'] . "</option>";
                                        }
                                        ?>
	                                    <div class="invalid-feedback">Wali kelas tidak boleh kosong.</div>
	                                </select>
	                            </div>
	                            <div class="form-group col-md-12">
	                                <label>Kode Mata Pelajaran</label>
	                                <select class="form-control mb-3" name="kode_mapel" autocomplete="off" required>
	                                    <option> ---Pilih Kode Mapel--- </option>
	                                    <?php
                                        $querympl = mysqli_query($db, "SELECT * FROM tbl_matapelajaran") or die(mysqli_error($db));
                                        while ($data = mysqli_fetch_assoc($querympl)) {
                                            echo "<option value=' " . $data['kode_mapel'] . "'>" . $data['nama_mapel'] . "</option>";
                                        }
                                        ?>
	                                    <div class="invalid-feedback">Kode Mapel tidak boleh kosong.</div>
	                                </select>
	                            </div>
	                        </div>

	                        <div class="col cap text-warning font-weight-bold">
	                            <div class="form-group col-md-12">
	                                <label>Kode Kelas</label>
	                                <select class="form-control mb-3" name="kode_kelas" autocomplete="off" required>
	                                    <option> ---Pilih Kode Kelas--- </option>
	                                    <?php
                                        $querykls = mysqli_query($db, "SELECT * FROM tbl_kelass") or die(mysqli_error($db));
                                        while ($data = mysqli_fetch_assoc($querykls)) {
                                            echo "<option value=' " . $data['kode_kelas'] . "'>" . $data['nama_kelas'] . "</option>";
                                        }
                                        ?>
	                                    <div class="invalid-feedback">Kode Kelas tidak boleh kosong.</div>
	                                </select>
	                            </div>
	                            <div class="form-group col-md-12">
	                                <label>NIP</label>
	                                <select class="form-control mb-3" name="nip" autocomplete="off" required>
	                                    <option> ---Pilih NIP--- </option>
	                                    <?php
                                        $querynip = mysqli_query($db, "SELECT * FROM tbl_guru") or die(mysqli_error($db));
                                        while ($data = mysqli_fetch_assoc($querynip)) {
                                            echo "<option value=' " . $data['nip'] . "'>" . $data['nama'] . "</option>";
                                        }
                                        ?>
	                                    <div class="invalid-feedback">Kode Mapel tidak boleh kosong.</div>
	                                </select>
	                            </div>
	                            <div class="form-group col-md-12">
	                                <label>Tahun Ajaran</label>
	                                <input type="text" class="form-control datepicker1" name="tahun_ajaran" maxlength="4" autocomplete="off" placeholder="Masukan Tahun Ajaran" required>
	                                <div class="invalid-feedback">Tahun Ajaran tidak boleh kosong.</div>
	                            </div>
	                        </div>

	                    </div>
	                </div>
	            </div>

	            <div class="card border-bottom-warning shadow mb-4 animated bounceIn faster">
	                <div class="card-body bg-dark">
	                    <table id="datatables" class="table table-striped table-dark mt-3 style='width:100%'">
	                        <thead>
	                            <tr class="cap">
	                                <th>No.</th>
	                                <th>Kode Jadwal</th>
	                                <th>Hari</th>
	                                <th>Mata Pelajaran</th>
	                                <th>Kode Kelas</th>
	                                <th>NIP | Nama Guru</th>
	                                <th>Tahun Ajaran</th>
	                                <th></th>
	                            </tr>
	                        </thead>

	                        <tbody>
	                            <?php
                                $no =  1;
                                $query = mysqli_query($db, "SELECT * FROM tbl_jadwaldetail tjd 
                            INNER JOIN tbl_jadwal tj ON tj.kode_jadwal=tjd.kode_jadwal
                            INNER JOIN tbl_waktu tw ON tjd.id_waktu=tw.id_waktu
                            INNER JOIN tbl_guru tg ON tjd.nip = tg.nip
                            INNER JOIN tbl_matapelajaran tm ON tjd.kode_mapel = tm.kode_mapel
                            INNER JOIN tbl_kelas tk ON tjd.kode_kelas=tk.kode_kelas
                            WHERE tjd.kode_jadwal = '$kode_jadwal'")
                                    or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));

                                while ($data = mysqli_fetch_assoc($query)) { ?>
	                                <tr>
	                                    <td width="30" class="center"><?php echo $no; ?></td>
	                                    <td width="80" class="center"><?php echo $data['kode_jadwal']; ?></td>
	                                    <td width="180"><?php echo $data['id_waktu']; ?></td>
	                                    <td width="120"><?php echo $data['kode_mapel']; ?></td>
	                                    <td width="100"><?php echo $data['kode_kelas']; ?></td>
	                                    <td width="120"><?php echo $data['nip']; ?></td>
	                                    <td width="120"><?php echo $data['tahun_ajaran']; ?></td>
	                                    <!-- // membuat tombol ubah dan hapus -->
	                                    <td width="120" class="center">
	                                        <a title="Ubah" class="btn btn-outline-info" href="?page=ubahjdwl&kode_jadwal=<?php echo $data['kode_jadwal']; ?>"><i class="fas fa-edit"></i></a>
	                                        <a title="Hapus" class="btn btn-outline-danger" href="proses_hapus_jadwal.php?kode_jadwal=<?php echo $data['kode_jadwal']; ?>" onclick="return confirm('Anda yakin ingin menghapus jadwal <?php echo $data['kode_jadwal']; ?>?');"><i class="fas fa-trash"></i></a>
	                                    </td>
	                                </tr>
	                            <?php
                                    $no++;
                                } ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	    </div>
	</form>