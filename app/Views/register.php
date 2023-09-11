<head>
	<title>Kulbo</title>
	<link href="<?php echo base_url('login/login_style.css') ?>" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php echo base_url('template/images/icons/favicon.png') ?>" />

</head>

<h2>Halaman Masuk Pengguna</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="<?php echo site_url("myregister"); ?>" method="post">
			<?= csrf_field(); ?>
			<h1>Buat Akun</h1>
			<span>Masukkan data anda</span>
			<?php if (!empty(session()->getFlashdata('error'))) : ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					</hr />
					<h4><?php echo session()->getFlashdata('error'); ?></h4>
				</div>
			<?php endif; ?>
			<hr>
			<input type="text" name="nama_pengguna" placeholder="Nama Lengkap" required />
			<input type="email" name="email" placeholder="Email" required />
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" />
			<button type="submit" name="Daftar">Daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="<?php echo site_url("myloginpengguna"); ?>" method="post">
			<?= csrf_field(); ?>
			<h1>Masuk</h1><br>
			<span>Masukkan Username & Password</span>
			<?php if (!empty(session()->getFlashdata('error'))) : ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					</hr />
					<h4><?php echo session()->getFlashdata('error'); ?></h4>
				</div>
			<?php endif; ?>
			<hr>
			<input type="text" name="username" placeholder="Masukkan Username" required />
			<input type="password" name="password" placeholder="Masukkan Password" required />
			<!--a href="#">Forgot your password?</a --><br>
			<button type="submit" name="Login">Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Selamat datang kembali!</h1>
				<p>Untuk tetap terhubung dengan kami, silakan masuk dengan info pribadi Anda</p>
				<button class="ghost" id="signIn">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Selamat datang!</h1>
				<p><img src=""></p>
				<button class="ghost" id="signUp">Daftar</button>
			</div>
		</div>
	</div>
</div>

<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>