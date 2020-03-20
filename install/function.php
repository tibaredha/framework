<?php 
include('define.php');

// La fonction de redirection de base
function redirection($url, $time=0) {
	if (!headers_sent()) {
		header("refresh: $time;url=$url"); 
		exit;
	}
	else {
		echo '<meta http-equiv="refresh" content="',$time,';url=',$url,'">';
	}
}

// La classe de connexion a la bdd
class Bdd {
	private static $connexion = NULL;
	
	public static function connectBdd() {
		if(!self::$connexion) {
			self::$connexion = new PDO(DNS, USER, PASS);
			self::$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$connexion;
	}
	
} // Fin de la classe de connexion a la bdd

###########################################################################################

// La classe de recuperation de l'ip visiteur
class Ip {
	// function recuperation ip
	public static function get_ip() { 
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} 
		elseif(isset($_SERVER['HTTP_CLIENT_IP'])) { 
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
		else { 
			$ip = $_SERVER['REMOTE_ADDR'];
		} 
		return $ip;
	}
} // Fin de la classe de recuperation de l'ip visiteur

###########################################################################################

// La classe de cryptage
class Cryptage {
	
	// Fonction de cryptage
	public static function crypter($var) {
		$sel = "48@tiOP";
		$Cript = md5($var);
		$crypt = sha1($Cript, $sel);
		return $crypt;
	}
	// creation d'une chaine aleatoire
	public static function chaine($nb_car, $chaine='AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn123456789') {
		$nb_lettres = strlen($chaine)-1;
		$generation = '';
		for($i=0; $i < $nb_car; $i++)
		{
			$pos = mt_rand(0, $nb_lettres);
			$car = $chaine[$pos];
			$generation .= $car;
		}
		return $generation;
	}
	
} // Fin de la classe de cryptage

###########################################################################################

// La classe captcha
class Captcha {
	
	// Fonction de creation d'un captcha
	// $a => chiffre entre 1 et 5
	// $b => chiffre entre 1 et 5
	// $resultat => le resultat de l'operation
	// $phrase => le texte du captcha
	// Retourne un tableau contenant la phrase et le resultat du captcha
	public static function captchaCreate() {
		$a = rand(1, 5);
		$b = rand(1, 5);
		$resultat = $a + $b;
		$phrase = 'Combien font '.$a.' + '.$b.' : ';
		return array($resultat, $phrase);
	}
	// Fonction d'envoie du captcha
	// Creation d'une session contenant le resultat du captcha
	// Retourne la phrase du captcha
	public function captcha() {
		list($resultat, $phrase) = Captcha::captchaCreate();
		$_SESSION['captcha'] = $resultat;
		return $phrase;
	}
	// Fonction de verification du resultat du captcha
	// Si le resultat du captcha a ete poste
	// 		Si la reponse est egale a la session captcha
	// 			Retourne vrai
	//		Si la reponse est fausse
	// 			retourne faux
	// Si le resultat n'est pas envoye
	// 		Retourne faux
	public static function captchaVerif() {
		if(!empty($_POST['captcha'])) {
			if($_POST['captcha'] == $_SESSION['captcha']) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	 
} // Fin de la classe captcha

###########################################################################################

// La classe d'inscription
class Inscription {
	
	// Fonction d'inscription
	// Si l'identifiant, l'email le mot de passe un et le mot de passe deux sont poster
	//		Si les deux mot de passe sont identiques
	//			Si le pseudo n'existe pas dans la bdd
	//				Si l'email est valide
	//					Si l'email n'existe pas dans la bdd
	//						creation du profil
	//						creation de la protection des info du profil
	//						envoie du message de bienvenue
	//						Retourne Activation du profil
	//					Sinon
	//						Retourne email existe deja
	//				Sinon
	//					Retourne email non valide
	//			Sinon
	//				Retourne le pseudo existe
	//		Sinon
	//			Retourne les 2 mots de passe sont !=
	// Sinon 
	// 		Retourne remplir tout les champs
	public static function inscrire($identifiant, $email, $passeUn, $passeDe) {
		if(!empty($identifiant) AND !empty($email) AND !empty($passeUn) AND !empty($passeDe)) {
			if($passeUn === $passeDe) {
				$verifIdentifiant = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.PSEUDO);
				$verifIdentifiant -> bindParam(':identifiant', $identifiant, PDO::PARAM_STR, 50);
				$verifIdentifiant -> execute();
				if($verifIdentifiant -> rowCount() != 1) {
					if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$verifMail = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.EMAIL);
						$verifMail -> bindParam(':email', $email);
						$verifMail -> execute();
						if($verifMail -> rowCount() != 1) {
							Inscription::profil($identifiant, $email, $passeUn);
							Inscription::protect($identifiant);
							Inscription::message($identifiant);
							$resultat = Inscription::activer($identifiant);
						}
						else {
							$resultat = 'L\'adresse email '.$email.' existe d&eacute;j&agrave;,<br />veuillez en saisir une autre et recommencer l\'inscription..';
						}
					}
					else {
						$resultat = 'L\'adresse email saisi n\'est pas valide, <br />veuillez recommencer l\'inscription.';
					}
				}
				else {
					$resultat = 'L\'identifiant saisi existe d&eacute;j&agrave;,<br />veuillez en choisir un autre et recommencer l\'inscription.';
				}
			}
			else {
				$resultat = 'Le champ &quot;Saisir un Mot de Passe&quot; et le champ &quot;Resaisir un Mot de Passe&quot; doivent &ecirc;tre identiques, <br />veuillez recommencer l\'inscription.';
			}
		}
		else {
			$resultat = 'Vous devez remplir tout les champs, <br />veuillez recommencer l\'inscription.';
		}
		return $resultat;
	}
	// creation du profil
	public static function profil($identifiant, $email, $pass) {
		$pass = Cryptage::crypter($pass);
		$resultat = Bdd::connectBdd()->prepare(INSERT.MEMBREZ.PROFIL);
		$resultat -> bindParam(':pseudo', $identifiant);
		$resultat -> bindParam(':email', $email);
		$resultat -> bindParam(':pass', $pass);
		$resultat -> execute();
	}
	// creation de la protection du profil
	public static function protect($pseudo) {
		$id = Membre::recupId($pseudo);
		$resultat = Bdd::connectBdd()->prepare(INSERT.ACCESPROFILZ.INSCRIPTION);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
	}
	// creation du message de bienvenue
	public static function message($pseudo) {
		$id = Membre::recupId($pseudo);
		$idexp = '2';
		$titre = 'Bienvenue et Profil';
		$date = time();
		$message = 'Bienvenue dans votre espace membre<br />Pensez &agrave; mettre a jour votre profil';
		$resultat = Bdd::connectBdd()->prepare(INSERT.MESSAGEZ.BIENVENUE);
		$resultat -> bindParam(':id_exp', $idexp);
		$resultat -> bindParam(':id_dest', $id);
		$resultat -> bindParam(':titre', $titre);
		$resultat -> bindParam(':date', $date);
		$resultat -> bindParam(':message', $message);
		$resultat -> execute();
	}
	// activation du membre
	// recuperation de la methode d'activation du site
	// puis activation du membre
	public static function activer($pseudo) {
		$activation = Bdd::connectBdd()->prepare(SELECT.ALL.ACTIVATION.METHODEACTIV);
		$activation -> execute();
		$methode = $activation -> fetch(PDO::FETCH_ASSOC);
		switch($methode['id']) {
			case 1 :
			Activation::activationAuto($pseudo);
			$resultat = 'Votre inscription est termin&eacute;e, vous pouvez maintenant vous connecter.<br /><a href="'.URLSITE.'/index.php">Connexion</a>';
			break;
				
			case 2 :
			Activation::activationMail($pseudo);
			$resultat = 'Votre inscription est termin&eacute;e, un email de confirmation viens de vous &ecirc;tre envoy&eacute;,<br />pensez a v&eacute;rifier vos spams.';
			break;	
				
			case 3 :
			$resultat = 'Votre inscription est termin&eacute;e, un administarteur ou un mod&eacute;rateur doit la valider,<br />un email de confirmation vous sera envoy&eacute; d&egrave;s que se sera effectu&eacute;,<br />pensez a v&eacute;rifier vos spams.';
			break;	
		}
		return $resultat;
	}
	
} // Fin de la classe d'inscription

