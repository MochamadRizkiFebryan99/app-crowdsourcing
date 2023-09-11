<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Komentar_model extends Model
{
    protected $table = 'tb_komentar';
    protected $primaryKey = 'id_komentar';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_komentar', 'id_pengguna', 'id_kuliner', 'komentar', 'gambar', 'tanggal', 'jam', 'status', 'keterangan'];
}
