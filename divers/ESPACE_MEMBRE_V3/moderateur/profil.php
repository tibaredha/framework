<?php session_start();
include('header.php');
if(!empty($_POST['changeNaissance'])) {
	Membre::profilVisibilite($_SESSION['id'], 'naissance');
}
if(!empty($_POST['changeGenre'])) {
	Membre::profilVisibilite($_SESSION['id'], 'genre');
}
if(!empty($_POST['changeNom'])) {
	Membre::profilVisibilite($_SESSION['id'], 'nom');
}
if(!empty($_POST['changePrenom'])) {
	Membre::profilVisibilite($_SESSION['id'], 'prenom');
}
if(!empty($_POST['changeEmail'])) {
	Membre::profilVisibilite($_SESSION['id'], 'email');
}
if(!empty($_POST['changeFacebook'])) {
	Membre::profilVisibilite($_SESSION['id'], 'facebook');
}
if(!empty($_POST['changeTwister'])) {
	Membre::profilVisibilite($_SESSION['id'], 'twister');
}
if(!empty($_POST['changeSite'])) {
	Membre::profilVisibilite($_SESSION['id'], 'site');
}
if(!empty($_POST['changeTel'])) {
	Membre::profilVisibilite($_SESSION['id'], 'tel');
}
if(!empty($_POST['changeAdresse'])) {
	Membre::profilVisibilite($_SESSION['id'], 'adresse');
}
if(!empty($_POST['changeCp'])) {
	Membre::profilVisibilite($_SESSION['id'], 'cp');
}
if(!empty($_POST['changeVille'])) {
	Membre::profilVisibilite($_SESSION['id'], 'ville');
}
if(!empty($_POST['maj'])) {
	extract($_POST);
	if(Message::interdit($description)) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			Membre::majProfil($_SESSION['id'], $naissance, $genre, $nom, $prenom, $email, $facebook, $twister, $site, $tel, $adresse, $cp, $ville, $mailing, $description);
		}
		else {
			$err = 'Votre adresse email n\'est pas conforme,<br />veuillez recommencer la mise &agrave; jour de votre profil.';
		}
	}
	else {
		$err = 'Votre description contient du language sms ou des mots interdits,<br />veuillez recommencer la mise &agrave; jour de votre profil.';
	}
}
include('menu.php');
echo '<div id="principal">
<div id="titre_principal">Votre Profil '.Membre::info($_SESSION['id'], 'pseudo').'</div>
<form action="" method="post">
<table width="70%" align="center">';
if(!empty($err)) {
	echo '<tr>
<td colspan="3" align="center">
<br />
'.$err.'
<br /><br />
</td>
</tr>';
}
echo '<tr>
<td width="140px" rowspan="14" valign="top">
<input type="hidden" name="id_avatar" value="'.Membre::info($_SESSION['id'], 'id_avatar').'">
<img src="'.URLSITE.'/'.Avatar::membre(Membre::info($_SESSION['id'], 'id_avatar')).'" width="120" height="120" alt="Avatar" title="Avatar"><br />
<a href="avatar.php" class="input">&nbsp;Changer d\'Avatar&nbsp;</a> 
</td>
</tr><tr>
<td align="right" class="titre_form">Date de Naissance : </td>
<td>
<input type="text" name="naissance" value="'.Membre::info($_SESSION['id'], 'naissance').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'naissance').'" name="changeNaissance" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Genre : </td>
<td>
<input name="genre" type="radio" value="1" ';
if(Membre::info($_SESSION['id'], 'genre')=='1') { 
	echo 'checked'; 
}
echo '>Homme <input name="genre" type="radio" value="3" ';
if(Membre::info($_SESSION['id'], 'genre')=='3') { 
	echo 'checked'; 
}
echo '>Femme
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'genre').'" name="changeGenre" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre Nom : </td>
<td>
<input type="text" name="nom" value="'.Membre::info($_SESSION['id'], 'nom').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'nom').'" name="changeNom" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre Pr&eacute;nom :</td>
<td> 
<input type="text" name="prenom" value="'.Membre::info($_SESSION['id'], 'prenom').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'prenom').'" name="changePrenom" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre Email : </td>
<td>
<input type="text" name="email" value="'.Membre::info($_SESSION['id'], 'email').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'email').'" name="changeEmail" class="input">
</td></tr>
<tr>
<td align="right" class="titre_form">Votre pseudo Facebook : </td>
<td>
<input type="text" name="facebook" value="'.Membre::info($_SESSION['id'], 'facebook').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'facebook').'" name="changeFacebook" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre pseudo Twister : </td>
<td>
<input type="text" name="twister" value="'.Membre::info($_SESSION['id'], 'twister').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'twister').'" name="changeTwister" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre site internet : </td>
<td>
<input type="text" name="site" value="'.Membre::info($_SESSION['id'], 'site').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'site').'" name="changeSite" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre N&deg; de tel : </td>
<td>
<input type="text" name="tel" value="'.Membre::info($_SESSION['id'], 'tel').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'tel').'" name="changeTel" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre Adresse : </td>
<td>
<input type="text" name="adresse" value="'.Membre::info($_SESSION['id'], 'adresse').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'adresse').'" name="changeAdresse" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre Code Postal : </td>
<td>
<input type="text" name="cp" value="'.Membre::info($_SESSION['id'], 'cp').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'cp').'" name="changeCp" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Votre Ville : </td>
<td>
<input type="text" name="ville" value="'.Membre::info($_SESSION['id'], 'ville').'">
</td><td>
<input type="submit" value="'.Membre::visibilite($_SESSION['id'], 'ville').'" name="changeVille" class="input">
</td>
</tr><tr>
<td align="right" class="titre_form">Recevoir les emails de l\'espace membre : </td>
<td>
<select name="mailing">
<option value="1" ';
if(Membre::info($_SESSION['id'], 'mailing')=='1') { 
	echo 'checked'; 
} 
echo '>Oui</option>
<option value="0" ';
if(Membre::info($_SESSION['id'], 'mailing')=='0') { 
	echo 'checked'; }
echo '>Non</option>
</select>
</td>
</tr><tr>
<td align="right" colspan="4">
<a href="change_pass.php" class="input">&nbsp;Changer le mot de passe&nbsp;</a>
</td>
</tr><tr>
<td colspan="3"><p>&nbsp;</p></td>
</tr><tr>
<td colspan="3" align="center" class="titre_form">Votre Description :</td>
</tr><tr>
<td colspan="3" align="center">
<textarea name="description" cols="80" rows="5">'.str_replace('<br />', "\n",Membre::info($_SESSION['id'], 'description')).'</textarea>
</td>
</tr><tr>
<td colspan="3" align="center">
<br />
<input type="submit" value="Mettre &agrave; jour le Profil" name="maj" class="input">
<br /><br />
</td>
</tr>
</table>
</form>
</div>';
include('footer.php');
?>