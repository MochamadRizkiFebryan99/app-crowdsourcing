<?php
$session = session();

$nama_pengguna = $session->get('nama_pengguna');
$id_pengguna = $session->get('id_pengguna');
$status = $session->get('status');
?>
<div class="container-menu-desktop">
    <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
            <div class="left-top-bar">
                Aplikasi E-Kuliner Bogor Berbasis CrowdSourcing
            </div>

            <div class="right-top-bar flex-w h-full">

                <?php if ($id_pengguna) { ?>
                    <a href="" class="flex-c-m p-lr-10 trans-04"><?php echo " " . $nama_pengguna; ?></a>

                    <a href="<?php echo site_url("/formpengguna"); ?>" class="flex-c-m p-lr-10 trans-04">Profil Pengguna</a>
                    <a href="<?php echo site_url("/logout"); ?>" class="flex-c-m p-lr-10 trans-04">Keluar</a>
                <?php } else { ?>
                    <a href="<?php echo site_url("/register"); ?>" class="flex-c-m p-lr-10 trans-04">Daftar Akun</a>
                    <a href="<?php echo site_url("/register"); ?>" class="flex-c-m p-lr-10 trans-04">Masuk</a>
                    <?php } ?>`
            </div>
        </div>
    </div>

    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">
            <!-- Logo desktop -->
            <a href="<?php echo site_url("/frontend"); ?>" class="logo text-dark">
                <img src="<?php echo base_url('template/images/icons/logo-01.png') ?>" alt=" IMG-LOGO">
                &nbsp;KULBO
            </a>
            <!-- Menu desktop -->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="active-menu"><a href="<?php echo site_url("/frontend"); ?>">Beranda</a></li>
                    <li><a href="<?php echo site_url("/all"); ?>">Kuliner</a></li>
                    <li><a href="<?php echo site_url("/rekom"); ?>">Rekomendasi</a></li>

                    <?php if (!$id_pengguna) { ?>
                        <li><a href="<?php echo site_url("/about"); ?>">Tentang</a></li>
                    <?php } ?>
                    <li>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search"><i class="zmdi zmdi-search"></i></div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Bagian moblie Belum di ubah -->

<div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile text-dark">
        <img src="<?php echo base_url('template/images/icons/logo-01.png') ?>" alt="IMG-LOGO">
        &nbsp; KULBO
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>


<div class="menu-mobile">
    <ul class="topbar-mobile">
        <li>
            <div class="left-top-bar">
                Aplikasi E-Kuliner Bogor Berbasis CrowdSourcing
            </div>
        </li>

        <li>
            <div class="right-top-bar flex-w h-full">

                <?php if ($id_pengguna) { ?>
                    <a href="" class="flex-c-m p-lr-10 trans-04"><?php echo "Welcome " . $nama_pengguna; ?></a>
                    <a href="<?php echo site_url("/formpengguna"); ?>" class="flex-c-m p-lr-10 trans-04">Profil Pengguna</a>

                    <a href="<?php echo site_url("/logout"); ?>" class="flex-c-m p-lr-10 trans-04">Keluar</a>
                <?php } else { ?>
                    <a href="<?php echo site_url("/register"); ?>" class="flex-c-m p-lr-10 trans-04">Daftar Akun</a>
                    <a href="<?php echo site_url("/register"); ?>" class="flex-c-m p-lr-10 trans-04">Masuk</a>
                <?php } ?>


            </div>
        </li>
    </ul>

    <ul class="main-menu-m">
        <li>
            <a href="<?php echo site_url("/frontend"); ?>">Beranda</a>
            <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
        </li>

        <li>
            <a href="<?php echo site_url("/all"); ?>">Kuliner</a>
            <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
        </li>

        <li>
            <a href="<?php echo site_url("/rekom"); ?>">Rekomendasi</a>
            <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
        </li>

        <?php if (!$id_pengguna) { ?>

            <li>
                <a href="<?php echo site_url("/about"); ?>">Tentang</a>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
        <?php } ?>
    </ul>
</div>




<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="<?php echo base_url('template/images/icons/icon-close2.png')  ?>" alt='CLOSE'>
        </button>

        <form class="wrap-search-header flex-w p-l-15" method="post" action="<?php echo site_url("cari"); ?>">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="Pencarian...">
        </form>
    </div>
</div>