<?php 
session_start();
$connect = 'config.php';
if(!file_exists($connect)) {
	header('Location: install/');
}
include('header.php');
if(!empty($_POST['connect'])) {
	if(!Connexion::connexionCreate()) {
		echo '<center>
		<br />
		Redirection en cours ...
		<br />
		<img src="'.URLSITE.'/design/image/redirection.gif" width="150" height="30" />
		</center>';
		redirection(URLSITE.'/index.php', $time=10);
	}
}
else {
	$captcha = new Captcha;
	echo '<div id="header"> 
	<div id="logo"></div>
	<div id="menu">
	<form action="" method="post">
	<table align="center" class="form">
	<tr>
	<td colspan="3" align="center" class="titre_form">Connexion</td>
	</tr>
	<tr>
	<td valign="top" rowspan="4"><img src="design/image/connexion.png" width="70" height="70" /></td>
	</tr>
	<tr>
	<td>Identifiant : </td>
	<td><input type="text" name="login" /></td>
	</tr>
	<tr>
	<td>Mot de passe : </td>
	<td><input type="password" name="pass" /></td>
	</tr>
	<tr>
	<td>'.$captcha->captcha().'</td>
	<td><input type="text" name="captcha" /></td>
	</tr>
	<tr>
	<td colspan="3" align="center"><input type="submit" name="connect" value="Se Connecter" class="input" /></td>
	</tr>
	<tr>
	<td align="center" colspan="3"><br /><a href="inscription.php">S\'Inscrire</a> - <a href="new_passe.php">Mot de passe oubli&eacute;</a></td>
	</tr>
	</table>
	</form> 
	</div> 
	</div>';
}
include('footer.php');
?>