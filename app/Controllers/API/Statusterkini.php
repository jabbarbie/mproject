<?php namespace  App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;

class Statusterkini extends ResourceController
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function totalPegawai()
    {
        $r = $this->db->query("SELECT count(id_pegawai) as total FROM tbl_pegawai")->getRow()->total;
        return $this->respond(['status' => 200, 'data'=> $r]);
    }
    public function totalCabang()
    {
        $r = $this->db->query("SELECT count(id_cabang) as total FROM tbl_cabang")->getRow()->total;
        return $this->respond(['status' => 200, 'data'=> $r]);
    }
    public function totalAgen()
    {
        $r = $this->db->query("SELECT count(id_estimasi) as total FROM view_estimasi")->getRow()->total;
        return $this->respond(['status' => 200, 'data'=> $r]);
    }
    public function totalStatusAK()
    {
        $r = $this->db->query("SELECT count(id_estimasi) as total FROM view_estimasi where last_status=1")->getRow()->total;
        return $this->respond(['status' => 200, 'data'=> $r]);
    }
    
}
?>