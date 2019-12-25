<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estimasi extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id_estimasi'	=> [
				'type'	=> 'INT',
				'constraint'	=> 11,
				'auto_increment'=> TRUE,
				'unsigned'		=> TRUE
			],
			'id_agen'		=> [
				'type'	=> 'INT',
				'constraint'	=> 11
			],
			'id_pegawai'	=> [
				'type'	=> 'INT',
				'constraint'	=> 11
			],
			'id_cabang'		=> [
				'type'	=> 'INT',
				'constraint'	=> 11
			],
			'tanggal'	=> [
				'type'	=> 'DATE',
				'null'	=> TRUE
			],
			'spk'		=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 20,
				'null'	=> TRUE
			],
			'kode'		=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 20,
				'null'	=> TRUE
			],
			'last_status'	=> [
				'type'	=> 'INT',
				'constraint'	=> 2,
				'default' 	=> 1,
			],
			'guest'			=> [
				'type'	=> 'BOOLEAN',
				'default'	=> false
			],
			'user_id'		=> [
				'type'	=> 'TINYINT',
				'constraint'	=> 2,
				'default'		=> 2
			],

			// time_stamp
			'created_at'	=> [
				'type'	=> 'TIMESTAMP'
			],
			'updated_at'	=> [
				'type'	=> 'TIMESTAMP'
			],
			'deleted_at'	=> [
				'type'	=> 'TIMESTAMP'
			],

		]);
		$this->forge->addPrimaryKey('id_estimasi');
		$this->forge->addKey('id_pegawai');
		$this->forge->addKey('id_cabang');
		$this->forge->addKey('id_agen');

		$this->forge->createTable('tbl_estimasi', TRUE);
		    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('tbl_estimasi');
	}
}
		// Ke Tabel Estimasi
		
		// 	nah kan yang di targerkan cmn
		// SRBB/ MKS/ dan Front liner bro yang cari agen 
		// Tp diluar jabatan 3 itu pegawai dengan jabatan lain dari pada 3 di atas tetap harus di masukan namanya tapi mereka tanpa target 
        //   Tapi semua pegawai bisa masuk kategori tanpa target di luar 3 itu 
        //     gmn bro..
        //     pegawai itu masuk mks/srbb/fl ?
        //     maksdnya dilaur mks/srbb/fl ..
        //     dia bisa masuk namanya jual agen BRACHELS BANGKING tapi mereka tanpa target
        //    jadi dia kalau dapat 1 agen namanya mau tampil juga di database
        
        //  Sekedar input tanpa masuk ke target / laporan utama
        //  - Guest : inputan estimasi / agen di luar dari srbb/mks/fl
        //            cuma numpang lewat doang, dan input 1 atau lebih estimasi / agen
        //            tidak masuk ke dalam laporan utama / perhitungan grafik