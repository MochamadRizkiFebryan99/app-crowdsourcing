<?php
//https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Containers
//https://codeigniter4.github.io/CodeIgniter4/models/model.html

namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect('/');
    }

}
