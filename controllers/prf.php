<?php
class prf extends Controller { 
	
	public $controleur="prf";
	
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
	
	
	function createprf() {
	    $this->view->title = 'prf';
		$this->view->msg = 'profession';
		$this->view->render($this->controleur.'/createprf');
	}
	
	function searchprf()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchprf';
	    $this->view->msg = 'searchprf';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchmed($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchmed1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/prf');
	}
	
	public function prfSave()
	{
		$data = array();
		$data['Profession']        = $_POST['Profession'];
		$data['Professionar']     = $_POST['Professionar'];
	    // echo '<pre>';print_r ($data);echo '<pre>';
	    $last_id=$this->model->prfSave($data);
		header('location: ' . URL .$this->controleur. '/searchprf/0/10?o=id&q='.$last_id);
	}	

	public function deleteprf($id)
	{
	$this->model->deleteprf($id);    
	header('location: ' . URL .$this->controleur. '/searchprf/0/10?o=id&q=');
	}	
	
	function editprf($id) {
	    $this->view->title = 'prf';
		$this->view->msg = 'profession';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editprf');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['Profession']        = $_POST['Profession'];
		$data['Professionar']     = $_POST['Professionar'];
	    $data['id']                 = $id;
	    //echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchprf/0/10?o=id&q='.$last_id);
	}
	
	
	
	
	
		
}