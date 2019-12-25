<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kabupaten extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_kabupaten'	=> [
				'type'			=> 'INT',
				'constraint' 	=> 11,
				'auto_increment'=> TRUE,
				'unsigned'		=> TRUE
			],
			'id_provinsi'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11
			],
			'name' 			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50
			],
			'status'		=> [
				'type'			=> 'ENUM',
				'constraint'	=> ['1','0'],
				'default'		=> '0'
			]
		]);

		$this->forge->addKey('id_kabupaten', TRUE);

		// Buat table jika tidak ada (TRUE) 
		$this->forge->createTable('tbl_kabupaten', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('tbl_kabupaten', TRUE);

	}
}
