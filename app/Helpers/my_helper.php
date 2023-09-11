<?php
use App\Models\Pengguna_model;
use App\Models\Rating_model;
use App\Models\Kuliner_model;

date_default_timezone_set("Asia/Jakarta");
function WKT($sekarang)

{
	if ($sekarang == "0000-00-00") {
		$sekarang = date("Y-m-d");
	}

	$tanggal = substr($sekarang, 8, 2) + 0;

	$bulan = substr($sekarang, 5, 2);

	$tahun = substr($sekarang, 0, 4);

	$judul_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	$wk = $tanggal . " " . $judul_bln[(int)$bulan] . " " . $tahun;

	return $wk;
}
function swap(&$arr, $a, $b)
{
	$tmp = $arr[$a];
	$arr[$a] = $arr[$b];
	$arr[$b] = $tmp;
}

function getPengguna20($db, $kode)
{
	$out = $kode;
	if (strlen($kode) > 0) {
		$field = "nama_pengguna";
		$sql = "Select `$field` from `tb_pengguna` where `id_pengguna`='$kode'";
		$query = $db->query($sql);
		$arr =	$query->row();
		$out = $arr->$field;
	}
	return $out;
}

function getKuliner($PK = null)
{
	$model = new Kuliner_model();
	//$mylist = $model->where('id_pengguna', $PK)->first();
	$mylist = $model->where('id_kuliner', $PK)->orderBy('id_kuliner', 'ASC')->find();
	$nama_kuliner = "";
	foreach ($mylist as $d) {
		$nama_kuliner = $d['nama_kuliner'];
	}
	return $nama_kuliner;
}

function getKulinerxx($PK = null)
{
	$model = new Kuliner_model();
	$mylist = $model->where('id_kuliner', $PK)->first();
	//$mylist = $model->where('id_kuliner', $PK)->orderBy('id_kuliner', 'ASC')->find();
	$nama_kuliner = $mylist->nama_kuliner;
	return $nama_kuliner;
}

function getPengguna($PK = null)
{
	$model = new Pengguna_model();
	$mylist = $model->where('id_pengguna', $PK)->orderBy('id_pengguna', 'ASC')->find();
	$nama_pengguna = "";
	foreach ($mylist as $d) {
		$nama_pengguna = $d['nama_pengguna'];
	}
	return $nama_pengguna;
}

function getHitung($PK = null){
	$model = new Rating_model();
	$result = $model->select('sum(rating) as totalrating')->where('id_kuliner', $PK)->first();
	$arr1 = $result['totalrating'];
	//	$tot = $arr->totalrating;

	$result = $model->select('count(rating) as jumOrg')->where('id_kuliner', $PK)->first();
	$arr2 = $result['jumOrg'];
	//$count = $arr->jumOrg;
	//$avg = ceil($tot / $count);

	$data['arr1'] = $arr1;
	$data['arr2'] = $arr2;
	return $data;
}

function getHitungV2($PK = null){
	$model = new Rating_model();
	$result = $model->select('sum(rating2) as totalrating')->where('id_kuliner', $PK)->first();
	$arr1 = $result['totalrating'];
	//	$tot = $arr->totalrating;

	$result = $model->select('count(rating2) as jumOrg')->where('id_kuliner', $PK)->first();
	$arr2 = $result['jumOrg'];
	//$count = $arr->jumOrg;
	//$avg = ceil($tot / $count);

	$data['arr1'] = $arr1;
	$data['arr2'] = $arr2;
	return $data;
}

function getHitungV3($PK = null){
	$model = new Rating_model();
	$result = $model->select('sum(rating3) as totalrating')->where('id_kuliner', $PK)->first();
	$arr1 = $result['totalrating'];
	//	$tot = $arr->totalrating;

	$result = $model->select('count(rating3) as jumOrg')->where('id_kuliner', $PK)->first();
	$arr2 = $result['jumOrg'];
	//$count = $arr->jumOrg;
	//$avg = ceil($tot / $count);

	$data['arr1'] = $arr1;
	$data['arr2'] = $arr2;
	return $data;
}

function getHitungV4($PK = null){
	$model = new Rating_model();
	$result = $model->select('sum(rating4) as totalrating')->where('id_kuliner', $PK)->first();
	$arr1 = $result['totalrating'];
	//	$tot = $arr->totalrating;

	$result = $model->select('count(rating4) as jumOrg')->where('id_kuliner', $PK)->first();
	$arr2 = $result['jumOrg'];
	//$count = $arr->jumOrg;
	//$avg = ceil($tot / $count);

	$data['arr1'] = $arr1;
	$data['arr2'] = $arr2;
	return $data;
}

function getHitungV5($PK = null){
	$model = new Rating_model();
	$result = $model->select('sum(rating5) as totalrating')->where('id_kuliner', $PK)->first();
	$arr1 = $result['totalrating'];
	//	$tot = $arr->totalrating;

	$result = $model->select('count(rating5) as jumOrg')->where('id_kuliner', $PK)->first();
	$arr2 = $result['jumOrg'];
	//$count = $arr->jumOrg;
	//$avg = ceil($tot / $count);

	$data['arr1'] = $arr1;
	$data['arr2'] = $arr2;
	return $data;
}

function getHitung2($PK = null, $PK2 = null)
{
	$model = new Rating_model();
	$result = $model->select('(rating) as totalrating')->where(array('id_kuliner' => $PK, 'id_pengguna' => $PK2))->first();
	$jum = $result['totalrating'];
	return $jum;
}

function format_rupiah($angka)
{
	$rupiah = number_format($angka, 0, ',', '.');
	return $rupiah;
}

/*
array(2) { ["arr1"]=> string(1) "4" ["arr2"]=> string(1) "1" } 
array(2) { ["arr1"]=> NULL ["arr2"]=> string(1) "0" } array(2) { ["arr1"]=>
	 string(1) "5" ["arr2"]=> string(1) "1" } array(2) { ["arr1"]=> string(1) "5" ["arr2"]=> string(1) "1" } array(2) { ["arr1"]=> string(1) "5" ["arr2"]=> string(1) "1" } array(2) { ["arr1"]=> string(1) "3" ["arr2"]=> string(1) "1" } array(2) { ["arr1"]=> NULL ["arr2"]=> string(1) "0" } array(2) { ["arr1"]=> NULL ["arr2"]=> string(1) "0" }

*/