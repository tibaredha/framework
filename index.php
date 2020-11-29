<?php
require './libs/config.php';
// $cfg = './libs/cfgg.php';
$cfg = './libs/cfg.php';
if(!file_exists($cfg)) {header('location: ./install/');}else {require $cfg;} 
spl_autoload_register(function ($class) {require LIBS . $class .".php";});
$app = new Bootstrap();
?>