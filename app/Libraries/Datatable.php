<?php namespace App\Libraries;

/**
 * Untuk menghandle DataTable 
 * yg ditema / direspon ke dalam format AJAX Server Side 
 * Created By : Jabbar Bie
 */ 

use Config\Database;
use CodeIgniter\HTTP\RequestInterface;

class Datatable {

    protected $table;
    protected $primaryKey;
    protected $kolom;
    protected $order;
    protected $countpencarian;
    protected $pencarianBy;
    protected $pencarianForm;

    protected $request;

    protected $entities;
    protected $db;
    protected $builder;

    public function test()
    {
        return $this->countpencarian;
    }
    public function __construct()
    {
        $this->db = Database::connect();
        $this->request      = \Config\Services::request();
    }

    /**
     * @params : menggunakan namatable 
     * 
     * return bool
     */
    public function koneksi(string $namatable = null)
    {
        if ( empty($this->builder) && empty($namatable) ) return false;
        // jika langsung menggunakan model;
        // if  ( class_exists($namamodel) ) 
        // {
        //     $this->modelku = new \App\Models\MEstimasi();
        //     return true;
        // }
        // return false;
        $this->builder = $this->db->table($namatable);
        return $this;
    }
    /**
     * untuk memberikan sebuah kondisi selain dari form pencarian
     * @param : array('kolom', value)
     * 
     * mislanya array('id_cabang', 6)  
     */
    public function kondisi(array $kolom)
    {
        if(count($kolom) == 0) return $this;
        if( (int) $kolom[1] == 0) return $this;
        
        $this->builder->where($kolom[0], $kolom[1]);
        return $this;
    }
    /**
     * Fungsi khusus untuk membatasi agen mana saja yg boleh ditampilkan
     * berguna di halaman agen 
     * 
     */
    function hanyaBolehMelihatStatus($status)
	{
		if ( is_array($status) )
		{
			$this->builder->whereIn('last_status', $status);
        }
        return $this;
	}
    /**
     * Hanya menerima array
     * atau kosongkan jika ingin menampilkan semua
     * 
     * example : nama,alamat,jenis_kelamin
     */
    public function kolom( $kolom = null )
    {
        if ( empty($kolom) ){
            $this->kolom = '*';
        }
        $this->kolom = $kolom;
        return $this;
    }

    public  function pk(string $pk)
    {
        $this->primaryKey = $pk;
        return $this;
    }
    /**
     * Jika ada entities yg digunakan
     * @params : nama entitas
     * 
     */
    
    // public function entities($entities = null)
    // {
    //     if(! empty($entities) )
    //     {
    //         $data = new \App\Entities\Estimasi($entities);
    //     }
    //     return $data;
    // }

    /**
     * Jika ada formpencarian
     */
    public function pencarianForm(array $field)
    {
        if (count($field) <= 0) return $this;

        foreach ($field as $k => $r) {
            if($r != '') {
                if($k == 'tanggal_mulai' || $k == 'tanggal_akhir'){
                    $r = (int) $r;
                    $tanggal = date('Y-m-d', $r);

                    if($k == 'tanggal_mulai')
                        $this->builder->where('tanggal >= ', $tanggal);
                    else
                        $this->builder->where('tanggal <= ', $tanggal);
                    
                }else{
                    $this->builder->where($k, $r);
                }
           }

        }

        return $this;
    }
    public function getJumlah()
    {
        $iint = (int) $this->countpencarian;
        if ($iint == 0)
        {
            return $this->builder->countAllResults(FALSE);
        }
        return $this->countpencarian;
    }
    public function pencarianByKolom($kolom)
    {
        // $this->countpencarian = 0;
        $this->countpencarian = $this->builder->countAllResults(FALSE);

        if(isset($this->request->getPost('search')['value'])){
            foreach ($kolom as $key => $value) {
                $x	= ($key > 0)?'orLike':'like';
                $this->builder->{$x}($value, $this->request->getPost('search')['value']);
            }

            // if($this->builder->countAll == 0)
            // {
            //     return false;
            // }
            // $this->countpencarian = $this->builder->countAllResults();
            $this->countpencarian = $this->builder->countAllResults(FALSE);

            if($this->builder->countAllResults(FALSE) <= 0)
            {
                // $this->builder->resetQuery();
                // $this->builder->where("id_cabang", 1000);

                // $this->koneksi();
                return $this;
            }
        }

        return $this;
    }
    public function set()
    {

        // fungsi dari sananya.. untuk paggination             
        if($this->request->getPost('length') AND $this->request->getPost('length') != -1){
            $this->builder->limit($this->request->getPost('length'), $this->request->getPost('start'));
        }

    }
    public function run()
    {
        // return $this->entities($this->builder->get()->getResultArray())->toArray();

        $this->set();
        return $this->builder->get()->getResultObject();
    }

    /**
     * Proses final dari fungsi ini
     * @params : array dari kolom yg sudah difilter
     * 
     * return format yg sudah ditentukan oleh datatable
     * Jika data yg dihasilkan kosong.. 
     * maka langsung kembalikan nilai (data tidak ditemukan)
     * 
     */
    public function output($data = null): Array
    {
        $output     = [
            "draw"          => intval($this->request->getPost('draw')),
            "recordsTotal"  => $this->builder->countAll(),
            "recordsFiltered" => $this->getJumlah(),
            "data"   => $data
        ];
      
        return $output;
    }
}
?>