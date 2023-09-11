<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_admin';
    protected $allowedFields = ['nama_admin', 'usermane', 'password', 'user_created_at'];
}
