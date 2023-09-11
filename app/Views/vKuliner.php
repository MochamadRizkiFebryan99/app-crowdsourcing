<?= view('_partials/head.php'); ?>
<?= view('_partials/nav.php'); ?>
<?= view('_partials/datatable.php'); ?>

<div class="card mb-3">
	<div class="card-header">
		<?php
		$btn = "<< Kembali";
		$proses = "kuliner";
		$path = "";
		if ($pro == "read") {
			$path = site_url('kulinerCreate');
			$btn = "++ Tambah Data";
		} else if ($pro == "create") {
			$proses = "kulinerSave";
			$path = site_url('kuliner');
		} else if ($pro == "edit") {
			$proses = "kulinerUpdate";
			$path = site_url('kuliner');
		} else {
			$path = site_url('kuliner');
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
			$id_kuliner = "";
			$nama_kuliner = "";
			$deskripsi = "";
			$email = "";
			$telepon = "";
			$alamat = "";
			$ragam_menu = "";
			$waktu_oprasional = "10:00 s/d 23:00";
			$latitude = "-6.351755546144775";
			$longitude = "106.83253321253963";

			$emded = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3248840771594!2d106.83031234145096!3d-6.351968810265676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed820a9b0a09%3A0xb08fa0346dc70421!2sBebek%20Kaleyo%20Lenteng%20Agung!5e0!3m2!1sen!2sid!4v1656211238364!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
			$emded = htmlentities($emded);

			$gambar1 = "avatar.jpg";
			$gambar2 = "avatar.jpg";
			$gambar3 = "avatar.jpg";
			$gambar4 = "avatar.jpg";
			$gambar5 = "avatar.jpg";

			$gambar10 = "avatar.jpg";
			$gambar20 = "avatar.jpg";
			$gambar30 = "avatar.jpg";
			$gambar40 = "avatar.jpg";
			$gambar50 = "avatar.jpg";

			$status = "Tersedia";
			$keterangan = "";
			$req = "required";
			if ($pro == "edit") {
				$id_kuliner = $mylist['id_kuliner'];
				$nama_kuliner = $mylist['nama_kuliner'];
				$deskripsi = $mylist['deskripsi'];
				$email = $mylist['email'];
				$telepon = $mylist['telepon'];
				$alamat = $mylist['alamat'];
				$ragam_menu = $mylist['ragam_menu'];
				$waktu_oprasional = $mylist['waktu_oprasional'];
				$latitude = $mylist['latitude'];
				$longitude = $mylist['longitude'];
				$emded = $mylist['emded'];
				$emded = htmlentities($emded);

				$gambar1 = $mylist['gambar1'];
				$gambar2 = $mylist['gambar2'];
				$gambar3 = $mylist['gambar3'];
				$gambar4 = $mylist['gambar4'];
				$gambar5 = $mylist['gambar5'];
				$gambar10 = $gambar1;
				$gambar20 = $gambar2;
				$gambar30 = $gambar3;
				$gambar40 = $gambar4;
				$gambar50 = $gambar5;

				$status = $mylist['status'];
				$keterangan = $mylist['keterangan'];
				$req = "";
			}
		?>
			<div class="bd-example">
				<form class="row g-3" action="<?php echo site_url($proses); ?>" method="post" enctype="multipart/form-data">


					<div class="col-md-4">
						<label for="validationServer01" class="form-label">Nama Kuliner</label>
						<input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $nama_kuliner; ?>" name="nama_kuliner" required>
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Telepon</label>
						<input type="text" class="form-control is-valid" id="validationServer04" value="<?php echo $telepon; ?>" name="telepon" required>
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Email</label>
						<input type="email" class="form-control is-valid" id="validationServer03" value="<?php echo $email; ?>" name="email" required>
					</div>


					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Deskripsi</label>
						<textarea class="form-control" aria-label="With textarea" name="deskripsi"><?php echo $deskripsi; ?></textarea>
					</div>

					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Alamat</label>
						<input type="text" class="form-control is-valid" id="validationServer05" name="alamat" value="<?php echo $alamat; ?>" required>
					</div>

					<div class="col-md-12">
						<label for="validationServer02" class="form-label">Ragam Menu</label>
						<textarea class="form-control" aria-label="With textarea" name="ragam_menu"><?php echo $ragam_menu; ?></textarea>
					</div>



					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Latitude</label>
						<input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $latitude; ?>" name="latitude" required>
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Longitude</label>
						<input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $longitude; ?>" name="longitude" required>
					</div>



					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Waktu Kerja</label>
						<input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $waktu_oprasional; ?>" name="waktu_oprasional" required>
					</div>


					<div class="col-md-12">
						<label for="validationServer02" class="form-label">Emded</label>
						<input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $emded; ?>" name="emded" required>
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Gambar <?php echo $gambar10; ?></label>
						<input type="file" class="form-control is-valid" id="validationServer02" <?php echo $req; ?> value="<?php echo $gambar1; ?>" name="gambar1">
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Gambar <?php echo $gambar20; ?></label>
						<input type="file" class="form-control is-valid" id="validationServer02" <?php echo $req; ?> value="<?php echo $gambar2; ?>" name="gambar2">
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Gambar <?php echo $gambar30; ?></label>
						<input type="file" class="form-control is-valid" id="validationServer02" <?php echo $req; ?> value="<?php echo $gambar3; ?>" name="gambar3">
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Gambar <?php echo $gambar40; ?></label>
						<input type="file" class="form-control is-valid" id="validationServer02" <?php echo $req; ?> value="<?php echo $gambar4; ?>" name="gambar4">
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Gambar <?php echo $gambar50; ?></label>
						<input type="file" class="form-control is-valid" id="validationServer02" <?php echo $req; ?> value="<?php echo $gambar5; ?>" name="gambar5">
					</div>

					<div class="col-md-4">
						<label for="validationServer04" class="form-label">Status</label>
						<select class="form-select is-valid" name="status" id="validationServer04" required>
							<option value="Tersedia" <?php if ($status == "Tersedia") {
															echo "selected";
														} ?>>Tersedia</option>
							<option value="Tidak Tersedia" <?php if ($status == "Tidak Tersedia") {
																echo "selected";
															} ?>>Tidak Tersedia</option>
						</select>
					</div>

					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Keterangan</label>
						<textarea class="form-control" aria-label="With textarea" name="keterangan"><?php echo $keterangan; ?></textarea>
					</div>

					<div class="col-12">
						<button class="btn btn-primary" type="submit" name="Simpan">Simpan</button>
						<button class="btn btn-danger" type="Reset" name="Reset">Reset</button>
						<input type="hidden" value="<?php echo $id_kuliner; ?>" name="id_kuliner">
						<input type="hidden" value="<?php echo $pro; ?>" name="pro">
						<input type="hidden" value="<?php echo $gambar10; ?>" name="gambar10">
						<input type="hidden" value="<?php echo $gambar20; ?>" name="gambar20">
						<input type="hidden" value="<?php echo $gambar30; ?>" name="gambar30">
						<input type="hidden" value="<?php echo $gambar40; ?>" name="gambar40">
						<input type="hidden" value="<?php echo $gambar50; ?>" name="gambar50">


					</div>
				</form>
			</div>

			<hr>
		<?php
		} else {
		?>
			<table id="example" class="display" style="width:100%">
				<thead>
					<th>Gambar</th>
					<th>Detail</th>
					<th>Menu</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$LAT1="";
					$LON1="";
					$PATH="";
					foreach ($mylist as $d) {
						$id_kuliner = $d['id_kuliner'];
						$nama_kuliner = $d['nama_kuliner'];
						$deskripsi = $d['deskripsi'];
						$email = $d['email'];
						$telepon = $d['telepon'];
						$alamat = $d['alamat'];
						$ragam_menu = $d['ragam_menu'];
						$waktu_oprasional = $d['waktu_oprasional'];
						$latitude = $d['latitude'];
						$longitude = $d['longitude'];
						$emded = $d['emded'];
						$gambar1 = $d['gambar1'];
						$gambar2 = $d['gambar2'];
						$gambar3 = $d['gambar3'];
						$gambar4 = $d['gambar4'];
						$gambar5 = $d['gambar5'];
						$status = $d['status'];
						$keterangan = $d['keterangan'];
						$keterangan = substr($keterangan, 0, 120);
                       
						$LINK = $PATH . "dir/direction/?lat1=$LAT1&lon1=$LON1&lat2=$latitude&lon2=$longitude";
						$LINK2 = "https://maps.google.com/maps?saddr=$LAT1,$LON1&daddr=$latitude,$longitude";


						$linkedt = base_url() . "/kuliner/edit/$id_kuliner";
						$linkdlt = base_url() . "/kuliner/delete/$id_kuliner";

						/*
						$filename = BASE_DIR."images/$gambar1";
						if (file_exists($filename)){
							$filename = BASE_DIR."images/$gambar2";
						}
						*/
						$R = rand(1, 5);
						$gb = $gambar1;
						if ($R == 2) {
							$gb = $gambar2;
						} else if ($R == 3) {
							$gb = $gambar3;
						} else if ($R == 4) {
							$gb = $gambar4;
						} else if ($R == 5) {
							$gb = $gambar5;
						}

						$gbr = base_url("images/$gb");
						$GB = "<img width='130' height='100' src='$gbr' alt='$nama_kuliner' title='$nama_kuliner'>";
						echo "<tr>
						<td>$GB</td>
						<td><b>$nama_kuliner</b>  <br>
						<a href='$LINK2'>$alamat, Telp: $telepon, Jam Buka: $waktu_oprasional Wib</a><br>
							  <small><i>$deskripsi Status: $status Catatan: $keterangan</i></small><br>
						</td>";

						$btnU = base_url("images/u.png");
						$btnH = base_url("images/h.png");

						echo "<td><a href='$linkedt'><img src='$btnU'></a>
		<a href='$linkdlt'><img src='$btnH'
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_kuliner pada Data ini ?..\")'
		></a></td>";

						echo "</tr>";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>Gambar</th>
						<th>Detail</th>
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