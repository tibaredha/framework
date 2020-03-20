<?php
class dspd extends Controller { 
	
	public $controleur="dspd";
	
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
	function index() {
	    $this->view->title = 'dspd';
		$this->view->msg = 'dsp';
		$this->view->render($this->controleur.'/index');
	}
	
	
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search';
	    $this->view->msg = 'Search';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];   //parametre 2 page                      limit 2,3
		$this->view->userListviewl =10     ;      //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =10       ;   //parametre nombre de chiffre dan la barre  navigation
		if (isset ($_GET['ad'])){$ad=$_GET['ad']; }else {$ad="asc";}
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl,$ad);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq,$ad); // compte total pour bare de navigation
		$this->view->nbrvalide = $this->model->listeAprouve();
		$this->view->render($this->controleur.'/index');
	}

	function graphe($id) 
	{
	    $this->view->title = 'dspd';
		$this->view->msg = 'dspd';
		if($id!=0) {
		$this->view->render($this->controleur.'/index'.$id);
		} else {
		$this->view->render($this->controleur.'/index');
		}	
	}
	function Evaluation() {
	    $this->view->title = 'Evaluation';
		$this->view->msg = 'Evaluation';
		$this->view->render($this->controleur.'/Evaluation');
	}
	
	public function Aprouve() 
	{
        $url1 = explode('/',$_GET['url']);	
		$data = array();
		$data['id']         = $url1[2];
		$data['aprouve']    = $url1[3];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->Aprouve($data);
		header('location: ' . URL .$this->controleur.'/search/'.$url1[4].'/'.$url1[5].'?o=id&q=');
	}
	
	
	
	
}