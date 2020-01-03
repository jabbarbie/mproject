<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------
	public $agen 	 = [

		'nama_pemilik'	=> [
			'label'	=> 'Nama Pemilik Usaha',
			'rules'	=> 'required|min_length[5]',
			'errors'=> [
				'required'	=> 'Nama Pemilik'
			]
		],
		'nama_agen'	=> [
			'label'	=> 'Nama Agen',
			'rules'	=> 'required|min_length[5]',
			'errors'=> [
				'required'	=> 'Nama Agen'
			]
		],

	];
	public $cabang	 = [

		'cabang'	=> [
				'label'	=> 'Nama Cabang',
				'rules'	=> 'required|min_length[5]',
				'errors'=> [
					'required' => 'Nama Cabang tidak boleh kosong',
				]
				
		],
		'id_kabupaten'	=> [
				'label' => 'Kode Kabupaten',
				'rules' => 'numeric',
				'errors'=> 'Kode Kabupaten harus berupa angka'
		],
		'kode_cabang'	=> [
				'label'	=> 'Kode Cabang',
				'rules'	=> 'numeric',
				'errors'=> 'Kode Cabang Salah'
		]
	];
	public $pegawai 	= [
		'nik'			=> [
			'label'	=> 'NIK',
			'rules'	=> 'required',
			'errors'	=> [
				'unique'	=> 'Sudah ada '
			]
		],
		'nama_pegawai'	=> [
			'label'	=> 'Nama Pegawai',
			'rules'	=> 'required|min_length[3]',
			'errors'	=> [
				'required'	=> 'Tidak Boleh Kosong'
			]
		]
	];
	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,

		\Myth\Auth\Authentication\Passwords\ValidationRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		// 'list'   => 'CodeIgniter\Validation\Views\list',
		// 'single' => 'CodeIgniter\Validation\Views\single',
		'list'   => 'App\Views\errors\validation_error',
		'single' => 'CodeIgniter\Validation\Views\single',

	];


	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
