<?php namespace App\Controllers;

use CodeIgniter\Controller;



class LPegawai extends Controller
{
    
	public function index()
	{
        helper('auth');
        $data = [
            'halaman'       => 'Laporan Pegawai',
            'currentPage'   => 'lpegawai',
        ];
        return view('laporan/pegawai/index', $data);

    }

    public function show()
    {
        $pegawai    = new \App\Models\MPegawai();
        $agen       = new \App\Models\MAgen();
        $pe = $pegawai->getTopPegawai();

        foreach($pe as $k => $r)
        {
            $pe[$k]['sate'] = $agen->getCabangByIDPegawai($r['id_pegawai']);
        }
        $data = [
            'halaman'       => 'Laporan Pegawai',
            'currentPage'   => 'lpegawai',
            'data'          => $pe,
        ];
        $html =  view('laporan/pegawai/pdf', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        die();

    }
    public function dtable()
    {
        $dt = new \App\Libraries\Datatable();
        $data = array();
        $formSearch = array();
    
        if($this->request->getPostGet('pencarian')){

            $formSearch  = [
                'tanggal_mulai' => $this->request->getPostGet('tanggal_mulai'),
                'tanggal_akhir' => $this->request->getPostGet('tanggal_akhir'),
            ];
        }
                 
        $nu = $dt->koneksi('view_estimasipegawaicount')
                 ->pk('id_pegawai')
                 ->pencarianByKolom(['nama_pegawai','nik'])
                 ->pencarianForm($formSearch)
                 ->run();
        
    
        foreach ($nu as $r) {
            $jumlah = $r->JUMLAH;
            if($r->tanggal == ''){
                $jumlah = '-';
            }
            $row = array();
            $row[]	= $r->tanggal;
            $row[]	= $r->nama_pegawai ;
            $row[]	= $r->kategori ;
            $row[]    = $jumlah;
            $data[]	= $row;
        }
        return $this->response->setJSON($dt->output($data)); 
    }
}
