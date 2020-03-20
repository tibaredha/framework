<?php
class sf_Model extends Model {

    public $table="sagefemme";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchmed($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->table where structure=$structure and $o like '$q%' order by structure limit $p,$l ");// 
    }
    
	public function userSearchmed1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->table where structure=$structure and $o like '$q%' order by structure");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->table WHERE id = :id", array(':id' => $id));
     }
	
	public function sfSave($data) {
	$this->db->insert($this->table, array(
			'Nom'       => $data['Nom'],
            'Prenom'    => $data['Prenom'],
            'wilaya'    => $data['wilaya'],
			'structure' => $data['structure']
	 ));
    echo '<pre>';print_r ($data);echo '<pre>';
	return $last_id = $this->db->lastInsertId();
    }
	
	public function deletesf($id) {       
        $this->db->delete($this->table, "id = '$id'");
    }
	 
	public function editSave($data) {
		 $postData = array(
			'Nom'       => $data['Nom'],
            'Prenom'    => $data['Prenom'],
            'wilaya'    => $data['wilaya'],
			'structure' => $data['structure']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update($this->table, $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
}