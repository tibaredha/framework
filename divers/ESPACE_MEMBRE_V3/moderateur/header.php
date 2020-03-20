<?php
include('../function.php');
ProtectEspace::moderateur($_SESSION['id'], $_SESSION['captcha'], $_SESSION['jeton'], $_SESSION['niveau']);
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Espace Membres JejeScript</title>';
	  
include('../design/JejeScriptCss.php');

echo '</head>
<body>';
?>