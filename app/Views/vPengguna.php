<?= view('_partials/head.php'); ?>
<?= view('_partials/nav.php'); ?>
<?= view('_partials/datatable.php'); ?>

<div class="card mb-3">
	<div class="card-header">
		<?php
		$btn = "<< Kembali";
		$proses = "pengguna";
		$path = "";
		if ($pro == "read") {
			$path = site_url('penggunaCreate');
			$btn = "++ Tambah Data";
		} else if ($pro == "create") {
			$proses = "penggunaSave";
			$path = site_url('pengguna');
		} else if ($pro == "edit") {
			$proses = "penggunaUpdate";
			$path = site_url('pengguna');
		} else {
			$path = site_url('pengguna');
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
			$id_pengguna = "";
			$nama_pengguna = "";
			$email = "";
			$telepon = "";
			$alamat = "";
			$username = "";
			$password = "";
			$status = "";
			$keterangan = "";

			if ($pro == "edit") {
				$id_pengguna = $mylist['id_pengguna'];
				$nama_pengguna = $mylist['nama_pengguna'];
				$email = $mylist['email'];
				$telepon = $mylist['telepon'];
				$alamat = $mylist['alamat'];
				$username = $mylist['username'];
				$password = $mylist['password'];
				$status = $mylist['status'];
				$keterangan = $mylist['keterangan'];
			}
		?>
			<div class="bd-example">
				<form class="row g-3" action="<?php echo site_url($proses); ?>" method="post">


					<div class="col-md-4">
						<label for="validationServer01" class="form-label">Nama Pengguna</label>
						<input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $nama_pengguna; ?>" name="nama_pengguna" required>
					</div>


					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Email</label>
						<input type="email" class="form-control is-valid" id="validationServer02" value="<?php echo $email; ?>" name="email" required>
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Telepon</label>
						<input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $telepon; ?>" name="telepon" required>
					</div>


					<div class="col-md-12">
						<label for="validationServer03" class="form-label">Alamat</label>
						<input type="text" class="form-control is-valid" id="validationServer03" name="alamat" value="<?php echo $alamat; ?>" required>
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Username</label>
						<input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $username; ?>" name="username" required>
					</div>

					<div class="col-md-4">
						<label for="validationServer02" class="form-label">Password</label>
						<input type="password" class="form-control is-valid" id="validationServer02" value="<?php echo $password; ?>" name="password" required>
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
						<input type="hidden" value="<?php echo $id_pengguna; ?>" name="id_pengguna">
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
					<th>Nama Pengguna</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Keterangan</th>
					<th>Menu</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($mylist as $d) {
						$id_pengguna = $d['id_pengguna'];
						$nama_pengguna = $d['nama_pengguna'];
						$email = $d['email'];
						$alamat = $d['alamat'];
						$telepon = $d['telepon'];
						$status = $d['status'];
						$keterangan = $d['keterangan'];
						$keterangan = substr($keterangan, 0, 120);

						$linkedt = base_url() . "/pengguna/edit/$id_pengguna";
						$linkdlt = base_url() . "/pengguna/delete/$id_pengguna";

						echo "<tr>
		<td>$nama_pengguna</td>
		<td><a href='mailto:$email'>$email</a></td>
		<td>$alamat </td>
		<td>$telepon</td>
		<td>$status $keterangan</td>";

						$btnU = base_url("images/u.png");
						$btnH = base_url("images/h.png");

						echo "<td><a href='$linkedt'><img src='$btnU'></a>
		<a href='$linkdlt'><img src='$btnH'
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_pengguna pada Data ini ?..\")'
		></a></td>";

						echo "</tr>";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>Nama Pengguna</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Telepon</< /th>
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