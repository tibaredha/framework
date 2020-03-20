<?php
class ser extends Controller { 
	
	public $controleur="ser";
	
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
		$this->view->css = array($this->controleur.'/css/default.css?t='.time());	
	}
		
	
	function ser() {
	    $this->view->title = 'ser';
		$this->view->msg = 'ser';
		$this->view->render($this->controleur.'/ser');
	}
	
	function searchser()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchser';
	    $this->view->msg = 'service ';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl = 8 ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb = 15 ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchcim($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchcim1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/ser');
	}
	
	
	
	function nouveau() {
	    $this->view->title = 'nouveauser';
		$this->view->msg = ' ';
		$this->view->render($this->controleur.'/nouveau');
	}
	
	public function create() 
	{
		$data = array();
		$data['service']           = $_POST['service'];
		$data['servicear']           = $_POST['servicear'];
		echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createser($data);
		header('location: '.URL.$this->controleur.'/searchser/0/10?o=id&q='.$last_id);
	}
	
	function editser($id) {
	    $this->view->title = 'editser';
		$this->view->msg = 'Modifier un service';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editser');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['service']           = $_POST['service'];
		$data['servicear']         = $_POST['servicear'];
	    $data['id']                = $id;
	    //echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchser/0/10?o=id&q='.$last_id);
	
	}
	public function deleteser($id)
	{
	$this->model->deleteser($id);    
	header('location: '.URL.$this->controleur.'/searchser/0/10?o=id&q=');
	}	
	
}