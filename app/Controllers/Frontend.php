<?php
//https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Containers
//https://codeigniter4.github.io/CodeIgniter4/models/model.html

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kuliner_model;

class Frontend extends BaseController
{
	public function index()
	{
		$model = new Kuliner_model();
		$data['mylist3'] = $model->orderBy('rand()')->findAll(3, 0);

		$data['all'] = $model->orderBy('nama_kuliner', 'ASC')->findAll();
		if (!$data['mylist3']) {
			throw PageNotFoundException::forPageNotFound();
		}

		return view('frontend', $data);
	}
}
