<?php
error_reporting( E_ALL );

/** Verifier si le systeme est deja installe */
if (file_exists( '../configuration.php' ) && filesize( '../configuration.php' ) > 10) 
{
	header( "Location: ../index.php" );
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
<script  type="text/javascript">
<!--
function check()
{
	// Pour valider le formulaire
	var formValid=false;
	var f = document.form;

	if ( f.DBhostname.value == '' ) {
		alert('<?php echo ('Veuillez remplir le nom su serveur de la BD') ?>');
		f.DBhostname.focus();
		formValid=false;
	} else if ( f.DBuserName.value == '' ) {
		alert('<?php echo ('Veuillez remplir le nom utilisateur de la BD') ?>');
		f.DBuserName.focus();
		formValid=false;	
	} else if ( f.DBname.value == '' ) {
		alert('<?php echo ('Veuillez remplir le nom de la BD') ?>');
		f.DBname.focus();
		formValid=false;
	} else if ( confirm('<?php echo ('Est ce que vous etes sur des informations remplies ?') ?>')) {
		formValid=true;
	} 
	return formValid;
}
//>
</script>
</head>

<body onload="document.form.DBhostname.focus();">
<form action="install.php" method="post" name="form" id="form" onsubmit="return check();">
<table align="center" border="0">
	<tr valign="middle">
		<td rowspan="4" width="200" height="450">
			<div>
				<div class="off">Bienvenue</div>
				<div class="off">Licence</div>
				<div class="on">Etape 1</div>
				<div class="off">Etape 2</div>
				<div class="off">Etape 3</div>
			</div>
		</td>
	</tr>
	<tr>
		<td width="600" height="50" class="title">Bienvenue dans le module d'installation d'e-Journal !</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="450">	
	  		<div class="sub_title">Configuration de la base de donn&#233;es MySQL</div>
				<table width="70%" align="center" border="0">
					<tr>
						<td width="50%">Nom du serveur (Host)</td>
						<td width="50%"><input class="inputbox" type="text" name="DBhostname" /></td>
					</tr>
					<tr>
						<td>Nom utilisateur</td>
						<td><input class="inputbox" type="text" name="DBuserName" /></td>
					</tr>
					<tr>
						<td >Mot de passe</td>
						<td><input class="inputbox" type="password" name="DBpassword" /></td>
					</tr>
					<tr>
						<td >V&#233;rifier le mot de passe</td>
						<td><input class="inputbox" type="password" name="DBverifypassword" /></td>
					</tr>
					<tr>
						<td >Nom de la BD</td>
						<td><input class="inputbox" type="text" name="DBname" /></td>
					</tr>
					<tr>
						<td><label for="DBSample">Remplir la base de donn&#233;es </label></td>
						<td><input type="checkbox" name="DBSample" id="DBSample" value="1" checked="true" /></td>
				</tr>
				</table>
		</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="50" align="center">
			<input class="button" type="submit" name="next" value="Next >>"/>
		</td>
	</tr>
</table>
</form>
</body>
</html>
