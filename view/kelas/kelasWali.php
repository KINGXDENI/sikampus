	<?php
	if (isset($_GET['kode_kelas'])) {
		// ambil data get dari form
		$kode_kelas = $_GET['kode_kelas'];
		// perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_kelas
		$query = mysqli_query($db, "SELECT * FROM tbl_kelass as tk
        INNER JOIN tbl_guru as tg ON tk.wali_kelas = tg.nip
        WHERE tk.kode_kelas='$kode_kelas'")
			or die('Query Error : ' . mysqli_error($db));
		$data = mysqli_fetch_assoc($query);
		// buat variabel untuk menampung data
		$kode_kelas = $data['kode_kelas'];
		$nama_kelas = $data['nama_kelas'];
		$wali_kelas = $data['nama'];
		$tingkat = $data['tingkat'];
		$semester = $data['semester'];
		$tahun = $data['tahun'];
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
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="d-sm-flex mb-3">
				<div class="col-10 d-flex">
					<a href="?page=kelas" class="btn-circle btn-dark text-warning shadow-lg">
						<i class="fas fa-arrow-left"></i>
					</a>
					<h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Data Wali Kelas</h1>
				</div>
				<a href="?page=tambahwali&kode_kelas=<?php echo $data['kode_kelas']; ?>"><button class="btn btn-warning btn-md btn-icon-split ml-5 shadow-lg">
						<span class="text text-dark cap font-weight-bold">Tambah Data
							<i class="fas fa-plus"></i>
						</span>
					</button></a>
			</div>

			<div class="card border-bottom-warning shadow mb-4 animated bounceIn faster">
				<div class="card-body bg-dark">
					<table class="table table-dark">
						<thead>
							<tr>
								<td width="150" class="bg-warning text-dark cap font-weight-bold">Kode Kelas</td>
								<td>: <?php echo $kode_kelas; ?></td>
								<td width="150" class="bg-warning text-dark cap font-weight-bold">Nama Kelas</td>
								<td>: <?php echo $nama_kelas; ?></td>
							</tr>
						</thead>
						<tr>
							<td width="150" class="bg-warning text-dark cap font-weight-bold">Wali Kelas</td>
							<td>: <?php echo $wali_kelas; ?></td>
							<td width="150" class="bg-warning text-dark cap font-weight-bold">Tahun Ajaran</td>
							<td>: <?php echo $tahun; ?></td>
						</tr>
						<tr>
							<td width="150" class="bg-warning text-dark cap font-weight-bold">Tingkat</td>
							<td>: <?php echo $tingkat; ?></td>
							<td width="150" class="bg-warning text-dark cap font-weight-bold">Semester</td>
							<td>: <?php echo $semester; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="card border-bottom-warning shadow mb-4 animated bounceIn faster">
				<div class="card-body bg-dark">
					<table id="datatables" class="table table-striped table-dark mt-3 style='width:100%'">
						<thead>
							<tr class="cap">
								<th>No.</th>
								<th>Foto</th>
								<th>NIM</th>
								<th>Nama Siswa</th>
								<th>Tempat, Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>Agama</th>
								<th>Alamat</th>
								<th>No. HP</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no =  1;
							$query = mysqli_query($db, "SELECT * FROM tbl_kelasdetail tkd INNER JOIN tbl_siswa ts ON ts.nim=tkd.nim WHERE kode_kelas = '$kode_kelas'  ORDER BY ts.nim DESC")
								or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));

							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td width=" 30" class="center"><?php echo $no; ?></td>
									<td width="45" class="center"><img class="foto-thumbnail" src='foto/<?php echo $data['foto']; ?>' alt="Foto Siswa"></td>
									<td width="80" class="center"><?php echo $data['nim']; ?></td>
									<td width="180"><?php echo $data['nama']; ?></td>
									<td width="180"><?php echo $data['tempat_lahir']; ?>, <?php echo date('d-m-Y', strtotime($data['tanggal_lahir'])); ?></td>
									<td width="120"><?php echo $data['jenis_kelamin']; ?></td>
									<td width="100"><?php echo $data['agama']; ?></td>
									<td width="180"><?php echo $data['alamat']; ?></td>
									<td width="70" class="center"><?php echo $data['no_hp']; ?></td>

									<td width="120" class="center">

										<a title="Hapus" class="btn btn-danger" href="view/kelas/kelasWaliHapus.php?kode_kelas=<?php echo $data['kode_kelas']; ?>&nim=<?php echo $data['nim']; ?>" id="btn-del"><i class="fas fa-trash"></i></a>
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