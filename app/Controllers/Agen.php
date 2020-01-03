<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\MDatatable;
use App\Models\MCabang;
use App\Models\MPegawai;
use App\Models\MAgen;
use App\Models\MStatusakses;

// ini nanti hapus
use Config\Services;

class Agen extends Controller
{
    
	public function index()
	{
        // echo lang('Bahasa.success');
        // die();
        $status     = new \App\Models\MStatusakses();
        $LibStatus  = new \App\Libraries\Status();

        $statusx = array();
        foreach ($status->getStatusReading((int)user()->group_id) as $k => $r) {
            array_push($statusx,$LibStatus->getStatus($r));
        }

        $kota     = new MCabang();
        $pegawai  = new MPegawai();

        $data = [
            'halaman'       => 'Agen',
            'currentPage'   => 'agen',
            'breadcumb'     => [
                ['text' => 'Agen', 'link' => '']
            ],
            'cabang'        => $kota->select('id_cabang, cabang')->findAll(),
            'pegawai'       => $pegawai->select('id_pegawai, nama_pegawai')->findAll(),
            // 'tambah'        => has_permission([1,2])?'':'disabled'
            'status'        => $statusx
        ];
        return view('agen/index', $data);
		
    }
    public function show($id)
    {
        helper('auth');
        if(!function_exists('user')) helper('auth');

        // // $lib    = new Status();
        // // var_dump($lib->getAllStatus());
        // print_r($lib->getStatus(1)->status);

        // helper('btn');

        // echo btnStatus('Akuisisi','primary');
        // die();

        $estimasi = new \App\Models\MViewestimasi();
        $datashow = $estimasi->find($id);
        if( ! $datashow ) throw new \Error("Data tidak ditemukan Agen", 404) ;

        $userModel = new \Myth\Auth\Authorization\GroupModel();

        // die();
        $data = [
            'halaman'       => 'Detail Agen',
            'currentPage'   => 'agen',
            'breadcumb'     => [
                ['text' => 'Agen', 'link' => ''],
                ['text' => 'Detail ', 'link' => '']
            ],
            'data'  => $datashow,
            'user_id'       => strtoupper($userModel->getGroupsForUser($datashow->user_id)[0]['name']),
        ];
        return view('agen/show', $data);
    }
    public function new(){

		// $authenticate = Services::authentication();
        // var_dump($authenticate->id());
        // echo '<br />';
        // echo '<br />';
        // echo '<br />';
        // echo '<br />';

        // $permit = new \Myth\Auth\Authorization\PermissionModel();
        // $auth = new \Myth\Auth\Authorization\GroupModel();
        
        // var_dump($permit->getPermissionsForUser($authenticate->id()));
        // echo '<br />';
        // echo '<br />';
        // echo '<br />';
        // echo '<br />';
        // echo '<br />';
        // var_dump($permit->doesUserHavePermission( (int) 5, (int) 4));

        // echo '<br />';
        // echo 'getGroupsForUser';
        // echo '<br />';

        // var_dump($auth->getGroupsForUser($authenticate->id()));
        
        // // 5 (cabang) punya permission 3 dan 4
        
        // die();

        // 1576658199480
        // helper('now');
        // $dt = new DateTime("2015-11-01 00:00:00", new DateTimeZone("America/New_York"));
        // $dt = mktime($hour, $minute, $second, $month, $day, $year);
        // $dt = date('1576656213922', format('Y'));
        // $tanggal = new DateTime('1576656213922');
        // var_dump($dt);
        
        // $date = strtotime('now');
        // $date = new \DateTime('@1576658199480');
        // var_dump($date);
        // echo $date->format('Y-m-d H:i:sP');
        // die();
        $kota     = new MCabang();
        $pegawai  = new MPegawai();

        $data = [
            'halaman'       => 'Tambah Data Agen',
            'currentPage'   => 'agen',
            'breadcumb'     => [
                ['text' => 'Agen', 'link' => base_url('agen')],
                ['text' => 'Tambah', 'link' => '']
            ],
            'cabang'        => $kota->select('id_cabang, cabang')->findAll(),
            'pegawai'       => $pegawai->select('id_pegawai, nama_pegawai')->findAll()
        ];
        return view('agen/tambah', $data);
    }
        /* 
     * URL     : \cabang
     * method  : POST
     * 
     * @params : Request post from FormData
     * @return : JSON, Statuscode
     
     * Menggunakan form validation di App\Validation
     * Setting rules untuk filter data di file tsb 
     * Buat model untuk menyimpan data ke database 
    */
    public function create()
    {
        $validation =  \Config\Services::validation();

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
        $data   = [
            'nama_pemilik'  => $this->request->getPostGet('nama_pemilik'),
            'alamat_pemilik'=> $this->request->getPostGet('alamat_pemilik'),
            'nama_agen'     => $this->request->getPostGet('nama_agen'),
            'no_telp'       => $this->request->getPostGet('no_telp'),
            'alamat'        => $this->request->getPostGet('alamat'),
            'id_cabang'     => $this->request->getPostGet('id_cabang'),
            'tanggal'       => $this->request->getPostGet('tanggal'),
            'id_pegawai'    => $this->request->getPostGet('id_pegawai'),

            // 'guest'         => $this->request->getPostGet('guest'),
            'tanggal'    => $this->request->getPostGet('tanggal'),
            'guest'         => $this->request->getPostGet('guest') == 'on'?true:false,
        ];

        if(! $validation->run($data, 'agen') ){
            $data_res   = array();
            $this->response->setStatusCode(203);

            foreach($data as $key => $er){
                if($validation->getError($key))
                    $data_res[$key] = $validation->getError($key);
            }

        }else{
            $Agen = new MAgen();

            /**
             * Ubah dulu tanggal yg masuk kedalam format database YYYY-MM-DD
             */
            // $filtered = new \App\Entities\Estimasi($data);

            if( $Agen->simpan($data) ){
            // if( $Agen->simpan($filtered) ){
                $this->response->setStatusCode(202);
                $data_res = $data;
            }

        };
        $res    =   ['status' => $this->response->getStatusCode(),
                     'message'=> $this->response->getReason(),
                     'data'   => $data_res
                    ];
        return $this->response->setJSON($res);
         
    }

