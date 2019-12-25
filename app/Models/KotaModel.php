<?php namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
    protected $table        = "tbl_kabupaten";
    protected $primaryKey   = "id_kabupaten";
    protected $returnType   = "array"; 

}