<?php namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\Controller;
use App\Models\MStatusakses;
use App\Models\MEstimasi;
use App\Models\MStatushistory;

// use CodeIgniter\API\ResponseTrait;

class Status extends ResourceController
{
    public function index()
    {
        echo "test in area";
    }
    public function __construct()
    {
        helper('auth');
        // harus login dulu
        if(! logged_in() ) return [];     
    }
    private function status(int $currentStatus = null)
    {
        $role   = new MStatusakses();
        return $role->getUpdate(user()->group_id, $currentStatus)->getResult();

    }
    /**
     * 
     */
    public function getstatusupdate(int $currentStatus = null)
    {

        $data   = $this->status($currentStatus);
        if (count($data) > 0)
        {
            return $this->respond(['status' => 200, 'data'=> $data]);
        }
        return $this->failNotFound('data not found');      
    }
    /**
     * Mencari status ('AK','IN'...) yg bisa dilihat oleh user yg sedang login
     * Example user yg sedang login adalah atf, maka returnnya [2,3,4,5]
     * digunakan untuk filter data di dalam datatable
     * 
     * kondisi, group_id sesuai user yg sedang login
     * diambil dari info user() di helper auth 
     * @return : array [1,2,3,4,5]
     */
    public function getstatusread()
    {
        $status = new MStatusakses;
        $data   = $status->getStatusReading(user()->group_id);
        if ( count($data) > 0)
        {
            var_dump($data);
            // return $this->respond(['status' => 200, 'data'=> $data]);
        }

    }
    /**
     * Mengubah status last_status pada tbl_estimasi
     * Menginsert data history pada table tbl_statushistory
     * @params : request id_estimasi, beforestatus, afterstatus
     * Method Post
     */
    public function ubahstatus()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'afterstatus'   => 'required|numeric',
            'id_estimasi'   => 'required|min_length[1]',
        ]);
        $data   = [
            'id_estimasi'   => (int) $this->request->getPost('id_estimasi'),
            'beforestatus'  => (int) $this->request->getPost('beforestatus'),
            'afterstatus'   => (int) $this->request->getPost('afterstatus'),
            'user_id'       => (int) user_id()
        ];
        if( $validation->run($data) )
        {
            $history    = new MStatushistory();

            if( $history->insert($data) )
            {
                $estimasi = new MEstimasi();
                $dataestimasi = [
                    'last_status'   => $data['afterstatus']
                ];

                if ( $estimasi->update($data['id_estimasi'], $dataestimasi) ) 
                {
                    // $data   = ['pesan' => 'berhasil', 'last_status' => $data['afterstatus']];
                }
            }

        }
        return $this->respond(['status' => 200, 'data'=> $data]);
    }
}
?>