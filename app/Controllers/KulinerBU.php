<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kuliner_model;

class KulinerBU extends Controller
{

    public function index()
    {
        $model = new Kuliner_model();
        $data['pro'] = "read";
        $data['mylist'] = $model->orderBy('id_kuliner', 'ASC')->findAll();
        if (!$data['mylist']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('vKuliner', $data);
    }
    public function create()
    {
        $model = new Kuliner_model();
        $data['pro'] = "create";
        $model2 = new Kuliner_model();
        $data['mykuliner'] = $model2->orderBy('id_kuliner', 'ASC')->findAll();

        return view('vKuliner', $data);
    }
    public function save()
    {
        helper(['form', 'url']);
        $model = new Kuliner_model();

        //====================
        $fileName1 = $this->request->getVar('gambar10');
        $fileName2 = $this->request->getVar('gambar20');
        $fileName3 = $this->request->getVar('gambar30');
        $fileName4 = $this->request->getVar('gambar40');
        $fileName5 = $this->request->getVar('gambar50');


        if ($this->validate([
            'gambar1' => [
                'rules' => 'uploaded[gambar1]|mime_in[gambar1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar1');
            $fileName1 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName1);
        }
        //====================

        if ($this->validate([
            'gambar2' => [
                'rules' => 'uploaded[gambar2]|mime_in[gambar2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar2');
            $fileName2 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName2);
        }
        //====================

        if ($this->validate([
            'gambar3' => [
                'rules' => 'uploaded[gambar3]|mime_in[gambar3,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar3');
            $fileName3 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName3);
        }
        //====================

        if ($this->validate([
            'gambar4' => [
                'rules' => 'uploaded[gambar4]|mime_in[gambar4,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar4');
            $fileName4 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName4);
        }
        //====================

        if ($this->validate([
            'gambar5' => [
                'rules' => 'uploaded[gambar5]|mime_in[gambar5,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar5');
            $fileName5 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName5);
        }

        //====================
        //this->request->getVar('gambar1');

        $data = [
            'nama_kuliner' => $this->request->getVar('nama_kuliner'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'alamat' => $this->request->getVar('alamat'),
            'email'  => $this->request->getVar('email'),
            'telepon'  => $this->request->getVar('telepon'),
            'alamat'  => $this->request->getVar('alamat'),
            'ragam_menu'  => $this->request->getVar('ragam_menu'),
            'waktu_oprasional'  => $this->request->getVar('waktu_oprasional'),
            'latitude'  => $this->request->getVar('latitude'),
            'longitude'  => $this->request->getVar('longitude'),
            'gambar1'  => $fileName1,
            'gambar2'  => $fileName2,
            'gambar3'  => $fileName3,
            'gambar4'  => $fileName4,
            'gambar5'  => $fileName5,
            'status'  => $this->request->getVar('status'),
            'keterangan'  => $this->request->getVar('keterangan'),
        ];
        $save = $model->insert($data);
        return redirect()->to(base_url('kuliner'));
    }

    public function edit($PK = null)
    {
        $model = new Kuliner_model();
        $data['pro'] = "edit";
        $model2 = new Kuliner_model();
        $data['mykuliner'] = $model2->orderBy('id_kuliner', 'ASC')->findAll();
        $data['mylist'] = $model->where('id_kuliner', $PK)->first();
        return view('vKuliner', $data);
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new Kuliner_model();

        //====================
        $fileName1 = $this->request->getVar('gambar10');
        if ($this->validate([
            'gambar1' => [
                'rules' => 'uploaded[gambar1]|mime_in[gambar1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar1,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar1');
            $fileName1 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName1);
        }
        //==================================
        $fileName2 = $this->request->getVar('gambar20');
        if ($this->validate([
            'gambar2' => [
                'rules' => 'uploaded[gambar2]|mime_in[gambar2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar2,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar2');
            $fileName2 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName2);
        }
        //==================================
        $fileName3 = $this->request->getVar('gambar30');
        if ($this->validate([
            'gambar3' => [
                'rules' => 'uploaded[gambar3]|mime_in[gambar3,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar3,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar3');
            $fileName3 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName3);
        }
        //==================================
        $fileName4 = $this->request->getVar('gambar40');
        if ($this->validate([
            'gambar4' => [
                'rules' => 'uploaded[gambar4]|mime_in[gambar4,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar4,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar4');
            $fileName4 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName4);
        }
        //==================================
        $fileName5 = $this->request->getVar('gambar50');
        if ($this->validate([
            'gambar5' => [
                'rules' => 'uploaded[gambar5]|mime_in[gambar5,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar5,10048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            $dataBerkas = $this->request->getFile('gambar5');
            $fileName5 = $dataBerkas->getRandomName();
            $dataBerkas->move('images/', $fileName5);
        }
        //==================================
        $PK = $this->request->getVar('id_kuliner');
        $data = [
            'nama_kuliner' => $this->request->getVar('nama_kuliner'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'alamat' => $this->request->getVar('alamat'),
            'email'  => $this->request->getVar('email'),
            'telepon'  => $this->request->getVar('telepon'),
            'alamat'  => $this->request->getVar('alamat'),
            'ragam_menu'  => $this->request->getVar('ragam_menu'),
            'waktu_oprasional'  => $this->request->getVar('waktu_oprasional'),
            'latitude'  => $this->request->getVar('latitude'),
            'longitude'  => $this->request->getVar('longitude'),
            'gambar1'  => $fileName1,
            'gambar2'  => $fileName2,
            'gambar3'  => $fileName3,
            'gambar4'  => $fileName4,
            'gambar5'  => $fileName5,
            'status'  => $this->request->getVar('status'),
            'keterangan'  => $this->request->getVar('keterangan'),
        ];

        if ($model->update($PK, $data)) {
            echo "<script>alert('Data Kuliner updated successfully!');
window.location.href='" . base_url() . "/kuliner';</script>";
        } else {
            echo "<script>alert('Data Kuliner updated FAILED!');
window.location.href='" . base_url() . "/kuliner';</script>";
        }
    }

    public function delete($PK = null)
    {
        $model = new Kuliner_model();
        $data['mylist'] = $model->where('id_kuliner', $PK)->delete();
        return redirect()->to(base_url('kuliner'));
    }
}
