<?php namespace App\Models;

use CodeIgniter\Model;
use App\Models\MPemilik;
use App\Models\MEstimasi;

class MStatus extends Model
{
    protected $table        = "tbl_status";
    protected $primaryKey   = "id_status";

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_status','status','warna','group'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

  
}