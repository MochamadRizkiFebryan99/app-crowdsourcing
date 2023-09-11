<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Kuliner_model extends Model
{
    protected $table = 'tb_kuliner';
    protected $primaryKey = 'id_kuliner';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_kuliner', 'nama_kuliner', 'deskripsi', 'alamat', 'email', 'telepon', 'ragam_menu', 'waktu_oprasional', 'latitude', 'longitude', 'emded', 'gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5', 'status', 'keterangan'
    ];
}
