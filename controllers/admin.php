<?php
class admin extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
	    $this->view->title = 'admin';
		$this->view->msg = 'admin';
		$this->view->render('admin/index');
	}
	
	function run()
	{
	$this->view->title = 'admin';
	$this->view->msg = 'admin';
	$this->model->run();
	}
}