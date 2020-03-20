<?php
error_reporting( E_ALL );

/** Verifier si le systeme est deja installe */
if (file_exists( '../configuration.php' ) && filesize( '../configuration.php' ) > 10) 
{
	header( "Location: ../index.php" );
	exit();
}

//recuperation des paramatres de connexion
$DBname = $_POST['DBname'];
$DBhostname = $_POST['DBhostname'];
$DBuserName = $_POST['DBuserName'];
$DBpassword = $_POST['DBpassword'];
$sitename = $_POST['sitename'];
$adminmail = $_POST['adminmail'];
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
				<div class="off">Bienvenue</div>
				<div class="off">Licence</div>
				<div class="off">Etape 1</div>
				<div class="off">Etape 2</div>
				<div class="on">Etape 3</div>
			</div>
		</td>
	</tr>
	<tr>
		<td width="600" height="50" class="title">Bienvenue dans le module d'installation d'e-Journal !</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="450">
			<p>Enfin, votre e-Journal est correctement install&#233; ! la BD est cr&#233;e si vous avez choisi de populer la BD par les donn&#233;es par d&#233;fauts, vous pouvez maintennat vous connecter directement sur votre "e-Journal" et visualiser son contenu.</p>
			<p>Vous pouvez aussi vous connecter pour administrer votre syst&#232;me en utilisant la cl&#233; de connexion suivante (Login:<b>admin</b>) et (Mot de passe:<b>admin</b>).</p>
<?php 
if (file_exists( '../configuration.php' )) 
{
	$canWrite = is_writable( '../configuration.php' );
} 
else 
{
	$canWrite = is_writable( '..' );
}

$installdate = date("Y-m-d H:i:s");

$config = "<?php\n";
$config .= "\$Config_host = '$DBhostname';\n";
$config .= "\$Config_user = '$DBuserName';\n";
$config .= "\$Config_password = '$DBpassword';\n";
$config .= "\$Config_DBname = '$DBname';\n";
$config .= "\$Config_sitename = '$sitename';\n";
$config .= "\$Config_installdate = '$installdate';\n";
$config .= "\$Config_adminmail= '$adminmail';\n";
$config .= "?>";

if ($canWrite && ($fp = fopen("../configuration.php", "w"))) 
{
	fputs( $fp, $config, strlen( $config ) );
	fclose( $fp );
} 
else 
{
	$canWrite = false;
}

	mysql_connect($DBhostname, $DBuserName, $DBpassword);
	mysql_select_db($DBname);

	// creer l'administrateur systeme
	$query = "INSERT INTO `user`
(`user_type`, `user_pwd`, `user_nom`, `user_prenom`, `user_pseudo`, `user_email`, `user_lang`, `user_pref_cat`) VALUES
('A', 'admin', 'admin', 'admin', 'admin', '$adminmail', 'FR', 1);";
	mysql_query( $query );
?>
		</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="50" align="center">
<input name="Button" type="submit" class="button" value="Visualisation" onclick="window.location='../index.php';" />
<input name="Button" type="submit" class="button" value="Administration" onclick="window.location='../admin/index.php';" />
		</td>
	</tr>
</table>
</body>
</html>