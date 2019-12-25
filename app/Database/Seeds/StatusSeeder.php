<?php namespace App\Database\Seeds;

class StatusSeeder extends \CodeIgniter\Database\Seeder
{
        /**
         * Role untuk mengatur siapa yg bisa melihat dan mengubah
         */
        protected function buatRoleStatus(): Array
        {
                 // 1  => 'superadmin',
          // 2  => 'admin',
          // 3  => 'srbb',
          // 4  => 'cluster',
          // 5  => 'cabang',
          // 6  => 'atf',

          // 'kode_status' => 'AK',
          // 'kode_status' => 'SS',
          // 'kode_status' => 'IE',
          // 'kode_status' => 'LV',
          // 'kode_status' => 'IG',
          // 'kode_status' => 'SP',
          // 'kode_status' => 'RJ',

          $data   = [
            $superadmin   = [
              'group_id'  => 1, // admin,cluster,srbb...
              'reading'   => [1,2,3,4,5,6,7,8],
              'updating'  => [1,2,3,4,5,6,7,8],            
            ],
            $admin        = [
              'group_id'  => 2,
              'reading'   => [1,2,3,4,5,6,7,8],
              'updating'  => [1,2],            
            ],
            $srbb         = [
              'group_id'  => 3,
              'reading'   => [1,2],
              'updating'  => [1,2],            
            ],
            $cluster      = [
              'group_id'  => 4,
              'reading'   => [1,2,3,4,5,6,7,8],
              'updating'  => []
            ],
            $cabang      = [
              'group_id'  => 5,
              'reading'   => [1,2,3,4,5,6,7,8],
              'updating'  => []
            ],
            $atf         = [
              'group_id'  => 6,
              'reading'   => [2,3,4,5,6,7,8],
              'updating'  => [2,3,4,5,6,7,8]
            ],
          ];

          // Insert into table
          $dataInsert   = array();
          foreach ($data as $k => $r) {
            $jumlah_loop  = (count($r['reading']) >= count($r['updating'])) ? count($r['reading']):count($r['updating']) ;
            for ($i=0; $i < $jumlah_loop ; $i++) { 
              $d  = array();
              $d['group_id']  = $r['group_id'];
              $d['reading']   = $r['reading'][$i]??0;                
              $d['updating']  = $r['updating'][$i]??0;    
              $dataInsert[] = $d;                          
            }

          }
          return $dataInsert;
        }
        protected function buatStatus(): Array 
        {
          $data   = [
            [
              'id_status'   => 1,
              'kode_status' => 'AK',
              'status'      => 'AKUISISI',
              'warna'       => 'dark',
              'group'       => 1
            ],
            [
              'id_status'   => 2,
              'kode_status' => 'SS',
              'status'      => 'SAAI',
              'warna'       => 'success',
              'group'       => 2
            ],                     
            [
              'id_status'   => 3,
              'kode_status' => 'IE',
              'status'      => 'INCOMPLATE',
              'warna'       => 'danger',
              'group'       => 2
            ],                     
            [
              'id_status'   => 4,
              'kode_status' => 'LV',
              'status'      => 'LIVE',
              'warna'       => 'warning',
              'group'       => 2
            ],                      
            [
              'id_status'   => 5,
              'kode_status' => 'IG',
              'status'      => 'INCOMING',
              'warna'       => 'primary',
              'group'       => 3

            ],                      
            [
              'id_status'   => 6,
              'kode_status' => 'SP',
              'status'      => 'SPK',
              'warna'       => 'info',
              'group'       => 3
            ],                      
            [
              'id_status'   => 7,
              'kode_status' => 'DP',
              'status'      => 'DEPLOY',
              'warna'       => 'success',
              'group'       => 3

            ],                      
            [
              'id_status'   => 8,
              'kode_status' => 'RJ',
              'status'      => 'REJECT',
              'warna'       => 'danger',
              'group'       => 3

            ],
          ];
          return $data;
        }
        /**
         * Untuk mengelompokkan id_status 
         * berguna untuk combobox ubahstatus 
         */
        protected function buatGroup(): Array
        {
          $groups  = [
            1   => [1,2],
            2   => [2,3,4,5],
            3   => [6,7,8]
          ];
    
          $data   = array();
          foreach ($groups as $k => $v) {
            $group  = $k;
            $d      = array();
            foreach ($v as $kk => $vv) {
              $d['group']  = $group;
              $d['id_status'] = $vv;
              $data[] = $d;
            }
          }
          return $data;
        }
        public function run()
        {

          // Using Query Builder
          $this->db->table('tbl_status')->insertBatch($this->buatStatus());
          $this->db->table('tbl_statusakses')->insertBatch($this->buatRoleStatus());
          $this->db->table('tbl_statusgroup')->insertBatch($this->buatGroup());
          
        }
}

?>