###########################################################################################

// La classe connexion membre
class Connexion {
	
	// fonction de deconnexion
	// ecrasement des session dans un tableau
	// destruction du tableau
	// 		Si une page de redirection est choisi
	//			redirection vers la page
	public static function deconnexion($redirection) {
		$_SESSION = array();
		session_destroy();
		if(!empty($redirection)) {
			redirection(URLSITE.'/'.$redirection);
		}
	}
	// mot de passe oublier
	// Si l'email est valide
	// 		Si l'email existe dans la bdd
	// 			creation d'un nouveau mot de passe
	// 			enregistrement du nouveau mot de passe
	// 			Si l'envoie de l'email avec nouveau mot de passe est ok
	//				retourne message d'information
	//			Sinon
	//				retourne erreur de l'envoie
	//		Sinon
	//			retourne email existe pas dans la bdd
	// Sinon
	// Retourne email nn valide
	public static function passOubli($email) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$verifMail = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.EMAIL);
			$verifMail -> bindParam(':email', $email);
			$verifMail -> execute();
			if($verifMail -> rowCount() !== 1) {
				$donnee = $verifMail -> fetch(PDO::FETCH_ASSOC);
				$newPass = Cryptage::chaine(8);
				$cryptPass = Cryptage::crypter($newPass);
				$enregistrePass = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.MAJPASS.EMAIL);
				$enregistrePass -> bindParam(':newPass', $cryptPass);
				$enregistrePass -> bindParam(':email', $email);
				$enregistrePass -> execute();
				//               *************************                //
				$headers ='From: "'.$donnee['nom'].' '.$donnee['prenom'].'"'.$email.''."\n";
				$headers .='Reply-To: '.MAILSITE.''."\n";
				$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
				$headers .='Content-Transfer-Encoding: 8bit'; 
				$sujet = "Nouveau mot de passe pour ".NOMSITE;
				$message = 'Bonjour '.$donnee['pseudo'].','."\n\n";
				$message .= "Voici votre nouveau mot de passe : ".$newPass."\n\n";
				$message .= 'Cordialement,'."\n";
				$message .= NOM_SITE.'.'."\n";
				if(mail(MAIL_SITE, $sujet, $message, $headers)) {
					return 'Un nouveau mot de passe viens de vous &ecirc;tre envoy&eacute;,<br />pensez &agrave; v&eacute;rifiez vos spams.';
				}
				else {
					return 'Erreur lors de l\'envoie de votre mot de passe.';
				}
			}
			else {
				return 'L\'adresse email '.$email.' n\'existe pas,<br />veuillez en saisir une autre et recommencer.';
			}
		}
		else {
			return 'L\'adresse email saisi n\'est pas valide.';
		}
	}
	// fonction de connexion des membres
	// Si verification du captcha => ok, et que l'identifiant et le mot de passe sont postes
	// 		Si login existe 
	//			Si mot de passe est ok 
	//				Creation de la session
	//				Enregistrement du jeton de connexion
	//				Redirection vers page au choix
	//					-> membre, moderateur, administrateur
	//			Si mot de passe faux => retourne faux
	// 		Si login existe pas => retourne faux
	// Si le captcha est faux => retourne faux
	public static function connexionCreate() {
		if(Captcha::captchaVerif() AND !empty($_POST['login']) AND !empty($_POST['pass'])) {
			if(Connexion::verifLogin($_POST['login'])) {
				if(Connexion::verifPass($_POST['pass'], $_POST['login'])) {
					$_SESSION['id'] = Membre::recupId($_POST['login']);
					$_SESSION['jeton'] = Connexion::jeton($_POST['login']);
					Connexion::niveau($_POST['login']);
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	// Fonction de verification que l'identifiant existe dans la bdd
	public static function verifLogin($login) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.LOGIN);
		$resultat -> bindParam(':login', $login, PDO::PARAM_STR, 50);
		$resultat -> execute();
		if($resultat -> rowCount() === 1) {
			return true;
		}
		else {
			return false;
		}
	}
	// Function de verification du mot de passe
	public static function verifPass($pass, $login) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.LOGIN);
		$resultat -> bindParam(':login', $login, PDO::PARAM_STR, 50);
		$resultat -> execute();
		$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
		if(Cryptage::crypter($pass) === $donnee['password']) {
			return true;
		}
		else {
			return false;
		}
	}
	// La fonction de gestion des jetons de connexion lors de la connexion d'un membre
	// Si il esiste un jeton de connexion appertenant au membre qui se connecte avec la meme adresse ip
	// 	-> mise a jour de la date de connexion dans la table des jetons de connexion
	//  -> retourne le jeton
	// Si il n'existe pas 
	// 	-> creation d'un jeton de connexion
	// 	-> enregistrement du jeton
	//  -> retourne le jeton
	public static function jeton($login) {
		$id = Membre::recupId($login);
		$ip = Ip::get_ip();
		$date = time();
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETON.JETONCONNEXION);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> bindParam(':ip', $ip);
		$resultat -> execute();
		if($resultat -> rowCount() === 1) {
			$donnee = $resultat->fetch(PDO::FETCH_ASSOC);
			$id = Membre::recupId($login);
			$maj = Bdd::connectBdd()->prepare(UPDATE.JETONZ.JETONDATE.JETONMEMBRE);
			$maj -> bindParam(':id', $id);
			$maj -> bindParam(':date', $date);
			$maj -> execute();
			return $donnee['jeton'];
		}
		else {
			$jeton = Cryptage::crypter(Cryptage::chaine(10));
			$insert = Bdd::connectBdd()->prepare(INSERT.JETONZ.JETONVALUES);
			$insert -> bindParam(':id', $id) ; 
			$insert -> bindParam(':jeton', $jeton) ;
			$insert -> bindParam(':ip', $ip);
			$insert -> bindParam(':date', $date);
			$insert -> execute();
			return $jeton;
		}
	}
	// Fonction de recuperation du niveau du membre
	// 	3 possibilite -> Membre, moderateur, administrateur
	//                ****************
	// Verification que le membre est actif
	// Si actif -> verification du niveau du membre
	// 		Redirection -> Membre, moderateur, administrateur
	// Si banni
	// 		-> redirection vers page d'information
	// Si pas actif
	// 		Recherche de la methode d'activation des membres
	//		-> activation auto -> retourne la fonction au debut
	// 		-> activation par mail -> envoie le mail d'activation puis redirige vers une page d'information
	// 		-> activation maunel -> redirige vers une page d'information
	public static function niveau($login) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.LOGIN);
		$resultat -> bindParam(':login', $login, PDO::PARAM_STR, 50);
		$resultat -> execute();
		$donnee = $resultat->fetch(PDO::FETCH_ASSOC);
		if($donnee['activation'] === '1') {
			switch($donnee['niveau']) {
				case 1 :
				$_SESSION['niveau'] = '1'; 
				$redirect = redirection(URLSITE.'/membre/index.php');
				break;
				
				case 2 :
				$_SESSION['niveau'] = '2';
				$redirect = redirection(URLSITE.'/moderateur/index.php');
				break;
				
				case 3 :
				$_SESSION['niveau'] = '3';
				$redirect = redirection(URLSITE.'/administrateur/index.php');
				break;
			}
		}
		elseif($donnee['activation'] === '5') {
			$redirect = redirection(URLSITE.'/banni.php');
		}
		else {
			$activation = Bdd::connectBdd()->prepare(SELECT.ALL.ACTIVATION.METHODEACTIV);
			$activation -> execute();
			$methode = $activation->fetch(PDO::FETCH_ASSOC);
			switch($methode['id']) {
				case 1 :
				Activation::activationAuto($login);
				return Connexion::niveau($login);
				break;
				
				case 2 :
				Activation::activationMail($login);
				$redirect = redirection(URLSITE.'/activationMail.php');
				break;	
				
				case 3 :
				$redirect = redirection(URLSITE.'/activationAdmin.php');
				break;	
			}
		}
		return $redirect;
	}
	
} // Fin de la classe de connexion membre

