<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }
}
