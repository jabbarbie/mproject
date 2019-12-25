<?php namespace App\Models;

use CodeIgniter\Model;

class MKota extends Model
{
    protected $table        = "tbl_kabupaten";
    protected $primaryKey   = "id_kabupaten";

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_kabupaten', 'name','status'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}