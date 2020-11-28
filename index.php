<?php
if(file_exists('./libs/config.php'))
{
	require './libs/config.php';	
}
else
{
	die('config.php was not found');
}
$app = new Bootstrap();
?>