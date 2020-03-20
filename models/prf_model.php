<?php
class prf_Model extends Model {

    public $table="profession";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchmed($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by Profession limit $p,$l ");// 
    }
    
	public function userSearchmed1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by Profession");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->table WHERE id = :id", array(':id' => $id));
     }
	
	public function prfSave($data) {
	$this->db->insert($this->table, array(
			'Profession'      => $data['Profession'],
            'Professionar'    => $data['Professionar']
	 ));
    echo '<pre>';print_r ($data);echo '<pre>';
	return $last_id = $this->db->lastInsertId();
    }
	
	public function deleteprf($id) {       
        $this->db->delete($this->table, "id = '$id'");
    }
	 
	public function editSave($data) {
		 $postData = array(
			'Profession'      => $data['Profession'],
            'Professionar'    => $data['Professionar']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update($this->table, $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
}