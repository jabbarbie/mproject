<?php namespace App\Models;
use App\Models\MEstimasi;

use CodeIgniter\Model;

class MInformasi extends Model
{
    public function perolehanCabang(array $periode){
        $cabang     = $this->db->table('tbl_cabang');
        $pegawai    = $this->db->table('view_estimasipegawai');


        // $pegawai->select('');
        $cabang->select('id_cabang, cabang');
        // $cabang->where('sate', function(BaseBuilder $builder){

        // });

        $dataCabang         = $cabang->get();
        $dataPegawai        = $pegawai->get();
        // $data       = $cabang->get(0, 5);
        // $hasil = $data->getResultObject();
        $res    = array();
        foreach($dataCabang->getResultObject() as $c){
            $d  = array();

            $d['id_cabang'] = $c->id_cabang;
            $d['cabang']    = $c->cabang;

            
            $d['data']      = $pegawai
                                ->select('*')
                                ->selectCount('id_pegawai','jumlah')
                                ->where('id_cabang', $c->id_cabang)
                                ->groupBy('id_pegawai')
                                ->orderBy('jumlah','DESC')
                                ->get()->getResult();
            $d['jumlah']         = count($d['data']);
            array_push($res, $d);
        }
        shuffle($res);
        return $res;
    }

    /**
     * tanggal estimasi (periode)
     * last_status
     * limit berapa cabang yg akan ditampilkan
     * dari sini, kirim ke mcabang harusnya
     * 
     * minimalisir proses, karena field yg dibutuhkan hanya beberapa saja
     */
    public function Cabang($periode = null)
    {
        $mcabang    = new \App\Models\MCabang();
        $cabang     = $mcabang->getCabangJumlah($periode);

        $data = array();
        foreach ($cabang as $k => $v) {
            $d  = array();
            $d['jumlah']    = $v['jumlah'];
            $d['id_cabang'] = $v['id_cabang'];
            $d['cabang']    = $v['cabang'];
            $d['data']      = $mcabang->getViewEstimasiByIDCabang($v['id_cabang'], $periode);
            $data[] = $d;
        }
        return $data;
    }
}