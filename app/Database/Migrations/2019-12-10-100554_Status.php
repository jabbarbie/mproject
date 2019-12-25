<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
	private $namatable 	= 'tbl_status';
	public function up()
	{
		//
		$this->forge->addField([
			'id_status'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE
			],
			'kode_status'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 3,
				'unique'		=> TRUE
			],
			'status'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 10,
			],
			'warna'		=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 10
			],
			'group'		=> [
				'type'	=> 'TINYINT',
				'constraint' => 2,
				'default'	=> 1
			]

		]);
		$this->forge->addPrimaryKey('id_status');
		$this->forge->createTable($this->namatable);

	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable($this->namatable);
	}
}
