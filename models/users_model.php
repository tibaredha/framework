<?php
class users_Model extends Model {

    public $table="users";
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchusers($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->table where structure=$structure  and  $o like '$q%' order by login limit $p,$l ");
    }
    public function userSearchusers1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->table where structure=$structure and  $o like '$q%' order by login");
    }
	
	 public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->table WHERE id = :id", array(':id' => $id));
    }
	
	
	public function createbannir($data) {
        $postData = array(
            'token'=> null,
			'confirmed_at'=>date('Y-m-d'),
			'activation' => $data['activation']
        );
		// echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update($this->table, $postData, "id =" . $data['id'] . "");
		$id_expediteur = Session::get("id");
		//envoyer une message interne
		$this->db->insert('messagerie', array(
			'id_expediteur' =>$id_expediteur,
			'id_destinataire' => $data['id'],
			'titre' => $data['titre'],
			'timestamp' => date('Y-m-d'),
			'message' => $data['message'],
			'STRUCTURED' =>$data['structure']	
		));	
    }
	
	public function createrole($data) {
        $postData = array(
            'role' => $data['role']
        );
		// echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update($this->table, $postData, "id =" . $data['id'] . "");
		$id_expediteur = Session::get("id");
		//envoyer une message interne
		$this->db->insert('messagerie', array(
			'id_expediteur' =>$id_expediteur,
			'id_destinataire' => $data['id'],
			'titre' => $data['titre'],
			'timestamp' => date('Y-m-d'),
			'message' => $data['message'],
			'STRUCTURED' =>$data['structure']	
		));	
    }
    //supprimer utilisateur avec ses corespondance acomplete
	public function deleteuser($id) {       
	
		$this->db->delete($this->table, "id = '$id'");
		$this->db->deletem("messagerie", "id_destinataire = '$id'");
		$this->db->deletem("messagerie", "id_expediteur = '$id'");
		$this->db->deletem("secure", "id_membre= '$id'");	
    }
	
	public function mprofiluser($data) {       
	        $postData = array(
			'login'      => $data['login'],
            'password'   => $data['password'],
			'Nom'       => $data['Nom'],
            'Prenom'    => $data['Prenom'],
            'Telephone' => $data['Telephone'],
	        'Facebook'  => $data['Facebook'],
		    'Email'     => $data['Email'],
			'wilaya'     => $data['wilaya'],
	        'structure'  => $data['structure'],
		    'lang'       => $data['lang']
        );
        // echo '<pre>';print_r ($postData);echo '<pre>'; 
		$this->db->update($this->table, $postData, "id =" . $data['id'] . "");
		
    }
	
	
	
	
	
	
	
	
	
	
	
	
		
}