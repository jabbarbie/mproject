<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statusgroup extends Migration
{
	private $namatable 	= 'tbl_statusgroup';
	public function up()
	{
		//
		$this->forge->addField([
			'id_statusgroup'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE
			],
			'group'	=> [
				'type'	=>	'TINYINT',
				'constraint'	=> 3
			],
			'id_status'	=> [
				'type'	=> 'TINYINT',
				'constraint'	=> 2,
			]
			
		]);
		$this->forge->addPrimaryKey('id_statusgroup');
		$this->forge->createTable($this->namatable);

	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable($this->namatable);
	}
}
