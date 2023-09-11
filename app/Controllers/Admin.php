<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_model;

class Admin extends Controller
{
    public function index()
    {
        $model = new Admin_model();
        $data['pro'] = "read";
        $data['mylist'] = $model->orderBy('id_admin', 'ASC')->findAll();
        if (!$data['mylist']) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('vAdmin', $data);
    }

    public function loginadmin()
    {
        return view('auth/loginadmin');
    }

    public function process()
    {
        $model = new Admin_Model();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();

        if ($data) {
            if ($data['password'] == $password) {
                session()->set([
                    'id_admin' => $data->id_admin,
                    'username' => $data->username,
                    'password' => $data->password,
                    'status'   => $data->Aktif,
                    'logged_in' => TRUE
                ]);

                return view('auth/dashboard');
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function create()
    {
        $model = new Admin_model();
        $data['pro'] = "create";
        return view('vAdmin', $data);
    }

    public function save()
    {
        helper(['form', 'url']);
        $model = new Admin_model();
        $data = [
            'nama_admin' => $this->request->getVar('nama_admin'),
            'email'  => $this->request->getVar('email'),
            'telepon'  => $this->request->getVar('telepon'),
            'alamat'  => $this->request->getVar('alamat'),
            'username'  => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'status'  => $this->request->getVar('status'),
            'keterangan'  => $this->request->getVar('keterangan'),
        ];
        $save = $model->insert($data);
        return redirect()->to(base_url('admin'));
    }

    public function edit($PK = null)
    {
        $model = new Admin_model();
        $data['pro'] = "edit";
        $data['mylist'] = $model->where('id_admin', $PK)->first();
        //$data['news'] = $news->where(['id_admin' => $PK,'status' => 'Aktif'])->first();

        return view('vAdmin', $data);
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new Admin_model();
        $PK = $this->request->getVar('id_admin');
        $data = [
            'nama_admin' => $this->request->getVar('nama_admin'),
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
            echo "<script>alert('Data admin updated successfully!');
window.location.href='" . base_url() . "/admin';</script>";
        } else {

            echo "<script>alert('Data admin updated FAILED!');
window.location.href='" . base_url() . "/admin';</script>";
            //	 return redirect()->to( base_url('admin') );
        }
    }


    public function delete($PK = null)
    {
        $model = new Admin_model();
        $data['mylist'] = $model->where('id_admin', $PK)->delete();
        return redirect()->to(base_url('admin'));
    }
}
