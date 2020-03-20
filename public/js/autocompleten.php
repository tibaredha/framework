<?php
//autocompletion  necessite 03 fichiers
//01 js jquery.ui.autocomplete.js  derniere ligne doit etre configure
//02 css jquery.autocomplete.css
//03 php auto
//04 php Tapez une lettre : <input type="text" id="cim" /> derniere ligne doit etre configure id + chemin 

 
require '../../libs/config.php';

if(isset($_GET['q'])) 
{
	$q=htmlentities($_GET['q']);
	
	try 
	{
		$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die('I cannot connect to the database because: ' . mysql_error());
		$db = mysql_select_db(DB_NAME);
    } 
	catch(Exception $e) 
	{
		exit('Impossible de se connecter à la base de données.');
    } 

    mysql_query("SET NAMES 'UTF8' ");
	$sql=mysql_query("select DISTINCT NOM from deceshosp where NOM LIKE  '".$q."%' order by  NOM asc  ");
	while($row=mysql_fetch_array($sql))
	{
	echo trim($row['NOM'])."\n";
	}
}

?>