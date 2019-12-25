<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agen extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id_agen'	=> [
				'type'	=> 'INT',
				'constraint' 	=> 11,
				'auto_increment'=> TRUE,
				'unsigned'		=> TRUE
			],
			'id_pemilik'=> [
				'type'	=> 'INT',
				'constraint'	=> 11
			],
			'nama_agen'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 30
			],
			'no_telp'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 16
			],
			'alamat'	=> [
				'type'	=> 'TEXT',
			]

		]);

		$this->forge->addKey('id_agen', TRUE);
		$this->forge->addKey('id_pemilik');

		// Buat table jika tidak ada (TRUE) 
		$this->forge->createTable('tbl_agen', TRUE);
		
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('tbl_agen', TRUE);
	}
}
