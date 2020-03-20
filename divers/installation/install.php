<?php
error_reporting( E_ALL );

/** Verifier si le systeme est deja installe */
if (file_exists( '../configuration.php' ) && filesize( '../configuration.php' ) > 10) 
{
	header( "Location: ../index.php" );
	exit();
}

//recuperation des paramatres de connexion
$DBhostname = $_POST['DBhostname'];
$DBuserName = $_POST['DBuserName'];
$DBpassword = $_POST['DBpassword'];	
$DBverifypassword = $_POST['DBverifypassword'];
$DBname  	= $_POST['DBname'];
$DBSample	= intval( $_POST['DBSample'], 0 );

//etat de la BD ("1" DB cree, "0" sinon !)
$DBCreation = 0;

//etat de la population de la BD ("1" structure de la BD cree, "0" sinon !)
$DBPopulationStructure=0;

//etat de la population de la BD ("1" BD remplie avec quelques donnees de base, "0" sinon !)
$DBPopulationSample=0;

//variable contenant les messages de sortie (erreur !)
global $erreur;

if (!$DBhostname || !$DBuserName || !$DBname) 
{
	$erreur = $erreur."Les informations de connexion &#224; la base de donn&#233;es ne sont pas valides ! \n ";
}

if ($DBpassword !== $DBverifypassword) 
{
	$erreur = $erreur."Veillez v&#233;rifier le mot de passe ! \n";
}

if (!($mysql_link = @mysql_connect( $DBhostname, $DBuserName, $DBpassword ))) 
{
	$erreur = $erreur."Le nom utilisateur et/ou le mot de passe et/ou le nom du serveur de la BD ne sont pas valides ! \n";
}

if($DBname == "") 
{
	$erreur = $erreur."Le nom de la base de donn&#233;e est vide ! \n";
}

if ($DBCreation == 1)
{
	$erreur = $erreur."<br /><b>La base de donn&#233;e a &#233;t&#233; d&#233;j&#224; cr&#233;e !!</b><br />";
}
else
{
	// creation de la BD
	$sql = "CREATE DATABASE `$DBname`";
	$mysql_result = mysql_query( $sql );
	$test = mysql_errno();

	if ($test <> 0 && $test <> 1007) 
	{
		$erreur = $erreur.("Une erreur est produite lors de la cr&#233;ation de la BD ". mysql_error());
		$DBCreation=0;
	}
	else
	{
		$DBCreation=1;
		$erreur = $erreur."<br /><b>Base de donn&#233;e cr&#233;e avec succes !</b><br />";
		
		populate_db($DBname,'db.sql');
		$DBPopulationStructure=1;
		$erreur = $erreur."<br /><b>Creation des tables de la base de donn&#233;e avec succes !</b><br />";
		
		if ($DBSample==1) 
		{
			populate_db($DBname,'sample.sql');
			$DBPopulationSample=1;
			
			$erreur = $erreur."<br /><b>La BD est rempli avec succes !</b><br />";
		}
		else
		{
		}
	}
}

// Les deux fonctions suivantes qui permettent de lancer un fichier SQL sur une BD ont ete reutilises !
function populate_db($DBname, $sqlfile='db.sql') 
{
	global $errors;

	mysql_select_db($DBname);
	mysql_query("SET NAMES 'utf8'");
	$mqr = @get_magic_quotes_runtime();
	@set_magic_quotes_runtime(0);
	$query = fread(fopen("sql/".$sqlfile, "r"), filesize("sql/".$sqlfile));
	@set_magic_quotes_runtime($mqr);
	$pieces  = split_sql($query);

	for ($i=0; $i<count($pieces); $i++) {
		$pieces[$i] = trim($pieces[$i]);
		if(!empty($pieces[$i]) && $pieces[$i] != "#") {
			$pieces[$i] = str_replace( "#__", "", $pieces[$i]);
			if (!$result = mysql_query ($pieces[$i])) {
				$errors[] = array ( mysql_error(), $pieces[$i] );
			}
		}
	}
}

