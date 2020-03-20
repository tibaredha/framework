<?php session_start();
include('header.php');
Connexion::deconnexion($redirection = "");
echo '<div id="header"> 
<div id="logo"></div>
<div id="menu">
Vous compte doit &ecirc;tre activ&eacute; par l\'administrateur ou un mod&eacute;rateur du site.
<br /><br />
Vous allez recevoir un mail quand cela sera effectu&eacute;.
<br />
Pensez &agrave; regarder dans vos spams.
</div>
</div>';
include('footer.php');
?>