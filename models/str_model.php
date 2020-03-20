<?php
class str_Model extends Model {

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchstr($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM structure where  $o like '$q%' order by idwil,structure limit $p,$l ");// 
    }
    public function userSearchstr1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM structure where  $o like '$q%' order by idwil,structure");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM structure WHERE id = :id', array(':id' => $id));
     }
	 
	 public function editSave($data) {
		 $postData = array(
			'structure'     => $data['structure'],
            'structurear'   => $data['structurear'],
			'lat'           => $data['lat'],
			'lg'            => $data['lg']
        );
       // echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('structure', $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
	 
	public function createstr($data) {
	
		$this->db->insert('structure', array(
			'structure'      => $data['structure'],
			'idwil'          => $data['WILAYA2'],
            'commune'        => $data['COMMUNE2'],
			'structurear'    => $data['structurear'], 
            'daira'          => $data['daira'],
			'numcom'         => $data['COMMUNE2'],
			'com'            => $data['com']   	
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	
	
	
	
	
	
	
	
	
	
	
}