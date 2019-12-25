<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Viewdasar extends Migration
{
	protected $pemilik;
	protected $pegawai;
	protected $estimasiPegawai;
	protected $estimasi;

	protected $estimasiPegawaiCount;

	public function hapus()
	{
		// if($this->db->simpleQuery("SELECT * FROM view_estimasipegawaicount")){
			$this->db->transStart(FALSE);
			$this->db->query("DROP VIEW view_agen");
			$this->db->query("DROP VIEW view_pegawai");
			$this->db->query("DROP VIEW view_estimasiPegawai");
			$this->db->query("DROP VIEW view_estimasi");
			$this->db->query("DROP VIEW view_estimasipegawaicount");
			$this->db->transComplete();
		// }

	}
	protected function viewCount()
	{
		$this->estimasiPegawaiCount 	= "CREATE VIEW view_estimasiPegawaiCount AS
											SELECT p.*, (SELECT COUNT(p.id_pegawai)) AS JUMLAH 
											FROM view_estimasipegawai AS p 
											GROUP BY id_pegawai
											";
	}
	protected function viewDasar()
	{
		// Relasi Pemilik => Agen
		$this->pemilik     = "CREATE VIEW view_agen AS
						SELECT 
							p.nama_pemilik,
							a.*
						FROM tbl_pemilik as p
						INNER JOIN tbl_agen as a
							ON p.id_pemilik = a.id_pemilik
		";

		// view_cabang ini sebenarnya tidak terlalu penting
		// hanya akan digunakan untuk mengetahui
		// pendapatan / jumlah agen yg didapat oleh tiap cabang 
		$this->cabang     = "CREATE VIEW view_cabang AS
						SELECT 
							c.id_kabupaten,
							c.id_cabang,
							c.cabang,
							
							
							e.id_estimasi,
							e.tanggal,
							e.last_status,
							e.created_at

						FROM tbl_cabang as c
						INNER JOIN tbl_estimasi as e
							ON c.id_cabang = e.id_cabang
		";

		// Relasi Pegawai - Kategori - Target
		$this->pegawai 	= "CREATE VIEW view_pegawai AS
					   	SELECT
					   		p.*,
							k.default_target,
							k.kategori,

							t.target,
							t.tanggal_mulai,
							t.tanggal_akhir
						FROM tbl_pegawai as p
						LEFT JOIN tbl_kategori as k
							ON p.id_kategori = k.id_kategori
						LEFT JOIN tbl_target as t
							ON p.id_pegawai = t.id_pegawai
		";
	}
	protected function viewLanjutan()
	{
		$this->estimasiPegawai 	= "
						CREATE VIEW view_estimasipegawai AS
							SELECT 
								vp.id_pegawai,
								vp.nama_pegawai,
								vp.nik,
								vp.kategori,
								vp.target,
								vp.tanggal_mulai,
								vp.tanggal_akhir,
								vp.default_target,
								vp.id_kategori,

								e.id_estimasi,
								e.id_agen,
								e.id_cabang,
								e.tanggal,
								e.last_status

							FROM view_pegawai AS vp 
								LEFT JOIN tbl_estimasi AS e 
								ON vp.id_pegawai = e.id_pegawai
							WHERE 
								e.guest = FALSE		
		";

		$this->estimasi 	= "CREATE VIEW view_estimasi AS
								SELECT 
									e.id_estimasi,
									e.tanggal,
									e.spk,
									e.kode,
									e.last_status,
									e.created_at,
									e.user_id,

									p.*,
									a.*,
									c.* 

								FROM tbl_estimasi as e
									INNER JOIN view_pegawai AS p
										ON e.id_pegawai = p.id_pegawai
									INNER JOIN view_agen as a
										ON e.id_agen = a.id_agen
									INNER JOIN tbl_cabang as c
										ON e.id_cabang = c.id_cabang
								WHERE 
									e.guest = FALSE
		";
	}
	public function up()
	{
		// $this->hapus();

		$this->viewDasar();
		$this->viewLanjutan();
		$this->viewCount();

		// View Dasar (2 Table Utama)
		$this->db->query($this->pemilik);
		$this->db->query($this->pegawai);
		$this->db->query($this->cabang);

		// View Lanjutan ()
		$this->db->query($this->estimasiPegawai);

		$this->db->query($this->estimasi);

		// View Fungsi
		$this->db->query($this->estimasiPegawaiCount);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		// pindah ke seeder aja.. error soalnya
		// echo "mulai menghapus view";
		// $this->hapus();
	}
}

// Mencari jumlah perolehan agen 
// SELECT v.*, (SELECT COUNT(id_estimasi) FROM tbl_estimasi WHERE id_pegawai = v.id_pegawai) AS jumlah FROM view_pegawai AS V
// SELECT p.*, (SELECT COUNT(p.id_pegawai)) AS JUMLAH FROM view_estimasipegawai AS p GROUP BY id_pegawai

// View Cabang
// SELECT * FROM tbl_cabang AS c
// LEFT JOIN tbl_estimasi AS e
// ON c.id_cabang = e.id_cabang