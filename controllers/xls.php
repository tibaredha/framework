<?php
class xls extends Controller { 
	
	public $controleur="xls";
	
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
	
	function Exporter() 
	{
	    $this->view->title = 'Exporter';
		$this->view->msg = 'Exporter';
		$this->view->render($this->controleur.'/Exporter');
	}
	
	
	function XLS() 
	{  
		if($_POST['type']=='1')
		{
		$this->view->title = 'XLS';
		$this->view->msg = 'XLS';
		$this->view->d1 = $_POST['Datedebut'];
		$this->view->d2 = $_POST['Datefin'];
		$this->view->render($this->controleur.'/XLS');
		}
		elseif($_POST['type']=='2')
		{
		$this->view->title = 'XLS';
		$this->view->msg = 'XLS';
		$this->view->d1 = $_POST['Datedebut'];
		$this->view->d2 = $_POST['Datefin'];
		$this->view->render($this->controleur.'/XLS');
		}
		else
		{
		$this->view->title = 'error';
		$this->view->msg = 'This page doesnt exist';
		$this->view->render('Error/index');
		}
	}
	
	
	

	
	
	
		
}