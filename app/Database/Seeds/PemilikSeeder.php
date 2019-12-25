<?php namespace App\Database\Seeds;

class PemilikSeeder extends \CodeIgniter\Database\Seeder
{
        public function pemilik()
        {
            $nama   = [
                "Selamet Riyadi", "Dimas Purwanto", "Suprarto",
                "Lilis Sumangsih","Sri Hastuti"
                    ];
            $data = [];
            foreach($nama as $n){
                $d  = [
                    'nama_pemilik'  => $n
                ];
                array_push($data, $d);
            };
            return $data;
        }
        public function agen()
        {
            $warung     = [
                'Warung Sederhana',
                'Kedai Bu Lilis',
                'Gorengan Acil',
                'Toko Asal Jadi',
                'Sumber Makmur',
                'Warung Sobat Ambyar'
            ];
            $data = array();
            foreach($warung as $k => $r){
                $d  = [
                    'id_pemilik' => ($k >= 5)?3:($k+1),
                    'nama_agen'  => $r,
                    'no_telp'    => random_string('nozero', 13),
                    'alamat'     => random_string('alpha', 30)
                ];
                array_push($data, $d);
            }

            return $data;

        }

        public function run()
        {
            helper('text');
            $this->db->table('tbl_pemilik')->insertBatch($this->pemilik());            
            $this->db->table('tbl_agen')->insertBatch($this->agen());            

        }
}

?>