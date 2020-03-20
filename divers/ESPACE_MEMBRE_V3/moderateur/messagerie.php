<?php session_start();
include('header.php');
include('menu.php');
echo '<div id="principal">
<div id="titre_principal">Messages Re&ccedil;us</div>
<table width="100%">
<tr>
<td align="center" colspan="4">
<a href="message_new.php" class="input">&nbsp;Nouveau message&nbsp;</a>
<a href="message_envoye.php" class="input">&nbsp;Messages Envoy&eacute;s&nbsp;</a>
<a href="messagerie.php" class="input">&nbsp;Messages Re&ccedil;us&nbsp;</a>
</td>
</tr>
<tr>
<td align="center" colspan="4">
<img src="'.URLSITE.'/design/image/Non_Lu.png" width="24" height="24" align="absmiddle"> Nouveaux messages
<img src="'.URLSITE.'/design/image/Lu.png" width="24" height="24" align="absmiddle"> Anciens messages
</td>
</tr>
<tr>
<td width="30px"></td>
<td align="center" class="titre_form" width="250px">Date</td>
<td align="center" class="titre_form" width="150px">Expediteur</td>
<td align="center" class="titre_form">Message</td>
</tr>
'.Message::liste($_SESSION['id']).'
</table>
</div>';
include('footer.php');
?>