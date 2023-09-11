<head>
	<title>Kulbo
	</title>
	<link href="<?php echo base_url('login/login_style.css') ?>" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php echo base_url('template/images/icons/favicon.png') ?>" />
</head>

<h2>Halaman Masuk Admin</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form method="post" action="<?php echo site_url("myloginadmin"); ?>">
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
			<button type="submit" name="Login">Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Selamat datang!</h1>
				<p><img src=""></p>
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