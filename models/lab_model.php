<?php
class lab_Model extends Model {

    public $table="laboratoire";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchmed($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by laboratoire limit $p,$l ");// 
    }
    
	public function userSearchmed1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by laboratoire");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->table WHERE id = :id", array(':id' => $id));
     }
	
	public function labSave($data) {
	$this->db->insert($this->table, array(
			'laboratoire' => $data['laboratoire'],
			'Adresse'     => $data['Adresse'],
			'tel'         => $data['tel'],
            'site'        => $data['site']
	 ));
    // echo '<pre>';print_r ($data);echo '<pre>';
	return $last_id = $this->db->lastInsertId();
    }
	
	public function deletelab($id) {       
        $this->db->delete($this->table, "id = '$id'");
    }
	 
	public function editSave($data) {
		 $postData = array(
			'laboratoire' => $data['laboratoire'],
			'Adresse'     => $data['Adresse'],
			'tel'         => $data['tel'],
            'site'        => $data['site']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update($this->table, $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
}