###########################################################################################

// La classe activation
class Activation {
	
	// fonction activation automatique
	public static function activationAuto($login) {
		$activ = '1';
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.ACTIVMEMBRE.LOGIN);
		$resultat -> bindParam(':login', $login);
		$resultat -> bindParam(':activer', $activ);
		$resultat -> execute();
	}
	// fonction activation par email
	// Si un mail d'activation a deja ete envoye
	// 		recuperation du jeton d'activation
	// Sinon
	//		creation d'un jeton d'activation 
	//		et enregistrement dans la bdd
	// Si le mail est envoye 
	// 		retourne vrai
	// Sinon
	//		retourne faux
	public static function activationMail($login) {
		$id = Membre::recupId($login);
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETONMAIL.IDMEMBRE);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		if($resultat -> rowCount() === 1) {
			$donnee = $resultat->fetch(PDO::FETCH_ASSOC);
			$jeton = $donnee['jeton'];
		}
		else {
			$jeton = Cryptage::crypter(Cryptage::chaine(10));
			$insert = Bdd::connectBdd()->prepare(INSERT.JETONMAILZ.JETONMAILVALUES);
			$insert -> bindParam(':id', $id, PDO::PARAM_INT, 11);
			$insert -> bindParam(':jeton', $jeton);
			$insert -> execute();
		}
		if(Activation::activationEnvoiMail($login, $jeton)) {
			return true;
		}
		else {
			return false;
		}
	}
	// envoie du mail d'activation
	public static function activationEnvoiMail($login, $jeton) {
		$headers ='From: "'.Membre::info($login, 'nom').' '.Membre::info($login, 'prenom').'"'.Membre::info($login, 'email').''."\n";
		$headers .='Reply-To: '.MAILSITE.''."\n";
		$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
		$headers .='Content-Transfer-Encoding: 8bit'; 
		$sujet = "Activation de l'espace membre ".NOMSITE;
		$message = 'Bonjour '.Membre::info($login, 'pseudo').','."\n\n";
		$message .= "Voici votre lien d'activation pour l'espace membre ".NOMSITE." : ".URLSITE."activation.php?securite=".$jeton.". ";
		$message .= 'Cliquez sur ce lien ou copier-le et coller-le dans votre navigateur.'."\n\n\n";
		$message .= 'Cordialement,'."\n";
		$message .= NOM_SITE.'.'."\n";
		mail(MAIL_SITE, $sujet, $message, $headers);
	}
	// verification du jeton d'activation
	public static function activationVerife($jeton) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETONMAIL.JETONACTIVATION);
		$resultat -> bindParam(':jeton', $jeton);
		$resultat -> execute();
		if($resultat -> rowCount() === 1) {
			$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
			Activation::activationAuto($donnee['login']);
			return true;
		}
		else {
			return false;
		}
	}
	
} // Fin de la classe d'activation

###########################################################################################

// La classe de protection des espaces -> membre, moderateur et administrateur
class ProtectEspace {
	
