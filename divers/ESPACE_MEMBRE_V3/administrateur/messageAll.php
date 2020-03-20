<?php session_start();
include('header.php');
include('menu.php');
echo '<div id="principal">
<div id="titre_principal">Nouveau Message a Tous les Membres</div>
<br />
<script language="javascript">
function smiley(texte){
document.formulaire.message.value+=" "+texte;
} 
</script>
<form method="post" action="" name="formulaire">
<table width="90%" align="center">';
if(!empty($_POST['envoie_message'])) {
	extract($_POST);
	echo '<tr><td colspan="2">';
	echo Message::messageAll($titre, $message);
	echo '</td></tr>';
}
echo '
<tr>
<td align="right" class="titre_form">Titre du Message : </td>
<td><input type="text" name="titre" size="50" /></td>
</tr>
<tr>
<td align="right" class="titre_form" valign="top">Message : </td>
<td>
'.Smiley::liste().'
<br />
<textarea name="message" cols="60" rows="10"></textarea>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="envoie_message" value="Enoyer le Message" class="input" /></td>
</tr>
</table>
</form>
</div>';
include('footer.php');
?>