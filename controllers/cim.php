<?php
class cim extends Controller { 
	
	public $controleur="cim";
	
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
		
	
	function cim() {
	    $this->view->title = 'cim';
		$this->view->msg = 'cim';
		$this->view->render($this->controleur.'/cim');
	}
	
	function searchcim()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchcim';
	    $this->view->msg = 'La classification internationale des maladies 10e révision (CIM-10) ';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl = 8 ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb = 4 ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchcim($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchcim1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/cim');
	}
	
	
	
	function nouveau() {
	    $this->view->title = 'nouveaucim';
		$this->view->msg = 'Nouvelle Categorie de La classification internationale des maladies ';
		$this->view->render($this->controleur.'/nouveau');
	}
	
	public function create() 
	{
		$data = array();
		$data['CODECIM0']           = $_POST['CODECIM0'];
		$data['diag_nom']           = $_POST['diag_nom'];
		$data['diag_cod']           = $_POST['diag_cod'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createcategorie($data);
		header('location: '.URL.$this->controleur.'/searchcim/0/10?o=row_id&q='.$last_id);
	}
	
	
	//
	
	function editcategorie($id) {
	    $this->view->title = 'editcategorie';
		$this->view->msg = 'Modifier une Categorie de La classification internationale des maladies';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editcategorie');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['CODECIM0']           = $_POST['CODECIM0'];
		$data['diag_nom']           = $_POST['diag_nom'];
		$data['diag_cod']           = $_POST['diag_cod'];
	    $data['id']                 = $id;
	    //echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchcim/0/10?o=row_id&q='.$last_id);
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}