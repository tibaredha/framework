<?php session_start();
include('header.php');
Connexion::deconnexion($redirection = "");
echo '<div id="header"> 
<div id="logo"></div>
<div id="menu">
Vous avez &eacute;t&eacute; banni(e) par l\'administrateur ou un mod&eacute;rateur du site.
<br /><br />
Vous devez avoir re&ccedil;u un mail expliquant la raison de votre bannissement.
<br />
Pensez &agrave; regarder dans vos spams.
</div>
</div>';
include('footer.php');
?>