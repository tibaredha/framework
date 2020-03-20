<?php
error_reporting( E_ALL );

/** Verifier si le systeme est deja installe */
if (file_exists( 'configuration.php' ) && filesize( 'configuration.php' ) > 10) 
{
	header( "Location: index.php" );
	exit();
}
?>

<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bienvenue dans le module d'installation d'e-Journal !</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="install.css" type="text/css" />
</head>

<body>
<table align="center" border="0">
	<tr valign="middle">
		<td rowspan="4" width="200" height="450">
			<div>
				<div class="on">Bienvenue</div>
				<div class="off">Licence</div>
				<div class="off">Etape 1</div>
				<div class="off">Etape 2</div>
				<div class="off">Etape 3</div>
			</div>
		</td>
	</tr>
	<tr>
		<td width="600" height="50" class="title">Bienvenue dans le module d'installation d'e-Journal !</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="450"><p>Bienvenue dans le module d'installation d'e-journal, cet assistant va vous aider &#224; se connecter &#224; votre serveur de base de donn&#233;e pour cr&#233;er et configurer votre base MYSQL.</p><p> Veuillez suivre les diff&#233;rentes &#233;tapes et me signaler les &#233;ventuelles erreurs pour une prochaine version plus robuste ! </p>
		<p>Si le processus d'installation n'est pas initialis&#233; veuillez effacer manuellement le fichier de configuration &#224; cette adresse "http://nom_du_site/ejournal/configuration.php"</p></td>
	</tr>
	<tr valign="middle">
		<td width="600" height="50" align="center">
			<input name="Button" type="submit" class="button" value="Next >>" onclick="window.location='licence.php';" />
		</td>
	</tr>
</table>
</body>
</html>