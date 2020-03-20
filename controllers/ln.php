<?php
class ln extends Controller { 
	
	public $controleur="ln";
	
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
	    $this->view->title = 'ln';
		$this->view->msg = 'ln';
		$this->view->render($this->controleur.'/index');
	}

}