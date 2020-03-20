<?php
class lab extends Controller { 
	
	public $controleur="lab";
	
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
	
	
	function createlab() {
	    $this->view->title = 'lab';
		$this->view->msg = 'lab';
		$this->view->render($this->controleur.'/createlab');
	}
	
	function searchlab()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchlab';
	    $this->view->msg = 'searchlab';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchmed($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchmed1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/lab');
	}
	
	public function labSave()
	{
		$data = array();
		$data['laboratoire']   = $_POST['laboratoire'];
		$data['Adresse']       = $_POST['Adresse'];
	    $data['tel']           = $_POST['tel'];
		$data['site']          = $_POST['site'];
		//echo '<pre>';print_r ($data);echo '<pre>';
	    $last_id=$this->model->labSave($data);
		header('location: ' . URL .$this->controleur. '/searchlab/0/10?o=id&q='.$last_id);
	}	

	public function deletelab($id)
	{
	$this->model->deletelab($id);    
	header('location: ' . URL .$this->controleur. '/searchlab/0/10?o=id&q=');
	}	
	
	function editlab($id) {
	    $this->view->title = 'lab';
		$this->view->msg = 'lab';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editlab');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['laboratoire']   = $_POST['laboratoire'];
		$data['Adresse']       = $_POST['Adresse'];
	    $data['tel']           = $_POST['tel'];
		$data['site']          = $_POST['site'];
	    $data['id']            = $id;
	    //echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchlab/0/10?o=id&q='.$last_id);
	}
	
	
	
	function upl($id) 
	{
	$this->view->title = 'upload';
	$this->view->user = $this->model->userSingleList($id);
	$this->view->render($this->controleur.'/upl');    
	}
	
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
				// upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				// $uploadLocation = "d:\\mvc/public/webcam/pat/"; 
				$uploadLocation = logolab;
				$target_path = $uploadLocation.trim($id).".jpg";      
				if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) 
				{	
				$this->view->msg ='le fichier :  '.basename( $_FILES['upfile']['name']).'  a été corectement envoyer merci';
				} 
				else
				{
				$this->view->msg ='il ya une erreur d\'envoie du fichier :  '.basename( $_FILES['upfile']['name']).'  veillez recomencer svp';	
				}
			}	
		}
		header('location: ' . URL .$this->controleur.'/upl/'.$id.'');
		
		   
	}		
	
	//**fin CHANGER PHOTOS**//
	
		
}