<?php
class rds_Model extends Model {
//$this->db->exec('SET NAMES utf8'); POUR PRISE EN CHARGE ARABE 
    public function __construct() {
        parent::__construct();
    }
	
	 public function userSingleList($id) {
        return $this->db->select('SELECT * FROM naissance WHERE id = :id', array(':id' => $id));
     }
	
	public function createmedfn($data) {
	
     $this->db->insert('medfn', array(
	        'DATE'    => $this->dateFR2US($data['DATE']),
            'MED1'    => $data['MED1'], 
            'codemed' => $data['codemed'], 
			'QUT1'    => $data['QUT1'], 
			'idp'     => $data['idp'] 	
	 ));	
     echo '<pre>';print_r ($data);echo '<pre>'; 
	   // return $last_id = $data['id'];
    }
	
	
	
	
	// function dateFR2US($date)//01/01/2013
	// {
	// $J      = substr($date,0,2);
    // $M      = substr($date,3,2);
    // $A      = substr($date,6,4);
	// $dateFR2US =  $A."-".$M."-".$J ;
    // return $dateFR2US;//2013-01-01
	// }
	
	// public function deleteproduit($id) {

	      // $postData2 = array('idpt'    => '0' );
		  // $this->db->deletem('chaser',"idn = '$id'");
          // $this->db->delete('naissance', "id = '$id'");
    // }
	
		
}
