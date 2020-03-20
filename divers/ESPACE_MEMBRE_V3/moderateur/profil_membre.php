<?php session_start();
include('header.php');
include('menu.php');
switch(Membre::info($_GET['id'], 'niveau')) {
	case 1 : 
	$Niveau = 'Membre';
	break;
			
	case 2 : 
	$Niveau = 'Mod&eacute;rateur';
	break;
			
	case 3 : 
	$Niveau = 'Administrateur';
	break;
			
	case 4 :
	$Niveau = 'Banni';
	break;
}
echo '<div id="principal">
<div id="titre_principal">Profil de '.Membre::info($_GET['id'], 'pseudo').', il est '. $Niveau.'</div>
<br />
<table width="70%" align="center">
<tr>
<td align="right"><form action="" method="post">';
if(!empty($_POST['bannir'])) {
echo '<input type="hidden" name="id" value="'.$_POST['id'].'">
Veuillez saisir la raison du bannissement de '.Membre::info($_POST['id'], 'pseudo').' :
<textarea cols="80" rows="15" name="message">

</textarea><br />
<center><input type="submit" name="validBannir" value="Bannir" class="input"></center><hr>';
}
else {
	if(Membre::info($_GET['id'], 'activation') === '5') {
		echo '<input type="hidden" value="'.$_GET['id'].'" name="id"> <input type="submit" name="debannir" value="D&eacute;bannir" class="input">';
	}
	elseif(Membre::info($_GET['id'], 'activation') === '1' AND Membre::info($_GET['id'], 'niveau') !== '3') {
		echo  '<input type="hidden" value="'.$_GET['id'].'" name="id"> <input type="submit" name="bannir" value="Bannir" class="input">';
	}
	elseif(Membre::info($_GET['id'], 'activation') === '0') {
		echo  '<input type="hidden" value="'.$_GET['id'].'" name="id"><input type="submit" name="inscription" value="Valider l\'inscription" class="input">';
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
}
echo'</form></td>
</tr>
</table>
<table width="70%" align="center">
<tr>
<td width="140px" rowspan="14" valign="top">
<img src="'.URLSITE.'/'.Avatar::membre(Membre::info($_GET['id'], 'id_avatar')).'" width="120" height="120" alt="Avatar" title="Avatar">
</td>
</tr>
<tr>
<td align="right" class="titre_form" width="150px">Date de Naissance : </td>
<td>'.Membre::protectInfo($_GET['id'], 'naissance').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Genre : </td>
<td>'; 
if(Membre::protectInfo($_GET['id'], 'genre')=='3') { 
	echo 'Femme'; 
} 
else { 
	echo 'Homme'; 
} 
echo '</td>
</tr>
<tr>
<td align="right" class="titre_form">Nom : </td>
<td>'.Membre::protectInfo($_GET['id'], 'nom').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Pr&eacute;nom :</td>
<td>'.Membre::protectInfo($_GET['id'], 'prenom').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Email : </td>
<td>'.Membre::protectInfo($_GET['id'], 'email').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Pseudo Facebook : </td>
<td>'.Membre::protectInfo($_GET['id'], 'facebook').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Pseudo Twister : </td>
<td>'.Membre::protectInfo($_GET['id'], 'twister').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Site internet : </td>
<td>'.Membre::protectInfo($_GET['id'], 'site').'</td>
</tr>
<tr>
<td align="right" class="titre_form">N&deg; de tel : </td>
<td>'.Membre::protectInfo($_GET['id'], 'tel').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Adresse : </td>
<td>'.Membre::protectInfo($_GET['id'], 'adresse').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Code Postal : </td>
<td>'.Membre::protectInfo($_GET['id'], 'cp').'</td>
</tr>
<tr>
<td align="right" class="titre_form">Ville : </td>
<td>'.Membre::protectInfo($_GET['id'], 'ville').'</td>
</tr>
<tr>
<td colspan="3"><p>&nbsp;</p></td>
</tr>
<tr>
<td colspan="3" align="center" class="titre_form">Description :</td>
</tr>
<tr>
<td colspan="3" align="center">'.str_replace('<br />', "\n",Membre::info($_GET['id'], 'description')).'
</td>
</tr>
</table>
</div>';
include('footer.php');
?>
