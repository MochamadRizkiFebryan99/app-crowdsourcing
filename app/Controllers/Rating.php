<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Rating_model;
use App\Models\Rekomendasi_model;
use App\Models\Pengguna_model;
use App\Models\Kuliner_model;

class Rating extends Controller
{
    public function index()
    {
        helper(['my_helper']);
        $model = new Rating_model();
        $data['pro'] = "read";
        $data['mylist'] = $model->orderBy('id_rating', 'ASC')->findAll();
        if (!$data['mylist']) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('vRating', $data);
    }
	
    public function create()
    {
        $model = new Rating_model();
        $data['pro'] = "create";
        $modelP = new Pengguna_model();
        $data['mypengguna'] = $modelP->orderBy('id_pengguna', 'ASC')->findAll();
        $modelK = new Kuliner_model();
        $data['mykuliner'] = $modelK->orderBy('id_kuliner', 'ASC')->findAll();
        return view('vRating', $data);
    }
	
    public function save()
    {
        helper(['form', 'url']);
        $model = new Rating_model();
        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'id_kuliner'  => $this->request->getVar('id_kuliner'),
            'rating'  => $this->request->getVar('rating'),
            'rating2'  => $this->request->getVar('rating2'),
            'rating3'  => $this->request->getVar('rating3'),
            'rating4'  => $this->request->getVar('rating4'),
            'rating5'  => $this->request->getVar('rating5'),
            'tanggal'  => date("Y-m-d"),
            'jam'  => date("H:i:s"),
        ];
        $save = $model->insert($data);
        return redirect()->to(base_url('rating'));
    }

    public function edit($PK = null)
    {
        $model = new Rating_model();
        $data['pro'] = "edit";
        $modelP = new Pengguna_model();
        $data['mypengguna'] = $modelP->orderBy('id_pengguna', 'ASC')->findAll();
        $modelK = new Kuliner_model();
        $data['mykuliner'] = $modelK->orderBy('id_kuliner', 'ASC')->findAll();
        $data['mylist'] = $model->where('id_rating', $PK)->first();
        return view('vRating', $data);
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new Rating_model();
        $PK = $this->request->getVar('id_rating');
        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'id_kuliner'  => $this->request->getVar('id_kuliner'),
            'rating'  => $this->request->getVar('rating'),
            'rating2'  => $this->request->getVar('rating2'),
            'rating3'  => $this->request->getVar('rating3'),
            'rating4'  => $this->request->getVar('rating4'),
            'rating5'  => $this->request->getVar('rating5'),
            'tanggal'  => date("Y-m-d"),
            'jam'  => date("H:i:s"),
        ];
        if ($model->update($PK, $data)) {
            echo "<script>alert('Data Rating updated successfully!');window.location.href='" . base_url() . "/rating';</script>";
        } else {
            echo "<script>alert('Data Rating updated FAILED!');window.location.href='" . base_url() . "/rating';</script>";
        }
    }

    public function delete($PK = null)
    {
        $model = new Rating_model();
        $data['mylist'] = $model->where('id_rating', $PK)->delete();
        return redirect()->to(base_url('rating'));
    }
}