	// protection de l'espace membre
	// Verification que les parametres de sessions existent
	// $id => $_session['id']
	// $captcha => $_session['captcha']
	// $jeton=> $_session['jeton']
	// $niveau => $_session['niveau']
	// verification que le niveau n'est pas different de 1
	// Si il y a une erreur
	// 		redirection vers la page de deconnexion
	// Sinon
	//		Verification que le jeton de connexion appartient bien au membre connecte
	//		Si ce n'est pas le cas
	//			redirection vers la deconnexion
	// 		Sinon 
	//			Si le membre est banni
	//				Redirection vers la page d'information de bannissement
	//			Sinon
	//				Retourne Vrai
	public static function membre($id, $captcha, $jeton, $niveau) {
		if(empty($id) OR empty($captcha) OR empty($jeton)) {
			redirection(URLSITE.'/deconnexion.php');
		}
		else {
			if($niveau !== '1') {
				redirection(URLSITE.'/deconnexion.php');
			}
			$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETON.JETONSESSION);
			$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
			$resultat -> bindParam(':jeton', $jeton);
			$resultat -> execute();
			if($resultat -> rowCount() !== 1) {
				redirection(URLSITE.'/deconnexion.php');
			}
			else {
				if(Membre::info($id, 'activation') === '5') {
					redirection(URLSITE.'/banni.php');
				}
				return true;
			}
		}
	}
	// protection de l'espace moderateur
	// Verification que les parametres de sessions existent
	// $id => $_session['id']
	// $captcha => $_session['captcha']
	// $jeton=> $_session['jeton']
	// $niveau => $_session['niveau']
	// verification que le niveau n'est pas different de 2
	// Si il y a une erreur
	// 		redirection vers la page de deconnexion
	// Sinon
	//		Verification que le jeton de connexion appartient bien au moderateur connecte
	//		Si ce n'est pas le cas
	//			redirection vers la deconnexion
	// 		Sinon 
	//			Si le membre est banni
	//				Redirection vers la page d'information de bannissement
	//			Sinon
	//				Retourne Vrai
	public static function moderateur($id, $captcha, $jeton, $niveau) {
		if(empty($id) OR empty($captcha) OR empty($jeton)) {
			redirection(URLSITE.'/deconnexion.php');
		}
		else {
			if($niveau !== '2') {
				redirection(URLSITE.'/deconnexion.php');
			}
			$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETON.JETONSESSION);
			$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
			$resultat -> bindParam(':jeton', $jeton);
			$resultat -> execute();
			if($resultat -> rowCount() !== 1) {
				redirection(URLSITE.'/deconnexion.php');
			}
			else {
				if(Membre::info($id, 'activation') === '5') {
					redirection(URLSITE.'/banni.php');
				}
				return true;
			}
		}
	}
	// protection de l'espace administrateur
	// Verification que les parametres de sessions existent
	// $id => $_session['id']
	// $captcha => $_session['captcha']
	// $jeton=> $_session['jeton']
	// $niveau => $_session['niveau']
	// verification que le niveau n'est pas different de 3
	// Si il y a une erreur
	// 		redirection vers la page de deconnexion
	// Sinon
	//		Verification que le jeton de connexion appartient bien a l'administrateur connecte
	//		Si ce n'est pas le cas
	//			redirection vers la deconnexion
	// 		Sinon 
	//			Si le membre est banni
	//				Redirection vers la page d'information de bannissement
	//			Sinon
	//				Retourne Vrai
	public static function administrateur($id, $captcha, $jeton, $niveau) {
		if(empty($id) OR empty($captcha) OR empty($jeton)) {
			redirection(URLSITE.'/deconnexion.php');
		}
		else {
			if($niveau !== '3') {
				redirection(URLSITE.'/deconnexion.php');
			}
			$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETON.JETONSESSION);
			$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
			$resultat -> bindParam(':jeton', $jeton);
			$resultat -> execute();
			if($resultat -> rowCount() !== 1) {
				redirection(URLSITE.'/deconnexion.php');
			}
			else {
				if(Membre::info($id, 'activation') === '5') {
					redirection(URLSITE.'/banni.php');
				}
				return true;
			}
		}
	}
	// compte le nombre de jeton de connexion pour le membre
	public static function compteJeton($id) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETON.JETONMEMBRE);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		return '<a href="listeJeton.php">Il y a '.$resultat -> rowCount().' adresse(s) ip qui se connecte(nt) &agrave; votre espace membre.</a>';
	}
	// Liste des jeton de connexion du membre
	public static function listeJeton($id) {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETON.JETONMEMBRE);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		while($jeton = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$liste .= '<tr>
					<td align="center">Le '.date('d/m/Y', $jeton['date']).' &agrave; '.date('H:i:s', $jeton['date']).'</td>
					<td align="center">'.$jeton['ip_connexion'].'</td>
					<td align="center">
					<form method="post" action="">
					<input type="hidden" value="'.$jeton['id'].'" name="id_jeton">
					<input type="submit" value="Supprimer" name="supprime_connexion" class="input" />
					</form>
					</td>
				</tr>';
		}
		return $liste;
	}
	// effacer un jeton de connexion
	public static function deleteJeton($id) {
		$resultat = Bdd::connectBdd()->prepare(DELETE.JETON.ID);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
	}
	
}

###########################################################################################

// La classe Membre
class Membre {
	//Fonction de recuperation de l'id d'un membre
	public static function recupId($login) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.LOGIN);
		$resultat -> bindParam(':login', $login, PDO::PARAM_STR, 50);
		$resultat -> execute();
		$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
		return $donnee['id'];
	}
	// Fonction de recuperation des infos membre
	// $id => id du membre
	// $info => information qu l'on veux
	public static function info($id, $info) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.ID);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		$infoMembre = $resultat -> fetch(PDO::FETCH_ASSOC);
		return $infoMembre[$info];
	}
	// protection affichage information membre
	public static function protectInfo($id, $info) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.ACCESPROFIL.IDMEMBRE);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
		if($donnee[$info] === '1') {
			$affiche = Membre::info($id, $info);
		}
		else {
			$affiche = 'Non disponible';
		}
		return $affiche;
	}
	// changer autorisation d'une information du profil
	// deux choix :
	// 		-> Rendre visible aux autres membres
	//		-> Cacher l'information aux autres membres
	//  		***************************
	public static function profilVisibilite($id, $info) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.ACCESPROFIL.IDMEMBRE);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
		if($donnee[$info] === '1') {
			$maj = '0';
		}
		else {
			$maj = '1';
		}
		$update = Bdd::connectBdd()->prepare(UPDATE.ACCESPROFILZ.' SET '.$info.MAJACCESPROFIL.IDMEMBRE);
		$update -> bindParam(':maj', $maj);
		$update -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$update -> execute();
		redirection('profil.php');
	}
	// visibilite d'une information d'un membre
	public static function visibilite($id, $info) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.ACCESPROFIL.IDMEMBRE);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
		if($donnee[$info] === '1') {
			return 'Cacher';
		}
		else {
			return 'Rendre Visible';
		}
	}
	// Mise a jour du profil du membre
	public static function majProfil($id, $naissance, $genre, $nom, $prenom, $email, $facebook, $twister, $site, $tel, $adresse, $cp, $ville, $mailing, $description) {
		$description = filter_var($description, FILTER_SANITIZE_STRING);
		$description = nl2br($description);
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.MAJPROFIL);
		$resultat -> bindParam(':email', $email);
		$resultat -> bindParam(':tel', $tel);
		$resultat -> bindParam(':adresse', $adresse);
		$resultat -> bindParam(':cp', $cp);
		$resultat -> bindParam(':ville', $ville);
		$resultat -> bindParam(':genre', $genre);
		$resultat -> bindParam(':naissance', $naissance);
		$resultat -> bindParam(':nom', $nom);
		$resultat -> bindParam(':prenom', $prenom);
		$resultat -> bindParam(':facebook', $facebook);
		$resultat -> bindParam(':twister', $twister);
		$resultat -> bindParam(':site', $site);
		$resultat -> bindParam(':description', $description);
		$resultat -> bindParam(':mailing', $mailing);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		redirection('profil.php');
	}
	// changer de mot de passe
	public static function newPass($id, $passActuel, $newPassUn, $newPassDe) {
		if(!empty($passActuel) AND !empty($newPassUn) AND !empty($newPassDe)) {
			if($newPassUn === $newPassDe) {
				$verifPass = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.ID);
				$verifPass -> bindParam(':id', $id, PDO::PARAM_INT, 11);
				$verifPass -> execute();
				$dataPass = $verifPass -> fetch(PDO::FETCH_ASSOC);
				if($dataPass['password'] === Cryptage::crypter($passActuel)) {
					$newPass = Cryptage::crypter($newPassUn);
					$majPass = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.MAJPASS.ID);
					$majPass -> bindParam(':newPass', $newPass);
					$majPass -> bindParam(':id', $id, PDO::PARAM_INT, 11);
					if($majPass -> execute()) {
						$resultat = 'Votre mot de passe a &eacute;t&eacute; chang&eacute; avec succ&egrave;s.';
					}
					else {
						$resultat = 'Une erreur est survenue pendant la mise &agrave; jour de votre mot de passe.';
					}
				}
				else {
					$resultat = 'Vous n\'avez pas saisi correctement votre mot de passe actuel,<br />veuillez recommencer.';
				}
			}
			else {
				$resultat = 'Les champs &quot;Votre nouveau mot de passe&quot; et &quot;Saisir &agrave; nouveau le mot de passe&quot; doivent &ecirc;tre identiques,<br />veuillez recommencer.';
			}
		}
		else {
			$resultat = 'Pour changer de mot de passe vous devez remplir tout les champs,<br />veuillez recommencer.';
		}
		return $resultat;
	}
	
} // Fin de la classe Membre

