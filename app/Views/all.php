<?= view('head.php'); ?>

<body class="animsition">
    <header>
        <?= view('header.php'); ?>
    </header>

    <br><br>

    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Daftar Kuliner
                </h3>
            </div>
            <div class="row">

                <!------------------------------------------------------------>
                <?php

                foreach ($mylist3 as $d) {
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

                    echo " <div class='col-md-6 col-xl-4 p-b-30 m-lr-auto'>
                    <!-- Block1 -->
                    <div class='block1 wrap-pic-w'>
                        <img src='$gbr' alt='$nama_kuliner' style='width: 350px;height: 350px;' >

                        <a href='" . site_url("/detail/index/$id_kuliner") . "' class='block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3'>
                            <div class='block1-txt-child1 flex-col-l'>
                                <span class='block1-name ltext-102 trans-04 p-b-8'>
                                    $nama_kuliner
                                </span>

                                <span class='block1-info stext-102 trans-04'>
                                    $alamat
                                </span>
                            </div>

                            <div class='block1-txt-child2 p-b-4 trans-05'>
                                <div class='block1-link stext-101 cl0 trans-09'>
                                    Selengkapnya
                                </div>
                            </div>
                        </a>
                    </div>
                </div>";
                }

                ?>
            </div>
        </div>
    </div>


    <?= view('footer.php'); ?>
    <?= view('footer2.php'); ?>
    <?= view('footer3.php'); ?>