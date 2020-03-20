<?php session_start();
include('header.php');
include('menu.php');
if(!empty($_POST['supprime_connexion'])) {
	ProtectEspace::deleteJeton($_POST['id_jeton']);
}
echo '<div id="principal">
<div id="titre_principal">Liste des Connexions</div>
<br />
<table width="70%" align="center">
<tr>
<td align="center" width="40%" class="titre_form">Date</td>
<td align="center" class="titre_form">Adresse IP</td>
<td align="center" width="20%" class="titre_form">Action</td>
</tr>
'.ProtectEspace::listeJeton($_SESSION['id']).'
</table>
</div>';
include('footer.php');
?>