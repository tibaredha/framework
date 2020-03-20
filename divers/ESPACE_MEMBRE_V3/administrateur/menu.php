<?php
echo '<div id="header"> 
<div id="logo"></div>
<div id="menu">
<table align="center" width="100%">
<tr>
<td width="70%" valign="top">
<form method="post" action="">  Style :
<input type="submit" value="bleu" name="design" class="input" />
<input type="submit" value="violet" name="design" class="input" />
<input type="submit" value="vert" name="design" class="input" />
</form>
<br  />
Bonjour '.Membre::info($_SESSION['id'], 'nom').' '.Membre::info($_SESSION['id'], 'prenom').'
<br />
'.Message::nouveauNb($_SESSION['id']).'
<br />
'.ProtectEspace::compteJeton($_SESSION['id']).'
<br />
'.InfoSite::membreNb().'
</td>
<td valign="top">
<a href="index.php" class="bouton">Accueil</a>
<a href="aide.php" class="bouton">Aide</a>
<a href="listeMembre.php" class="bouton">Les Membres</a>
<a href="activation.php" class="bouton">Activation</a>
<a href="messagerie.php" class="bouton">Messagerie</a>
<a href="profil.php" class="bouton">Profil</a>
<a href="'.URLSITE.'/deconnexion.php" class="bouton">D&eacute;connexion</a>
</td>
</tr>
</table>
</div>
</div>';
?>