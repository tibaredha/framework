<?php session_start();
include('header.php');
include('menu.php');
?>
<div id="principal">
	<div id="titre_principal"><a name="Menu">Menu Aide</a></div>
	<div align="center"><br />
    	<a href="#smiley">Information importante sur les smileys</a><br/>
    	<a href="#pageMembre">Cr&eacute;er une page membre</a><br />
        <a href="#infoMembre">Afficher les informations du membre</a><br />
        <br />
    </div>
</div>

<div id="principal">
	<div id="titre_principal"><a name="smiley">Information Importante sur les Smileys</a></div>
	Les Tux G1 sont sous licence LGPL <a href="http://www.gnu.org/licenses/lgpl.html" target="_blank">(lire la licence)</a><br>
	<br>
Questions/r&eacute;ponses :
<dl>
  <dt>Q : Je suis webmaster et je souhaite illustrer mon site avec un Tux G1, que dois-je faire?</dt>
  <dd>R : Rien ! Un Tux G1 est libre d'utilisation, vous pouvez l'utiliser comme bon vous semble ou m&ecirc;me le modifier.</dd>
  <dt>Q : Je suis une entreprise ou une association et je souhaite   utiliser un Tux G1 pour illustrer une affiche, un logiciel... que   dois-je faire ?</dt>
  <dd>R : Rien ! Un Tux G1 est libre d'utilisation, vous pouvez   l'utiliser comme bon vous semble ou même le modifier. Cependant, si vous   le modifiez, vous devez mettre à disposition les sources de votre   cr&eacute;ation. Vous avez l'obligation de redistribuer l'oeuvre sous licence   LGPL et de pr&eacute;ciser l'oeuvre d'origine.</dd>
  <dt>Q : Je suis professeur ou &eacute;tudiant et je souhaite illustrer un cours ou un expos&eacute; avec un Tux G1, que dois-je faire ?</dt>
  <dd>R : Rien ! Un Tux G1 est libre d'utilisation, vous pouvez l'utiliser comme bon vous semble ou m&ecirc;me le modifier.</dd>
</dl>
Les Tux G2 sont sous licence Creative Commons by-nc-sa <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.fr" target="_blank">(lire la licence)</a>.   Cette licence a &eacute;t&eacute; choisie afin de prot&eacute;ger le travail des auteurs de   Tux G2 des abus de certaines entreprises. Cependant, chacune des   conditions peut &ecirc;tre lev&eacute;e si vous obtenez l'autorisation de l'auteur ET   de CrystalXP. Le Tux G2 de base a &eacute;t&eacute; con&ccedil;u/cr&eacute;&eacute;/r&eacute;alis&eacute; par Overlord59   de l'&eacute;quipe CrystalXP.net. <br>
<br>
Questions/r&eacute;ponses :
<dl>
  <dt>Q : Je suis webmaster et je souhaite illustrer mon site avec un Tux G2, que dois-je faire?</dt>
  <dd>R : Vous devez pr&eacute;ciser explicitement sur votre site le nom   de l'auteur du Tux G2 (en dessous du Tux, en pied de page ou sur une   page "à propos" et vous devez ajoutez un lien vers <a href="http://tux.crystalxp.net/" target="_blank">http://tux.crystalxp.net/</a></dd>
</dl>
<center><a href="#Menu" class="input">&nbsp;Retour au menu de l'aide&nbsp;</a></center>
</div>

<div id="principal">
	<div id="titre_principal"><a name="pageMembre">Cr&eacute;ation d'une Page Membre</a></div>
