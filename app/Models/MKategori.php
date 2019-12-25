<?php namespace App\Models;

use CodeIgniter\Model;

class MKategori extends Model
{
    protected $table        = "tbl_kategori";
    protected $primaryKey   = "id_kategori";

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kategori', 'default_target','keterangan'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}