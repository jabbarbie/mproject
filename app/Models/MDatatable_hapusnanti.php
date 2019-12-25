<?php namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class MDatatable extends Model
{
    private $table1;
	private $kolom;
	private $order;
	private $pk;
	private $pencarian_by;
	private $join = false;
	private $table2;
	private $join_where;
	private $onlyx;
	private $onlyx_kolom;
	private $role;
	private $status;

    private $pencarian;
    protected $request;

    protected $builder;
    public function __construct(){
        parent::__construct();
        $this->request = \Config\Services::request();
    }
	function table($data)
	{
        
		$this->table1 = $data['table'];
		$this->kolom = $data['kolom'];
		$this->order = $data['order'];
		$this->pk 	 = $data['pk'];
		$this->pencarian_by = $data['pencarian_by'];

		$this->join = $data['join']??false;
		$this->table2 = $data['table2']??'';
		$this->join_where = $data['join_where']??'';

		$this->cabang 	= $data['cabang']??'';
		$this->onlyx_kolom = $data['onlyx_kolom']??'';

		$this->pencarian = $data['pencarian']??[];

		$this->role 	= $data['role']??'';
		$this->status 	= $data['status']??'';
	}

	function pencarianx(){
		foreach ($this->pencarian as $key => $r) {
			if($r != ''){
				if($key == 'bulan'){

				}else{
					$this->builder->where($key, $r);
				}
				// if($i == 'tahun'){
				// 	$this->db->where('YEAR(tanggal) = ', $r);
				// }else if($i == 'bulan'){
				// 	$this->db->where('MONTH(tanggal) = ', $r);
				// }else if($i == 'cabang'){
				// 	$this->db->where('cabang', $r);						
				// }else if($i == 'status' && count($r) < 4){
				// 	$this->db->where_in('last_status', $r);
				// }
			}
		}
	}
	function hanyaBolehMelihatStatus()
	{
		if ( is_array($this->status) )
		{
			$this->builder->whereIn('last_status', $this->status);
		}
	}
	function onlyForCabang(){
		if( (int) $this->cabang > 0) 
		{
			$this->builder->where('id_cabang', $this->cabang);
		}
	}
	function set_query(){

        $this->builder = $this->db->table($this->table1);
        $this->builder->select($this->kolom);
	
		// if($this->join){
		// 	$this->db->join($this->table2, $this->join_where);
		// }

		if(count($this->pencarian) >= 1){
			// pencarian lewat form
			$this->pencarianx();
		}else{
			// pencarian lewat datatable
			if($this->request->getPost('search')['value']){
				// $this->db->like($this->kolom[0], $this->input->post('search')['value']);
				// $this->db->or_like("nama", $this->input->post('search')['value']);
				foreach ($this->pencarian_by as $key => $value) {
					$x	= ($key > 0)?'orLike':'like';
					$this->builder->{$x}($value, $this->request->getPost('search')['value']);
				}
			}
		}
		$this->onlyForCabang();
		$this->hanyaBolehMelihatStatus();

		
		// if($this->onlyx != ''){
		// 	$this->db->where_in('regency_id',$this->onlyx);
		// }
		// if($this->role != ''){
		// 	$this->db->where_in('last_status', $this->role);
		// }		
		// $this->db->where('regency_id',3578);


		if($this->order != '') {
			$this->builder->orderBy($this->order[0], $this->order[1]?$this->order[1]:'ASC');
		}
	}

	function set_datatable(){
        $this->set_query();
        // return;
		if($this->request->getPost('length') AND $this->request->getPost('length') != -1){
			$this->builder->limit($this->request->getPost('length'), $this->request->getPost('start'));
        }
		// $this->builder->limit(10,5);
        
		// $query = $this->db->get();
        // return $query->result();
        // return $this->set_query();

        // $this->builder->limit(5);
        return $this->builder;
        
	}
	function get_jumlahbaris(){
		// $this->set_query();  
           // return $query = $this->db->get()->num_rows();
        // return $this->set_query()->countAll();
        return $this->builder->countAll();
	}
	function get_alldata(){
        $d = $this->db->table($this->table1);
        return $d->countAllResults();
		// $this->db->select("*");  
        // $this->db->from($this->table1);  
        // return $this->db->count_all_results();  
	}
}
?>