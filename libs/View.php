<?php
class View  extends HTML {

	function __construct() {
		//echo 'this is the view';
		$this->clagenda = new clagenda();
		$this->clgraphe = new clgraphe();
		$this->clsig = new clsig();	
		$this->clgdatabse = new clgdatabse();	
	}

	public function render($name, $noInclude = false)
	{
		if ($noInclude == true) {
			require 'views/'.$name.'.php';	
		}
		else {
			require 'views/header.php';
			require 'views/'.$name.'.php';
			require 'views/footer.php';	
		}
	}
	

	

}