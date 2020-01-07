<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MPegawai;
use App\Models\MKategori;

class Pegawai extends Controller
{
	public function index()
	{
        helper('auth');
        $kategori   = new MKategori();
        $data = [
            'halaman'       => 'Pegawai',
            'currentPage'   => 'pegawai',
            'breadcumb'     => [
                ['text' => 'Pegawai', 'link' => '']
            ],
            'kategori'      => $kategori->findAll()
        ];
        return view('pegawai/index', $data);
		
    }
    public function new(){
        $kategori   = new MKategori();

        $data = [
            'halaman'       => 'Tambah Pegawai',
            'currentPage'   => 'pegawai',
            'breadcumb'     => [
                ['text' => 'Pegawai', 'link' => base_url('pegawai')],
                ['text' => 'Tambah', 'link' => '']
            ],
            'kategori'      => $kategori->findAll()

        ];

        return view('pegawai/tambah', $data);
    }
    public function show($id)
    {
        if(!function_exists('user')) helper('auth');

        // $estimasi = new \App\Models\MViewestimasi();
        // $datashow = $estimasi->find($id);
        
        // if( ! $datashow ) throw new \Error("Data tidak ditemukan Agen", 404) ;

        // $userModel = new \Myth\Auth\Authorization\GroupModel();

        // die();
        $t = new \App\Models\MTarget();
        $target = $t->where('id_pegawai', $id)->findAll();

        // var_dump($target);
        // die();
        $p = new MPegawai();
        $pegawai = $p->getPegawai($id);
        $data = [
            'halaman'       => 'Detail Pegawai',
            'currentPage'   => 'pegawai',
            'breadcumb'     => [
                ['text' => 'Pegawai', 'link' => ''],
                ['text' => 'Detail ', 'link' => '']
            ],
            'data'  => $pegawai,
            'target'    => $target,
            // 'user_id'       => strtoupper($userModel->getGroupsForUser($datashow->user_id)[0]['name']),
        ];
        return view('pegawai/show', $data);
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

        $data   = [
            'nik'  => $this->request->getPostGet('nik'),
            'nama_pegawai'=> $this->request->getPostGet('nama_pegawai'),
            'id_kategori' => $this->request->getPostGet('id_kategori'),
        ];

        $periode = array();
        // cek dahulu apakah user menginput target atau tidak
        if($this->request->getPostGet('target'))
        {
            $periode    = [
                'target'        => $this->request->getPostGet('target'),
                'tanggal_mulai' => $this->request->getPostGet('tanggal_mulai'),
                'tanggal_akhir' => $this->request->getPostGet('tanggal_akhir'),
            ];
        }

        // var_dump($data);
        // die();
        if(! $validation->run($data, 'pegawai') ){
            // Jika Gagal
            $data_res   = array();
            $this->response->setStatusCode(203);
            // $data_res   = $validation->listErrors();

            foreach($data as $key => $er){
                if($validation->getError($key))
                    $data_res[$key] = $validation->getError($key);
            }

        }else{
            // Jika Berhasil
            // $this->response->setStatusCode(202);

            $Pegawai    = new MPegawai();
            $Target     = new \App\Models\MTarget();


            // $Cabang->insert($data);
            if( $Pegawai->insert($data) ){
                $this->response->setStatusCode(202);
                $data_res = $data;

                // save ke table target sesuai id_pegawai

                if(count($periode) > 0){
                    
                    $periode['id_pegawai']  = $Pegawai->insertID();

                    $Tanggal    = new \App\Entities\Pegawai($periode);

                    $datatarget = $Tanggal;
                    $Target->insert($datatarget);
                }
            
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
        $dt = new \App\Libraries\Datatable();
        $target = new \App\Models\MTarget();
        $LibStatus  = new \App\Libraries\Status();
        $data = array();
        helper('btn');
        
        $formSearch = array();
        if($this->request->getPost('pencarian')){
            $formSearch  = [
                'id_kategori' => $this->request->getPostGet('id_kategori'),
            ];
        }
        $nu = $dt->koneksi('view_estimasipegawai')
                 ->pk('id_pegawai')
                 ->pencarianByKolom(['nama_pegawai','nik'])
                 ->pencarianForm($formSearch)
                 ->groupBy('id_pegawai')
                 ->run();
        
    
        foreach ($nu as $r) {
            $t = $target->getTargetByIDPegawai($r->id_pegawai);
            $row = array();
            $row[]	= anchor('pegawai/show/'.$r->id_pegawai,$r->nik);
            $row[]	= $r->nama_pegawai ;
            $row[]	= $r->kategori ;
            $row[]  = $t <= 0 ? $r->default_target : $t;
            $data[]	= $row;
        }
        return $this->response->setJSON($dt->output($data)); 

       
    }


}