function split_sql($sql) {
	$sql = trim($sql);
	$sql = ereg_replace("\n#[^\n]*\n", "\n", $sql);//preg_replace

	$buffer = array();
	$ret = array();
	$in_string = false;

	for($i=0; $i<strlen($sql)-1; $i++) {
		if($sql[$i] == ";" && !$in_string) {
			$ret[] = substr($sql, 0, $i);
			$sql = substr($sql, $i + 1);
			$i = 0;
		}

		if($in_string && ($sql[$i] == $in_string) && $buffer[1] != "\\") {
			$in_string = false;
		}
		elseif(!$in_string && ($sql[$i] == '"' || $sql[$i] == "'") && (!isset($buffer[0]) || $buffer[0] != "\\")) {
			$in_string = $sql[$i];
		}
		if(isset($buffer[1])) {
			$buffer[0] = $buffer[1];
		}
		$buffer[1] = $sql[$i];
	}

	if(!empty($sql)) {
		$ret[] = $sql;
	}
	return($ret);
}

?>
<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bienvenue dans le module d'installation d'e-Journal !</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="install.css" type="text/css"  />
<script  type="text/javascript">
<!--
function check()
{
	// Pour valider le formulaire
	var formValid=false;
	var f = document.form;

	if ( f.sitename.value == '' ) 
	{
		alert('<?php echo ('Veuillez remplir le nom votre e-Journal !') ?>');
		f.sitename.focus();
		formValid=false;
	}
	else if (f.adminmail.value == '')
	{
		alert('<?php echo ('Veuillez saisir un mail valide !') ?>');
		f.adminmail.focus();
		formValid=false;
	}
	else
	{
		formValid=true;
	}
 
	return formValid;
}
//>
</script>
</head>

<body>
<form action="finish.php" method="post" name="form" id="form" onsubmit="return check();">
<table align="center" border="1">
	<tr valign="middle">
		<td rowspan="4" width="200" height="450">
			<div>
				<div class="off">Bienvenue</div>
				<div class="off">Licence</div>
				<div class="off">Etape 1</div>
				<div class="on">Etape 2</div>
				<div class="off">Etape 3</div>
			</div>
		</td>
	</tr>
	<tr>
		<td width="600" height="50" class="title">Bienvenue dans le module d'installation d'e-Journal !</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="450">
			<?php echo("<div align=\"center\">".$GLOBALS['erreur']."</div>"); ?>
				<input type="hidden" name="DBhostname" value="<?php echo "$DBhostname"; ?>" />
				<input type="hidden" name="DBuserName" value="<?php echo "$DBuserName"; ?>" />
				<input type="hidden" name="DBpassword" value="<?php echo "$DBpassword"; ?>" />
				<input type="hidden" name="DBname" value="<?php echo "$DBname"; ?>" />
				<?php			
				if ($DBCreation==1)
				{
					echo "<br /><br /><div align=\"center\">";
					echo "Veillez choisir le nom d'e-Journal  :  ";
					echo "<input class=\"inputbox\" type=\"text\" name=\"sitename\" />";
					echo "<br />";
					echo "Veillez saisir un Mail valide:  ";
					echo "<input class=\"inputbox\" type=\"text\" name=\"adminmail\" />";
					echo "</div>";
				}
				?>
		</td>
	</tr>
	<tr valign="middle">
		<td width="600" height="50" align="center" colspan="2">
			<?php
			if ($DBCreation==1)
			{
				echo "<input name=\"Button\" type=\"submit\" class=\"button\" value=\"Next >>\" />";
			}
		else
			{
				echo "<input name=\"Button\" type=\"reset\" class=\"button\" value=\"<< Back\" onclick=\"window.location='data_base.php';\" />";
			}
				?>
		</td>
	</tr>
</table>
</form>
</body>
</html>