<?php
$session = session();
?>
<?= view('head.php'); ?>



<body class="animsition">
    <header>
        <?= view('header.php'); ?>
    </header>


    <?php

    $id_kuliner = $mylist['id_kuliner'];
    $nama_kuliner = $mylist['nama_kuliner'];
    $deskripsi = $mylist['deskripsi'];
    $email = $mylist['email'];
    $telepon = $mylist['telepon'];
    $alamat = $mylist['alamat'];
    $ragam_menu = $mylist['ragam_menu'];
    $waktu_oprasional = $mylist['waktu_oprasional'];
    $latitude = $mylist['latitude'];
    $longitude = $mylist['longitude'];
    $emded = $mylist['emded'];
    $emded = ($emded);

    $gambar1 = $mylist['gambar1'];
    $gambar2 = $mylist['gambar2'];
    $gambar3 = $mylist['gambar3'];
    $gambar4 = $mylist['gambar4'];
    $gambar5 = $mylist['gambar5'];

    $status = $mylist['status'];
    $keterangan = $mylist['keterangan'];

    $gbr1 = base_url("images/$gambar1");
    $GB1 = "<img width='130' height='100' src='$gbr1' alt='$nama_kuliner' title='$nama_kuliner'>";
    $gbr2 = base_url("images/$gambar2");
    $GB2 = "<img width='130' height='100' src='$gbr2' alt='$nama_kuliner' title='$nama_kuliner'>";
    $gbr3 = base_url("images/$gambar3");
    $GB3 = "<img width='130' height='100' src='$gbr3' alt='$nama_kuliner' title='$nama_kuliner'>";
    $gbr4 = base_url("images/$gambar4");
    $GB4 = "<img width='130' height='100' src='$gbr4' alt='$nama_kuliner' title='$nama_kuliner'>";
    $gbr5 = base_url("images/$gambar5");
    $GB5 = "<img width='130' height='100' src='$gbr5' alt='$nama_kuliner' title='$nama_kuliner'>";

    $profil = "<b>$nama_kuliner</b>  <br>
		<a href='https://maps.google.com?q=$latitude-$longitude'>$alamat, Telp: $telepon, Jam Buka: $waktu_oprasional Wib</a><br>
			  <small><i>$deskripsi Catatan: $keterangan</i></small><br>";
    ?>

    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg"></div>
    </div>

    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="<?php echo $gbr1; ?>">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="<?php echo $gbr1; ?>" alt="<?php echo $nama_kuliner; ?>">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $gbr1; ?>">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="<?php echo $gbr2; ?>">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="<?php echo $gbr2; ?>" alt="<?php echo $nama_kuliner; ?>">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $gbr2; ?>">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="<?php echo $gbr3; ?>">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="<?php echo $gbr3; ?>" alt="<?php echo $nama_kuliner; ?>">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $gbr3; ?>">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="<?php echo $gbr4; ?>">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="<?php echo $gbr4; ?>" alt="<?php echo $nama_kuliner; ?>">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $gbr4; ?>">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="<?php echo $gbr5; ?>">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="<?php echo $gbr5; ?>" alt="<?php echo $nama_kuliner; ?>">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $gbr5; ?>">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <table id="example" class="display" style="width:100%">
                        <thead>
						    <tr>
                            <th>Komentar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($mylist3 as $d) {
                                $id_komentar = $d['id_komentar'];
                                $id_pengguna = $d['id_pengguna'];
                                $id_kuliner = $d['id_kuliner'];
                                $komentar = $d['komentar'];
                                $tanggal = WKT($d['tanggal']);
                                $jam = $d['jam'];
                                $gambar = $d['gambar'];
                                $status = $d['status'];
                                $keterangan = $d['keterangan'];
                                $keterangan = substr($keterangan, 0, 120);
                                $rating = $d['rating'];
                                $rating2 = $d['rating2'];
                                $rating3 = $d['rating3'];
                                $rating4 = $d['rating4'];
                                $rating5 = $d['rating5'];

                                $pengguna = getPengguna($id_pengguna);
                                $kuliner = getKuliner($id_kuliner);

                                //$gb = $gambar;
                                // $gbr = base_url("images/$gb");
                                //$GB = "<img width='80' height='70' src='$gbr' alt='$nama_kuliner' title='$nama_kuliner'>";
                                //======================================================

                                $jum2 = $rating;

                                $icon = "rating0.png";
                                if ($jum2 == 1) {
                                    $icon = "rating1.png";
                                } else if ($jum2 == 2) {
                                    $icon = "rating2.png";
                                } else if ($jum2 == 3) {
                                    $icon = "rating3.png";
                                } else if ($jum2 == 4) {
                                    $icon = "rating4.png";
                                } else if ($jum2 == 5) {
                                    $icon = "rating5.png";
                                }

                                //$star = base_url("images/$icon");

                                // $bintang = "<span class='stext-105 cl3'>
                                // <img src='$star' alt='$nama_kuliner' title='$nama_kuliner : Star $jum' style='width: 100px;height: 30px;'>
                                // </span>";

                                //===================================

                                $date = new \DateTime();
                                //echo date_format($date, 'H:i:s');
                                #output: 2012-03-24 17:45:12

                                echo "<tr>
						<td>$komentar<br><small><i>$pengguna /Post $tanggal - " . date_format($date, 'H:i:s A') . " Wib</small></i> <br>$bintang</td> </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            <?php
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
							//===================================
                            echo $nama_kuliner;

                            echo " <br> <span class='stext-105 cl3'>
                                  Rasa Makanan :
                                  <img src='$star' alt='$nama_kuliner' title='$nama_kuliner : Star $jum1' style='width: 100px;height: 30px;'>
                                </span>";
								
							echo " <br> <span class='stext-105 cl3'>
                                  Biaya :
                                  <img src='$star2' alt='$nama_kuliner' title='$nama_kuliner : Star $jum2' style='width: 100px;height: 30px;'>
                                </span>";
							
							echo " <br> <span class='stext-105 cl3'>
                                  Pelayanan :
                                  <img src='$star3' alt='$nama_kuliner' title='$nama_kuliner : Star $jum3' style='width: 100px;height: 30px;'>
                                </span>";
							
							echo " <br> <span class='stext-105 cl3'>
                                  Kebersihan :
                                  <img src='$star4' alt='$nama_kuliner' title='$nama_kuliner : Star $jum4' style='width: 100px;height: 30px;'>
                                </span>";
								
							echo " <br> <span class='stext-105 cl3'>
                                  Keunikan :
                                  <img src='$star5' alt='$nama_kuliner' title='$nama_kuliner : Star $jum5' style='width: 100px;height: 30px;'>
                                </span>";	

                            ?>
                        </h4>

                        <span class="mtext-106 cl2">Waktu Kerja:
                            <?php echo $waktu_oprasional; ?>
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            <?php echo $ragam_menu; ?>
                            <?php echo $deskripsi; ?>
                        </p>
                        <?php echo $emded ?>


                        <?php

                        $session = session();
                        $id_pengguna = $session->get('id_pengguna');
                        if ($id_pengguna == "") {
                            echo "<marquee><h2>Untuk Memberikan Review dan Rating, Silahkan untuk Masuk ke halaman website terlebih dahulu</h2></marquee>";
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

                            <form class="row g-3" action="<?php echo site_url("/_komentarSave"); ?>" method="post" enctype="multipart/form-data">

                                <!-- <div class="col-md-12">
                                    <label for="validationServer02" class="form-label">Masukan Gambar</label>
                                    <input type="file" name="gambar" class="form-control is-valid" id="validationServer02" value="" name="gambar" required>
                                </div> -->
                                <input type="hidden" value="<?php echo $id_kuliner ?>" name="id_kuliner">
                                <div class="col-md-12">
                                    <label for="validationServer03" class="form-label">Masukan Komentar Anda</label>
                                    <input type="text" name="komentar" class="form-control is-valid" id="validationServer03" name="komentar" value="" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><br>
                                        <label for="validationServer03" class="form-label">Rasa Makanan</label>
<table>
<tr>
<td><input type="radio" checked name="rating" <?php if ($rating == 1) {
echo "checked";
} ?> value="1">1
<td><input type="radio" name="rating" <?php if ($rating == 2) {
echo "checked";
} ?> value="2">2

<td><input type="radio" name="rating" <?php if ($rating == 3) {
echo "checked";
} ?> value="3">3
<td><input type="radio" name="rating" <?php if ($rating == 1) {
echo "checked";
} ?> value="4">4
<td><input type="radio" name="rating" <?php if ($rating == 1) {
echo "checked";
} ?> value="5">5
</table>
</div>

                                    <div class="col-md-6"><br>
                                        <label for="validationServer03" class="form-label">Biaya</label>
                                        <table>
                                            <tr>
                                                <td><input type="radio" checked name="rating2" <?php if ($rating2 == 1) {
                                                                                                    echo "checked";
                                                                                                } ?> value="1">1
                                                <td><input type="radio" name="rating2" <?php if ($rating2 == 2) {
                                                                                            echo "checked";
                                                                                        } ?> value="2">2

                                                <td><input type="radio" name="rating2" <?php if ($rating2 == 3) {
                                                                                            echo "checked";
                                                                                        } ?> value="3">3
                                                <td><input type="radio" name="rating2" <?php if ($rating2 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="4">4
                                                <td><input type="radio" name="rating2" <?php if ($rating2 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="5">5
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6"><br>
                                        <label for="validationServer03" class="form-label">Pelayanan</label>
                                        <table>
                                            <tr>
                                                <td><input type="radio" checked name="rating3" <?php if ($rating3 == 1) {
                                                                                                    echo "checked";
                                                                                                } ?> value="1">1
                                                <td><input type="radio" name="rating3" <?php if ($rating3 == 2) {
                                                                                            echo "checked";
                                                                                        } ?> value="2">2

                                                <td><input type="radio" name="rating3" <?php if ($rating3 == 3) {
                                                                                            echo "checked";
                                                                                        } ?> value="3">3
                                                <td><input type="radio" name="rating3" <?php if ($rating3 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="4">4
                                                <td><input type="radio" name="rating3" <?php if ($rating3 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="5">5
                                        </table>
                                    </div>

                                    <div class="col-md-6"><br>
                                        <label for="validationServer03" class="form-label">Kebersihan</label>
                                        <table>
                                            <tr>
                                                <td><input type="radio" checked name="rating4" <?php if ($rating4 == 1) {
                                                                                                    echo "checked";
                                                                                                } ?> value="1">1
                                                <td><input type="radio" name="rating4" <?php if ($rating4 == 2) {
                                                                                            echo "checked";
                                                                                        } ?> value="2">2

                                                <td><input type="radio" name="rating4" <?php if ($rating4 == 3) {
                                                                                            echo "checked";
                                                                                        } ?> value="3">3
                                                <td><input type="radio" name="rating4" <?php if ($rating4 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="4">4
                                                <td><input type="radio" name="rating4" <?php if ($rating4 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="5">5
                                        </table>
                                    </div>
                                </div>
                                &nbsp;&nbsp;&nbsp;
                                <div class="row">
                                    <div class="col-md-6"><br>
                                        <label for="validationServer03" class="form-label">Keunikan</label>
                                        <table>
                                            <tr>
                                                <td><input type="radio" checked name="rating5" <?php if ($rating5 == 1) {
                                                                                                    echo "checked";
                                                                                                } ?> value="1">1
                                                <td><input type="radio" name="rating5" <?php if ($rating5 == 2) {
                                                                                            echo "checked";
                                                                                        } ?> value="2">2

                                                <td><input type="radio" name="rating5" <?php if ($rating5 == 3) {
                                                                                            echo "checked";
                                                                                        } ?> value="3">3
                                                <td><input type="radio" name="rating5" <?php if ($rating5 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="4">4
                                                <td><input type="radio" name="rating5" <?php if ($rating5 == 1) {
                                                                                            echo "checked";
                                                                                        } ?> value="5">5
                                        </table>
                                    </div>
                                </div>
                                <div class="p-t-33">
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-204 flex-w flex-m respon6-next"><br><br>
                                            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                Kirim
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
    </section>



    <?= view('footer.php'); ?>
    <?= view('footer2.php'); ?>
    <?= view('footer3.php'); ?>
	
	