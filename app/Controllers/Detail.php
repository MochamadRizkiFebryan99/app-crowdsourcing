<?php
//https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Containers
//https://codeigniter4.github.io/CodeIgniter4/models/model.html

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kuliner_model;
use App\Models\Komentar_model;
use App\Models\Rating_model;

class Detail extends BaseController
{
    protected $session;

    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index($PK = null)
    {
        $model = new Kuliner_model();
        $data['mylist'] = $model->where('id_kuliner', $PK)->first();


        $model = new Komentar_model();
        $datakomentar= $model->where('id_kuliner', $PK)->orderBy('tanggal', 'DESC')->findAll();
	
		 $datakomen=[];
		 $modelrating = new Rating_model();
			foreach($datakomentar as $komentar){
			$rating = $modelrating->where('id_pengguna', $komentar['id_pengguna'])->where('id_kuliner', $komentar['id_kuliner'])->first();
			$komentar["rating"]=$rating['rating'];
            $komentar["rating2"] = $rating2['rating2'];
            $komentar["rating3"] = $rating3['rating3'];
            $komentar["rating4"] = $rating4['rating4'];
            $komentar["rating5"] = $rating5['rating5'];
			array_push($datakomen,$komentar);
			
			}
		$data['mylist3']=$datakomen;
      return view('detail', $data);
    }
}
