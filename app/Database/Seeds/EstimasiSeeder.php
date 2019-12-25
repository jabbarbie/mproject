<?php namespace App\Database\Seeds;

class EstimasiSeeder extends \CodeIgniter\Database\Seeder
{
        
        public function estimasi()
        {

            //  ['Imam Bonjol','Basuki Rahmat','Sapan','Rajawali','Brigjen Katamso',
            //          'Thamrin','Yos Sudarso','A Yani','KS Tubun','G Obos','Tcilik Riwut',
            //          'Sultan Hasanudin','Dharmawangsa','Bali','S Parman','Murjani'];
            
            // $pegawai   = ["Raditya Dika","Ernes Prakasa",
            // "Pandji Pragiwaksono","Riyan Andrian","Kang Isman",
            //  "Indra Jegel","Abdur Arsyad","Annisa Azizah",
            //  "Uus","Dodit Mulyanto","Indra Firmawan","Gilang Bhaskara"

            // 'Warung Sederhana',
            // 'Kedai Bu Lilis',
            // 'Gorengan Acil',
            // 'Toko Asal Jadi',
            // 'Sumber Makmur',
            // 'Warung Sobat Ambyar'

            
            // 8 Estimasi
            $data  = [
                    [
                        'id_cabang' => 6,
                        'id_pegawai'=> 2,
                        'id_agen'   => 4,
                        'tanggal'   => '2019-12-07'
                    ],
                    [
                        'id_cabang' => 5,
                        'id_pegawai'=> 1,
                        'id_agen'   => 3,
                        'tanggal'   => '2019-12-20'
                    ],
                    [
                        'id_cabang' => 4,
                        'id_pegawai'=> 3,
                        'id_agen'   => 2,
                        'tanggal'   => '2019-12-19'
                    ],                    [
                        'id_cabang' => 3,
                        'id_pegawai'=> 4,
                        'id_agen'   => 1,
                        'tanggal'   => '2019-11-21'
                    ],                    [
                        'id_cabang' => 2,
                        'id_pegawai'=> 5,
                        'id_agen'   => 6,
                        'tanggal'   => '2019-11-05'
                    ],                    [
                        'id_cabang' => 1,
                        'id_pegawai'=> 4,
                        'id_agen'   => 5,
                        'tanggal'   => '2019-11-16'
                    ],
                    [
                        'id_cabang' => 3,
                        'id_pegawai'=> 4,
                        'id_agen'   => 3,
                        'tanggal'   => '2019-11-04'
                    ],
                    [
                        'id_cabang' => 5,
                        'id_pegawai'=> 6,
                        'id_agen'   => 2,
                        'tanggal'   => '2019-11-12'
                    ],
                    
                    //
                    [
                        'id_cabang' => 6,
                        'id_pegawai'=> 2,
                        'id_agen'   => 4,
                        'tanggal'   => '2019-12-07'
                    ],
                    [
                        'id_cabang' => 5,
                        'id_pegawai'=> 1,
                        'id_agen'   => 3,
                        'tanggal'   => '2019-12-20'
                    ],
                    [
                        'id_cabang' => 4,
                        'id_pegawai'=> 3,
                        'id_agen'   => 2,
                        'tanggal'   => '2019-12-19'
                    ],                    [
                        'id_cabang' => 3,
                        'id_pegawai'=> 4,
                        'id_agen'   => 1,
                        'tanggal'   => '2019-12-21'
                    ],                    [
                        'id_cabang' => 1,
                        'id_pegawai'=> 5,
                        'id_agen'   => 6,
                        'tanggal'   => '2019-12-05'
                    ],                    [
                        'id_cabang' => 1,
                        'id_pegawai'=> 4,
                        'id_agen'   => 5,
                        'tanggal'   => '2019-12-16'
                    ],
                    [
                        'id_cabang' => 1,
                        'id_pegawai'=> 4,
                        'id_agen'   => 3,
                        'tanggal'   => '2019-12-04'
                    ],
                    [
                        'id_cabang' => 1,
                        'id_pegawai'=> 6,
                        'id_agen'   => 2,
                        'tanggal'   => '2019-12-12'
                    ],
                ];


            return $data;
        }

        public function run()
        {
            $this->db->table('tbl_estimasi')->insertBatch($this->estimasi());            

        }
}

?>