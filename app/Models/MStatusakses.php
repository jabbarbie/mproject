<?php namespace App\Models;

use CodeIgniter\Model;
use App\Models\MStatus;
/**
 * relasi antara tbl_status dan auth_groups
 * field reading dan updating berelasi dengan id_status (tbl_status)
 * 
 * berfungsi untuk mengetahui permission (authorize) dari group user (admin/srbb/cluster...)
 * ketika mengakses status
 * 
 * reading = status (AK, IN, SPK..) mana saja yg boleh dilihat / ditampilkan untuk user yg sedang login
 * updating = status mana saja yg diperbolehkan untuk diubah oleh user yg sedang login
 *  
 */
class MStatusakses extends Model
{
    protected $table        = "tbl_statusakses";
    protected $primaryKey   = "id_statusakses";

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['group_id','reading','updating'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getUpdate(Int $group_id, Int $currentStatus = null)
    {
        if( empty($currentStatus) ){
            // tampilkan status berdasarkan user login
            $builder = $this->db->table($this->table);
            $builder->select('updating AS id_status, status, warna')
                     ->join('tbl_status','tbl_status.id_status = tbl_statusakses.updating','LEFT')
                     ->where('group_id', $group_id);
    
    
            return $builder->get();
        }

        $status = new MStatus(); 
        $group  = $status->select('group')->where('id_status', $currentStatus)->first();

        $builder = $this->db->table($this->table);
        $builder->select('tbl_status.id_status, status, warna')
                 ->join('tbl_status','tbl_status.id_status = tbl_statusakses.updating','INNER')
                 ->join('tbl_statusgroup', ' tbl_statusgroup.id_status = tbl_status.id_status ', 'INNER')
                 ->where('group_id', $group_id)
                 ->where('tbl_statusgroup.group', $group->group)
                 ->whereNotIn('tbl_status.id_status', $currentStatus);



        return $builder->get();
      
    }
    /**
     * Mencari status ('AK','IN'...) yg bisa dilihat oleh user yg sedang login
     * Example user yg sedang login adalah atf, maka returnnya [2,3,4,5]
     * digunakan untuk filter data di dalam datatable
     * 
     * kondisi, group_id sesuai user yg sedang login
     * diambil dari info user()->group_id di helper auth 
     * @param  : int group_id
     * @return : array [1,2,3,4,5]
     */ 
    public function getStatusReading(Int $group_id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('reading')->where('group_id', $group_id);

        $data = array();
        foreach ($builder->get()->getResult() as $key => $value) {
            array_push($data, $value->reading);
        }

        return $data;
    }

}