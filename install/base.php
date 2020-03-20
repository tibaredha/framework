<?php
include('function.php');
$Url_Site="http://localhost/framework";
$er = array();
$ok = array();


//Table membre
$membreTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptMembres` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`pseudo` varchar(50) NOT NULL,
`password` varchar(150) NOT NULL,
`email` varchar(150) NOT NULL,
`tel` varchar(14) NOT NULL DEFAULT '00.00.00.00.00',
`adresse` varchar(500) NOT NULL DEFAULT 'adresse',
`cp` varchar(5) NOT NULL DEFAULT '00000',
`ville` varchar(150) NOT NULL DEFAULT 'ville',
`genre` int(1) NOT NULL DEFAULT '1',
`naissance` varchar(10) NOT NULL DEFAULT '01/01/1900',
`nom` varchar(150) NOT NULL DEFAULT 'tiba',
`prenom` varchar(150) NOT NULL DEFAULT 'redha',
`facebook` varchar(150) NOT NULL DEFAULT 'facebook',
`twister` varchar(150) NOT NULL DEFAULT 'twister',
`site` varchar(150) NOT NULL DEFAULT 'site',
`description` text NOT NULL,
`id_avatar` int(10) NOT NULL DEFAULT '1',
`mailing` int(1) NOT NULL DEFAULT '1',
`activation` int(1) NOT NULL DEFAULT '0',
`niveau` int(1) NOT NULL DEFAULT '1',
`design` int(1) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");
try {$membreTable -> execute();$ok['a1'] = 'La Table Membres : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a1'] = 'Erreur Cr&eacute;ation : Table Membres.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}
$membreInsert = Bdd::connectBdd()->prepare("
INSERT INTO `JejeScriptMembres` (`id`, `pseudo`, `password`, `email`, `tel`, `adresse`, `cp`, `ville`, `genre`, `naissance`, `nom`, `prenom`, `facebook`, `twister`, `site`, `description`, `id_avatar`, `mailing`, `activation`, `niveau`, `design`) VALUES
(1, 'JejeScript', '', '', '', '', '', '', 1, '', '', '', '', '', '', 'Bonjour,\r\n\r\nJe suis le créateur de ce script d&#39;espace membre.\r\nCeci est un exemple de fiche membre.\r\nSi vous êtes l&#39;administrateur de cet espace membre, vous pouvez supprimer JejeScript.\r\n\r\nCordialement,\r\n\r\nJejeScript.', 152, 1, 1, 4, 1);");
try {$membreInsert -> execute();$ok['a2'] = 'Infos Table Membres : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a2'] = 'Erreur Information : Table Membres.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}
// Table Secure
$secureTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptSecure` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_membre` int(11) NOT NULL,
`jeton`  varchar(250) NOT NULL,
`ip_connexion`  varchar(50) NOT NULL,
`date`  varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");
try {$secureTable -> execute();$ok['a3'] = 'La Table Secure : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a3'] = 'Erreur Cr&eacute;ation : Table Secure.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}

//ActivationMail 
$activMailTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeSciptActivationMail` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_membre` int(11) NOT NULL,
`jeton` varchar(150) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");
try {$activMailTable -> execute();$ok['a4'] = 'La Table Activation Mail : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a4'] = 'Erreur Cr&eacute;ation : Table Activation Mail.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}

//AccesFiches
$accesFicheTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptAccesFiches` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_membre` int(11) NOT NULL,
`email` int(11) NOT NULL DEFAULT '1',
`tel` int(1) NOT NULL DEFAULT '0',
`adresse` int(1) NOT NULL DEFAULT '0',
`cp` int(1) NOT NULL DEFAULT '0',
`ville` int(1) NOT NULL DEFAULT '0',
`genre` int(1) NOT NULL DEFAULT '1',
`naissance` int(1) NOT NULL DEFAULT '0',
`nom` int(1) NOT NULL DEFAULT '0',
`prenom` int(1) NOT NULL DEFAULT '0',
`facebook` int(1) NOT NULL DEFAULT '0',
`twister` int(1) NOT NULL DEFAULT '0',
`site` int(1) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;");
try {$accesFicheTable -> execute();$ok['a5'] = 'La Table Acces Fiche : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a5'] = 'Erreur Cr&eacute;ation : Table Acces Fiche.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}
$accesFicheInsert = Bdd::connectBdd()->prepare("INSERT INTO `JejeScriptAccesFiches` (`id`, `id_membre`, `email`, `tel`, `adresse`, `cp`, `ville`, `genre`, `naissance`, `nom`, `prenom`, `facebook`, `twister`, `site`) VALUES
('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');");
try {$accesFicheInsert -> execute();$ok['a6'] = 'Infos Table Acces Fiche : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a6'] = 'Erreur Information : Table Acces Fiche.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}


//Activation
$activationTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptActivation` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`mode` varchar(150) NOT NULL,
`activation` int(1) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");
try {$activationTable -> execute();$ok['a7'] = 'La Table Activation : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a7'] = 'Erreur Cr&eacute;ation : Table Activation.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}
$activationInsert = Bdd::connectBdd()->prepare("
INSERT INTO `JejeScriptActivation` (`id`, `mode`, `activation`) VALUES
(1, 'aucune', 1),
(2, 'mail', 0),
(3, 'manuel', 0);");
try {$activationInsert -> execute();$ok['a8'] = 'Infos Table Activation : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a8'] = 'Erreur Information : Table Activation.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}



//Messagerie
$messageTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptMessagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `timestamp` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `lu` int(1) NOT NULL,
  `effacer` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;");
try {$messageTable -> execute();$ok['a9'] = 'La Table Message : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a9'] = 'Erreur Cr&eacute;ation : Table Message.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}
//
$messageInsert = Bdd::connectBdd()->prepare("
INSERT INTO `JejeScriptMessagerie` (`id`, `id_expediteur`, `id_destinataire`, `titre`, `timestamp`, `message`, `lu`, `effacer`) VALUES
('1', '1', '2', 'Installation r&eacute;ussie', '".time()."', 'Je vous remercie d\'avoir t&eacute;l&eacute;charg&eacute; cet espace membre,<br />si vous avez ce message c\'est que tout &agrave; fonctionn&eacute; lors de l\'installation.<br />PENSEZ A METTRE VOTRE PROFIL A JOURS<br /><br />NE R&Eacute;PONDEZ PAS &Agrave; CE MESSAGE.<br /><br />Cordialement, <br />JejeScript.', '0', '0');");
try {$messageInsert -> execute();$ok['a10'] = 'Infos Table Message : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a10'] = 'Erreur Information : Table Message.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}

//Niveau
$niveauTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptNiveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_niveau` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");
try {$niveauTable -> execute();$ok['a11'] = 'La Table Niveau Membre : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a11'] = 'Erreur Cr&eacute;ation : Table Niveau Membre.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}

$niveauInsert = Bdd::connectBdd()->prepare("
INSERT INTO `JejeScriptNiveau` (`id`, `nom_niveau`) VALUES
(1, 'Administrateur'),
(2, 'Moderateur'),
(3, 'Membre');");
try {$niveauInsert -> execute();$ok['a12'] = 'Infos Table Niveau Membre : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a12'] = 'Erreur Information : Table Niveau Membre.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}

//Avatar
$avatarTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptAvatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=946;");
try {$avatarTable -> execute();$ok['a13'] = 'La Table Avatar : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a13'] = 'Erreur Cr&eacute;ation : Table Avatar.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}
$avatarInsert = Bdd::connectBdd()->prepare("
INSERT INTO `JejeScriptAvatar` (`id`, `url`) VALUES
(1, 'design/image/avatar/1.png'),
(945, 'design/image/avatar/945.png');");
try {$avatarInsert -> execute();$ok['a14'] = 'Infos Table Avatar : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a14'] = 'Erreur Information : Table Avatar.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}


//Smiley
$smileyTable = Bdd::connectBdd()->prepare("
CREATE TABLE IF NOT EXISTS `JejeScriptSmiley` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `bbcode` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;");
try {$smileyTable -> execute();$ok['a15'] = 'La Table Smiley : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a15'] = 'Erreur Cr&eacute;ation : Table Smiley.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}

$smileyInsert = Bdd::connectBdd()->prepare("
INSERT INTO `JejeScriptSmiley` (`id`, `url`, `bbcode`) VALUES
(1, 'design/image/smiley/1.gif', 'S1S'),
(57, 'design/image/smiley/57.gif', 'S57S');");
try {$smileyInsert -> execute();$ok['a16'] = 'Infos Table Smiley : <img src="'.$Url_Site.'/public/images/accept.png" width="25" height="25" align="absmiddle"><br />';}catch(Exception $e) {$er['a16'] = 'Erreur Information : Table Smiley.<img src="'.$Url_Site.'/public/images/erreur.jpg" width="25" height="25" align="absmiddle"><br />';}
?>
<?php include('entete.php'); ?>
<form method="post" action="creer_admin.php" id="form">
    	<br />
    	<table align="center" width="750"  border="1"    >
        	<tr>
            	<td class="titre_form" align="center" colspan="4"   >Etape 2 => Installation des Tables Mysql</td>
            </tr>
            <?php  //if(isset($ok['1'])) echo $ok['1'] ;?>
			<tr>
			<td class="titre_form" align="center">creation table</td>
			<td class="titre_form" align="center">erreur creation</td>
			<td class="titre_form" align="center">insertion table</td>
			<td class="titre_form" align="center">erreur insertion</td>
            </tr>
		    <tr>
			<td  align="left"><?php if(isset($ok['a1'])) {echo $ok['a1'];}?></td>
			<td  align="left"><?php if(isset($er['a1'])) {echo $er['a1'];}?></td>
			<td  align="left"><?php if(isset($ok['a2'])) {echo $ok['a2'];}?></td> 
			<td  align="left"><?php if(isset($er['a2'])) {echo $er['a2'];}?></td> 		
            </tr>
		    
		    <tr>
			<td  align="left"><?php if(isset($ok['a3'])) {echo $ok['a3'];}?></td> 
			<td  align="left"><?php if(isset($er['a3'])) {echo $er['a3'];}?></td> 
			<td  align="left"><?php ?></td> 
			<td  align="left"><?php ?></td> 
            </tr>
		    <tr>	 
			<td  align="left"> <?php if(isset($ok['a4'])) {echo $ok['a4'];}?></td> 	
            <td  align="left"> <?php if(isset($er['a4'])) {echo $er['a4'];}?></td> 
			<td  align="left"> <?php ?></td>
			<td  align="left"> <?php ?></td> 		
			</tr>
		 
		    <tr>
            <td  align="left"><?php if(isset($ok['a5'])) {echo $ok['a5'];}?></td> 		
            <td  align="left"><?php if(isset($er['a5'])) {echo $er['a5'];}?></td> 		
            <td  align="left"><?php if(isset($ok['a6'])) {echo $ok['a6'];}?></td>  	
            <td  align="left"><?php if(isset($er['a6'])) {echo $er['a6'];}?></td> 		
			</tr>
		    <tr>
            <td  align="left"> <?php if(isset($ok['a7'])) {echo $ok['a7'];}?></td>		
            <td  align="left"> <?php if(isset($er['a7'])) {echo $er['a7'];}?></td> 
            <td  align="left"> <?php if(isset($ok['a8'])) {echo $ok['a8'];}?></td>  
            <td  align="left"> <?php if(isset($er['a8'])) {echo $er['a8'];}?></td> 		
		    </tr>
		    <tr>
            <td  align="left"> <?php if(isset($ok['a9']))  {echo $ok['a9'];}?></td>   
            <td  align="left"> <?php if(isset($er['a9']))  {echo $er['a9'];}?></td>
            <td  align="left"> <?php if(isset($ok['a10'])) {echo $ok['a10'];}?></td>   
            <td  align="left"> <?php if(isset($er['a10'])) {echo $er['a10'];}?></td> 
            </tr>
			
			
			<tr>
            <td  align="left"> <?php if(isset($ok['a11'])){echo $ok['a11'];}?></td> 
            <td  align="left"> <?php if(isset($er['a11'])){echo $er['a11'];}?></td> 
            <td  align="left"> <?php if(isset($ok['a12'])){echo $ok['a12'];}?></td>   
            <td  align="left"> <?php if(isset($er['a12'])){echo $er['a12'];}?></td> 
            </tr>
			
			<tr>
            <td  align="left"><?php if(isset($ok['a13'])) {echo $ok['a13'];}?></td>   
            <td  align="left"><?php if(isset($er['a13'])) {echo $er['a13'];}?></td> 
            <td  align="left"><?php if(isset($ok['a14'])) {echo $ok['a14'];}?></td> 
            <td  align="left"><?php if(isset($er['a14'])) {echo $er['a14'];}?></td> 
            </tr>
			
			<tr>
            <td  align="left"><?php if(isset($ok['a15'])) {echo $ok['a15'];}?></td>  
            <td  align="left"><?php if(isset($er['a15'])) {echo $er['a15'];}?></td>
            <td  align="left"><?php if(isset($ok['a16'])) {echo $ok['a16'];}?></td>
            <td  align="left"><?php if(isset($er['a16'])) {echo $er['a16'];}?></td>
            </tr>
            <tr>
            <td align="center" colspan="4"  ><br /><?php if(empty($er)) {echo '<input type="submit" name="submit" value="Passer &agrave; l\'&eacute;tape suivante" class="input" />';}?><br /><br /></td>
            </tr>
        </table>
		<br />
    </form>

<?php
//if(!empty($ok) and isset($ok)) {foreach($ok as $c=>$d){ echo "- ".$d."<br/>"; }}
//echo "<pre>";print_r ($ok) ;echo "</pre>";

//if(!empty($er) and isset($er)) {foreach($er as $a=>$b){ echo "- ".$b."<br/>"; }} 
//echo "<pre>";print_r ($er) ;echo "</pre>";

?>
<?php include('pied.php');?>