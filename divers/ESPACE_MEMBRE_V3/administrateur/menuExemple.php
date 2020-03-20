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
'.MESSAGE::nouveauNb($_SESSION['id']).'
</td>
<td valign="top">';
// debut du menu
echo '<a href="index.php" class="bouton">Accueil</a>
<a href="" class="bouton">Messagerie</a>
<a href="" class="bouton">Profil</a>
<a href="" class="bouton">Nom_de_page</a>
<a href="" class="bouton">D&eacute;connexion</a>';
// fin du menu
echo '</td>
</tr>
</table>
</div>
</div>';
?>