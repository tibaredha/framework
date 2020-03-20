<?php
class Msgs extends Controller { 
	
	public $controleur="Msgs";
	
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
	    $this->view->title = 'Messagerie';
		$this->view->msg = 'Messagerie';
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
	
	function nouveau() {
	    $this->view->title = 'nouveau';
		$this->view->msg = 'nouveau';
		$this->view->render($this->controleur.'/nouveau');
	}
	public function create() 
	{
		$data = array();
		$data['Destinataire']= $_POST['Destinataire'];
		$data['titre']       = $_POST['titre'];
		$data['message']     = $_POST['message'];
		$data['id']          = $_POST['id'];
		$data['structure']   = $_POST['structure'];
		$last_id=$this->model->createmessage($data);
		header('location: '.URL.$this->controleur.'');
	}
	
	public function profil($id) 
	{
        $this->view->title = 'profil';
		$this->view->msg = 'profil';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/profil');
	}
	
	public function view($id) 
	{
        $this->view->title = 'view message';
		$this->view->msg = 'view message';
		$this->view->user = $this->model->userSingleList($id);
		$this->model->messagelu($id);
		$this->view->render($this->controleur.'/view');
	}
	
	
	public function viewx($id) 
	{
	    $url1 = explode('/',$_GET['url']); 
		if(!empty($_POST['repondre'])) {header('location: '.URL.$this->controleur.'/nouveau/'.$id);}
		if(!empty($_POST['ok']))       {header('location: '.URL.$this->controleur);}
		if(!empty($_POST['delete']))   {header('location: '.URL.$this->controleur.'/delete/'.$id.'/'.$url1[3]);}	
	}
	
	
	function delete($id) {
	    
		$url1 = explode('/',$_GET['url']);
		$this->model->messageef($url1[3]);
		header('location: '.URL.$this->controleur);
	}
	
	


}