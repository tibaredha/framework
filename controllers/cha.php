<?php
class cha extends Controller { 
	
	public $controleur="cha";
	
	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}
		$this->view->js = array($this->controleur.'/js/default.js');	
	}
		
	
	// function cim() {
	    // $this->view->title = 'cim';
		// $this->view->msg = 'cim';
		// $this->view->render($this->controleur.'/cim');
	// }
	
	function searchcha()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchcha';
	    $this->view->msg = 'La classification internationale des maladies 10e révision (CIM-10) ';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl = 8 ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb = 15 ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchcim($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchcim1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/cha');
	}
	
	
	
	function nouveau() {
	    $this->view->title = 'nouveaucha';
		$this->view->msg = 'Nouveau Chapitre de La classification internationale des maladies ';
		$this->view->render($this->controleur.'/nouveau');
	}
	
	public function create() 
	{
		$data = array();
		$data['CHAP']           = $_POST['CHAP'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createcha($data);
		header('location: '.URL.$this->controleur.'/searchcha/0/10?o=IDCHAP&q='.$last_id);
	}
	
	
	
	
	function editcha($id) {
	    $this->view->title = 'editcha';
		$this->view->msg = 'Modifier un Chapitre de La classification internationale des maladies';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editcha');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['CHAP']           = $_POST['CHAP'];
	    $data['id']             = $id;
	    echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchcha/0/10?o=IDCHAP&q='.$last_id);
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}