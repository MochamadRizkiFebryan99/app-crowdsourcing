<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Pengguna_model extends Model{
    protected $table = 'tb_pengguna';
	protected $primaryKey = 'id_pengguna';
	protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pengguna','nama_pengguna','email','telepon','alamat','username','password','status','keterangan'];
}
