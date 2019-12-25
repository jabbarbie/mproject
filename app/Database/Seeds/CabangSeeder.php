<?php namespace App\Database\Seeds;

class CabangSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
          helper('text');
          $unit   = ['Imam Bonjol','Basuki Rahmat','Sapan','Rajawali','Brigjen Katamso',
                     'Thamrin','Yos Sudarso','A Yani','KS Tubun','G Obos','Tcilik Riwut',
                     'Sultan Hasanudin','Dharmawangsa','Bali','S Parman','Murjani'];
          
          $data = array();
          foreach($unit as $r){
            $d  = [
              'id_kabupaten'  => '6271',
              'kode_cabang'   => random_string('alpha',7),
              'cabang'        => $r,
              'unit'          => 'Unit '.random_string('numeric', 3)
            ];

            array_push($data, $d);
          }
          // Using Query Builder
          $this->db->table('tbl_cabang')->insertBatch($data);
        }
}

?>