<?php
class Cryptage
{
		
	private function __construct() {
	//cryptage des données
	// $data = "03/05/1970_tibaredha_tibaredha_tibaredha_tibaredha";
	// echo $data;

	// echo "<br>";
	// $datac = Cryptage::encrypt($data);
	// echo $datac;

	// echo "<br>";
	// $datadc = Cryptage::decrypt($datac);

	// echo "<br>";
	// echo $datadc;
	
	}
	
	function encrypt($data) {
    // $key = "tiba";  // Clé de 8 caractères max
    $data = serialize($data);
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$this->key,$iv);
    $data = base64_encode(mcrypt_generic($td, '!'.$data));
    mcrypt_generic_deinit($td);
    return $data;
	}
	
	function decrypt($data) {
		// $key = "tiba";
		$td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td,$this->key,$iv);
		$data = mdecrypt_generic($td, base64_decode($data));
		mcrypt_generic_deinit($td);
		if (substr($data,0,1) != '!')
			return false;
		$data = substr($data,1,strlen($data)-1);
		return unserialize($data);
	}
		
}
