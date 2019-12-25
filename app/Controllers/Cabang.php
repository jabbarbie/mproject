<?php namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\MCabang;
use App\Models\MDatatable;
use App\Models\MKota;

class Cabang extends Controller
{
	public function index()
	{
        // $this->db = \Config\Database::connect(); 
        // $s  = $this->db->table('tbl_cabang');
        // var_dump($s->countAllResults());
        // $dt = new \App\Libraries\Datatable();
        // $LibStatus  = new \App\Libraries\Status();
    
        // helper('btn');
        // $nu = $dt->koneksi('tbl_cabang')
        //          ->pk('id_cabang')
        //          ->pencarianByKolom(['kode_cabang','cabang','unit'])
        //          ->run();
        
    
        // foreach ($nu as $r) {
        //   $row = array();
        //   $row[]	= $r->kode_cabang ;
        //   $row[]	= $r->cabang ;
        //   $row[]	= $r->unit ;
    
        //   $data[]	= $row;
        // }
        // var_dump($dt->test());
        // die();
        $kota     = new MKota();
        $data = [
            'halaman'       => 'Cabang',
            'currentPage'   => 'cabang',
            'breadcumb'     => [
                ['text' => 'Cabang', 'link' => '']
            ],
            'cabang'        => $kota->where('status',1)->findAll()

        ];

        return view('cabang/index', $data);
    }
    public function new(){
        // $validation =  \Config\Services::validation();
        $kota     = new MKota();
        $data = [
            'halaman'       => 'Tambah Cabang',
            'currentPage'   => 'cabang',
            'breadcumb'     => [
                ['text' => 'Cabang', 'link' => base_url('cabang')],
                ['text' => 'Tambah', 'link' => '']
            ],
            'cabang'        => $kota->where('status',1)->findAll()
        ];

        return view('cabang/tambah', $data);
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
            'kode_cabang'  => $this->request->getPostGet('kode_cabang'),
            'cabang'=> $this->request->getPostGet('cabang'),
            'id_kabupaten' => $this->request->getPostGet('id_kabupaten'),
            'unit'  => $this->request->getPostGet('unit')
        ];

        // var_dump($data);
        // die();
        if(! $validation->run($data, 'cabang') ){
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

            $Cabang = new MCabang();
            $filtered = new \App\Entities\Estimasi($data);
            // $Cabang->insert($data);
            if( $Cabang->insert($filtered) ){
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

    // Incoming Request //

	// $something = $request->getVar('foo');
	// $something = $request->getPost('foo');
	// $something = $request->getPostGet('foo');
    // $something = $request->getGetPost('foo');
    // $json = $request->getJSON();
    
    //filter
	// $email = $request->getVar('email', FILTER_SANITIZE_EMAIL);

    // get info yg akses
	// $uri = $request->uri;
	// echo $uri->getScheme();         // http
	// echo $uri->getAuthority();      // snoopy:password@example.com:88
	// echo $uri->getUserInfo();       // snoopy:password
	// echo $uri->getHost();           // example.com
	// echo $uri->getPort();           // 88
	// echo $uri->getPath();           // /path/to/page
	// echo $uri->getQuery();          // foo=bar&bar=baz
	// echo $uri->getSegments();       // ['path', 'to', 'page']
	// echo $uri->getSegment(1);       // 'path'
	// echo $uri->getTotalSegments();  // 3
	//--------------------------------------------------------------------

    //upload file juga baru
    // $files = $request->getFiles();
    

    // handle restFull API 
    // <input type="hidden" name="_method" value="PUT" /> PUT
    // <input type="hidden" name="_method" value="DELETE" /> DELETE


   //--------------------------------------------------------------------
    
  public function dtable(){
    $dt = new \App\Libraries\Datatable();
    $LibStatus  = new \App\Libraries\Status();
    $data = array();

    helper('btn');
    $nu = $dt->koneksi('tbl_cabang')
             ->pk('id_cabang')
             ->pencarianByKolom(['kode_cabang','cabang','unit'])
             ->run();
    

    $data = array();
    foreach ($nu as $r) {
      $row = array();
      $row[]	= $r->kode_cabang ;
      $row[]	= $r->cabang ;
      $row[]	= $r->unit ;

      $data[]	= $row;
    }
    return $this->response->setJSON($dt->output($data));   
  }
}
