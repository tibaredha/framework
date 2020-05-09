<?php
class Evacuation extends Controller { 
	
	public $controleur="Evacuation";
	
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
		$this->view->title = 'Evacuation';
		$this->view->msg = 'Evacuation';
		$this->view->render($this->controleur.'/index');
	}
	
	
	
	
	
	
	
	
}
?>
