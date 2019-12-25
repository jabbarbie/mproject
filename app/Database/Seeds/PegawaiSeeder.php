<?php namespace App\Database\Seeds;

class PegawaiSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
            helper('text');
            $nama   = ["Raditya Dika","Ernes Prakasa",
                       "Pandji Pragiwaksono","Riyan Andrian","Kang Isman",
                        "Indra Jegel","Abdur Arsyad","Annisa Azizah",
                        "Uus","Dodit Mulyanto","Indra Firmawan","Gilang Bhaskara"
                      ];
            $data = [];
            foreach($nama as $n){
                $d  = [
                    'nik'   => random_string('numeric', 10),
                    'nama_pegawai'  => $n,
                    'id_kategori'   => 1
                ];
                array_push($data, $d);
            };
            $this->db->table('tbl_pegawai')->insertBatch($data);            
        }
}

?>