###########################################################################################

// La classe Message
class Message {
	
	// Verification que le message envoye ne contient pas de mots interdits
	// Mots interdits -> insultes et language sms
	// si le message ne contient pas de mots interdit 
	// 		retourne vrai
	// sinon
	//		retourne faux
	public static function interdit($message=NULL) {
	// Liste des 899 mots interdits dans l'espace membre
	// 		-> insultes
	// 		-> language SMS
	// Vous pouvez allonger cette liste en mettant ( | ) sans espace entre chaque mot interdit
	$motInterdit = "/\b(anus|baise|baisee|baisent|baiser|baises|baisé|baisée|baisées|baisés|baiz|bande de tâches|bander|barez-vous|barrez-vous-batard|batarde|batardes|batards|bite|bites|bitte|bittes|bondage|bondages|bonnasse|bonnasses|bordel|bordels|branle|branler|branles|branlette|branlettes|branlé|branlés|bâtard|bâtarde|bâtardes|bâtards|bèz|c o n|c o*n|c o^n|c*o n|c*o*n|c*on|c^o n|c^o^n|caca|cacas|casse-toi|cassez-vous|chatte|chiasse|chie|chient|chier|chié|chiées|chiés|clitau|clito|co n|co*n|cocu|cocus|con|con nard|con nards|conar|conard|conarde|conardes|conards|conasse|conasses|connar|connard|connarde|connardes|connards|connasse|connasses|conne|Connerie|Conneries|connes|cons|couille|couilles|couye|couyes|creve|crève|cul|culs|cuni|cunilingus|de ta mer|de ta mere|de ta mèr|de ta mère|debil|debile|debiles|débil|débile|débiles|echangisme|emerde|emerdent|emerder|emerdeur|emerdeurs|emerdeuse|emerdeuses|emerdé|emerdée|emerdés|emmerde|emmerdent|emmerder|emmerdeur|emmerdeurs|emmerdeuse|emmerdeuses|emmerdé|emmerdée|emmerdés|en cul|en cule|en culer|en cules|encule|enculer|encules|enculé|enculés|enfoiré|enfoirée|enfoirées|enfoirés|et ta mere|et ta mère|exta|f o ck|f o k|F U C K|f u ck|f.uck|f_u_c_k|faire mettre|fcuk|fcvk|fela tion|felation|fella tion|fellation|fI_Ick|fl_lck|fo ck|foc k|fock|foutoir|foutoire|foutre|foutrement|fu c k|fu ck|fu.ck|fuc|fuc.k|FUCK|fuk|fuque|fuuck|fuuuck|fuuuuck|fuuuuuck|fvck|féla tion|féla tions|félation|félations|gouine|gouines|gouinne|gouinnes|groniasse|groniasses|k o n|k o*n|k o^n|k o_n|k*o n|k*o*n|k*on|k^o n|k^o^n|k_o n|k_o_n|ko n|ko*n|kon|konasse|konasses|konnasse|konnasses|kons|Lesbien|Lesbiene|Lesbienes|lesbienne|Lesbiens|Lesbo|Lesbos|maso|masturbator|masturbe|masturber|masturbé|masturbée|masturbées|masturbés|meeerdes|meeerdeux|meerdes|meerdeux|merdes|merdeux|morveuse|morveuses|morveux|nasi|nasis|nazi|nazis|negre|negres|negrillon|negrillons|negro|negros|nibard|nibards|nichon|nichons|nik|nike|nique|niquer|niqué|niquée|niquées|niqués|negre|negres|negro|negros|negresse|négresse|nègre|nègres|négrillon|négrillons|négro|négros|ordure|ordures|p u t a i n|p u t a i n s|partouse|partouses|partouze|partouzes|pd|pdd|pddd|pdddd|pddddd|pdddddd|pddddddd|pds|pedale|pedales|pede|pederaste|pederastes|pedes|penis|pennis|petasse|petasses|phuck|pignouf|pignoufette|pi|noufettes|pignoufs|pisse|pissee|pissees|pisser|pisses|pissé|pissée|pissées|pissés|plouc|ploucs|plouk|plouks|porno|pornos|pouffiass|pouffiasse|pouffiasses|poufiasse|pouf­fiass|pouf­fiasse|pouf­fiasses|Prostitue|Prostituee|Prostituees|Prostitues|Prostitué|Prostituée|Prostituées|Prostitués|prout|put|put ain|put ains|put in|put ins|put1|putain|putains|pute|putes|putin|putins|putte|puttes|puttin|puttins|pédale|pédales|pédé|pédéraste|pédérastes|pédés|pénétration|pétasse|pétasses|s e x|s e x e|s e x*e|s e xe|s e*x|s ex|s ex e|s ex*e|s exe|sado|salau|salaud|salauds|salaus|salaut|salauts|sale arabe|sallo|sallop|sallopard|sallopards|sallope|sallopes|salloppard|salloppards|salloppe|salloppes|sallos|sallot|sallots|salo|salop|salopard|salopards|salope|salopes|saloppard|saloppards|saloppe|saloppes|salos|salot|salots|se x|se*x|sex|sex e|sex*e|sexe|shit|skinhead|sodomie|sodomise|sodomisee|sodomisees|sodomisent|sodomiser|sodomises|sodomisé|sodomisée|sodomisées|sodomisés|sperm|sperme|spermes|suce|suck|tete de noeud|tetes de noeud|tête de noeud|têtes de noeud|va te faire|va te fer|va te fere|va te fèr|va te fère|vagin|vagins|zizi|zizis|1e|1st|1dispo|1posibl|1diféren|1trec|1ternet|1vit|1mn|2min|2ri1|2l8|2labal|2m1|2mand|2van|2vanc|4me|5pa|6gar|6garet|6né|6nema|6T|7adir|7ad|10ko|ab1to|akro|a2m1|af'r|afr|aJ|aG|éD|alé|AR|aPero|a+|apré|aprè|aprem|aprè-mi10|apré-mi10|areT|ariv|a12c4|asap|avan|avanC|ayé|abiT|azar|aniv|aK|aps|avc|avk|azar|AL1DI|ard|admin|ADMIN|ATK|arf|balaD|bavar|bavarD|bi1|bi1sur|bi1to|bizz|bap|bsr|boC|blèm|B|b1|bc|Bdo|BG|bj|bocou|bogos|bye|cé|cad|c b1|c sa|c cho|c 2 labal|c mal1|CT|chanG|capou|chuis|chanmé|CriE|C|camé|cam|came|Cdla|celib|celibatR|chi1|Clib|cok1|cokin|cokine|cok1e|colR|comen|dico|cc|colok|condé|dak|danC|ds|D6D|DpenC|dê|dS100|DzSPré|Dzolé|dsl|DtST|diskuT|douT|d1gue|daron|D|daronne|darone|deuspi|dico|die|DEF|écouT|empr1T|enfR|en+|épaT|éxagR|exClen|exQzé|exiG|éziT|Er|E|enkor|entouK|entouka|epaT|ErE|ErEze|fRfet|fiR|meuf|fliP|francè|FR|frR|fr8|foto|FM|FMloJ|F|fb|frero|foo|fliKé|flik|fone|fonetel|gan|Gen|Gnial|gré|glnD|GraV|G la N|GPTléplon|G|gova|gater6|gd|gde|Gnial|grav|gro|Gséré|GG|HT|H|hard|hl|IR|isTrik|ID|ImaJn|I|ie|irl|jalou|jamé|j'le sav|jenémar|jSpR ktu va bi1|jtm|je t'M|j'tapLdkej'pe|jeteléDjadi|jT|jr|JuG|J|jaten|jme|jsai|jsui|jtem|jtaim|Kdo|keum|Kfar|Kfé|Kl1|Knon|Kc|klR|koQ|kEr|komanD|Kom|komencava|koncR|kontST|kruL|karaT|ke|kL|kLq1|kelkun|keske|keske C|kekina|kestion|ki|kil|koi|koa|kwa|koi29|K|KS|kisdé|kif|jtkif|k7|kan|Ksos|LcKc|lol|l1di|lakL|lekL|l8|lH|l'S tomB|LC|L|LVL|ll|mek|magaz1|m1tNan|mnt|mè|kaze|malad|mal1|manG|mat1|max|mm|ménaG|mR|mê|msg|mne|m jvb|MDR|moy1|muscQ|muscu|muzik|muzic|M|m'man|MP|msg|ml|NRV|néCsR|nRvE|nc|no|nb|nombrE|nouvL|nouvo|NRJ|N|news|ns|ok1|oQne|Ojourd8|ojourd'8|ouf|orEr|otL|OQP|Ô|oZ|ouvR|O|oci|oreur|ou1j|ouinj|OMG|partut|partt|paC|péyé|pRturB|pE|piG|poa|po1|poz|pr|pk|prtan|prtant|preC|pb|P|p'pa|ptdr|POULAGA|PANAM|PANAME|poto|pr|ppr|pti|ptite|plon|qoa|qd|quiT|Q|QG|reuch|remps|rapl|ra|rejo1|rdv|répt|rstp|rep|resto|retard|réu|réucir|ri1|rafr|ras|ru|r|reuf|savapa|sniiif|snif|slt|slt cav ?|savoar|semN|stp|sk8|seur|spor|strC|S|sked|SKEUD|tR|tarD|tps|Tê|ti2|tle +bo|tpa fâché|TT|tabitou|2day|tjr|tt|tr1|trankil|taf|tafer|tu vi1 2m1 ?|T|Tci|tsss|ts|utilizé|U|vazi|Vlo|vR|vi1|vs|VoyaG|vrMen|V|VIP|W|WE|W.E|wesh|WTF|wé|wi|wy|X|X-trem|Xtrem|xpldr|Xcité|Xcit|xd|xplorer|xplozé|xploz|xplor|yo|y|é|ye|yè|ya|yâ|Z|zN|ziva|zonmé)\b/ui";
		$message = str_replace("'", "", $message);
		if(!empty($message)) {
			if(preg_match($motInterdit, $message)) {
				return false;
			}
			else {
				return true;
			}
		}
		else {
			return true;
		}
	}
	// nombre de nouveau message du membre connecte
	public static function nouveauNb($id) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MESSAGE.NBNEW);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		if($resultat -> rowCount() === 0) {
			return 'Vous n\'avez aucun nouveau message';
		}
		else {
			return 'Vous avez '.$resultat -> rowCount().' nouveau(x) message(s).';
		}
	}
	// liste des messages du membre
	// liste a vide
	// recherche des messages adresses au membre connecte et non efface par le membre
	// Dans une boucle 
	// 		Si le message est deja lu 
	//			image lu
	// 		Sinon
	//			image non lu
	//      **********************
	// 		affichage du ou des messages
	// Fin de la boucle
	//      **********************
	// si la liste n'est pas vide 
	//		retourne la liste des messages
	// Sinon
	// 		retourne vous n'avez aucun message
	public static function liste($id) {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MESSAGE.MESSAGELISTE);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			if($donnee['lu'] === '1') {
				$image = '<img src="'.URLSITE.'/design/image/Lu.png" width="24" height="24" align="absmiddle">';
			}
			else {
				$image = '<img src="'.URLSITE.'/design/image/Non_Lu.png" width="24" height="24" align="absmiddle">';
			}
			$liste .= '<tr>
			<td>'.$image.'</td>
			<td align="center">Le '.date('d/m/Y', $donnee['timestamp']).' &agrave; '.date('H:i:s', $donnee['timestamp']).'</td>
			<td align="center"><a href="profil_membre.php?id='.$donnee['id_expediteur'].'">'.Membre::info($donnee['id_expediteur'], 'pseudo').'</a></td>
			<td align="center"><a href="message.php?id='.$donnee['id'].'">'.$donnee['titre'].'</a></td>
			</tr>';
		}
		if(!empty($liste)) {
			return $liste;
		}
		else {
			return '<tr><td align="center" colspan="4">Vous n\'avez aucun message</td></tr>';
		}
	}
	// Affiche le message recut
	public static function info($id, $info) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MESSAGE.ID);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
		return $donnee[$info];
	}
	// message lu
	public static function lu($id) {
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MESSAGEZ.LU.ID);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
	}
	// efface message
	public static function efface($id) {
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MESSAGEZ.EFFACE.ID);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
	}
	// envoie d'un message
	// Si le destinataire et ok
	//		Si le titre est ok
	//			Si le message est ok
	//				Si le message et le titre ne contiennent pas des mots interdits
	//					Nettoyage du message et du titre
	//					Enregistrement dans la bdd
	//					retourne Vrai
	//				Sinon
	//					retourne une erreur
	//			Sinon
	//				retourne une erreur
	//		Sinon
	//			retourne une erreur
	// Sinon
	//  	retourne une erreur
	public static function messageEnvoi($id_exp, $destinataire, $titre, $message) {
		if(!empty($destinataire)) {
			if(!empty($titre)) {
				if(!empty($message)) {
					if(Message::interdit($message)) {
						$message = nl2br(filter_var($message, FILTER_SANITIZE_STRING));
						$titre = filter_var($titre, FILTER_SANITIZE_STRING);
						$date = time();
						$resultat = Bdd::connectBdd()->prepare(INSERT.MESSAGEZ.MESSAGEINSERT);
						$resultat -> bindParam(':id_exp', $id_exp, PDO::PARAM_INT, 11);
						$resultat -> bindParam(':id_dest', $destinataire, PDO::PARAM_INT, 11);
						$resultat -> bindParam(':titre', $titre);
						$resultat -> bindParam(':date', $date);
						$resultat -> bindParam(':message', $message);
						$resultat -> execute();
						return 'Votre message est envoy&eacute;';
					}
					else {
						return 'Votre message ou votre titre contient du language SMS ou des mots interdits, veuillez recommencer.<br />'.$message;
					}
				}
				else {
					return 'Vous devez saisir un message.';
				}
			}
			else {
				return 'Vous devez saisir un titre au message.';
			}
		}
		else {
			return 'Vous devez choisir un destinataire.';
		}
	}
	// Message a tous les membres
	public static function messageAll($titre, $message) {
		if(!empty($titre)) {
			if(!empty($message)) {
				$id = '2';
				$all = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.NOID);
				$all -> bindParam(':id', $id, PDO::PARAM_INT, 11);
				$all -> execute();
				$message = nl2br(filter_var($message, FILTER_SANITIZE_STRING));
				$titre = filter_var($titre, FILTER_SANITIZE_STRING);
				$date = time();
				$id_exp = '2';
				while($tous = $all -> fetch(PDO::FETCH_ASSOC)) {
					$destinataire = $tous['id'];
					$resultat = Bdd::connectBdd()->prepare(INSERT.MESSAGEZ.MESSAGEINSERT);
					$resultat -> bindParam(':id_exp', $id_exp, PDO::PARAM_INT, 11);
					$resultat -> bindParam(':id_dest', $destinataire, PDO::PARAM_INT, 11);
					$resultat -> bindParam(':titre', $titre);
					$resultat -> bindParam(':date', $date);
					$resultat -> bindParam(':message', $message);
					$resultat -> execute();
				}
				return 'Votre message est envoy&eacute;';
			}
			else {
				return 'Vous devez saisir un message.';
			}
		}
		else {
			return 'Vous devez saisir un titre au message.';
		}
	}
	// liste des messages envoyes
	public static function listeEnvoi($id) {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MESSAGE.IDEXP);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			if($donnee['lu']==1) {
				$image = '<img src="'.URLSITE.'/design/image/Lu.png" width="24" height="24" align="absmiddle">';
			}
			else {
				$image = '<img src="'.URLSITE.'/design/image/Non_Lu.png" width="24" height="24" align="absmiddle">';
			}
			if($donnee['effacer']==1) {
				$image = '<img src="'.URLSITE.'/design/image/faux.png" width="24" height="24" align="absmiddle">';
			}
			$liste .= '<tr>
					<td>'.$image.'</td>
					<td align="center">Le '.date('d/m/Y', $donnee['timestamp']).' &agrave; '.date('H:i:s', $donnee['timestamp']).'</td>
					<td align="center"><a href="profil_membre.php?id='.$donnee['id_destinataire'].'">'.Membre::info($donnee['id_destinataire'], 'pseudo').'</a></td>
					<td align="center">'.$donnee['titre'].'</td>
				</tr>';
		}
		if(!empty($liste)) {
			return $liste;
		}
		else {
			return '<tr><td align="center" colspan="4">Vous n\'avez pas envoy&eacute; de message</td></tr>';
		}
	}
	// liste des destinataires possible pour nouveau message
	public static function choixDestinataire($id) {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.NOID);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$liste .= '<option value="'.$donnee['id'].'">'.$donnee['pseudo'].'</option>';
		}
		return $liste;
	}
	
} // Fin de la classe message

