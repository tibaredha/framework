<?php
include('function.php');
function Detruire($Repertoire) {
	if(!preg_match( "/^.*\/$/", $Repertoire)) {
		$Repertoire .= '/';
	}
	$ouvre = opendir($Repertoire);
	if($ouvre !== false) {
		while($fichier = readdir($ouvre)) {
			if($fichier!= "." && $fichier != "..") {
				if(is_dir($Repertoire.$fichier )) {
				Detruire($Repertoire.$fichier);
				}
				else {
				unlink($Repertoire.$fichier );
				}
			}
		}
		closedir($ouvre);
		rmdir($Repertoire);
		$res = true;
	}
	else $res = false;
	return $res;
}
if(Detruire('install')) {
	redirection('index.php');
}
?>