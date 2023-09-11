<?= view('_partials/head.php'); ?>
<?= view('_partials/nav.php'); ?>
<?= view('_partials/datatable.php'); ?>

<div class="card mb-3">
	<div class="card-header">
		<?php
		$btn = "<< Kembali";
		$proses = "komentar";
		$path = "";
		if ($pro == "read") {
			$path = site_url('komentarCreate');
			$btn = "++ Tambah Data";
		} else if ($pro == "create") {
			$proses = "komentarSave";
			$path = site_url('komentar');
		} else if ($pro == "edit") {
			$proses = "komentarUpdate";
			$path = site_url('komentar');
		} else {
			$path = site_url('komentar');
		}

		echo "<a href='$path'>
		<button type='button' class='btn btn-secondary btn-sm'>$btn</button>
	</a>";
		?>
	</div>

	<div class="card-body">
		<?php
		echo "Proses :" . $pro;
		if ($pro == "create" || $pro == "edit") {
			$id_komentar = "";
			$id_pengguna = "";
			$id_kuliner = "";
			$komentar = "";
			$gambar = "";
			$gambar0 = "";
			$tanggal = "";
			$jam = "";
			$status = "";
			$keterangan = "";

			if ($pro == "edit") {
				$id_komentar = $mylist['id_komentar'];
				$id_pengguna = $mylist['id_pengguna'];
				$id_kuliner = $mylist['id_kuliner'];
				$komentar = $mylist['komentar'];
				$gambar = $mylist['gambar'];
				$gambar0 = $mylist['gambar'];
				$tanggal = $mylist['tanggal'];
				$jam = $mylist['jam'];
				$status = $mylist['status'];
				$keterangan = $mylist['keterangan'];
			}
		?>
			<div class="bd-example">
				<form class="row g-3" action="<?php echo site_url($proses); ?>" method="post" enctype="multipart/form-data">


					<div class="col-md-4">
						<label for="validationServer01" class="form-label">Pilih Pengguna</label>
						<select name="id_pengguna" class="form-control is-valid" id="validationServer01" required>
							<?php
							foreach ($mypengguna as $d) {
								$nama_pengguna = $d['nama_pengguna'];
								$id_pengguna0 = $d['id_pengguna'];

								echo "<option value='$id_pengguna0' ";
								if ($id_pengguna == $id_pengguna0) {
									echo "selected";
								}
								echo ">$nama_pengguna</option>";
							}
							?>
						</select>

					</div>


					<div class="col-md-4">

						<label for="validationServer01" class="form-label">Pilih Kuliner</label>
						<select name="id_kuliner" class="form-control is-valid" id="validationServer01" required>
							<?php
							foreach ($mykuliner as $d) {
								$nama_kuliner = $d['nama_kuliner'];
								$id_kuliner0 = $d['id_kuliner'];

								echo "<option value='$id_kuliner0' ";
								if ($id_kuliner == $id_kuliner0) {
									echo "selected";
								}
								echo ">$nama_kuliner</option>";
							}
							?>
						</select>
					</div>

					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Komentar</label>
						<input type="text" class="form-control is-valid" id="validationServer03" name="komentar" value="<?php echo $komentar; ?>" required>
					</div>
					<div class="col-md-8">
						<label for="validationServer02" class="form-label">Gambar <?php echo $gambar0; ?></label>
						<input type="file" class="form-control is-valid" id="validationServer02" value="<?php echo $gambar; ?>" name="gambar" <?php echo $req; ?>>
					</div>
					<div class="col-md-4">
						<label for="validationServer04" class="form-label">Status</label>
						<select class="form-select is-valid" name="status" id="validationServer04" required>
							<option value="Aktif" <?php if ($status == "Aktif") {
														echo "selected";
													} ?>>Aktif</option>
							<option value="Tidak Aktif" <?php if ($status == "Tidak Aktif") {
															echo "selected";
														} ?>>Tidak Aktif</option>
						</select>
					</div>

					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Keterangan</label>
						<textarea class="form-control" aria-label="With textarea" name="keterangan"><?php echo $keterangan; ?></textarea>
					</div>

					<div class="col-12">
						<button class="btn btn-primary" type="submit" name="Simpan">Simpan</button>
						<button class="btn btn-danger" type="Reset" name="Reset">Reset</button>
						<input type="hidden" value="<?php echo $id_komentar; ?>" name="id_komentar">
						<input type="hidden" value="<?php echo $gambar0; ?>" name="gambar0">
						<input type="hidden" value="<?php echo $pro; ?>" name="pro">
					</div>
				</form>
			</div>

			<hr>
		<?php
		} else {
		?>
			<table id="example" class="display" style="width:100%">
				<thead>
					<!--<th>Gambar</th>-->
					<th>Pengguna</th>
					<th>Nama Kuliner</th>
					<th>Komentar</th>
					<th>Keterangan</th>
					<th>Menu</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($mylist as $d) {
						$id_komentar = $d['id_komentar'];
						$id_pengguna = $d['id_pengguna'];
						$id_kuliner = $d['id_kuliner'];
						$komentar = $d['komentar'];
						$tanggal = $d['tanggal'];
						$jam = $d['jam'];
						$gambar = $d['gambar'];
						$status = $d['status'];
						$keterangan = $d['keterangan'];
						$keterangan = substr($keterangan, 0, 120);

						$pengguna = getPengguna($id_pengguna);
						$nama_kuliner = getKuliner($id_kuliner);


						$linkedt = base_url() . "/komentar/edit/$id_komentar";
						$linkdlt = base_url() . "/komentar/delete/$id_komentar";
						$gb = $gambar;
						$gbr = base_url("images/$gb");
						$GB = "<img width='130' height='100' src='$gbr' alt='$nama_kuliner' title='$nama_kuliner'>";

						echo "<tr>
						<td>$pengguna</td>
						<td>$nama_kuliner</a></td>
						<td>$komentar </td>
						<td>$tanggal-$jam, $status $keterangan</td>";

						$btnU = base_url("images/u.png");
						$btnH = base_url("images/h.png");

						echo "<td><a href='$linkedt'><img src='$btnU'></a>
		<a href='$linkdlt'><img src='$btnH'
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_komentar pada Data ini ?..\")'
		></a></td>";

						echo "</tr>";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<!--<th>Gambar</th>-->
						<th>Pengguna</th>
						<th>Nama Kuliner</th>
						<th>komentar</th>
						<th>Keterangan</th>
						<th>Menu</th>
					</tr>
				</tfoot>
			</table>

		<?php
		}
		?>
	</div>
</div>


<?= view('_partials/footer.php'); ?>