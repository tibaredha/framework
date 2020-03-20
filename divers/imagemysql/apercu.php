<?php
if ( isset($_GET['id']) )
{
	$id = intval ($_GET['id']);
	$hote = 'localhost';
	$base = 'framework';
	$user = 'root';
	$pass = '';
	$cnx = mysql_connect($hote, $user, $pass) or die(mysql_error());
	$ret = mysql_select_db($base) or die(mysql_error());
	$req = "SELECT * FROM items WHERE img_id = " . $id;
	$ret = mysql_query ($req) or die (mysql_error ());
	$col = mysql_fetch_row ($ret);
    // header ("Content-type: " . $col[0]);
	
	
	if ( !$col[0] )
	{
		echo "Id d'image inconnu";
	} 
	else 
	{
	echo '<img src="data:jpeg;base64,'.base64_encode($col[5]).'" width="50%" height="50%" border="0" alt=""/>';
	}

} 
else 
{
echo "Mauvais id d'image";
}
?>


















