<?php
class cha_Model extends Model {

     public $table="chapitre";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchcim($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by IDCHAP limit $p,$l ");// 
    }
    public function userSearchcim1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->table where  $o like '$q%' order by IDCHAP");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->table WHERE IDCHAP = :id", array(':id' => $id));
     }
	//*********************************************************************************************************************//
	
	 public function createcha($data) {
		
		
		$this->db->insert($this->table, array(
			'CHAP'     => $data['CHAP']   
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	
	public function editSave($data) {
		 $postData = array(
			'CHAP'     => $data['CHAP']   
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update($this->table, $postData, "IDCHAP =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}