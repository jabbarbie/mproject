<?php namespace App\Models;

use CodeIgniter\Model;

class MPegawai extends Model
{
    protected $table        = "tbl_pegawai";
    protected $primaryKey   = "id_pegawai";

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nik', 'nama_pegawai','id_kategori'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    /**
     * Untuk mencari top pegawai 
     */

     public function getTopPegawai($periode = null)
     {
        $pegawai = $this->db->table('view_estimasipegawai');
        
        $pegawai->select('*');
        $pegawai->selectCount('id_pegawai','jumlah');

        if( is_array($periode) && count($periode) > 0)
        {
            // $cabang->where('month(tanggal) = ',$periode['bulan']);
            $pegawai->where('tanggal >= ',$periode['tanggal_mulai']);
            $pegawai->where('tanggal <= ',$periode['tanggal_akhir']);
        }
        $pegawai->groupBy('id_pegawai');
        $pegawai->orderBy('jumlah','DESC');

        return $pegawai->get()->getResultArray();
     }
    /**
     * Untuk mencari detail pegawai berdasarkan id_pegawai
     */
    public function getDetailPegawaiSimple($id_pegawai)
    {
        $pegawai = $this->db->table('view_pegawai');
        $pegawai->where('id_pegawai', $id_pegawai);

        return $pegawai->get()->getResultArray();
    }

    public function getTotalRealisasiByID($id_pegawai, $id_cabang = null, $periode = null)
    {
        // return 100;
        $pegawai = $this->db->table('tbl_estimasi');
        $pegawai->selectCount('id_estimasi', 'total')
                ->where('id_pegawai', $id_pegawai)
                ->where('id_cabang', $id_cabang);
        if( is_array($periode) )
        {
            // $cabang->where('month(tanggal) = ',$periode['bulan']);
            $pegawai->where('tanggal >= ',$periode['tanggal_mulai']);
            $pegawai->where('tanggal <= ',$periode['tanggal_akhir']);
        }

        return $pegawai->get()->getRowArray()['total'];
    }

    public function getPegawai($id)
    {
        $p  = $this->db->table('tbl_pegawai');
        $p->join('tbl_kategori','tbl_pegawai.id_kategori = tbl_kategori.id_kategori','INNER');
        $p->where('id_pegawai', $id);
        return $p->get()->getRowObject();
    }

}