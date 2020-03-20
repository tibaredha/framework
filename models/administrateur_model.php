<?php

class Administrateur_Model extends Model {

 
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	public function nbrmembre() {
		$structure = Session::get("structure");
		$sql = "SELECT * FROM users WHERE structure = $structure ";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		return $sth->rowCount();
	} 
	
	public function nbrmessagelu() {
		$id_destinataire = Session::get("id");
		$sql = "SELECT * FROM messagerie  WHERE id_destinataire = $id_destinataire  and lu = 0 and effacer = 0 ";  
		$sth = $this->db->prepare($sql);
		$sth->execute();
		return $sth->rowCount();
	} 
	public function nbrmessageef() {
		$id_destinataire = Session::get("id");
		$sql = "SELECT * FROM messagerie WHERE id_destinataire = $id_destinataire  and effacer = 1";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		return $sth->rowCount();
	} 
	
	public function nbrip() {
	
		$sql = "SELECT * FROM secure ";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		return $sth->rowCount();
	} 
	
	public function listeActivation() {
		$liste = '';
		$sql = "SELECT * FROM activation";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		while($option = $sth -> fetch(PDO::FETCH_ASSOC)) {
			if($option['activation'] === '1') {
				$liste .= '<option value="'.$option['id'].'" selected="selected">'.$option['mode'].'</option>';
			}
			else {
				$liste .= '<option value="'.$option['id'].'">'.$option['mode'].'</option>';
			}
		}
		return $liste;
	}
	
	public function editSaveactivation($data) {
	
	  $postData = array('activation'    => 1);
	  $this->db->update('activation', $postData, "id =" . $data['mode'] . "");	
			
	  $postData1 = array('activation'    => 0);
	  $this->db->update('activation', $postData1, "id !=" . $data['mode'] . "");			
	
	}
	
	
	
}