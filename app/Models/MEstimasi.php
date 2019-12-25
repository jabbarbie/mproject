<?php namespace App\Models;

use CodeIgniter\Model;

class MEstimasi extends Model
{
    protected $table        = "tbl_estimasi";
    protected $primaryKey   = "id_estimasi";

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_estimasi','user_id','id_agen','id_cabang','id_pegawai','tanggal','spk','kode','guest','last_status','created_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}