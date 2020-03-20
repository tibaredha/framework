<?php session_start();
include('header.php');
if(!empty($_POST['Activation'])) {
	InfoSite::activationChange($_POST['mode']);
}
include('menu.php');
echo '<div id="principal">
<div id="titre_principal">Configuration de l\'Espace Membre</div>
<br />
<form action="" method="post">
<table width="80%" align="center">
<tr>
<td align="right" class="titre_form" width="40%">Mode d\'Activation des Membres : </td>
<td>
<select name="mode">
<option>Choisir un mode d\'activation</option>
'.InfoSite::listeActivation().'
</select>
</td>
<td width="10%"><input type="submit" name="Activation" value="Valider" class="input"></td>
</tr>
</table>
</form>
</div>';
include('footer.php');
?>