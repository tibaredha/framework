<?php
class wca_Model extends Model {

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchwil($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM wil where  $o like '$q%' order by WILAYAS limit $p,$l ");// 
    }
    public function userSearchwil1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM wil where  $o like '$q%' order by WILAYAS");//  
    }
	public function userSingleListwil($id) {
        return $this->db->select('SELECT * FROM wil WHERE IDWIL = :id', array(':id' => $id));
    }
	public function editSavewil($data) {
		 $postData = array(
			'WILAYAS'     => $data['WILAYAS'],
            'WILAYASAR'   => $data['WILAYASAR'], 
			'p2015'     => $data['p2015'],
            'p2016'     => $data['p2016'],
			'p2017'     => $data['p2017'],
			'p2018'     => $data['p2018'],
			'p2019'     => $data['p2019'],
			'SUPER'     => $data['SUPER']	
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('wil', $postData, "IDWIL =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
	//*********************************************************************************************************************//
	public function userSearchcom($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM com where  $o like '$q%' order by COMMUNE limit $p,$l ");// 
    }
    public function userSearchcom1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM com where  $o like '$q%' order by COMMUNE");//  
    }
	
	
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM com WHERE IDCOM = :id', array(':id' => $id));
     }
	public function editSave($data) {
		 $postData = array(
			'IDWIL'     => $data['WILAYA2'],
            'COMMUNE'   => $data['COMMUNE'],
            'communear' => $data['communear'],
			'p2015'     => $data['p2015'],
            'p2016'     => $data['p2016'],
			'p2017'     => $data['p2017'],
			'p2018'     => $data['p2018'],
			'p2019'     => $data['p2019'],
			'SUPER'     => $data['SUPER']	
        );
       // echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('com', $postData, "IDCOM =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
}