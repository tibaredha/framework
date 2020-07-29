<?php 
//exemple pour le cahe de la class lib/cach
$drv='mysql';
$host='localhost';
$dbname='framework';
//********************************************************//
$dsn = ''.$drv.':dbname='.$dbname.';host='.$host.';charset=utf8'; //Data Source Name
$user = 'tibaredha';
$password = '030570';

$options = array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_CASE => PDO::CASE_NATURAL,
PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
);

$dbh = new PDO($dsn, $user, $password, $options);
$pdostat = $dbh->query('SELECT * from wil');
echo"<ul>";
				foreach ($pdostat->fetchAll(PDO::FETCH_ASSOC) as $ligne) //fetchAll affiche tous les enregistrements 
				{
				 echo"<li>"; echo $ligne['WILAYAS']  ; echo"</li>";
				 // echo "<p>" . $ligne['WILAYASAR'] . "\n" ;
				 // echo '<pre>';print_r($ligne );echo '</pre>';
				}
				echo"</ul>";
// echo"ghjgjhjgjjgjgj";
?>