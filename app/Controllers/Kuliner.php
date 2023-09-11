<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kuliner_model;

class Kuliner extends Controller
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


	public function cari()
	{
		helper(['form', 'url']);
		$item =	$this->request->getVar('search');

		$model = new Kuliner_model();
		$data['mylist3'] = $model->like('nama_kuliner', $item)->orderBy('rand()')->findAll();

		//	$data['all'] = $model->like('nama_kuliner', $this->request->getVar('search'))->findAll();

		$data['all'] = $model->orderBy('id_kuliner', 'ASC')->findAll();
		//$users = $builder->like('title', $this->request->getVar('search'))->orLike('name', $this->request->getVar('search'))->get();

		return view('all', $data);
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


		$dataBerkas = $this->request->getFile('gambar1');
		$fileName1 = $dataBerkas->getRandomName();
		$dataBerkas->move('images/', $fileName1);

		//====================
		$dataBerkas = $this->request->getFile('gambar2');
		$fileName2 = $dataBerkas->getRandomName();
		$dataBerkas->move('images/', $fileName2);

		//====================
		$dataBerkas = $this->request->getFile('gambar3');
		$fileName3 = $dataBerkas->getRandomName();
		$dataBerkas->move('images/', $fileName3);
		//====================
		$dataBerkas = $this->request->getFile('gambar4');
		$fileName4 = $dataBerkas->getRandomName();
		$dataBerkas->move('images/', $fileName4);
		//====================
		$dataBerkas = $this->request->getFile('gambar5');
		$fileName5 = $dataBerkas->getRandomName();
		$dataBerkas->move('images/', $fileName5);
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
			'emded'  => $this->request->getVar('emded'),
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

		//====================
		$fileName10 = $this->request->getVar('gambar10');
		$fileName20 = $this->request->getVar('gambar20');
		$fileName30 = $this->request->getVar('gambar30');
		$fileName40 = $this->request->getVar('gambar40');
		$fileName50 = $this->request->getVar('gambar50');


		$dataBerkas = $this->request->getFile('gambar1');
		if ($dataBerkas == "") {
			$fileName1 = $fileName10;
		} else {
			$fileName1 = $dataBerkas->getRandomName();
			$dataBerkas->move('images/', $fileName1);
		}
		//====================
		$dataBerkas = $this->request->getFile('gambar2');
		if ($dataBerkas == "") {
			$fileName2 = $fileName20;
		} else {
			$fileName2 = $dataBerkas->getRandomName();
			$dataBerkas->move('images/', $fileName2);
		}

		//====================
		$dataBerkas = $this->request->getFile('gambar3');
		if ($dataBerkas == "") {
			$fileName3 = $fileName30;
		} else {
			$fileName3 = $dataBerkas->getRandomName();
			$dataBerkas->move('images/', $fileName3);
		}
		//====================
		$dataBerkas = $this->request->getFile('gambar4');
		if ($dataBerkas == "") {
			$fileName4 = $fileName40;
		} else {
			$fileName4 = $dataBerkas->getRandomName();
			$dataBerkas->move('images/', $fileName4);
		}
		//====================
		$dataBerkas = $this->request->getFile('gambar5');
		if ($dataBerkas == "") {
			$fileName5 = $fileName50;
		} else {
			$fileName5 = $dataBerkas->getRandomName();
			$dataBerkas->move('images/', $fileName5);
		}
		//==================================
		$PK = $this->request->getVar('id_kuliner');
		$data = [
			'nama_kuliner'      => $this->request->getVar('nama_kuliner'),
			'deskripsi'         => $this->request->getVar('deskripsi'),
			'alamat'            => $this->request->getVar('alamat'),
			'email'             => $this->request->getVar('email'),
			'waktu_oprasional'  => $this->request->getVar('waktu_oprasional'),
			'telepon'           => $this->request->getVar('telepon'),
			'alamat'            => $this->request->getVar('alamat'),
			'ragam_menu'        => $this->request->getVar('ragam_menu'),
			'latitude'          => $this->request->getVar('latitude'),
			'longitude'         => $this->request->getVar('longitude'),
			'emded'             => $this->request->getVar('emded'),
			'gambar1'           => $fileName1,
			'gambar2'           => $fileName2,
			'gambar3'           => $fileName3,
			'gambar4'           => $fileName4,
			'gambar5'           => $fileName5,
			'status'            => $this->request->getVar('status'),
			'keterangan'        => $this->request->getVar('keterangan')
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
