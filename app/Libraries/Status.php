<?php namespace App\Libraries;
use App\Models\MStatus;
/**
 * Untuk menghandle status agen yang masuk 
 * daftar status diambil dari table tbl_status
*/

Class Status{
    private $status = array();

    public function __construct()
    {
        $this->setAllStatus();
    }
    /**
     * @return : semua status dalam bentuk array ([1] => 'AK', [2] => 'IN'...) 
     */
    public function setAllStatus()
    {
        $status     = new MStatus();
        $d          = array();
        foreach ($status->findAll() as $key => $value) {
            $d[$value->id_status]    = $value;
        }
        $this->status   = $d;
    }
    public function getAllStatus()
    {
        return $this->status;
    }

    /**
     * @param  : int / string  
     * @return : array status berdasarkan kode_status 
     * 
     * Example : params 1, returnya akan menghasilkan single array (1 => 'AK')
     * 
     */
    public function getStatus(int $kode_status): Object
    {
        if (empty ($kode_status) )
        {
            return [];
        }
        // if( in_array($kode_status, $this->getAllStatus()) )
        if( $this->getAllStatus($kode_status) )
        {
            return $this->getAllStatus()[$kode_status];
        }
        return [];
    }

}
?>