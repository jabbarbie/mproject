<?php namespace App\Database\Seeds;

class KategoriSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
          $data   = [
                      [
                          'kategori'        => 'MKS',
                          'default_target'  => 2
                      ],
                      [
                          'kategori'    => 'SRBB',
                          'default_target'  => 4
                      ],
                      [
                          'kategori'    => 'FL',
                          'default_target'  => 2
                      ],
                    //   [
                    //       'kategori'    => 'GUEST', // kategori tanpa target
                    //       'default_target'  => 0
                    //   ]
          ];

          
          $this->db->table('tbl_kategori')->insertBatch($data);
        }
}

?>