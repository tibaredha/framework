<?php
class lits_Model extends Model {

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchusers($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM lit where st=$structure and $o like '$q%' order by id limit $p,$l ");// 
    }
    public function userSearchusers1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM lit where st=$structure and $o like '$q%' order by id");//  
    }
	
	public function listelit() {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM lit WHERE st = :id order by nlit desc limit 0,3 ', array(':id' => $structure));
    } 
	
	public function litSave($data) {
	$this->db->insert('lit', array(
			'idservice' => $data['SERVI1'],
            'nlit'      => $data['nlit'],
            'st'        => $data['st'],
			'idpt'      => '0'
	
	 ));
        echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	
	// public function userSave($data) {
        // $postData = array(
            // 'wilaya' => $data['wilaya'],
            // 'structure' => $data['structure'],
            // 'login' => $data['login'],
			// 'password' => $data['password']
        // );
		// echo '<pre>';print_r ($postData);echo '<pre>'; 
        // $this->db->update('lit', $postData, "id =" . $data['id'] . "");
    // }
	
		
}