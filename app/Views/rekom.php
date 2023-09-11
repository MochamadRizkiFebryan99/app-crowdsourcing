<?= view('head.php'); ?>

<body class="animsition">
	<header>
		<?= view('header.php'); ?>
	</header>

	<br><br>

	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">


						<?php

						$session = session();
						$id_pengguna = $session->get('id_pengguna');
						if ($id_pengguna == "") {

							echo "<marquee><h2>Untuk Memberikan Rekomendasi tempat kuliner, Silahkan untuk Masuk ke halaman website terlebih dahulu</h2></marquee>";
						} else {
						?>



							<?php if (session()->getFlashdata('message') !== NULL) : ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?php echo session()->getFlashdata('message'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
							<?php endif; ?>

							<?php if (session()->getFlashdata('error') !== NULL) : ?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<?php echo session()->getFlashdata('error'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
							<?php endif; ?>

							<form class="row g-3" action="<?php echo site_url("_rekomendasiSave"); ?>" method="post" enctype="multipart/form-data">

								<h3 class="mtext-111 cl2 p-b-16">
									Masukan tempat rekomendasi kuliner anda
								</h3>
								<div class="col-md-8">
									<label for="validationServer02" class="form-label">Nama Kuliner</label>
									<input type="text" name="nama_kuliner" class="form-control is-valid" id="validationServer02" value="<?php echo $nama_kuliner; ?>" name="nama_kuliner" required>
								</div>


								<div class="col-md-8">
									<label for="validationServer03" class="form-label">Alamat Lengkap</label>
									<input type="text" name="alamat" class="form-control is-valid" id="validationServer03" name="alamat" value="<?php echo $alamat; ?>" required>
								</div>


								<div class="col-md-8">
									<label for="validationServer02" class="form-label">Gambar <?php echo $gambar0; ?></label>
									<input type="file" name="gambar" class="form-control is-valid" id="validationServer02" value="<?php echo $gambar; ?>" name="gambar" <?php echo $req; ?>>
								</div>


								<div class="col-md-8">
									<label for="validationServer03" class="form-label">Alasan Merekomendasikan Kuliner Ini</label>
									<input type="text" name="keterangan" class="form-control is-valid" id="validationServer03" name="keterangan" value="<?php echo $keterangan; ?>" required>
								</div>

								<div class="col-md-8"><br>
									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Kirim
									</button>
								</div>
							</form>
						<?php
						}
						?>
					</div>

				</div>
	</section>



	<?= view('footer.php'); ?>
	<?= view('footer2.php'); ?>
	<?= view('footer3.php'); ?>