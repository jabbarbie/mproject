<?php namespace App\Models;

use CodeIgniter\Model;
// use App\Entities\Estimasi;

class MCabang extends Model
{
    protected $table        = "tbl_cabang";
    protected $primaryKey   = "id_cabang";
    
    // protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_cabang', 'cabang','id_kabupaten','unit'];
    protected $returnType = 'array';

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    /**
     * Menampilkan semua cabang dengan jumlah estimasi / agen yg didapat
     * digunakan di api/informasi
     */ 
    public function getCabangJumlah($periode = null, $last_status = null, $limit = null)
    {
        $cabang = $this->db->table('view_cabang');
        
        $cabang->select('id_cabang, cabang');
        $cabang->selectCount('id_cabang','jumlah');

        if( is_array($periode) )
        {
            // $cabang->where('month(tanggal) = ',$periode['bulan']);
            $cabang->where('tanggal >= ',$periode['tanggal_mulai']);
            $cabang->where('tanggal <= ',$periode['tanggal_akhir']);
        }
        $cabang->groupBy('id_cabang');
        $cabang->orderBy('jumlah','DESC');

        return $cabang->get()->getResultArray();
    }

    public function getViewEstimasiByIDCabang(int $id_cabang, $periode = null)
    {
        // jumlah agen yg didapat dari tbl_agen berdasarkan periode tertentu

        $estimasi = $this->db->table('view_estimasi');
        $estimasi->select('id_estimasi, id_pegawai, nama_pegawai, 
                            id_kategori ,kategori, default_target,
                            target, id_kabupaten, id_cabang , cabang, unit  
                        ');
        // $estimasi->select((new \App\Models\MPegawai)->getTotalRealisasiByID('id_').' as realisasi');
        $estimasi->where('id_cabang', $id_cabang);
        if( is_array($periode) )
        {
            // $cabang->where('month(tanggal) = ',$periode['bulan']);
            $estimasi->where('tanggal >= ',$periode['tanggal_mulai']);
            $estimasi->where('tanggal <= ',$periode['tanggal_akhir']);
        }
        $estimasi->groupBy('id_pegawai');
        // 
        // $data = array();
        $mpegawai   =  new \App\Models\MPegawai();
        
        $data = $estimasi->get()->getResultArray();
        $hasil = array();

        // Sebenarnya langsung bisa, tapi karena mencari jumlah realisasi pegawai
        // Terpaksa harus di loop lagi
        for ($i=0; $i < count($data); $i++) 
        {
            $data[$i]['jumlah'] = $mpegawai->getTotalRealisasiByID($data[$i]['id_pegawai'], $data[$i]['id_cabang'], $periode);
        }
        return $data;
        // //
        // $data = $estimasi->get()->getResultArray()[0];
        // return $data;

        // $jumlah_realisasi = (new \App\Models\MPegawai)->getTotalRealisasiByID($data['id_pegawai'], $data['id_cabang']);

        // array_push($estimasi, $jumlah_realisasi);
        // return $data;
        
    }

}