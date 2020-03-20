<?php
class captcha
{
		
	private function __construct() {
	
	}
	
	function captchaCreate() {
	
		$resultat = rand(1000,9999);
		$phrase = $resultat;
		return array($resultat, $phrase);
	}
	
    function captchax() {
	
		list($resultat, $phrase) = captcha::captchaCreate();
		$_SESSION['captcha'] = $resultat;
		return $phrase;
	}

	function captchaVerif($var1,$var2) {
			
			if(empty($var1) || empty($var2) ) 
			{
				header('location: '.URL.'register');	
			} 
			else 
			{
				if ($var1 == $var2)
				{
				return true ;
				}
				else 
				{
				header('location: '.URL.'register');
				} 
			}			
		}
		
	function password_generator($size , $with_numbers=true , $with_tiny_letters=true, $with_capital_letters=true){ 
	  $pass_g = ""; 
	  $sizeof_lchar = 0; 
	  $letter = ""; 
	  $letter_tiny = "abcdefghijklmnopqrstuvwxyz"; 
	  $letter_capital = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	  $letter_number = "0123456789"; 
	  
	  if($with_tiny_letters == true){ 
	  $sizeof_lchar += 26; 
	  if (isset($letter)) $letter .= $letter_tiny; 
	  else $letter = $letter_tiny; 
	  } 
	  
	  if($with_capital_letters == true){ 
	  $sizeof_lchar += 26; 
	  if (isset($letter)) $letter .= $letter_capital; 
	  else $letter = $letter_capital; 
	  } 
	  
	  if($with_numbers == true){ 
	  $sizeof_lchar += 10; 
	  if (isset($letter)) $letter .= $letter_number; 
	  else $letter = $letter_number; 
	  } 
	  
	  if($sizeof_lchar > 0){ 
	  srand((double)microtime()*date("YmdGis")); 
	  
	  for($cnt = 0; $cnt < $size; $cnt++){ 
	  $char_select = rand(0, $sizeof_lchar - 1); 
	  $pass_g .= $letter[$char_select]; 
	  } 
	  } 
	  return $pass_g; 
	  
	}
			
}
