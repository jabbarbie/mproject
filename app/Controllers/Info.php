<?php namespace App\Controllers;
use App\Models\MInformasi;
class Info extends BaseController
{
	public function index()
	{
        // $data   = new MInformasi();
        // $hasil  = $data->perolehanCabang();
        // return $this->response->setJSON($hasil);

        // var_dump($data->perolehanCabang());

        // echo $hasil[0]['id_cabang'];
        // die();

        // $d      = array_keys($hasil); // mengembalikan semua key pada array
        // $d      = array_rand($hasil); // mengambil nilai random dari array

        // $d      = array_multisort($hasil, count($hasil['data']));

        // $d      = array();
        // for ($i=0; $i < count($hasil); $i++) { 
        //         $u      = count($hasil[i]['data']);
        //         $d[]    =   
        // }
        // var_dump($d);

        // $db      = \Config\Database::connect();
        // $builder = $db->table('view_estimasi');

        $data = [
            'halaman'       => 'Tabel Informasi',
            'currentPage'   => 'informasi',
            'breadcumb'     => [
                ['text' => 'Informasi', 'link' => '']
            ],
        //     'data'          => $builder->orderBy('cabang')->get()
        //     'data'          => $hasil

        
        ];
        return view('informasi/index', $data);
		
	}

}
