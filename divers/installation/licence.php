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
<link rel="stylesheet" href="install.css" type="text/css"  />
<script type="text/javascript">
<!--
var obj;

function envoyer(el){
	obj=el;
	if (document.all || document.getElementById){
		for (i=0;i<obj.form.length;i++){
			var tempobj=obj.form.elements[i];
			if(tempobj.type.toLowerCase()=="submit")
				tempobj.disabled=!obj.checked;
		}
	}
}

function defaut(el){
	if (!document.all && !document.getElementById){
		if (window.obj && obj.checked)
			return true;
		else{
			alert("Veillez lire et accepter la licence pour poursuivre l'installation !");
			return false;
		}
	}
}
-->
	
</script>
</head>

<body onload="document.adminForm.next.disabled=true;">
<form action="data_base.php" method="post" name="adminForm" id="adminForm" onSubmit="return defaut(this)">
<table align="center" border="0">
	<tr valign="middle">
		<td rowspan="4" width="200" height="450">
			<div>
				<div class="off">Bienvenue</div>
				<div class="on">Licence</div>
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
		<td width="600" height="450">
				<div align="center">
					<iframe src="gpl.txt" class="licence" frameborder="0" scrolling="auto"> gpl</iframe>
				</div>

				<div align="center">
					<br />
					<input type="checkbox" name="agreecheck" id="agreecheck" class="inputbox" onClick="envoyer(this)" />
					<label for="agreecheck">J'accepte les termes de la licence GNU/GPL </label>
				</div>

		</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="50" align="center">
			<input class="button" type="submit" name="next" value="Next &gt;&gt;" disabled="disabled"/>
		</td>
	</tr>
</table>
</form>
</body>
</html>	