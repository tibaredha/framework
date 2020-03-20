<?php
class sig extends Controller { 
	
	public $controleur="sig";
	
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
	    $this->view->title = 'Systeme Information Geographique';
		$this->view->msg = 'Systeme Information Geographique';
		$this->view->render($this->controleur.'/index');
	}
    function sig($id) 
	{	
	    $this->view->title = 'Systeme Information Geographique';
		$this->view->msg = 'Systeme Information Geographique';
		switch ($id) 
		{ 
			case 17: 
				$this->view->render($this->controleur.'/sig17');
			break;
			
            // case 14: 
				// $this->view->render($this->controleur.'/sig14');
			break;
			
			case 38: 
				$this->view->render($this->controleur.'/sig38');
			break;
			
			default:
				$this->view->render($this->controleur.'/sig0');
		}	
	}
}