<?php
class med extends Controller { 
	
	public $controleur="med";
	
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
	
	
	function med() {
	    $this->view->title = 'med';
		$this->view->msg = 'medecin';
		$this->view->render($this->controleur.'/med');
	}
	
	function searchmed()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchmed';
	    $this->view->msg = 'searchmed';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchmed($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchmed1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/med');
	}
	
	function createmedecin() 
	{
	    $this->view->title = 'createmedecin';
	    $this->view->msg = 'createmedecin';  
		$this->view->render($this->controleur.'/createmedecin');
	}

	public function medecinSave()
	{
		$data = array();
		$data['Nom']        = $_POST['Nom'];
		$data['Prenom']     = $_POST['Prenom'];
		$data['wilaya']     = $_POST['wilaya'];
	    $data['structure']  = $_POST['structure'];
	    echo '<pre>';print_r ($data);echo '<pre>';
	    $last_id=$this->model->medecinSave($data);
		header('location: ' . URL .$this->controleur. '/searchmed/0/10?o=id&q='.$last_id);
	}	

	public function deletemed($id)
	{
	$this->model->deletemedecin($id);    
	header('location: ' . URL .$this->controleur. '/searchmed/0/10?o=id&q=');
	}	
	
	
	function editmed($id) {
	    $this->view->title = 'editmed';
		$this->view->msg = 'editmed';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editmedecin');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['Nom']        = $_POST['Nom'];
		$data['Prenom']     = $_POST['Prenom'];
		$data['wilaya']     = $_POST['wilaya'];
	    $data['structure']  = $_POST['structure'];
	    $data['id']                 = $id;
	    // echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchmed/0/10?o=id&q='.$last_id);
	}
	
	
	
	
	
		
}