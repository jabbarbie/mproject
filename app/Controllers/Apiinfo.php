<?php namespace App\Controllers;

class Apiinfo extends BaseController
{
	public function index()
	{

        $data = [
            'halaman'       => 'API',
            'currentPage'   => 'api',
            'breadcumb'     => [
                ['text' => 'Api', 'link' => '']
            ],

            'data'          => [
                'Pegawai'   => [
                    ['get', 'Semua Pegawai', 'api/pegawai/'],
                    ['get', 'Detail Pegawai', 'api/pegawai/:idpegawai'],
                ],
                'Cabang'    => [
                    ['get', 'Semua Cabang', 'api/cabang/'],
                    ['get', 'Detail Cabang', 'api/cabang/:cabang'],
                ],
                'Agen'      => [
                    ['get', 'Semua Data Agen', 'api/agen/'],
                    ['get', 'Detail Agen', 'api/agen/:agen'],
                ]
            ]
        ];
        return view('api/info', $data);
		
	}

}
