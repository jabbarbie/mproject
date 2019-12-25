<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Target extends Migration
{
	private $namatable 	= 'tbl_target';
	public function up()
	{
		//
		$this->forge->addField([
			'id_target'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE
			],
			'id_pegawai'	=> [
				'type'	=>	'INT',
				'constraint'	=> 11
			],
			'target'	=> [
				'type'	=> 'INT',
				'constraint'	=> 3,
			],
			'tanggal_mulai'	=> [
				'type'	=> 'DATE',
			],
			'tanggal_akhir'	=> [
				'type'	=> 'DATE',
			],
			

		]);
		$this->forge->addPrimaryKey('id_target');
		$this->forge->createTable($this->namatable);

	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable($this->namatable);
	}
}
