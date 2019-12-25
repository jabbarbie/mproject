<?php namespace App\Database\Seeds;
use CodeIgniter\Model;


class HapusSeeder extends \CodeIgniter\Database\Seeder
{
       
        public function run()
        {
          $this->db->transStart(false);
            $this->db->transStrict(false);

            $this->db->query("DROP VIEW view_agen");
            $this->db->query("DROP VIEW view_pegawai");
            $this->db->query("DROP VIEW view_cabang");

            $this->db->query("DROP VIEW view_estimasiPegawai");
            $this->db->query("DROP VIEW view_estimasi");
            $this->db->query("DROP VIEW view_estimasipegawaicount");

          $this->db->transComplete();
        }
}

?>
