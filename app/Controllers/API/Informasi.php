<?php namespace App\Controllers\API;
use App\Models\MInformasi;

use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\API\ResponseTrait;

class Informasi extends ResourceController
{

    // protected $modelName = 'App\Models\Pegawai';
    // protected $modelName = 'App\Models\MInformasi';
    // protected $format    = 'json';
    
    /*
    * 
    */
    
    public function index()
    {

        // 1575133199 1572541200
        // echo date('Y-m-d', 1575133200);
        // die();
        $minformasi     = new MInformasi();
        $tanggal_mulai  = date('Y-m-01');
        $tanggal_akhir  = date('Y-m-t');
        if( $this->request->getPost('tanggal_mulai'))
        {
            $tanggal_mulai = date('Y-m-d', $this->request->getPost('tanggal_mulai'));
            $tanggal_akhir = date('Y-m-d', $this->request->getPost('tanggal_akhir'));
        }

        // $tanggal_mulai = date('Y-m-d', 1575133199);
        // $tanggal_akhir = date('Y-m-d', 1572541200);

        // echo $tanggal_mulai;
        // echo $tanggal_akhir;
        // die();

        $periode = [
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_akhir' => $tanggal_akhir,
        ];
        $cabang         = $minformasi->Cabang($periode);
        return $this->respond(['status' => 200, 'data'=> $cabang]);

        var_dump($cabang);
        die();

        // var_dump($periode);
        // die();
        $res    = array();
        $data   = new MInformasi();
        $hasil  = $data->perolehanCabang($periode);

        // uksort($hasil, "sate");
        // var_dump($hasil);
        // die();
        if( count($hasil) > 0  ){
            return $this->respond(['status' => 200, 'data'=> $hasil]);
            // return $this->response->setJSON($hasil);
            // return $this->respond($hasil, 200);
        }else{
            return $this->fail(['Data' => 'Data Not Found']);
            // return $this->response->setJSON($hasil);
        }
        // return $this->response->setJSON($hasil);
    }

}
?>