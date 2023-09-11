<?= view('_partials/head.php'); ?>
<?= view('_partials/nav.php'); ?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <h1>Selamat Datang</h1>
        <?php
        $Random = rand(1, 5);
        ?>
        <img width="100%" height="450" src="<?php echo base_url("images/well" . $Random . ".jpg"); ?>" alt="">
        <p class="lead">RANCANG BANGUN APLIKASI CROWDSOURCING UNTUK MERIVIEW DAN MENINJAU TEMPAT KULINER</p>
    </div>

    <marquee onmouseover=this.stop() onmouseout=this.start() scrollamount=2 scrolldelay=90 direction=up width=100% height=150>HALO APA KABAR</marquee>



    <script language="JavaScript">
        function bukajendela(url) {
            window.open(url, "window_baru", "width=800,height=600,left=320,top=100,resizable=1,scrollbars=1");
        }
    </script>

    <?php
    /*
$gab="";
  $sql="select * from `$tbkelas`  order by rand()";
 		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id_kelas=$d["id_kelas"];
				$nama_kelas=strtoupper($d["nama_kelas"]);
				$deskripsi=$d["deskripsi"];
				$gambar=$d["gambar"];
				$status=$d["status"];
				$jam_normal=$d["jam_normal"];//320x240.pn
			
			$gab.="<a href='#' onclick='buka(\"kelas/zoom.php?id=$id_kelas\")'>
<img src='$YPATH/$gambar' title'$nama_kelas $jam_normal' width='280' height='250' /></a>";
				
		}
		$gab.="";
		*/
    ?>

    <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="1" scrolldelay="90" direction="right" width="100%" height="150">
        <?php
        //echo $gab;		
        ?>
    </marquee>


</main>

<?= view('_partials/footer.php'); ?>