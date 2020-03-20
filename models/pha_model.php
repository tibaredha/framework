<?php
class pha_Model extends Model {

    public $table="pharmacie";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchmed($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by dci limit $p,$l ");// 
    }
    
	public function userSearchmed1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by dci");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->table WHERE id = :id", array(':id' => $id));
     }
	
	public function phaSave($data) {
	$this->db->insert($this->table, array(
			'dci'    => $data['dci'],
            'pre'    => $data['pre']
	 ));
    //echo '<pre>';print_r ($data);echo '<pre>';
	return $last_id = $this->db->lastInsertId();
    }
	
	public function deletepha($id) {       
        $this->db->delete($this->table, "id = '$id'");
    }
	 
	public function editSave($data) {
		 $postData = array(
			'dci'    => $data['dci'],
            'pre'    => $data['pre']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update($this->table, $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
}