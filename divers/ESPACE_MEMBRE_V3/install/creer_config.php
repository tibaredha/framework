<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Installation Espace Membres JejeScript</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$err = '';
$ok = '';
if(!empty($_POST['creer_base'])) {
	extract($_POST);
	if(!empty($Base)) {
	
		$PARAM_hote=$Url_Serveur;
		$PARAM_nom_bd=$Base;
		$PARAM_utilisateur=$Admin; // nom d'utilisateur pour se connecter
		$PARAM_mot_passe=$Passe; // mot de passe de l'utilisateur pour se connecter
		define('DNS', 'mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd);
		define('SER', 'mysql:host='.$PARAM_hote);
		define('USER', $PARAM_utilisateur);
		define('PASS', $PARAM_mot_passe);
		class Bdd {
			private static $connexion = NULL;
			
			public static function connectBdd() {
				if(!self::$connexion) {
					self::$connexion = new PDO(DNS, USER, PASS);
					self::$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				return self::$connexion;
			}
			
			public static function createBdd($bdd) {
				$pdo = new PDO(SER, USER, PASS);
				$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$requete = "CREATE DATABASE IF NOT EXISTS $bdd";
				$pdo->prepare($requete)->execute();
			}	
		}
		try {
			Bdd::createBdd($PARAM_nom_bd);
			try {
				Bdd::connectBdd();
				$ok .= 'La connexion mysql est : <img src="'.$Url_Site.'/design/image/vrai.png" width="56" height="56" align="absmiddle"><br />';
				$fp=fopen("../config.php", "w+");
				$config = "<?php \n";
				$config .= "$";
				$config .= "PARAM_hote        = '".$Url_Serveur."'; \n";
				$config .= "$";
				$config .= "PARAM_nom_bd      = '".$Base."'; \n";
				$config .= "$";
				$config .= "PARAM_utilisateur = '".$Admin."'; \n";
				$config .= "$";
				$config .= "PARAM_mot_passe   = '".$Passe."'; \n";
				$config .= "$";
				$config .= "PARAM_nom_site    = '".$Nom_Site."'; \n";
				$config .= "$";
				$config .= "PARAM_mail_site   = '".$Email_Site."'; \n";
				$config .= "$";
				$config .= "PARAM_url_site    = '".$Url_Site."'; \n";
				$config .= "?>";
				if(fwrite($fp,$config)) {
					$ok .= 'le fichier de connexion &agrave; la base de donn&eacute;s : <img src="'.$Url_Site.'/design/image/vrai.png" width="56" height="56" align="absmiddle"><br />';
				}
				else {
					$err .= 'le fichier de connexion &agrave; la base de donn&eacute;s : <img src="'.$Url_Site.'/design/image/faux.png" width="56" height="56" align="absmiddle"><br />';
				}
			} 
			catch(Exception $e) {
					$err .= 'La Base mysql est : <img src="'.$Url_Site.'/design/image/vrai.png" width="56" height="56" align="absmiddle"><br />';
					die();
			}
		}
		catch(Exception $e) {
			$err .= 'Une erreur est survenue';
			die();
		}
	}
	else {
		$err .= 'Vous devez remplir tous les champs, <br /><center><a href="../index.php">Retour au d&eacute;but</a></center>';
	}
}
else {
	$err .= 'Vous devez commencer par le d&eacute;but de l\'installation, <br /><center><a href="../index.php">Retour au d&eacute;but</a></center>';
}


// Affichage des resultats
if(!empty($err)) {
	echo '<br />
	<table align="center" width="450">
	<tr>
	<td class="titre_form" align="center">Resultat</td>
	</tr>
	<tr>
	<td align="center"> 
	- '.$err.'<br />
	<br /><br /></td>
	</tr>
	</table>';
}
if(!empty($ok)) {
	echo '
	<form method="post" action="base.php" id="form">
	<br />
	<table align="center" width="450">
	<tr>
	<td class="titre_form" align="center">Resultat</td>
	</tr>
	<tr>
	<td align="center"> 
	- '.$ok.'
	<br /><br /></td>
	</tr>
	 <tr>
	<td align="center"><br />
	<input type="submit" name="submit" value="Passer &agrave; l\'&eacute;tape suivante" class="input" />
	<br /><br /></td>
	</tr>
	</table>
	</form>';
}
?>
</body>
</html>