<?php
class ser_Model extends Model {

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchcim($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM servicedeces where  $o like '$q%' order by service limit $p,$l ");// 
    }
    public function userSearchcim1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM servicedeces where  $o like '$q%' order by service");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM servicedeces WHERE id = :id', array(':id' => $id));
     }
	//*********************************************************************************************************************//
	
	 public function createser($data) {
		$this->db->insert('servicedeces', array(
			'service'     => $data['service'],
            'servicear'   => $data['servicear']
        ));
        echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	
	public function editSave($data) {
		 $postData = array(
			'service'     => $data['service'],
            'servicear'   => $data['servicear']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('servicedeces', $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
	
	public function deleteser($id) {       
        $this->db->delete('servicedeces', "id = '$id'");
    }
	
	
	
}