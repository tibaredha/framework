<?php session_start();
include('header.php');
if(!empty($_POST['changeAvatar'])) {
	extract($_POST);
	Avatar::maj($_SESSION['id'], $id_avatar);
}
include('menu.php');
echo '<div id="principal">
<div id="titre_principal">Les Avatars</div>
<br />
<table width="80%" align="center">
<tr>
<td align="center">
<form method="post" action="">
<input type="submit" value="Valider l\'Avatar" name="changeAvatar" class="input">
<hr>
'.Avatar::liste().'
</form>
</td>
</tr>
</table>
</div>
<center>Les avatars sont sous licence, vous les trouverez ici : <a href="http://tux.crystalxp.net/">http://tux.crystalxp.net/</a></center>
';
include('footer.php');
?>