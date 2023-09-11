<?php

namespace App\Controllers;

class LoginAdmin extends BaseController
{
    public function index()
    {
        return view('auth/loginadmin');
    }
}