	//--------------------------------------------------------------------
    public function dtable(){
        helper('btn');
        helper('tgl');
        helper('auth');
        

        // var_dump( user()->group_id );
        // die();
        $dt = new \App\Libraries\Datatable();
        $LibStatus  = new \App\Libraries\Status();
        $status     = new \App\Models\MStatusakses();
        $formSearch = array();
        if($this->request->getPost('pencarian')){
            $formSearch  = [
                'id_cabang' => $this->request->getPostGet('id_cabang'),
                'id_pegawai' => $this->request->getPostGet('id_pegawai'),
                'last_status' => $this->request->getPostGet('id_status'),
                'tanggal_mulai' => $this->request->getPostGet('tanggal_mulai'),
                'tanggal_akhir' => $this->request->getPostGet('tanggal_akhir'),
            ];
        }

        $data = array();
    

        $nu = $dt->koneksi('view_estimasi')
                 ->pk('id_estimasi')
                 ->pencarianByKolom(['nama_pegawai','nik'])
                 ->kondisi(['id_cabang',(int) user()->id_cabang])
                 ->hanyaBolehMelihatStatus($status->getStatusReading((int)user()->group_id))
                 ->pencarianForm($formSearch)
                 ->run();


        foreach ($nu as $r) {
            $s    = $LibStatus->getStatus($r->last_status);

            $row = array();
            $row[]	= anchor('agen/show/'.$r->id_estimasi,$r->nama_agen);
            $row[]	= tanggalLengkap(strtotime($r->tanggal)) ;
            $row[]	= $r->nama_pegawai ;
            $row[]	= btnStatus([$s->id_status, $s->status, $s->warna, $r->id_estimasi]);


            $data[]	= $row;
        }
        return $this->response->setJSON($dt->output($data)); 
     
    }


}
