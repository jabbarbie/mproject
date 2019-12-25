<?php namespace App\Database\Seeds;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use CodeIgniter\Model;
use Myth\Auth\Authorization\PermissionModel;
use Myth\Auth\Authorization\GroupModel;


class USeeder extends \CodeIgniter\Database\Seeder
{
        protected function buatUser()
        {
          $u    = [
            [
              'username'  => 'superadmin',
              'email'     => 'superadmin@localhost.com',
              'password'  => 'superadmin2020',
              'pass_confirm' => 'superadmin2019',
              'active'    => 1,
              'group_id'  => 1,
            ],
            [
              'username'  => 'admin',
              'email'     => 'admin@localhost.com',
              'password'  => 'admin2020',
              'pass_confirm' => 'admin2019',
              'active'    => 1,
              'group_id'  => 2,
            ],
            [
              'username'  => 'srbb',
              'email'     => 'srbb@localhost.com',
              'password'  => 'srbb2020',
              'pass_confirm' => 'srbb2020',
              'active'    => 1,
              'group_id'  => 3
            ],
            [
              'username'  => 'cluster',
              'email'     => 'cluster@localhost.com',
              'password'  => 'cluster2020',
              'pass_confirm' => 'cluster2020',
              'active'    => 1,
              'group_id'  => 4
            ],
            [
              'username'  => 'cabang',
              'email'     => 'cabang@localhost.com',
              'password'  => 'cabang2020',
              'pass_confirm' => 'cabang2020',
              'active'    => 1,
              'group_id'  => 5,
              'id_cabang' => 1
            ],
            [
              'username'  => 'atf',
              'email'     => 'atf@localhost.com',
              'password'  => 'atf2020',
              'pass_confirm' => 'atf2020',
              'active'    => 1,
              'group_id'  => 6
            ],
            
            
            
            

            
          ];

          $users = new UserModel();
          foreach ($u as $key => $value) {
            $user = new User($value);
  
            $userId = $users->insert($user);
          }
        }
        protected function buatGroupAkses()
        {
          $a = new GroupModel();
          $user   = [
            [
              'id'    => '1',
              'name'  => 'superadmin',
              'description' => 'full access'
            ],
            [
              'id'    => '2',
              'name'  => 'admin',
              'description' => 'semi full-access'
            ],
            [
              'id'    => '3',
              'name'  => 'srbb',
              'description' => 'sama seperti admin'
            ],
            [
              'id'    => '4',
              'name'  => 'cluster',
              'description' => 'hanya melihat laporan'
            ],
            [
              'id'    => '5',
              'name'  => 'cabang',
              'description' => 'hanya melihat laporan berdasarkan cabang'
            ],
            [
              'id'    => '6',
              'name'  => 'atf',
              'description' => 'mengubah status tertentu'
            ],
            
            
          ];
          foreach ($user as $key => $value) {
            $a->insert($value);
          }
        }

        /**
         * Authorize untuk akses CRUD masing2 table / model
         */
        protected function buatAuthorize()
        {
          $data = [
            [
              'name'        => 'fullaccess',
              'description' => 'bisa mengakses apa saja'
            ],
            [
              'name'        => 'tambahagen',
              'description' => 'boleh menambah agen'
            ],
            [
              'name'        => 'updatestatus',
              'description' => 'boleh mengupdate status'
            ],
            [
              'name'        => 'cumalihat',
              'description' => 'hanya boleh melihat tanpa mengubah'
            ],
          ];
          
          $p  = new PermissionModel();
          $p->insertBatch($data);
        }
        public function run()
        {
          $this->buatGroupAkses();
          $this->buatUser();
          $this->buatAuthorize();

          // $a = new PermissionModel();

          $a = new GroupModel();

          // $a->addPermissionToUser(1,13);
          // userid, groupid
          $a->addUserToGroup(1,1); //admin admin
          $a->addUserToGroup(2,2); //admin admin
          $a->addUserToGroup(3,3); //srbb cluster
          $a->addUserToGroup(4,4); //cluster cluster
          $a->addUserToGroup(5,5); //cabang cluster
          $a->addUserToGroup(6,6); //atf cluster

          // '1'        => 'fullaccess', 'description' => 'bisa mengakses apa saja'
          // '2'        => 'tambahagen', 'description' => 'boleh menambah agen'
          // '3'        => 'updatestatus', 'description' => 'boleh mengupdate status'
          // '4'        => 'cumalihat', 'description' => 'hanya boleh melihat tanpa mengubah'

          // '1'  => 'superadmin',
          // '2'  => 'admin',
          // '3'  => 'srbb',
          // '4'  => 'cluster',
          // '5'  => 'cabang',
          // '6'  => 'atf',

          // $params : paramsid, groupid

          $a->addPermissionToGroup(1,1); // fullaccess, superadmin
          $a->addPermissionToGroup(1,2); // fullaccess, superadmin
          $a->addPermissionToGroup(1,3); // fullaccess, srbb
          $a->addPermissionToGroup(2,3); // tambahagen, srbb
          $a->addPermissionToGroup(4,4); // cumalihat, cluster
          $a->addPermissionToGroup(4,5); // cumalihat, cabang
          $a->addPermissionToGroup(4,6); // cumalihat, atf
          $a->addPermissionToGroup(3,6); // updatestatus, atf

          // $b = new PermissionModel();
          // $b->addUser
          
          // $a->addPermissionToGroup(2,3); //cluster cluster
          // $x =  \Myth\Auth\Authorization;
          // $x->addUserToGroup(1,13);
          // $authorize = $auth = \Config\Services::authorization();



          // YANG ada usernya cmn SRBB/CABANG, ATF, CLUSTER MANAGER 
          // tetap yg input srbb.. cuma kategorinya dipisah antara mks/srbb/fl  
        }
}

?>
