<?php namespace App\Models;

use CodeIgniter\Model;
use App\Models\MPemilik;
use App\Models\MEstimasi;

class MAgen extends Model
{
    protected $table        = "tbl_agen";
    protected $primaryKey   = "id_agen";

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_pemilik', 'nama_agen','alamat','no_telp'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function simpan($data)
    {
        $this->db->transStart();
        // $pemilik    = [
        //     'nama_pemilik'  => $this->request->getPostGet('nama_pemilik'),
        //     'alamat_pemilik'=> $this->request->getPostGet('alamat_pemilik'),
        // ];
        // $agen       = [
        //     'id_pemilik'    => '',
        //     'nama_agen'     => $this->request->getPostGet('nama_agen'),
        //     'no_telp'       => $this->request->getPostGet('no_telp'),
        //     'alamat'        => $this->request->getPostGet('alamat'),
        // ];
        // $estimasi   = [
        //     'id_agen'       => '',
        //     'id_pegawai'    => $this->request->getPostGet('id_pegawai'),
        //     'id_cabang'     => $this->request->getPostGet('id_cabang'),
        //     'tanggal'       => $this->request->getPostGet('tanggal'),
        // ];
        $datapemilik    = [
            'nama_pemilik'  => $data['nama_pemilik'],
            'alamat_pemilik'=> $data['alamat_pemilik'],
        ];
        $pemilik    = new MPemilik();
        $pemilik->insert($datapemilik);

        $id_pemilik = $this->db->insertID();

        // agen

        $dataagen       = [
            'id_pemilik'    => $id_pemilik,
            'nama_agen'     => $data['nama_agen'],
            'no_telp'       => $data['no_telp'],
            'alamat'        => $data['alamat'],           
        ];
        
        $agen       = new MAgen();
        $agen->insert($dataagen);

        // estimasi
        $id_agen = $this->db->insertID();
        $dataestimasi = [
            'id_agen'       => $id_agen,
            'id_pegawai'    => $data['id_pegawai'],
            'id_cabang'     => $data['id_cabang'],
            'guest'         => $data['guest'],
            'tanggal'       => $data['tanggal'],
            // 'tanggal'       => $this->request->getPostGet('tanggal'),
        ];

        $filterestimasi = new \App\Entities\Estimasi($dataestimasi);
        
        $estimasi   = new MEstimasi();
        $estimasi->insert($filterestimasi);
        $this->db->transComplete();
        
        if ($this->db->transStatus() === TRUE){
            return true;
        }
    }
    /**
     * Mencari agen berdasarkan pegawai
     */
    public function getCabangByIDPegawai($id_pegawai, $periode = null)
    {
        $pegawai = $this->db->table('view_estimasiagen2');
        $pegawai->where('id_pegawai', $id_pegawai);
        if( is_array($periode) )
        {
            // $cabang->where('month(tanggal) = ',$periode['bulan']);
            $pegawai->where('tanggal >= ',$periode['tanggal_mulai']);
            $pegawai->where('tanggal <= ',$periode['tanggal_akhir']);
        }else{
            $pegawai->where('MONTH(tanggal) = ',date('m'));
            $pegawai->where('YEAR(tanggal) = ',date('Y'));
        }
        $pegawai->orderBy('nama_agen');
        return $pegawai->get()->getResultArray();
    }
}