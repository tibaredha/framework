<?php session_start();
include('header.php');
include('menu.php');
echo '<div id="principal">
<div id="titre_principal">Liste des Membres</div>
<br />
<table width="80%" align="center">';
if(!empty($_POST['bannir'])) {
	echo '<tr>
<td colspan="3">
<form action="" method="post">
<input type="hidden" name="id" value="'.$_POST['id'].'">
Veuillez saisir la raison du bannissement de '.Membre::info($_POST['id'], 'pseudo').' :
<textarea cols="80" rows="15" name="message">

</textarea><br />
<center><input type="submit" name="validBannir" value="Bannir" class="input"></center>
</form>
</td>
</tr>';
}
if(!empty($_POST['validBannir'])) {
	Admin::bannir($_POST['id'], $_POST['message']);
}
if(!empty($_POST['debannir'])) {
	Admin::debannir($_POST['id']);
}
if(!empty($_POST['inscription'])) {
	Activation::activationAuto(Membre::info($_POST['id'], 'pseudo'));
}
echo '<tr>
<td align="center" width="20%" class="titre_form">Membres</td>
<td align="center" width="20%" class="titre_form">Niveaux Membres</td>
<td align="center" class="titre_form">Actions</td>
</tr>
'.InfoSite::listeMembreModo($_SESSION['id']).'
</table>
</div>';
include('footer.php');
?>