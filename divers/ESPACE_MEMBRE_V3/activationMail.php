<?php session_start();
include('header.php');
Connexion::deconnexion($redirection = "");
echo '<div id="header"> 
<div id="logo"></div>
<div id="menu">
Vous devez activer votre compte.
<br /><br />
Vous devez avoir re&ccedil;u un mail expliquant comment faire.
<br />
Pensez &agrave; regarder dans vos spams.
</div>
</div>';
include('footer.php');
?>