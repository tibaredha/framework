<?php
class users extends Controller { 
	
	public $controleur="users";
	
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
	

	function users() {
	    $this->view->title = 'users';
		$this->view->msg = 'users';
		$this->view->render($this->controleur.'/users');
	}
	
	function searchusers()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchusers';
	    $this->view->msg = 'Gérer les Membres ';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchusers($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchusers1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/users');
	}
	
	 function roleusers($id) {
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'bannir';
		$this->view->msg = 'bannir';
		// $this->view->bannir = $url1[3];
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/roleusers');
	}
	public function rolecreate($id) 
	{
		$data = array();
		$data['structure']   = $_POST['structure'];
		$data['Email']       = $_POST['Email'];
		$data['titre']       = $_POST['titre'];
		$data['message']     = $_POST['message'];
		$data['id']          = $id;
		$data['role']        = $_POST['role'];
		$this->model->createrole($data);
		header('location: '.URL.$this->controleur.'/searchusers/0/10?o=id&q='.$id);
	}
	
    function Bannirusers($id) {
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'bannir';
		$this->view->msg = 'bannir';
		$this->view->bannir = $url1[3];
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/bannir');
	}
	public function bannircreate($id) 
	{
		$data = array();
		$data['structure']   = $_POST['structure'];
		$data['Email']       = $_POST['Email'];
		$data['titre']       = $_POST['titre'];
		$data['message']     = $_POST['message'];
		$data['id']          = $id;
		$data['bannir']      = $_POST['bannir'];
		if ( $data['bannir']== 0) {$data['activation']   = 0;} else {$data['activation']   = 1;}
		$last_id=$this->model->createbannir($data);
		header('location: '.URL.$this->controleur.'/searchusers/0/10?o=id&q=');
		// echo '<pre>';print_r ($data);echo '<pre>';
	}

	public function deleteusers($id)
	{
	$url1 = explode('/',$_GET['url']);	
	if ($url1[3]!=1) {$this->model->deleteuser($id);}
	header('location: ' . URL .$this->controleur. '/searchusers/0/10?o=id&q=');
	}	

	public function profil($id) 
	{
        $this->view->title = 'profil';
		$this->view->msg = 'profil';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/profil');
	}
	
	public function mprofil($id) 
	{
        //mprofilheader =1
		//mprofilmbrs=2
		//mprofilmsg=3
		
		
		
		
		$data = array();
		if($_POST['id']==$id){
		$data['id']         = $id;
		$data['Nom']        = $_POST['Nom'];
		$data['Prenom']     = $_POST['Prenom'];
		$data['Telephone']  = $_POST['Telephone'];
		$data['Facebook']   = $_POST['Facebook'];
		$data['Email']      = $_POST['Email'];
        $data['wilaya']     = $_POST['wilaya'];
		$data['structure']  = $_POST['structure'];
		$data['lang']       = $_POST['lang'];
		$data['login']      = $_POST['login'];
		$data['password']   = md5($_POST['password']);
		$this->model->mprofiluser($data);
		Session::destroy();
		header('location: ' . URL ."login");
		}
		
		$url1 = explode('/',$_GET['url']);	
		if ($url1[3]) 
		{
		header('location: '.URL.$this->controleur.'/searchusers/0/10?o=id&q=');	
		}
		else 
		{
		header('location: '.URL.$this->controleur.'/searchusers/0/10?o=id&q=');	
		}
		
	}
	
	
	
	
	
	
	
}