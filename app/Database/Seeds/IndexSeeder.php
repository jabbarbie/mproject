<?php namespace App\Database\Seeds;

class IndexSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $this->call('KabupatenSeeder');
                $this->call('CabangSeeder');
                $this->call('PegawaiSeeder');
                $this->call('StatusSeeder');
                $this->call('PemilikSeeder');
                $this->call('KategoriSeeder');
                //
                $this->call('EstimasiSeeder');

                // $this->call('ViewSeeder');
                $this->call('USeeder');
        }
}

?>