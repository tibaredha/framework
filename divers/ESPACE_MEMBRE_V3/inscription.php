<?php
include('header.php');
echo '<div id="header">
<div id="logo"></div>
<div id="menu">
<table align="center" width="100%">
<tr>
<td align="center">
<h1>Incription</h1><br />
<form method="post" action="">  Style :<br />
<input type="submit" value="bleu" name="1" class="input" />
<input type="submit" value="violet" name="2" class="input" />
<input type="submit" value="vert" name="3" class="input" /></form>
</td>
</table>
</div>
</div>
<div id="principal">
<div id="titre_principal">Inscription</div>
<br />
<form action="" method="post">
<table width="80%" align="center">
<tr>
<td align="center" colspan="2">';
if(!empty($_POST['inscription'])) {
	extract($_POST);
	echo Inscription::inscrire($identifiant, $email, $passeUn, $passeDe);
}
echo '</td>
</tr>
<tr>
<td align="right" class="titre_form" width="40%">Choisir un identifiant : </td>
<td><input type="text" name="identifiant" size="50" /></td>
</tr>
<tr>
<td align="right" class="titre_form" width="40%">Votre email : </td>
<td><input type="text" name="email" size="50" /></td>
</tr>
<tr>
<td align="right" class="titre_form" width="40%">Saisir un Mot de Passe : </td>
<td><input type="text" name="passeUn" size="50" /></td>
</tr>
<tr>
<td align="right" class="titre_form" width="40%">Resaisir le Mot de Passe : </td>
<td><input type="text" name="passeDe" size="50" /></td>
</tr>
<tr>
<td colspan="2" align="center">
<br />
<input type="submit" value="Valider Inscription" name="inscription" class="input" />
<br /><br />
</td>
</tr>
</table>
</form>
</div>';

include('footer.php');
?>