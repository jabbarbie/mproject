<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemilik extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pemilik'	=> [
				'type'			=> 'INT',
				'constraint' 	=> 11,
				'auto_increment'=> TRUE,
				'unsigned'		=> TRUE
			],
			'nama_pemilik' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 30
			],
			'alamat_pemilik' 			=> [
				'type'			=> 'TEXT'
			]
		]);

		$this->forge->addKey('id_pemilik', TRUE);

		// Buat table jika tidak ada (TRUE) 
		$this->forge->createTable('tbl_pemilik', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('tbl_pemilik', TRUE);

	}
}
