<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengguna_model;
use App\Models\Kuliner_model;


class Pengguna extends Controller
{

    public function index()
    {
        $model = new Pengguna_model();
        $data['pro'] = "read";
        $data['mylist'] = $model->orderBy('id_pengguna', 'ASC')->findAll();
        if (!$data['mylist']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('vPengguna', $data);
    }
    public function create()
    {
        $model = new Pengguna_model();
        $data['pro'] = "create";
        return view('vPengguna', $data);
    }
    public function save()
    {
        helper(['form', 'url']);
        $model = new Pengguna_model();
        $data = [
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'email'  => $this->request->getVar('email'),
            'telepon'  => $this->request->getVar('telepon'),
            'alamat'  => $this->request->getVar('alamat'),
            'username'  => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'status'  => $this->request->getVar('status'),
            'keterangan'  => $this->request->getVar('keterangan'),
        ];
        $save = $model->insert($data);
        return redirect()->to(base_url('pengguna'));
    }

    public function edit($PK = null)
    {
        $model = new Pengguna_model();
        $data['pro'] = "edit";
        $data['mylist'] = $model->where('id_pengguna', $PK)->first();
        //$data['news'] = $news->where(['id_Pengguna' => $PK,'status' => 'Aktif'])->first();

        return view('vPengguna', $data);
    }

    public function update()
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
            'password'  => $this->request->getVar('password'),
            'status'  => $this->request->getVar('status'),
            'keterangan'  => $this->request->getVar('keterangan'),
        ];

        //$model->update($PK,$data);

        if ($model->update($PK, $data)) {
            echo "<script>alert('Data Pengguna updated successfully!');
window.location.href='" . base_url() . "/pengguna';</script>";
        } else {

            echo "<script>alert('Data Pengguna updated FAILED!');
window.location.href='" . base_url() . "/pengguna';</script>";
            //	 return redirect()->to( base_url('Pengguna') );
        }
    }


    public function delete($PK = null)
    {
        $model = new Pengguna_model();
        $data['mylist'] = $model->where('id_pengguna', $PK)->delete();
        return redirect()->to(base_url('pengguna'));
    }

    public function register()
    {
        return view('register');
    }

    public function daftar()
    {
        $model = new Pengguna_Model();
        $username = $this->request->getVar('username');

        $mylist = $model->where('username', $username)->find();
        $ada = 0;
        foreach ($mylist as $d) {
            $ada++;
        }

        if ($ada > 0) {

            session()->setFlashdata('error', 'Maaf! Username sudah digunakan, tolong untuk daftar kembali.');
            return redirect()->back();
        } else {
            $data = [
                'nama_pengguna' => $this->request->getVar('nama_pengguna'),
                'email'         =>  $this->request->getVar('email'),
                'username'      => $username,
                'password'      => $this->request->getVar('password'),
            ];
            $model->save($data);
            return redirect()->to('register');
        }
    }


    public function process()
    {
        helper(['my_helper']);

        $session = session();
        $model = new Pengguna_Model();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');


        $mylist = $model->where('username', $username)->find();
        $usr = "";
        $pas = "";
        $id_pengguna = "";
        $nama_pengguna = "";

        foreach ($mylist as $d) {
            $usr = $d['username'];
            $pas = $d['password'];
            $id_pengguna = $d['id_pengguna'];
            $nama_pengguna = $d['nama_pengguna'];
        }
error_reporting(0);
        if ($usr == $username && $password == $pas) {
            $status = True;
            $session->set('cid', $cid);
            $session->set('id_pengguna', $id_pengguna);
            $session->set('nama_pengguna', $nama_pengguna);
            $session->set('status', $status);
            $session->set('tes', 'HALO 123');
            // return view('frontend');

            $model2 = new Kuliner_model();
            $data['mylist3'] = $model2->orderBy('rand()')->findAll(3, 0);

            $data['all'] = $model2->orderBy('nama_kuliner', 'ASC')->findAll();
            if (!$data['mylist3']) {
                throw PageNotFoundException::forPageNotFound();
            }

            return view('frontend', $data);
        } else {
            session()->setFlashdata('error', 'Maaf! Username dan Password anda salah.');
            return redirect()->to('/register');
        }
    }
}
