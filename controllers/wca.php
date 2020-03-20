<?php
class wca extends Controller { 
	
	public $controleur="wca";
	
	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}
		$this->view->js = array($this->controleur.'/js/default.js?t='.time());
		$this->view->css = array($this->controleur.'/css/default.css?t='.time());	
	}
	
	//************************************************************************************************************//
	function wil() {
	    $this->view->title = 'wil';
		$this->view->msg = 'Wilaya ';
		$this->view->render($this->controleur.'/wil');
	}
	
	function searchwil()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchwil';
	    $this->view->msg = 'Wilayas algerie';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =10       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchwil($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchwil1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/wil');
	}
	function editwil($id) {
	    $this->view->title = 'editwil';
		$this->view->msg = 'Modifier editwil';
		$this->view->user = $this->model->userSingleListwil($id);
		$this->view->render($this->controleur.'/editwil');
	}

	public function editSavewil($id) 
	{
		$data = array();
		$data['WILAYAS']           = $_POST['WILAYAS'];
		$data['WILAYASAR']         = $_POST['WILAYASAR'];
		$data['p2015']             = $_POST['p2015'];
	    $data['p2016']             = $_POST['p2016'];
	    $data['p2017']             = $_POST['p2017'];
	    $data['p2018']             = $_POST['p2018'];
	    $data['p2019']             = $_POST['p2019'];
		$data['SUPER']             = $_POST['SUPER'];
		$data['id']                = $id;
	   // echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSavewil($data);
		header('location: '.URL.$this->controleur.'/searchwil/0/10?o=IDWIL&q='.$last_id);
	}

	//********************************************************************************************************************************************//
	function com() {
	    $this->view->title = 'com';
		$this->view->msg = 'commune';
		$this->view->render($this->controleur.'/com');
	}
	
	function searchcom()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchcom';
	    $this->view->msg = 'Commune algerie';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =10       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchcom($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchcom1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/com');
	}
		
	function editcom($id) {
	    $this->view->title = 'editcom';
		$this->view->msg = 'Modifier editcom';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editcom');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['WILAYA2']           = $_POST['WILAYA2'];
		$data['COMMUNE']           = $_POST['COMMUNE'];
		$data['communear']         = $_POST['communear'];
		$data['p2015']             = $_POST['p2015'];
	    $data['p2016']             = $_POST['p2016'];
	    $data['p2017']             = $_POST['p2017'];
	    $data['p2018']             = $_POST['p2018'];
	    $data['p2019']             = $_POST['p2019'];
		$data['SUPER']             = $_POST['SUPER'];
		$data['id']                = $id;
	   // echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchcom/0/10?o=IDCOM&q='.$last_id);
	}
	
	
	
	
	
}