<?php
require '../../libs/config.php';
if(!empty($_POST["keyword"])) {	
$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db(DB_NAME,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql=mysql_query("SELECT * FROM deceshosp WHERE NOM like '" . $_POST["keyword"] . "%' ORDER BY NOM,PRENOM LIMIT 0,14");
// echo 'Total resultats : '. 
$totalmbr4=mysql_num_rows($sql);
// echo "</br>" ;
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
	echo "<tr>" ;echo "<th>Nom_Prénom_(Fils de ) (".$totalmbr4.")</th>" ;echo "</tr>" ;
	while($value=mysql_fetch_array($sql))
	{
	echo '<tr>';echo '<td align="left" >';echo $value['NOM'].'_'.$value['PRENOM'].'_'.$value['FILSDE'];echo '</td>';echo '</tr>';			
	}
	echo "<tr>" ;echo "<th>Nom_Prénom_(Fils de )</th>" ;echo "</tr>" ;
echo "</table>";
}
else
{
echo '<img id="image" src="'.URL.'deces.jpg">';
}

?>

