<?php namespace App\Controllers\Laporan;

use CodeIgniter\Controller;


class LPegawai extends Controller
{
    
	public function index()
	{

        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'Verdana',
            'mode' => 'utf-8',
            'format' => [190, 236],
            'orientation' => 'P',

        ]);
        $pegawai    = new \App\Models\MPegawai();
        $agen       = new \App\Models\MAgen();
        // $pe   = $pegawai->findAll();
        // $db = \Config\Database::connect();
        // $pegawai = $db->table('view_pegawai');

        $pe = $pegawai->getTopPegawai();
        // $pe = $datap->get()->getResultArray();

        // var_dump($datap);
        // die();
        foreach($pe as $k => $r)
        {
            $pe[$k]['sate'] = $agen->getCabangByIDPegawai($r['id_pegawai']);
        }
        $data = [
            'halaman'       => 'Laporan Pegawai',
            'currentPage'   => 'lpegawai',
            'breadcumb'     => [
                ['text' => 'Laporan', 'link' => ''],
                ['text' => 'Pegawai', 'link' => '']
            ],
            'data'          => $pe,
        ];

        $html =  view('laporan/pegawai/table', $data);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

        die();
        $html = view('laporan/pegawai/index',$data);

        $mpdf->WriteHTML($html);
        $mpdf->Output();
        die();
        // echo 123; 


        $html = view('laporan/pegawai/index',$data);

        $mpdf->WriteHTML($html);

        var_dump($mpdf);
        die();
        $mpdf->Output(); // opens in browser

        die();
        helper('auth');

        return view('laporan/pegawai/index', $data);
    }

    public function dtable()
    {
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
