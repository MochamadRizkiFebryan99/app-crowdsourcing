<?php

namespace App\Controllers;

use App\Models\Rating_model;
use CodeIgniter\Controller;
use App\Models\Komentar_model;
use App\Models\Kuliner_model;
use App\Models\Pengguna_model;

class Komentar extends Controller
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
            $model = new Komentar_model();
            $data['pro'] = "read";
            $data['mylist'] = $model->orderBy('id_komentar', 'ASC')->findAll();
            if (!$data['mylist']) {
                throw PageNotFoundException::forPageNotFound();
            }

            return view('vKomentar', $data);
        }
    }
    public function create()
    {
        $model = new Komentar_model();
        $data['pro'] = "create";
        $modelP = new Pengguna_model();
        $data['mypengguna'] = $modelP->orderBy('id_pengguna', 'ASC')->findAll();
        $modelK = new Kuliner_model();
        $data['mykuliner'] = $modelK->orderBy('id_kuliner', 'ASC')->findAll();
        return view('vKomentar', $data);
    }

    public function _save()
    {
        helper(['form', 'url']);
        $model = new Komentar_model();

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
        $id_pengguna = $session->get('id_admin');

        $data = [
            'id_pengguna' => $id_pengguna,
            'id_kuliner'  => $this->request->getVar('id_kuliner'),
            'komentar'  => $this->request->getVar('komentar'),
            'gambar'  => $fileName,
            'tanggal'  => date("Y-m-d"),
            'jam'  => date("H:i:s"),
            'status'  => "Aktif",
            'keterangan' => ""
        ];


        $save = $model->insert($data);
        $model = new Rating_model();
        $data = [
            'id_pengguna' => $id_pengguna,
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

        return redirect()->to(base_url('komentar'));
    }


    public function save()
    {
        helper(['form', 'url']);
        $model = new Komentar_model();

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


        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'id_kuliner'  => $this->request->getVar('id_kuliner'),
            'komentar'  => $this->request->getVar('komentar'),
            'gambar'  => $fileName,
            'tanggal'  => date("Y-m-d"),
            'jam'  => date("H:i:s"),
            'status'  => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        $save = $model->insert($data);
        return redirect()->to(base_url('komentar'));
    }


    public function saveKomentar()
    {
        helper(['form', 'url']);
        $model = new Komentar_model();


        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $cekKomen = $model->where('id_pengguna', $id_pengguna)->where('id_kuliner', $this->request->getVar('id_kuliner'))->first();

        if ($cekKomen > 0) {
            session()->setFlashdata('error', 'Tidak dapat memberi komentar lagi');
            return redirect()->to(base_url('detail/index/' . $this->request->getVar('id_kuliner')));
        }

        //====================
        // if (!$this->validate([
        //     'gambar' => [
        //         'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
        //         'errors' => [
        //             'uploaded' => 'Harus Ada File yang diupload',
        //             'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
        //             'max_size' => 'Ukuran File Maksimal 2 MB'
        //         ]

        //     ]
        // ])) {
        //     session()->setFlashdata('error', $this->validator->listErrors());
        //     return redirect()->back()->withInput();
        // }

        // $dataBerkas = $this->request->getFile('gambar');
        // $fileName = $dataBerkas->getRandomName();
        // $dataBerkas->move('images/', $fileName);

        //====================


        $data = [
            'id_pengguna' => $id_pengguna,
            'id_kuliner'  => $this->request->getVar('id_kuliner'),
            'komentar'  => $this->request->getVar('komentar'),
            'gambar'  => "avatar.jpg",
            'tanggal'  => date("Y-m-d"),
            'jam'  => date("H:i:s"),
            'status'  => 'Aktif',
            'keterangan' => '-'
        ];
        $save = $model->insert($data);

        $model2 = new Rating_model();
        $data2 = [
            'id_pengguna' => $id_pengguna,
            'id_kuliner'  => $this->request->getVar('id_kuliner'),
            'rating'  => $this->request->getVar('rating'),
            'rating2'  => $this->request->getVar('rating2'),
            'rating3'  => $this->request->getVar('rating3'),
            'rating4'  => $this->request->getVar('rating4'),
            'rating5'  => $this->request->getVar('rating5'),
            'tanggal'  => date("Y-m-d"),
            'jam'  => date("H:i:s"),
        ];
        $save2 = $model2->insert($data2);

        session()->setFlashdata('message', 'sukses simpan');

        return redirect()->to(base_url('detail/index/' . $this->request->getVar('id_kuliner')));
    }

    public function edit($PK = null)
    {
        $model = new Komentar_model();
        $data['pro'] = "edit";
        $data['mylist'] = $model->where('id_komentar', $PK)->first();
        $modelP = new Pengguna_model();
        $data['mypengguna'] = $modelP->orderBy('id_pengguna', 'ASC')->findAll();
        $modelK = new Kuliner_model();
        $data['mykuliner'] = $modelK->orderBy('id_kuliner', 'ASC')->findAll();
        return view('vKomentar', $data);
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new Komentar_model();

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

        $PK = $this->request->getVar('id_komentar');
        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'id_kuliner'  => $this->request->getVar('id_kuliner'),
            'komentar'  => $this->request->getVar('komentar'),
            'gambar'  => $fileName,
            'status'  => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];

        if ($model->update($PK, $data)) {
            echo "<script>alert('Data Komentar updated successfully!');
window.location.href='" . base_url() . "/komentar';</script>";
        } else {
            echo "<script>alert('Data Komentar updated FAILED!');
window.location.href='" . base_url() . "/komentar';</script>";
        }
    }


    public function delete($PK = null)
    {
        $model = new Komentar_model();
        $data['mylist'] = $model->where('id_komentar', $PK)->delete();
        return redirect()->to(base_url('komentar'));
    }
}
