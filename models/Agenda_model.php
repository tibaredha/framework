<?php
class Agenda_Model extends Model {

    public $tbl="rdv";
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	public function createrdv($data) {
       $this->db->insert($this->tbl, array(
		 'TIRDV'    => $data['TIRDV'],
		 'TYRDV'    => $data['TYRDV'],
		 'TXRDV'    => $data['TXRDV'],
		 'DATERDV'  => $data['DATERDV'],
		 'STR'      => $data['STR']
		 
        ));
        echo '<pre>';print_r ($data);echo '<pre>';
        return $last_id = $this->db->lastInsertId();
    }
	 public function deleterdv($id) {
        $this->db->delete($this->tbl, "id = '$id'");
    }
	
	
	 public function listeAgenda1($id) {
	    $structure = Session::get("structure");
		//$sth = $this->db->prepare('SELECT * FROM '.$this->tbl.' WHERE DATERDV = :id and  STR = :STR  order by TIRDV  limit 0,10 ');
		$sth = $this->db->prepare('SELECT * FROM deceshosp WHERE DINS = :id and  STRUCTURED = :STR  order by NOM ');
		$sth->execute(array(':id' => $id,':STR' => $structure));
		$sth->fetch();
		return $count =  $sth->rowCount();	
     } 
	
	 public function listeAgenda($id) {
	    $structure = Session::get("structure");
        //return $this->db->select('SELECT * FROM '.$this->tbl.' WHERE DATERDV = :id  and  STR = :STR  order by TIRDV  limit 0,10 ', array(':id' => $id,':STR' => $structure));
        return $this->db->select('SELECT * FROM deceshosp WHERE DINS = :id  and  STRUCTURED = :STR  order by NOM   ', array(':id' => $id,':STR' => $structure));
	 } 
	
	
}