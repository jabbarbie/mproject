<?php namespace App\Controllers;
use App\Models\MKota;
use App\Models\MDatatable;


class Kota extends BaseController
{
    // use App\Models;
	public function index()
	{
        $kota   = new MKota();
        $data = [
            'halaman'       => 'Kota',
            'currentPage'   => 'kota',
            'breadcumb'     => [
                ['text' => 'Kota', 'link' => '']
            ],
        ];

        return view('kota/index', $data);
    }
    public function testresponse(){
        // $user = $userModel->find($user_id);
        $kota   = new MKota();
        $data   = $kota->findAll();
    
        return $this->response
                    ->setStatusCode(505, 'NotFound')
                    ->setJSON($data);
    }
    //--------------------------------------------------------------------
    
    public function dtable(){
        $dt = new \App\Libraries\Datatable();
        $LibStatus  = new \App\Libraries\Status();
        $data = array();
    
        helper('btn');
        $nu = $dt->koneksi('tbl_kabupaten')
                 ->pk('id_kabupaten')
                 ->pencarianByKolom(['id_kabupaten','name'])
                 ->run();
        
    
        $data = array();
        foreach ($nu as $r) {
          $row = array();
          $row[]	= $r->id_kabupaten ;
          $row[]	= $r->name ;
          $row[]	= $r->status ;


          $data[]	= $row;
        }
        return $this->response->setJSON($dt->output($data));   


    }

}
