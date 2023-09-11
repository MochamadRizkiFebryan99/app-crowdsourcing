<?= view('head.php'); ?>

<body class="animsition">
    <header>
        <?= view('header.php'); ?>
    </header>

    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Formulir Profil
                        </h3>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                </hr />
                                <h4><?php echo session()->getFlashdata('error'); ?></h4>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">

                            <form action="<?php echo site_url("/updatePengguna"); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $pengguna['id_pengguna']; ?>" name="id_pengguna">

                                <div class="form-group">
                                    <label for="">Nama Pengguna</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" value="<?= $pengguna['nama_pengguna']; ?>" name="nama_pengguna" required>
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" value="<?= $pengguna['email']; ?>" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomer Telepon</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" value="<?= $pengguna['telepon']; ?>" name="telepon" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" value="<?= $pengguna['alamat']; ?>" name="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" value="<?= $pengguna['username']; ?>" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control is-valid" id="validationServer02" value="<?= $pengguna['password']; ?>" name="password" required>
                                </div><br>
                                <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Kirim
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <?= view('footer.php'); ?>
    <?= view('footer2.php'); ?>
    <?= view('footer3.php'); ?>