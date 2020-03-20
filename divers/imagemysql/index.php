<html>
<head>
<title>Stock d'images</title>
</head>
<body>
<h3>Envoi d'une image</h3>
<form enctype="multipart/form-data" action="#" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="250000" />
<input type="file" name="fic" size=50 />
<input type="submit" value="Envoyer" />
</form>


<?php
function transfert()
{
	$ret = false;
	$img_blob = '';
	$img_taille = 0;
	$img_type = '';
	$img_nom = '';
	$taille_max = 250000;
	$ret = is_uploaded_file($_FILES['fic']['tmp_name']);

	if (!$ret) 
	{
		echo "Problème de transfert";
		return false;
	} 
	else 
	{
		// Le fichier a bien été reçu
		$img_taille = $_FILES['fic']['size'];

		if ($img_taille > $taille_max) 
		{
		echo "Trop gros !";
		return false;
	    }
	}
	
    $hote = 'localhost';
	$base = 'framework';
	$user = 'root';
	$pass = '';
	$cnx = mysql_connect($hote, $user, $pass) or die(mysql_error());
	$ret = mysql_select_db($base) or die(mysql_error());
	$img_type = $_FILES['fic']['type'];
	$img_nom = $_FILES['fic']['name'];
	$img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
	$req = "INSERT INTO items (img_nom, img_taille, img_type, img_blob) VALUES ('" . $img_nom . "','" . $img_taille . "','" . $img_type . "','".addslashes($img_blob)."') "; 
	$ret = mysql_query ($req) or die (mysql_error ());
	return true;	
}

if (isset($_FILES['fic']))
{
 transfert();
}


$hote = 'localhost';
$base = 'framework';
$user = 'root';
$pass = '';
$cnx = mysql_connect($hote, $user, $pass) or die(mysql_error());
$ret = mysql_select_db($base) or die(mysql_error());
$req = "SELECT * FROM items ORDER BY img_nom";
$ret = mysql_query ($req) or die (mysql_error ());
while ( $col = mysql_fetch_row ($ret) )
{
echo "<a href=\"apercu.php?id=" . $col[0] . "\">" . $col[1] . "</a><br />";
// echo '<img src="'.$col[5].'" width="16" height="16" border="0" alt=""/>';
}
?>
<div>Icons made by <a href="https://www.flaticon.com/authors/roundicons" title="Roundicons">Roundicons</a> from <a href="https://www.flaticon.com/"     title="Flaticon">www.flaticon.com</a></div>


</body>
</html>