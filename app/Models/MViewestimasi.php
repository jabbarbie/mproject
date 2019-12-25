<?php namespace App\Models;

use CodeIgniter\Model;

class MViewestimasi extends Model
{
    protected $table        = "view_estimasi";
    protected $primaryKey   = "id_estimasi";

    protected $returnType = '\App\Entities\Estimasi';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_pegawai'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}