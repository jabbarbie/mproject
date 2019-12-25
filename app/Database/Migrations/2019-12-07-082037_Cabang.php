<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cabang extends Migration
{
	public function up()
	{
			//
		$this->forge->addField([
			'id_cabang'	=> [
				'type'			=> 'INT',
				'constraint' 	=> 11,
				'auto_increment'=> TRUE,
				'unsigned'		=> TRUE
			],
			'id_kabupaten' => [
				'type'			=> 'INT',
				'constraint'	=> 11
			],
			'kode_cabang' 			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20,
				'null' 			=> TRUE

			],
			'cabang' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50
			],
			'unit' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50
			]
		]);

		$this->forge->addKey('id_cabang', TRUE);

		// Buat table jika tidak ada (TRUE) 
		$this->forge->createTable('tbl_cabang', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('tbl_cabang', TRUE);
	}
}
