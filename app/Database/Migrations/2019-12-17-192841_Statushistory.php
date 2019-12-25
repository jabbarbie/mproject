<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statushistory extends Migration
{
	private $namatable 	= 'tbl_statushistory';
	public function up()
	{
		//
		$this->forge->addField([
			'id_statushistory'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE
			],
			'id_estimasi'	=> [
				'type'	=> 'INT',
				'constraint'	=> 11
			],
			'user_id'	=> [
				'type'	=> 'TINYINT',
				'constraint'	=> 3,
				'null'	=>true,
				'default'	=> 0
			],
			'beforestatus'	=> [
				'type'	=>	'TINYINT',
				'constraint'	=> 3,
				'null'	=> true,
				'default'	=> 0
			],
			'afterstatus'	=> [
				'type'	=>	'TINYINT',
				'constraint'	=> 3
			],
			'created_at' => [
				'type'	=> 'TIMESTAMP'
			]
			
		]);
		$this->forge->addPrimaryKey('id_statushistory');
		$this->forge->createTable($this->namatable);

	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable($this->namatable);
	}
}
