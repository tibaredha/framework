<?php
class Agenda extends Controller { 
	
	public $controleur="Agenda";
	
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
	
	//****************Agenda***********************//
	function Agenda() 
	{
	$this->view->title = 'Agenda';
	$url = explode('/',$_GET['url']);
    $this->view->userListviewd = $url[2]; 
	$this->view->userListviewm = $url[3]; 
	$this->view->userListviewa = $url[4];
	
	$month=$url[3];$month1='';
	$d=$url[2];$d1='';
	if($month <= 9) {$month1='0'.$month;} else {$month1=$month;}
	if($d <= 9) {$d1='0'.$d;}else {$d1=$d;}
	$date=$url[4].'-'.$month1.'-'.$d1;
 
	$this->view->userListviewt = $this->model->listeAgenda1($date) ;
	$this->view->userListview = $this->model->listeAgenda($date) ;
	$this->view->render($this->controleur.'/Agenda');    
	}
	public function createrdv() 
	{
		$data = array();
		 $data['TIRDV']  = $_POST['TIRDV'];
		 $data['TYRDV']  = $_POST['TYRDV'];
		 $data['TXRDV']  = $_POST['TXRDV'];
		 $data['STR']    = $_POST['STR'];
		 $data['DATERDV'] = $_POST['url4'].'-'.$_POST['url3'].'-'.$_POST['url2'];
		 $this->model->createrdv($data);
        // echo '<pre>';print_r ($data);echo '<pre>';	
	    header('location: ' . URL .$this->controleur.'/Agenda/'.$_POST['url2'].'/'.$_POST['url3'].'/'.$_POST['url4']);	
	}
	
	public function deleterdv($id)//la supression de la visite medicale
	{
	$url = explode('/',$_GET['url']);	
	$this->model->deleterdv($id);     
	header('location: ' . URL .$this->controleur.'/Agenda/'.$url[3].'/'.$url[4].'/'.$url[5]);
	}
	//****************fin Agenda***********************//	
	
}