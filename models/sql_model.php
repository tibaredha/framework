<?php

class Sql_Model extends Model {

    public $tbl="deceshosp";

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	public function reset() {       
	    $structure = Session::get("structure");
		$this->db->deletem('deceshosp',"STRUCTURED = '$structure'");
    }
	public function reseti() {       
	    $structure = Session::get("structure");
		$this->db->deletem('deceshosp',"STRUCTURED != '$structure'");
    }

}