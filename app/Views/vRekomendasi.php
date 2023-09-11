<?= view('_partials/head.php'); ?>
<?= view('_partials/nav.php'); ?>
<?= view('_partials/datatable.php'); ?>
<?php

use App\Models\Pengguna_model;
?>

<div class="card mb-3">
	<div class="card-header">
		<?php
		$btn = "<< Kembali";
		$proses = "rekomendasi";
		$path = "";

		if ($pro == "read") {
			$path = site_url('rekomendasiCreate');
			$btn = "++ Tambah Data";
		} else if ($pro == "create") {
			$proses = "rekomendasiSave";
			$path = site_url('rekomendasi');
		} else if ($pro == "edit") {
			$proses = "rekomendasiUpdate";
			$path = site_url('rekomendasi');
		} else {
			$path = site_url('rekomendasi');
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
			$id_rekomendasi = "";
			$id_pengguna = "";
			$nama_kuliner = "";
			$alamat = "";
			$gambar = "";
			$gambar0 = "avatar.jpg";
			$status = "";
			$keterangan = "";
			$req = "required";
			if ($pro == "edit") {
				$id_rekomendasi = $mylist['id_rekomendasi'];
				$id_pengguna = $mylist['id_pengguna'];
				$nama_kuliner = $mylist['nama_kuliner'];
				$alamat = $mylist['alamat'];
				$gambar = $mylist['gambar'];
				$gambar0 = $mylist['gambar'];
				$status = $mylist['status'];
				$keterangan = $mylist['keterangan'];
				$req = "";
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


					<div class="col-md-8">
						<label for="validationServer02" class="form-label">Nama Kuliner</label>
						<input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $nama_kuliner; ?>" name="nama_kuliner" required>
					</div>

					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Alamat</label>
						<input type="text" class="form-control is-valid" id="validationServer03" name="alamat" value="<?php echo $alamat; ?>" required>
					</div>

					<div class="col-md-8">
						<label for="validationServer02" class="form-label">Gambar <?php echo $gambar0; ?></label>
						<input type="file" class="form-control is-valid" id="validationServer02" value="<?php echo $gambar; ?>" name="gambar" <?php echo $req; ?>>
					</div>

					<div class="col-md-4">
						<label for="validationServer04" class="form-label">Status</label>
						<select class="form-select is-valid" name="status" id="validationServer04" required>
							<option value="Proses" <?php if ($status == "Proses") {
														echo "selected";
													} ?>>Proses</option>
							<option value="Selesai" <?php if ($status == "Selesai") {
														echo "selected";
													} ?>>Selesai</option>
						</select>
					</div>

					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Alasan</label>
						<textarea class="form-control" aria-label="With textarea" name="keterangan"><?php echo $keterangan; ?></textarea>
					</div>

					<div class="col-12">
						<button class="btn btn-primary" type="submit" name="Simpan">Simpan</button>
						<button class="btn btn-danger" type="Reset" name="Reset">Reset</button>
						<input type="hidden" value="<?php echo $id_rekomendasi; ?>" name="id_rekomendasi">
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
					<th width="3%">Gambar</th>
					<th width="10%">Pengguna</th>
					<th width="15%">Kuliner</th>
					<th width="5%">Status</th>
					<th width="5%">Alasan</th>
					<th width="5%">Menu</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$modelP = new Pengguna_model();
					foreach ($mylist as $d) {
						$id_rekomendasi = $d['id_rekomendasi'];
						$id_pengguna = $d['id_pengguna'];
						$nama_kuliner = $d['nama_kuliner'];
						$alamat = $d['alamat'];
						$gambar = $d['gambar'];
						$status = $d['status'];
						$keterangan = $d['keterangan'];
						$keterangan = substr($keterangan, 0, 120);

						$RP = format_rupiah(10000);
						$pengguna = getPengguna($id_pengguna);
						$linkedt = base_url() . "/rekomendasi/edit/$id_rekomendasi";
						$linkdlt = base_url() . "/rekomendasi/delete/$id_rekomendasi";

						$gb = $gambar;
						$gbr = base_url("images/$gb");
						$GB = "<img width='130' height='100' src='$gbr' alt='$nama_kuliner' title='$nama_kuliner'>";
						echo "<tr>
								<td>$GB</td>
								<td>$pengguna</td>
								<td><b>$nama_kuliner</b><br><small><b>Alamat:</b> $alamat</small></td>
								<td><small>$status</small></td>
								<td>$keterangan</td>";

						$btnU = base_url("images/u.png");
						$btnH = base_url("images/h.png");

						echo "<td><a href='$linkedt'><img src='$btnU'></a>
		<a href='$linkdlt'><img src='$btnH'
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_rekomendasi pada Data ini ?..\")'
		></a></td>";

						echo "</tr>";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>Gambar</th>
						<th>Pengguna</th>
						<th>Kuliner</th>
						<th>Status</th>
						<th>Alasan</th>
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