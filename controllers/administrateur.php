<?php

class Administrateur extends Controller { 
	
	public $controleur="administrateur";
	
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
	    $this->view->title = 'Administrateur';
		$this->view->msg = 'Administrateur';
		$this->view->nbrmembre = $this->model->nbrmembre();	
		$this->view->nbrmsglu  = $this->model->nbrmessagelu();
		$this->view->nbrmsgef  = $this->model->nbrmessageef();
		$this->view->nbrip     = $this->model->nbrip();
		$this->view->listeActivation  = $this->model->listeActivation();
		$this->view->render($this->controleur.'/index');
	}
	
	function cfg() {
	    $this->view->title = 'Configuration';
		$this->view->msg = 'Configuration';
		$this->view->render($this->controleur.'/configuration');
	}
	
	function activation() {	
		$data = array();
		$data['mode']           = $_POST['mode'];
		$this->model->editSaveactivation($data);
		header('location: '.URL.$this->controleur);	
	}
	
	
		
}