<?php
class Index extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->title = 'Accueil';
		$this->view->msg = 'Accueil';
		$this->view->render('index/index');
	}
	
}