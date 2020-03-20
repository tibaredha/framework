<?php
if(!empty($_POST['creer_admin'])) {
	extract($_POST);
	if(!empty($login) AND !empty($prenom) ANd !empty($nom) AND !empty($email) AND !empty($passe_1) AND !empty($passe_2)) {
		if($passe_1 === $passe_2) {
			include('../function.php');
			$pass = Cryptage::crypter($passe_1);
			$resultat = Bdd::connectBdd()->prepare("INSERT INTO `JejeScriptMembres` (`id`, `pseudo`,`password`, `email`, `tel`, `adresse`, `cp`, `ville`, `genre`, `naissance`, `nom`, `prenom`, `facebook`, `twister`, `site`, `description`, `id_avatar`, `mailing`, `activation`, `niveau`) VALUES ('', '".$login."', '".$pass."', '".$email."', '', '', '', '', '', '', '".$nom."', '".$prenom."', '', '', '', '', '', '', '1', '3');");
			$resultat -> execute();
			$acces = Bdd::connectBdd()->prepare("INSERT INTO `JejeScriptAccesFiches` (`id`, `id_membre`, `email`, `tel`, `adresse`, `cp`, `ville`, `genre`, `naissance`, `nom`, `prenom`, `facebook`, `twister`, `site`) VALUES('', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');");
			$acces -> execute();
			$ok = 'L\'Administrateur a &eacute;t&eacute; cr&eacute;&eacute;';
		}
		else {
			$er = 'Le champ &quot;Saisir un Mot de passe&quot; et le champ &quot;Encore le Mot de passe&quot; doivent &ecirc;tre identiques.';
		}
	}
	else {
		$er = 'Vous devez remplir tous le formulaire';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Installation Espace Membres JejeScript</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form method="post" action="../fin.php" id="form">
    	<br />
    	<table align="center" width="450">
        	<tr>
            	<td class="titre_form" align="center">Resultat</td>
            </tr>
            <tr>
            	<td align="center">
                <?php
				if(!empty($er)) {
					echo $er;
				}
				else {
					if(!empty($ok)) {
						echo $ok;
					}
				}
				?><br />
                </td>
            </tr>
            <?php
			if(!empty($ok)) {
			?>
            <tr>
            	<td class="titre_form" align="center">Etape 4 => Detruire le fichier d'installation</td>
            </tr>
            <tr>
            	<td align="center">
                <br />
                <input type="submit" name="Detruire" value="Detruire le fichier install" class="input" /><br /><br />
                </td>
            </tr>
            <?php
			}
			?>
        </table>
</form>

<form method="post" action="creer_admin.php" id="form">
    	<br />
    	<table align="center" width="450">
        	<tr>
            	<td class="titre_form" align="center" colspan="2">Etape 3 => Cr&eacute;ation de l'Administrateur</td>
            </tr>
            <tr>
            	<td align="right"><br />Identifiant : </td>
                <td><br /><input type="text" name="login" size="30" /></td>
            </tr>
            <tr>
            	<td align="right">Votre Pr&eacute;nom : </td>
                <td><input type="text" name="prenom" size="30" /></td>
            </tr>
            <tr>
            	<td align="right">Votre Nom : </td>
                <td><input type="text" name="nom" size="30" /></td>
            </tr>
            <tr>
            	<td align="right">Votre Email : </td>
                <td><input type="text" name="email" size="30" /></td>
            </tr>
            <tr>
            	<td align="right">Saisir un Mot de passe : </td>
                <td><input type="text" name="passe_1" size="30" /></td>
            </tr>
            <tr>
            	<td align="right">Encore le Mot de passe : </td>
                <td><input type="text" name="passe_2" size="30" /></td>
            </tr>
            <tr>
            	<td align="center" colspan="2"><br />
               <input type="submit" name="creer_admin" value="Cr&eacute;er l'Administrateur" class="input" />
                <br /><br /></td>
            </tr>
        </table>
    </form>
</body>
</html>