###########################################################################################

// la classe smiley
class Smiley {
	
	// Affiche la liste des smileys
	public static function liste() {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.SMILEY);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$liste .= '<a href="javascript:void(0);" onClick="smiley(\'S'.$donnee['id'].'S\');"><img src="'.URLSITE.'/'.$donnee['url'].'" width="32" height="32" /></a>';
		}
		return $liste;
	}
	// Affiche les smileys dans le message
	public static function affiche($text) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.SMILEY);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$text = str_replace($donnee['bbcode'], '<img src="'.URLSITE.'/'.$donnee['url'].'" width="32" height="32" align="absmiddle" />', $text);
		}
		return $text;
	}
} // Fin de la classe smiley

###########################################################################################

// La classe Avatar
class Avatar {
	
	// affiche l'avatar du membre
	public static function membre($id) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.AVATAR.ID);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		$donnee = $resultat -> fetch(PDO::FETCH_ASSOC);
		return $donnee['url'];
	}
	// liste des avatars
	public static function liste() {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.AVATAR);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$liste .= '<div id="avatar"><img src="'.URLSITE.'/'.$donnee['url'].'" width="120" height="120" alt="Avatar" title="Avatar"><br /><input type="radio" value="'.$donnee['id'].'" name="id_avatar"></div>';
		}
		return $liste;
	}
	// mise a jour avatar
	public static function maj($id, $id_avatar) {
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.MAJAVATAR.ID);
		$resultat -> bindParam(':idAvatar', $id_avatar, PDO::PARAM_INT, 11);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		redirection('profil.php');
	}
	
} // Fin de la classe Avatar

