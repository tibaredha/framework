<?php
class Lang
{
		
	private function __construct() {
	
	}
	
	public static function init($lang_session)
	{
		if ($lang_session == true){$lang = Session::get('lang');}else {$lang = "fr";}
		switch($lang) {
			case 'fr':require('views/lang/fr-lang.php');break;
			case 'en':require('views/lang/en-lang.php');break;
			case 'ar':require('views/lang/ar-lang.php');break;
		}
	}
		
}
