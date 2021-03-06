<?php namespace App\Models;

use CodeIgniter\Model;

class MTarget extends Model
{
    protected $table        = "tbl_target";
    protected $primaryKey   = "id_target";

    protected $returnType = '\App\Entities\Target';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_pegawai', 'target','tanggal_mulai','tanggal_akhir'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getTargetByIDPegawai($id_pegawai, $periode = null)
    {
        $target = $this->db->table('tbl_target');
        $target->selectSum('target', 'jumlah');
        // $target->select('target');

        if (! is_array($periode))
        {
            // pencarian berdasarkan bulan sekarang
            $tanggal_sekarang = date('Y-m-d');
            $periode    = [];
            $periode['tanggal_mulai']   = $tanggal_sekarang;
            $periode['tanggal_akhir']   = $tanggal_sekarang;



        }

        $target->where('tanggal_mulai >= ', $periode['tanggal_mulai']);
        $target->where('tanggal_mulai <= ', $periode['tanggal_akhir']);
        $target->orWhere('tanggal_akhir >= ', $periode['tanggal_mulai']);
        $target->where('tanggal_akhir <= ', $periode['tanggal_akhir']);
        $target->where('id_pegawai', $id_pegawai);


        // $target->where('tanggal_mulai BETWEEN '.$periode['tanggal_mulai'].' AND ', $periode['tanggal_akhir']);
        // $target->orWhere('tanggal_akhir BETWEEN '.$periode['tanggal_mulai'].' AND ', $periode['tanggal_akhir']);
      
        // $target->groupBy('id_pegawai');

        return $target->get()->getRowArray()['jumlah']??0;
    }


    /**
     * Mencari semua target pegawai berdasarkan ID Pegawai
     * @param : int id_pegawai 
     * @return : Array
     */
    public function getAllTargetByIDPegawai($id_pegawai)
    {
        $target = $this->db->table('tbl_target');
        $target->where('id_pegawai', $id_pegawai);

        return $target->get()->getResultArray();
    }

}