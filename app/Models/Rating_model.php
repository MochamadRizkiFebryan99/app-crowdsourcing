<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Rating_model extends Model
{
    protected $table = 'tb_rating';
    protected $primaryKey = 'id_rating';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_rating', 'id_pengguna', 'id_kuliner', 'rating','rating2','rating3','rating4','rating5', 'tanggal', 'jam'];
}
