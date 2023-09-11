<?php

//https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Containers
//https://codeigniter4.github.io/CodeIgniter4/models/model.html

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengguna_model;

class Formpengguna extends BaseController
{


    public function index()
    {
        $id_pengguna = session('id_pengguna');
        $model = new Pengguna_model();
        $data["pengguna"] = $model->where('id_pengguna', $id_pengguna)->first();




        return view('formpengguna', $data);
    }

    public function updatePengguna()
    {
        helper(['form', 'url']);
        $model = new Pengguna_model();
        $PK = $this->request->getVar('id_pengguna');
        $data = [
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'email'  => $this->request->getVar('email'),
            'telepon'  => $this->request->getVar('telepon'),
            'alamat'  => $this->request->getVar('alamat'),
            'username'  => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password')
        ];

        if ($model->update($PK, $data)) {
            echo "<script>alert('Data Pengguna updated successfully!');
window.location.href='" . base_url() . "/formpengguna';</script>";
        } else {

            echo "<script>alert('Data Pengguna updated FAILED!');
window.location.href='" . base_url() . "/formpengguna';</script>";
            //	 return redirect()->to( base_url('Pengguna') );
        }
    }
}
