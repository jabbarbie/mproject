<?php namespace App\Entities;

/**
 * Berfungsi untuk memfilter field-field yg akan 
 * diteruskan atau dikembalikan oleh controller
 * 
 * Misalnya request->tanggal format yg diterima 2012-20-12
 * akan diolah dan dikembalikan menjadi 12 Desember 2012
 */
use CodeIgniter\Entity;
class Target extends Entity
{
    public function getTanggalMulai()
    {
        helper('tgl');
        return tanggalLengkap(strtotime($this->attributes['tanggal_mulai']));
    }
    public function getTanggalAkhir()
    {
        helper('tgl');
        return tanggalLengkap(strtotime($this->attributes['tanggal_akhir']));
    }

}
?>