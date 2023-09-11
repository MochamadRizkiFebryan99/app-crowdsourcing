<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Rekomendasi_model;
use App\Models\Pengguna_model;
use App\Models\Kuliner_model;

class Rekomendasi extends Controller
{

    public function index()
    {
        helper(['my_helper']);

        $session = session();
        $status = $session->get('cstatus');

        if ($status == "Pengguna") {
            $model = new Kuliner_model();
            $data['mylist3'] = $model->orderBy('rand()')->findAll(3, 0);

            $data['all'] = $model->orderBy('nama_kuliner', 'ASC')->findAll();
            if (!$data['mylist3']) {
                throw PageNotFoundException::forPageNotFound();
            }

            return view('frontend', $data);
        } else {
            $model = new Rekomendasi_model();
            $data['pro'] = "read";
            $data['mylist'] = $model->orderBy('id_rekomendasi', 'ASC')->findAll();

            if (!$data['mylist']) {
                throw PageNotFoundException::forPageNotFound();
            }

            return view('vRekomendasi', $data);
        }
    }
    public function create()
    {
        $model = new Rekomendasi_model();
        $data['pro'] = "create";
        $modelP = new Pengguna_model();
        $data['mypengguna'] = $modelP->orderBy('id_pengguna', 'ASC')->findAll();
        $modelK = new Kuliner_model();
        $data['mykuliner'] = $modelK->orderBy('id_kuliner', 'ASC')->findAll();
        return view('vRekomendasi', $data);
    }

    public function save()
    {
        helper(['form', 'url']);
        $model = new Rekomendasi_model();

        //====================
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataBerkas = $this->request->getFile('gambar');
        $fileName = $dataBerkas->getRandomName();
        $dataBerkas->move('images/', $fileName);

        //====================
        //this->request->getVar('gambar');
        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'nama_kuliner'  => $this->request->getVar('nama_kuliner'),
            'alamat'  => $this->request->getVar('alamat'),
            'gambar'  => $fileName,
            'status'  => $this->request->getVar('status'),
            'keterangan'  => $this->request->getVar('keterangan'),
        ];
        $save = $model->insert($data);
        return redirect()->to(base_url('rekomendasi'));
    }

    public function saveRekom()
    {
        helper(['form', 'url']);
        $model = new Rekomendasi_model();

        //====================
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataBerkas = $this->request->getFile('gambar');
        $fileName = $dataBerkas->getRandomName();
        $dataBerkas->move('images/', $fileName);
        //====================
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        var_dump($id_pengguna);
        $data = [
            'id_pengguna' => $id_pengguna,
            'nama_kuliner'  => $this->request->getVar('nama_kuliner'),
            'alamat'  => $this->request->getVar('alamat'),
            'gambar'  => $fileName,
            'status'  => "Proses",
            'keterangan'  => $this->request->getVar('keterangan'),
        ];
        $save = $model->insert($data);

        //session()->setFlashdata('message', $this->validator->listErrors());
        session()->setFlashdata('message', 'sukses simpan');
        return redirect()->to(base_url('rekom'));
    }

    public function edit($PK = null)
    {
        $model = new Rekomendasi_model();
        $data['pro'] = "edit";
        $data['mylist'] = $model->where('id_rekomendasi', $PK)->first();
        $modelP = new Pengguna_model();
        $data['mypengguna'] = $modelP->orderBy('id_pengguna', 'ASC')->findAll();
        $modelK = new Kuliner_model();
        $data['mykuliner'] = $modelK->orderBy('id_kuliner', 'ASC')->findAll();
        return view('vRekomendasi', $data);
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new Rekomendasi_model();

        //====================
        $fileName = $this->request->getVar('gambar0');
        if ($this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,video/mp4,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]
            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar');
            $fileName = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName);
        }

        //====================
        //this->request->getVar('gambar');

        $PK = $this->request->getVar('id_rekomendasi');
        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'nama_kuliner'  => $this->request->getVar('nama_kuliner'),
            'alamat'  => $this->request->getVar('alamat'),
            'gambar'  => $fileName,
            'status'  => $this->request->getVar('status'),
            'keterangan'  => $this->request->getVar('keterangan'),
        ];

        if ($model->update($PK, $data)) {
            echo "<script>alert('Data Rekomendasi updated successfully!');
window.location.href='" . base_url() . "/rekomendasi';</script>";
        } else {
            echo "<script>alert('Data Rekomendasi updated FAILED!');
window.location.href='" . base_url() . "/rekomendasi';</script>";
        }
    }

    public function delete($PK = null)
    {
        $model = new Rekomendasi_model();
        $data['mylist'] = $model->where('id_rekomendasi', $PK)->delete();
        return redirect()->to(base_url('rekomendasi'));
    }
}
