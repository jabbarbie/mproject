<?php namespace App\Entities;

use CodeIgniter\Entity;

class Pegawai extends Entity
{
    public function setTanggalMulai($tanggal_mulai)
    {
        $this->attributes['tanggal_mulai'] = date('Y-m-d', $tanggal_mulai);
    }
    public function setTanggalAkhir($tanggal_akhir)
    {
        $this->attributes['tanggal_akhir'] = date('Y-m-d', $tanggal_akhir);
    }
}
?>