###########################################################################################

// La classe Info sur le site
class InfoSite {
	
	// Nombre de membres
	public static function membreNb() {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE);
		$resultat -> execute();
		if($resultat -> rowCount() === 0) {
			return 'Il y a aucun membre inscrit';
		}
		else {
			return 'Il y a '.$resultat -> rowCount().' membres inscrits';
		}
	}
	// Liste des activations possible
	public static function listeActivation() {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.ACTIVATION);
		$resultat -> execute();
		while($option = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			if($option['activation'] === '1') {
				$liste .= '<option value="'.$option['id'].'" selected="selected">'.$option['mode'].'</option>';
			}
			else {
				$liste .= '<option value="'.$option['id'].'">'.$option['mode'].'</option>';
			}
		}
		return $liste;
	}
	// changer le mode d'activation
	public static function activationChange($id) {
		$activ = '1';
		$oui = Bdd::connectBdd()->prepare(UPDATE.ACTIVATIONZ.CHANGEMETOD.ID);
		$oui -> bindParam(':activ', $activ);
		$oui -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		if($oui -> execute()) {
			$desac = '0';
			$non = Bdd::connectBdd()->prepare(UPDATE.ACTIVATIONZ.CHANGEMETOD.NOI);
			$non -> bindParam(':activ', $desac);
			$non -> bindParam(':id', $id, PDO::PARAM_INT, 11);
			$non -> execute();
		}
		redirection(URLSITE.'/administrateur/activation.php');
	}
	// Liste des membres pour les administrateurs
	public static function listeMembre($id) {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.' ORDER BY activation ASC');
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$idMembre = $donnee['id'];
			$pseudo = $donnee['pseudo'];
			if($donnee['activation'] === '5') {
				$niveau = 'Banni';
				$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"> <input type="submit" name="debannir" value="D&eacute;bannir" class="input"> <input type="submit" name="supprim" value="Supprimer" class="input">';
			}
			elseif($donnee['activation'] === '0') {
				$niveau = 'Nouvel(le) inscrit(e)';
				$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"><input type="submit" name="inscription" value="Valider l\'inscription" class="input">';
			}
			else {
				switch($donnee['niveau']) {
					case 1 :
					$niveau = 'Membre';
					$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"> <input type="submit" name="bannir" value="Bannir" class="input"> <input type="submit" name="moderateur" value="Passer Mod&eacute;rateur" class="input">';
					break;
					case 2 :
					$niveau = 'Mod&eacute;rateur';
					$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"> <input type="submit" name="bannir" value="Bannir" class="input"> <input type="submit" name="membre" value="Repasser Membre" class="input">';
					break;
					case 3 :
					$niveau = 'Administrateur';
					$action = '';
					break;
					case 4 :
					$niveau = 'Cr&eacute;ateur';
					$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"> <input type="submit" name="supprim" value="Supprimer" class="input">';
					break;
				}
			}
			$liste .= '<tr>
					<td align="center"><a href="profil_membre.php?id='.$idMembre.'">'.$pseudo.'</a></td>
					<td align="center">'.$niveau.'</td>
					<td align="center"><form action="" method="post">'.$action.'</form></td>
				</tr>';
		}
		return $liste;
	}
	// Liste des membres pour les moderateurs
	public static function listeMembreModo($id) {
		$liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.' ORDER BY activation ASC');
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$idMembre = $donnee['id'];
			$pseudo = $donnee['pseudo'];
			if($donnee['activation'] === '5') {
				$niveau = 'Banni';
				$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"> <input type="submit" name="debannir" value="D&eacute;bannir" class="input">';
			}
			elseif($donnee['activation'] === '0') {
				$niveau = 'Nouvel(le) inscrit(e)';
				$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"><input type="submit" name="inscription" value="Valider l\'inscription" class="input">';
			}
			else {
				switch($donnee['niveau']) {
					case 1 :
					$niveau = 'Membre';
					$action = '<input type="hidden" value="'.$donnee['id'].'" name="id"> <input type="submit" name="bannir" value="Bannir" class="input">';
					break;
					case 2 :
					$niveau = 'Mod&eacute;rateur';
					$action = '';
					break;
					case 3 :
					$niveau = 'Administrateur';
					$action = '';
					break;
					case 4 :
					$niveau = 'Cr&eacute;ateur';
					$action = '';
					break;
				}
			}
			$liste .= '<tr>
					<td align="center"><a href="profil_membre.php?id='.$idMembre.'">'.$pseudo.'</a></td>
					<td align="center">'.$niveau.'</td>
					<td align="center"><form action="" method="post">'.$action.'</form></td>
				</tr>';
		}
		return $liste;
	}
	
} // Fin de la classe Info sur le site

