<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Rekomendasi_model extends Model
{
    protected $table = 'tb_rekomendasi';
    protected $primaryKey = 'id_rekomendasi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_rekomendasi', 'id_pengguna', 'nama_kuliner', 'alamat', 'gambar', 'status', 'keterangan'];
}
