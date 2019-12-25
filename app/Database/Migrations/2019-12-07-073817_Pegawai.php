<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use \Config\Database;

class Pegawai extends Migration
{
	public function up()
	{
		//
		$namadb 	= "dbmproject";

		// $this->forge->createDatabase($namadb);		
		// $this->forge->dropDatabase($namadb);
		
		$this->forge->addField([
			'id_pegawai'	=> [
				'type'			=> 'INT',
				'constraint' 	=> 11,
				'auto_increment'=> TRUE,
				'unsigned'		=> TRUE
			],
			'id_kategori'	=> [
				'type'	=> 'INT',
				'constraint'	=> 3,
			],
			// 'id_target'		=> [
			// 	'type'	=> 'INT',
			// 	'constraint'	=> 11,
			// ],
			'nik' 			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 15,

			],
			'nama_pegawai' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50
			]
		]);

		$this->forge->addKey('id_pegawai', TRUE);
		$this->forge->addKey('id_kategori');

		// Buat table jika tidak ada (TRUE) 
		$this->forge->createTable('tbl_pegawai', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('tbl_pegawai', TRUE);
	}
}
