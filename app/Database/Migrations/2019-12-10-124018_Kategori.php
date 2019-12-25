<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
	private $namatable 	= 'tbl_kategori';
	public function up()
	{
		//
		$this->forge->addField([
			'id_kategori'	=> [
				'type'			=> 'INT',
				'constraint'	=> 3,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE
			],
			'kategori'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 10,
				'unique'		=> TRUE,
				'comment'		=> 'SRBB / MKS / FL'
			],
			'default_target'	=> [
				'type'	=> 'INT',
				'constraint'	=> 2
			],
			'keterangan'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 50,
				'null'		=> TRUE
			]
			

		]);
		$this->forge->addPrimaryKey('id_kategori');
		$this->forge->createTable($this->namatable);

	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable($this->namatable);
	}
}
