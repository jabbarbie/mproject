<?php namespace App\Models;

use CodeIgniter\Model;

class MStatushistory extends Model
{
    protected $table        = "tbl_statushistory";
    protected $primaryKey   = "id_statushistory";

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_estimasi','beforestatus','afterstatus','user_id','created_at'];

    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

  
}