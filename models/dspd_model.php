<?php
class dspd_Model extends Model {

    public $tbl="deceshosp";
	
	public function __construct() {
		parent::__construct();	
	}
	public function userSearch($o, $q, $p, $l,$ad) {
        return $this->db->select("SELECT * FROM $this->tbl where  $o like '$q%' order by $o $ad limit $p,$l ");
    }
    public function userSearch1($o, $q ,$ad) {   
	    return $this->db->select("SELECT * FROM $this->tbl where  $o like '$q%' order by $o $ad ");
    }
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM $this->tbl WHERE id = :id', array(':id' => $id));
    }
	public function listeAprouve() { 
        return $this->db->select("SELECT * FROM $this->tbl where  aprouve=0 ");
    } 
	
	public function Aprouve($data) {
        $postData = array('aprouve' => $data['aprouve']);
        $this->db->update($this->tbl, $postData, "id =".$data['id']."");	
    }
	//echo '<pre>';print_r ($postData);echo '<pre>'; 
}