###########################################################################################

// La classe administrateur
class Admin {
	
	// bannir un membre
	public static function bannir($id, $messagePost) {
		$activ = '5';
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.ACTIVMEMBRE.ID);
		$resultat -> bindParam(':activer', $activ);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		//				*******************				//
		$headers ='From: "'.Membre::info($login, 'nom').' '.Membre::info($login, 'prenom').'"'.Membre::info($login, 'email').''."\n";
		$headers .='Reply-To: '.MAILSITE.''."\n";
		$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
		$headers .='Content-Transfer-Encoding: 8bit'; 
		$sujet = "Bannissement l'espace membre ".NOMSITE;
		$message = 'Bonjour '.Membre::info($login, 'pseudo').','."\n\n";
		$message .= 'L\'administarteur du site '.NOMSITE.' vous a banni de l\'espace membre.'."\n\n";
		$message .= 'Voici la raison : '."\n";
		$message .= $messagePost."\n";
		$message .= 'Cordialement,'."\n";
		$message .= NOM_SITE.'.'."\n";
		mail(MAIL_SITE, $sujet, $message, $headers);
		//				*******************				//
		redirection(URLSITE.'/administrateur/listeMembre.php');
	}
	// debannir un membre
	public static function debannir($id) {
		$activ = '1';
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.ACTIVMEMBRE.ID);
		$resultat -> bindParam(':activer', $activ);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		redirection(URLSITE.'/administrateur/listeMembre.php');
	}
	// Passer un membre -> moderateur
	public static function passeModo($id) {
		$niveau = '2';
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.NIVEAU.ID);
		$resultat -> bindParam(':niveau', $niveau);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		redirection(URLSITE.'/administrateur/listeMembre.php');
	}
	// passer un moderateur -> membre
	public static function passeMembre($id) {
		$niveau = '1';
		$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.NIVEAU.ID);
		$resultat -> bindParam(':niveau', $niveau);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		redirection(URLSITE.'/administrateur/listeMembre.php');
	}
		
} // Fin de la classe administrateur
?>






























