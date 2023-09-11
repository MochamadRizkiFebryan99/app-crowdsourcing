<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Admin_model extends Model{
    protected $table = 'tb_admin';
	protected $primaryKey = 'id_admin';
	protected $useAutoIncrement = true;
    protected $allowedFields = ['id_admin','nama_admin','email','telepon','alamat','username','password','status','keterangan'];
}
?>


