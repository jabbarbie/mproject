<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statusakses extends Migration
{
	private $namatable 	= 'tbl_statusakses';
	public function up()
	{
		//
		$this->forge->addField([
			'id_statusakses'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'unsigned'		=> TRUE,
				'auto_increment'=> TRUE
			],
			// Group_id didapat dari auth_groups
			'group_id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
			],		
			'reading'	=> [
				'type'		=> 'BOOLEAN',
				'default'	=> TRUE
			],
			'updating'	=> [
				'type'		=> 'BOOLEAN',
				'default'	=> FALSE
			],
		]);
		$this->forge->addPrimaryKey('id_statusakses');
		$this->forge->createTable($this->namatable);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable($this->namatable);

	}
}
