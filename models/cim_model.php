<?php
class cim_Model extends Model {
 
    public $table="cim";

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchcim($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by diag_nom limit $p,$l ");// 
    }
    public function userSearchcim1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by diag_nom");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->table WHERE row_id = :id", array(':id' => $id));
     }
	//*********************************************************************************************************************//
	
	 public function createcategorie($data) {
		
		
		$this->db->insert($this->table, array(
			'c_chapi'     => $data['CODECIM0'],
            'diag_nom'    => $data['diag_nom'],
            'diag_cod'    => $data['diag_cod']	
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	
	public function editSave($data) {
		 $postData = array(
			'c_chapi'     => $data['CODECIM0'],
            'diag_nom'    => $data['diag_nom'],
            'diag_cod'    => $data['diag_cod']	
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update($this->table, $postData, "row_id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
	
}