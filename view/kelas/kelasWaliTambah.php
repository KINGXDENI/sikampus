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
			$kode_jurusan = $data['kode_jurusan'];
		}
		?>
		<form class="needs-validation" action="view/kelas/kelaswali_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>
			<div class="row">
				<div class="col-md-12">
					<div class="d-sm-flex mb-3">
						<div class="col-10 d-flex">
							<a href="?page=kelasWali&kode_kelas=<?php echo $data['kode_kelas']; ?>" class="btn-circle btn-dark text-warning shadow-lg">
								<i class="fas fa-arrow-left"></i>
							</a>
							<h1 class="h2 mb-0 ml-4 text-dark font-weight-bold cap">Tambah WaliKelas</h1>
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
							<!-- form tambah Mata Pelajaran -->

							<input type="hidden" value="<?php echo $kode_kelas; ?>" name="kode_kelas">
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
									$no = 1;
									$query = mysqli_query($db, "SELECT * FROM tbl_siswa as ts
                    				INNER JOIN tbl_jurusan as tj ON ts.kode_jurusan = tj.kode_jurusan  
									WHERE ts.kode_jurusan='$kode_jurusan'");
									$row = mysqli_num_rows($query);
									while ($data = mysqli_fetch_assoc($query)) { ?>
										<tr>
											<?php
											if ($row > 0) { ?>
												<td width="30" class="center"><?php echo $no; ?></td>
												<td width="45" class="center"><img class="foto-thumbnail" src='foto/<?php echo $data['foto']; ?>' alt="Foto Siswa"></td>
												<td><?php echo $data['nim']; ?></td>
												<td><?php echo $data['nama']; ?></td>
												<td><?php echo $data['tempat_lahir']; ?>, <?php echo date(
																								'd-m-Y',
																								strtotime($data['tanggal_lahir'])
																							); ?></td>
												<td><?php echo $data['jenis_kelamin']; ?></td>
												<td><?php echo $data['nama_jurusan']; ?></td>
												<td><?php echo $data['agama']; ?></td>
												<td><?php echo $data['alamat']; ?></td>
												<td><?php echo $data['no_hp']; ?></td>

												<td width="120" class="center">
													<?php
													$queryS = mysqli_query($db, "SELECT * FROM tbl_kelasdetail WHERE nim='" . $data['nim'] . "'");
													$dataS = mysqli_num_rows($queryS);
													if ($dataS > 0) {
													?>
														<i class="fas text-success fa-check"></i>
													<?php
													} else {
													?>
														<input type="checkbox" value="<?php echo $data['nim']; ?>" name="nim[]" />
													<?php
													}
													?>

												</td>
											<?php
											} ?>

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
		</form>