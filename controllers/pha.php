<?php
class pha extends Controller { 
	
	public $controleur="pha";
	
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
	
	
	function createpha() {
	    $this->view->title = 'pha';
		$this->view->msg = 'pharmacie';
		$this->view->render($this->controleur.'/createpha');
	}
	
	function searchpha()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchpha';
	    $this->view->msg = 'searchpha';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =1       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchmed($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchmed1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/pha');
	}
	
	public function phaSave()
	{
		$data = array();
		$data['dci']        = $_POST['dci'];
		$data['pre']        = $_POST['pre'];
	    //echo '<pre>';print_r ($data);echo '<pre>';
	    $last_id=$this->model->phaSave($data);
		header('location: ' . URL .$this->controleur. '/searchpha/0/10?o=id&q='.$last_id);
	}	

	public function deletepha($id)
	{
	$this->model->deletepha($id);    
	header('location: ' . URL .$this->controleur. '/searchpha/0/10?o=id&q=');
	}	
	
	function editpha($id) {
	    $this->view->title = 'pha';
		$this->view->msg = 'pharmacie';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editpha');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['dci']        = $_POST['dci'];
		$data['pre']        = $_POST['pre'];
	    $data['id']         = $id;
	    //echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchpha/0/10?o=id&q='.$last_id);
	}
	
	
	
	
	
		
}