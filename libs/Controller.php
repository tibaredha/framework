<?php

class Controller {

	function __construct() {
		$this->view = new View();	
	}
	
	public function loadModel($name) {
		$path = 'models/'.$name.'_model.php';
		if (file_exists($path)) {
			require 'models/'.$name.'_model.php';
			
			$modelName = $name . '_Model';
			$this->model = new $modelName();
		}		
	}
	
	public function affichage($data) {
		echo '<pre>';print_r ($data);echo '</pre>';
	}

	function str_random($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
   }
	
	
}