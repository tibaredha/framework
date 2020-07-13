<?php
require './libs/config.php';
// $cfg = './libs/cfgg.php';
$cfg = './libs/cfg.php';
if(!file_exists($cfg)) {header('location: ./install/');}else {require $cfg;} 
spl_autoload_register(function ($class) {require LIBS . $class .".php";});
$app = new Bootstrap();


// echo "<pre>";
// print_r(get_loaded_extensions());
// print_r(get_extension_funcs("date"));
// echo "<pre/>";



//Toutes les informations reproduites dans cette rubrique (dépêches, photos, logos) sont protégées 
//par des droits de propriété intellectuelle détenus par dr tiba. 
//Par conséquent, aucune de ces informations ne peut être reproduite, modifiée, transmise, rediffusée, traduite, vendue, exploitée commercialement ou utilisée de quelque manière que ce soit sans l'accord préalable écrit de dr tiba. 
//dr tiba ne pourra être tenue pour responsable des délais, erreurs, omissions, qui ne peuvent être exclus ni des conséquences des actions ou transactions effectuées sur la base de ces informations.

