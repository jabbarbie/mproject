<?php namespace App\Models;

use CodeIgniter\Model;

class MPemilik extends Model
{
    protected $table        = "tbl_pemilik";
    protected $primaryKey   = "id_pemilik";

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_pemilik', 'alamat_pemilik'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}