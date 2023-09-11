<?= view('_partials/head.php'); ?>
<?= view('_partials/nav.php'); ?>
<?= view('_partials/datatable.php'); ?>

<?php

use App\Models\Kuliner_model;
use App\Models\Pengguna_model;
?>

<div class="card mb-3">
	<div class="card-header">
		<?php
		$btn = "<< Kembali";
		$proses = "rating";
		$path = "";
		if ($pro == "read") {
			$path = site_url('ratingCreate');
			$btn = "++ Tambah Data";
		} else if ($pro == "create") {
			$proses = "ratingSave";
			$path = site_url('rating');
		} else if ($pro == "edit") {
			$proses = "ratingUpdate";
			$path = site_url('rating');
		} else {
			$path = site_url('rating');
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
			$id_rating = "";
			$id_pengguna = "";
			$id_kuliner = "";
			$rating = "";
			$tanggal = "";
			$jam = "";

			if ($pro == "edit") {
				$id_rating = $mylist['id_rating'];
				$id_pengguna = $mylist['id_pengguna'];
				$id_kuliner = $mylist['id_kuliner'];
				$rating = $mylist['rating'];
				$tanggal = $mylist['tanggal'];
				$jam = $mylist['jam'];
			}
		?>
			<div class="bd-example">
				<form class="row g-3" action="<?php echo site_url($proses); ?>" method="post">


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
						<label for="validationServer02" class="form-label">Pilih Kuliner</label>

						<select name="id_kuliner" class="form-control is-valid" id="validationServer02" required>
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
						<label for="validationServer03" class="form-label">Rasa Makanan</label>
						<input type="radio" name="rating" <?php if ($rating == 1) {
																echo "checked";
															} ?> value="1">1
						<input type="radio" name="rating" <?php if ($rating == 2) {
																echo "checked";
															} ?> value="2">2
						<input type="radio" checked name="rating" <?php if ($rating == 3) {
																		echo "checked";
																	} ?> value="3">3
						<input type="radio" name="rating" <?php if ($rating == 4) {
																echo "checked";
															} ?> value="4">4
						<input type="radio" name="rating" <?php if ($rating == 5) {
																echo "checked";
															} ?> value="5">5
					</div>
					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Biaya</label>
						<input type="radio" name="rating2" <?php if ($rating2 == 1) {
																echo "checked";
															} ?> value="1">1
						<input type="radio" name="rating2" <?php if ($rating2 == 2) {
																echo "checked";
															} ?> value="2">2
						<input type="radio" checked name="rating2" <?php if ($rating2 == 3) {
																		echo "checked";
																	} ?> value="3">3
						<input type="radio" name="rating2" <?php if ($rating2 == 4) {
																echo "checked";
															} ?> value="4">4
						<input type="radio" name="rating2" <?php if ($rating2 == 5) {
																echo "checked";
															} ?> value="5">5
					</div>
					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Pelayanan</label>
						<input type="radio" name="rating3" <?php if ($rating3 == 1) {
																echo "checked";
															} ?> value="1">1
						<input type="radio" name="rating3" <?php if ($rating3 == 2) {
																echo "checked";
															} ?> value="2">2
						<input type="radio" checked name="rating3" <?php if ($rating3 == 3) {
																		echo "checked";
																	} ?> value="3">3
						<input type="radio" name="rating3" <?php if ($rating3 == 4) {
																echo "checked";
															} ?> value="4">4
						<input type="radio" name="rating3" <?php if ($rating3 == 5) {
																echo "checked";
															} ?> value="5">5
					</div>
					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Kebersihan</label>
						<input type="radio" name="rating4" <?php if ($rating4 == 1) {
																echo "checked";
															} ?> value="1">1
						<input type="radio" name="rating4" <?php if ($rating4 == 2) {
																echo "checked";
															} ?> value="2">2
						<input type="radio" checked name="rating4" <?php if ($rating4 == 3) {
																		echo "checked";
																	} ?> value="3">3
						<input type="radio" name="rating4" <?php if ($rating4 == 4) {
																echo "checked";
															} ?> value="4">4
						<input type="radio" name="rating4" <?php if ($rating4 == 5) {
																echo "checked";
															} ?> value="5">5
					</div>
					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Keunikan</label>
						<input type="radio" name="rating5" <?php if ($rating5 == 1) {
																echo "checked";
															} ?> value="1">1
						<input type="radio" name="rating5" <?php if ($rating5 == 2) {
																echo "checked";
															} ?> value="2">2
						<input type="radio" checked name="rating5" <?php if ($rating5 == 3) {
																		echo "checked";
																	} ?> value="3">3
						<input type="radio" name="rating5" <?php if ($rating5 == 4) {
																echo "checked";
															} ?> value="4">4
						<input type="radio" name="rating5" <?php if ($rating5 == 5) {
																echo "checked";
															} ?> value="5">5
					</div>
					<div class="col-12">
						<button class="btn btn-primary" type="submit" name="Simpan">Simpan</button>
						<button class="btn btn-danger" type="Reset" name="Reset">Reset</button>
						<input type="hidden" value="<?php echo $id_rating; ?>" name="id_rating">
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
					<th>Pengguna</th>
					<th>Nama Kuliner</th>
					<th>Rating</th>
					<th>Tanggal</th>
					<th>Menu</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($mylist as $d) {
						$id_rating = $d['id_rating'];
						$id_pengguna = getPengguna($d['id_pengguna']);
						$id_kuliner = getKuliner($d['id_kuliner']);
						$rating = $d['rating'];
						$rating2 = $d['rating2'];
						$rating3 = $d['rating3'];
						$rating4 = $d['rating4'];
						$rating5 = $d['rating5'];
						$tanggal = $d['tanggal'];
						$jam = $d['jam'];

						$linkedt = base_url() . "/rating/edit/$id_rating";
						$linkdlt = base_url() . "/rating/delete/$id_rating";

						echo "<tr>
		<td>$id_pengguna</td>
		<td>$id_kuliner</a></td>
		<td>$rating $rating2 $rating3 $rating4 $rating5 </td>
		<td>$tanggal-$jam</td>";

						$btnU = base_url("images/u.png");
						$btnH = base_url("images/h.png");

						echo "<td><a href='$linkedt'><img src='$btnU'></a>
		<a href='$linkdlt'><img src='$btnH'
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_rating pada Data ini ?..\")'
		></a></td>";

						echo "</tr>";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>Pengguna</th>
						<th>Nama Kuliner</th>
						<th>Rating</th>
						<th>Tanggal</th>
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