Pour que vous puissiez utiliser les fonctions et que l'espace membre reste s&eacute;curis&eacute;, la nouvelle page que vous allez cr&eacute;er pour l'espace membre doit &ecirc;tre une page php, exemple: (nouvelle_page.php), et vous devez la placer dans le fichier membre.<br /><br />
<div class="bouton">Premi&egrave;re &Eacute;tape</div><br /><br />
Dans le fichier membre, ouvrez la page menu.php avec &eacute;diteur php ou avec le bloc-notes.<br />
Vous trouverez la partie suivante :<br />
<textarea cols="80" rows="6">
// debut du menu
echo '<a href="index.php" class="bouton">Accueil</a>
<a href="messagerie.php" class="bouton">Messagerie</a>
<a href="profil.php" class="bouton">Profil</a>
<a href="'.URLSITE.'/deconnexion.php" class="bouton">D&eacute;connexion</a>';
// fin du menu
</textarea><br />
C'est dans cette partie que vous devez rajouter le lien de votre nouvelle page.<br />
Voici ce que vous devez ajouter :<br />
<input type="text" value='<a href="lien_de_page.php" class="bouton">Nom_de_page</a>' size="80"><br />
Voici un exemple d'ajout d'une nouvelle page : <br />
<textarea cols="80" rows="7">
// debut du menu
echo '<a href="index.php" class="bouton">Accueil</a>
<a href="messagerie.php" class="bouton">Messagerie</a>
<a href="profil.php" class="bouton">Profil</a>
<a href="lien_de_page.php" class="bouton">Nom_de_page</a>
<a href="'.URLSITE.'/deconnexion.php" class="bouton">D&eacute;connexion</a>';
// fin du menu
</textarea><br /><br />
<div class="bouton">Deuxi&egrave;me &Eacute;tape</div><br /><br />
Pour commencer la cr&eacute;ation de votre page, copier et collez le code ci-dessous dans votre nouvelle page.<br />
<textarea cols="80" rows="8">
&lt;?php session_start();
include('header.php');
include('menu.php');
?&gt;

&lt;?php
include('footer.php');
?&gt;
</textarea><br />
<a href="exemple.php" target="_blank">Voir le resultat</a><br /><br />
Pour ajouter le cadre principal copiez et collez le code suivant :<br />
<input type="text" value='<div id="principal">Votre texte ici</div>' size="80"><br />
Voici comment :<br />
<textarea cols="80" rows="8">
&lt;?php session_start();
include('header.php');
include('menu.php');
?&gt;
&lt;div id="principal"&gt;Votre texte ici&lt;/div&gt;
&lt;?php
include('footer.php');
?&gt;
</textarea><br />
<a href="exemple1.php" target="_blank">Voir le resultat</a><br /><br />
Pour ajouter un titre a votre cadre principal copiez et collez le code suivant :<br />
<input type="text" value='<div id="titre_principal">Le titre</div>' size="80"><br />
Voici comment :<br />
<textarea cols="80" rows="10">
&lt;?php session_start();
include('header.php');
include('menu.php');
?&gt;
&lt;div id="principal"&gt;
&lt;div id="titre_principal"&gt;Le titre&lt;/div&gt;
Votre texte ici&lt;/div&gt;
&lt;?php
include('footer.php');
?&gt;
</textarea><br />
<a href="exemple2.php" target="_blank">Voir le resultat</a><br /><br />
Vous pouvez cr&eacute;er plusieurs cadres, voici un exemple :<br />
<textarea cols="80" rows="15">
&lt;?php session_start();
include('header.php');
include('menu.php');
?&gt;
&lt;div id="principal"&gt;
&lt;div id="titre_principal"&gt;Le titre&lt;/div&gt;
Votre texte ici&lt;/div&gt;

&lt;div id="principal"&gt;
&lt;div id="titre_principal"&gt;Le titre&lt;/div&gt;
Votre texte ici&lt;/div&gt;

&lt;?php
include('footer.php');
?&gt;
</textarea><br />
<a href="exemple3.php" target="_blank">Voir le resultat</a><br /><br />
<center><a href="#Menu" class="input">&nbsp;Retour au menu de l'aide&nbsp;</a></center>
</div>

<div id="principal">
<div id="titre_principal"><a name="infoMembre">Afficher les Informations du Membre</a></div>
Sur une page de l'espace membre vous pouvez afficher les information de celui qui la consulte, en utilisant une classe ainsi qu'une fonction le tout en php.<br />
Voici le code a utiliser, choisissez suivant vos besoin : 
<ul>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'nom'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'prenom'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'pseudo'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'email'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'naissance'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'tel'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'adresse'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'cp'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'ville'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'facebook'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'twister'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'site'); ?&gt;" size="60"></li>
<li><input type="text" value="&lt;?php echo Membre::info($_SESSION['id'], 'description'); ?&gt;" size="60"></li>
</ul>
<center><a href="#Menu" class="input">&nbsp;Retour au menu de l'aide&nbsp;</a></center>
</div>

<?php
include('footer.php');
?>















