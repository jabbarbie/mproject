<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller
{
	// use \Myth\Auth\AuthTrait;
	// public function __construct() 
	// {
	// 	echo $this->restrict( site_url('cabang') );
	// 	parent::__construct();
	// }
	public function index()
	{
		// $this->restrict( base_url('login') );

		helper('auth');
		if (! logged_in() )
		{
			return redirect('login');
		}
        $data = [
            'halaman'       => 'Dashboard',
            'currentPage'   => 'dashboard',
            'breadcumb'     => [
				['text' => 'Dashboard', 'link' => ''],
			'jumlahgrafik'	=> 4
            ],

        ];

		return view('home/index', $data);
		
	}

	//--------------------------------------------------------------------

}
