<?php namespace App\Entities;
/**
 * Berfungsi untuk memfilter field-field yg akan 
 * diteruskan atau dikembalikan oleh controller
 * 
 * Misalnya request->tanggal format yg diterima 2012-20-12
 * akan diolah dan dikembalikan menjadi 12 Desember 2012
 */
use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;
class Estimasi extends Entity
{
    protected $datamap = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // protected $attributes = [
    //     'cabang'   => null
    // ];
    // public function setCabang()
    // {
    //     $this->attributes['cabang'] = 'inidarientitie';
    //     // $this->cabang = 'inidarientitie';
    // }

    // public function getTanggal()
    // {
    //     // $this->attributes['tanggal'];
    //     return $this;
    // }
    public function getCreatedAtaaaaa()
    {
        // $t = new Time();
        // return $this->attributes['created_at'] = 'sate';
        // return $this->attributes['created_at'] = 123;
        // return $this->attributes['created_at'] = $t->humanize();
    }
    public function setTanggal($tanggal)
    {
        // dari tanggal yg absurd akan diubah ke kode unix seperti 1529392392
        $ubahKeUNIX = strtotime($tanggal);
        $this->attributes['tanggal'] = date('Y-m-d', $ubahKeUNIX);

        helper('auth');
        $this->attributes['user_id']    = user_id();
    }
    public function getNamaPemilik()
    {
        return 'kambing';
        return strtoupper($this->attributes['nama_pemilik']);
    }
    public function getAlamat()
    {
        return 'oke';
        return $this->attributes['alamat'];
    }


}
?>