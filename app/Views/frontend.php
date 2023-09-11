<?php
$session = session();

?>
<?= view('head.php'); ?>



<?php
//logged_in
$nama_pengguna = $session->get('nama_pengguna');
$id_pengguna = $session->get('id_pengguna');
$tes = $session->get('tes');
//echo "<h1>$tes $nama_pengguna & $id_pengguna</h1>";
?>


<body class="animsition">
    <header>
        <?= view('header.php'); ?>
    </header>


    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(../template/images/slide-01.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Tentang Aplikasi
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    E-Kuliner Bogor
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="<?php echo site_url("/about"); ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(../template/images/slide-02.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">

                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Daftar Kuliner
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="<?php echo site_url("/all"); ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(../template/images/slide-03.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Kabupaten Bogor
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="https://bogorkab.go.id/" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--- Slider Akhir -->

    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
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
                <!------------------------------------------------------------>
            </div>
        </div>
    </div>

    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    TOP 4
                </h3>
            </div>

            <div class="row isotope-grid">

                <?php

                $i = 0;
                $arID = array();
                $arKet = array();
                $arNama = array();
                $arInfo = array();
                $arJum = array();
                $arGB = array();
                $arLatitude = array();
                $arLongitude = array();

                foreach ($all as $d) {
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

                    $ar = getHitung($id_kuliner); //rand(1, 5); //jumlah/banyakPengguna=average
                    //  var_dump($ar);
                    $total = $ar["arr1"] + 0;
                    $jumlah = $ar["arr2"] + 0;

                    $jum = 0;
                    $jums = "0";
                    if ($jumlah > 0) {
                        $jum = ceil($total / $jumlah);
                        $jums = "($total / $jumlah)";
                    }
                    $arID[$i] = $id_kuliner;
                    $arNama[$i] = $nama_kuliner; // . "#" . $jums;
                    $arKet[$i] = "$alamat, $telepon";
                    $arInfo[$i] = "$ragam_menu, Jam $waktu_oprasional";
                    $arJum[$i] = $jum;
                    $arGB[$i] = $gbr;
                    $arLatitude[$i] = $latitude;
                    $arLongitude[$i] = $longitude;

                    $i++;
                } //forwhile


                $array_count = count($arID);
                for ($x = 0; $x < $array_count; $x++) {
                    for ($a = 0; $a < $array_count - 1; $a++) {
                        if ($a < $array_count) {
                            if ($arJum[$a] < $arJum[$a + 1]) {
                                swap($arJum, $a, $a + 1);
                                swap($arID, $a, $a + 1);
                                swap($arNama, $a, $a + 1);
                                swap($arKet, $a, $a + 1);
                                swap($arInfo, $a, $a + 1);
                                swap($arGB, $a, $a + 1);
                                swap($arLatitude, $a, $a + 1);
                                swap($arLongitude, $a, $a + 1);
                            }
                        }
                    }
                }

                for ($i = 0; $i < 4; $i++) {
                    $gbr = $arGB[$i];
                    $nama_kuliner = $arNama[$i];
                    $jum = $arJum[$i];
                    $info = $arInfo[$i];
                    $ket = $arKet[$i];
                    $id_kuliner = $arID[$i];
                    $latitude = $arLatitude[$i];
                    $longitude = $arLongitude[$i];

                    $ar = getHitung($id_kuliner); //rand(1, 5); //jumlah/banyakPengguna=average

                            $total = $ar["arr1"] + 0;
                            $jumlah = $ar["arr2"] + 0;

                            $jum = 0;
                            $jums = "0";
                            if ($jumlah > 0) {
                                $jum = ceil($total / $jumlah);
                                $jums = "($total / $jumlah)";
                            }

                            $icon = "rating0.png";
                            if ($jum == 1) {
                                $icon = "rating1.png";
                            } else if ($jum == 2) {
                                $icon = "rating2.png";
                            } else if ($jum == 3) {
                                $icon = "rating3.png";
                            } else if ($jum == 4) {
                                $icon = "rating4.png";
                            } else if ($jum == 5) {
                                $icon = "rating5.png";
                            }
							$jum1=$jum;
                            $star = base_url("images/$icon");
							
							//====================================
							  $ar = getHitungV2($id_kuliner); //rand(1, 5); //jumlah/banyakPengguna=average

                            $total = $ar["arr1"] + 0;
                            $jumlah = $ar["arr2"] + 0;

                            $jum = 0;
                            $jums = "0";
                            if ($jumlah > 0) {
                                $jum = ceil($total / $jumlah);
                                $jums = "($total / $jumlah)";
                            }

                            $icon = "rating0.png";
                            if ($jum == 1) {
                                $icon = "rating1.png";
                            } else if ($jum == 2) {
                                $icon = "rating2.png";
                            } else if ($jum == 3) {
                                $icon = "rating3.png";
                            } else if ($jum == 4) {
                                $icon = "rating4.png";
                            } else if ($jum == 5) {
                                $icon = "rating5.png";
                            }
							$jum2=$jum;
                            $star2 = base_url("images/$icon");
							//===================================
							
								  $ar = getHitungV3($id_kuliner); //rand(1, 5); //jumlah/banyakPengguna=average

                            $total = $ar["arr1"] + 0;
                            $jumlah = $ar["arr2"] + 0;

                            $jum = 0;
                            $jums = "0";
                            if ($jumlah > 0) {
                                $jum = ceil($total / $jumlah);
                                $jums = "($total / $jumlah)";
                            }

                            $icon = "rating0.png";
                            if ($jum == 1) {
                                $icon = "rating1.png";
                            } else if ($jum == 2) {
                                $icon = "rating2.png";
                            } else if ($jum == 3) {
                                $icon = "rating3.png";
                            } else if ($jum == 4) {
                                $icon = "rating4.png";
                            } else if ($jum == 5) {
                                $icon = "rating5.png";
                            }
							$jum3=$jum;
                            $star3 = base_url("images/$icon");
							//===================================
								  $ar = getHitungV4($id_kuliner); //rand(1, 5); //jumlah/banyakPengguna=average

                            $total = $ar["arr1"] + 0;
                            $jumlah = $ar["arr2"] + 0;

                            $jum = 0;
                            $jums = "0";
                            if ($jumlah > 0) {
                                $jum = ceil($total / $jumlah);
                                $jums = "($total / $jumlah)";
                            }

                            $icon = "rating0.png";
                            if ($jum == 1) {
                                $icon = "rating1.png";
                            } else if ($jum == 2) {
                                $icon = "rating2.png";
                            } else if ($jum == 3) {
                                $icon = "rating3.png";
                            } else if ($jum == 4) {
                                $icon = "rating4.png";
                            } else if ($jum == 5) {
                                $icon = "rating5.png";
                            }
							$jum4=$jum;
                            $star4 = base_url("images/$icon");
							//===================================
								  $ar = getHitungV5($id_kuliner); //rand(1, 5); //jumlah/banyakPengguna=average

                            $total = $ar["arr1"] + 0;
                            $jumlah = $ar["arr2"] + 0;

                            $jum = 0;
                            $jums = "0";
                            if ($jumlah > 0) {
                                $jum = ceil($total / $jumlah);
                                $jums = "($total / $jumlah)";
                            }

                            $icon = "rating0.png";
                            if ($jum == 1) {
                                $icon = "rating1.png";
                            } else if ($jum == 2) {
                                $icon = "rating2.png";
                            } else if ($jum == 3) {
                                $icon = "rating3.png";
                            } else if ($jum == 4) {
                                $icon = "rating4.png";
                            } else if ($jum == 5) {
                                $icon = "rating5.png";
                            }
							$jum5=$jum;
                            $star5 = base_url("images/$icon");

                    $star = base_url("images/$icon");
                    echo "  <div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
                    <!-- Block2 -->
                    <div class='block2'>
                        <div class='block2-pic hov-img0'>
                            <img src='$gbr' alt='$nama_kuliner' title='$ket' style='width: 350px;height: 350px;'>

                            <a href='" . site_url("/detail/index/$id_kuliner") . "' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                                SELENGKAPNYA
                            </a>
                        </div>

                        <div class='block2-txt flex-w flex-t p-t-14'>
                            <div class='block2-txt-child1 flex-col-l '>
                                <a href='" . site_url("/detail/index/$id_kuliner") . "' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                  <label title='$info'>$nama_kuliner<label>
                                </a>

                                <span class='stext-105 cl3'>
                                Rasa Makanan:  <img src='$star' alt='$nama_kuliner' title='$nama_kuliner : Star $jum' style='width: 100px;height: 30px;'>
                                </span>
								
								<span class='stext-105 cl3'>
                                Biaya:  <img src='$star2' alt='$nama_kuliner' title='$nama_kuliner : Star $jum' style='width: 100px;height: 30px;'>
                                </span>
								
								<span class='stext-105 cl3'>
                                Pelayanan:  <img src='$star3' alt='$nama_kuliner' title='$nama_kuliner : Star $jum' style='width: 100px;height: 30px;'>
                                </span>
								<span class='stext-105 cl3'>
                                Kebersihan:  <img src='$star4' alt='$nama_kuliner' title='$nama_kuliner : Star $jum' style='width: 100px;height: 30px;'>
                                </span>
								
								<span class='stext-105 cl3'>
                                Keunikan:  <img src='$star5' alt='$nama_kuliner' title='$nama_kuliner : Star $jum' style='width: 100px;height: 30px;'>
                                </span>
                            </div>

                            <div class='block2-txt-child2 flex-r p-t-3'>
                                <a href='https://maps.google.com?q=$latitude,$longitude' target='_blank'>
                                     <i class='fa fa-map-marker'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>";
                }

                ?>

                <!-- --------------------------- -->



            </div>
        </div>
    </section>

    <?= view('footer.php'); ?>
    <?= view('footer2.php'); ?>
    <?= view('footer3.php'); ?>