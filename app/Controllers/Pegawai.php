<?php namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\MPegawai;
use App\Models\MKategori;

class Pegawai extends BaseController
{
	public function index()
	{
        helper('auth');
        // taruh di sidebar menu
        // var_dump(in_groups(['superadmin'])); // buat setting role, cabang, admin, cluster


        // var_dump(user()->username);
        // die();

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

            $Pegawai = new MPegawai();
            // $Cabang->insert($data);
            if( $Pegawai->insert($data) ){
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
        $dt = new \App\Libraries\Datatable();
        $LibStatus  = new \App\Libraries\Status();
        $data = array();
    
        helper('btn');
        $nu = $dt->koneksi('view_estimasipegawaicount')
                 ->pk('id_pegawai')
                 ->pencarianByKolom(['nama_pegawai','nik'])
                 ->run();
        
    
        foreach ($nu as $r) {
            $jumlah = $r->JUMLAH;
            if($r->tanggal == ''){
                $jumlah = '-';
            }
            $row = array();
            $row[]	= anchor('pegawai/show/'.$r->id_pegawai,$r->nik);
            $row[]	= $r->nama_pegawai ;
            $row[]	= $r->kategori ;
            $row[]    = $jumlah;
            $data[]	= $row;
        }
        return $this->response->setJSON($dt->output($data)); 

       
    }


}
