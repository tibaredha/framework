<?php
class Temp
{		
	private function __construct() {
	
	}
	
	function getmicrotime(){
	list($usec, $sec) = explode(" ",microtime());
	return ((float)$usec + (float)$sec);
	}   		
}
