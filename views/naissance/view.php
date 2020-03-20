<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "Femme gestante : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
<?php 
echo "<button class=\"naissance\"  id=\"btn1a\"  onclick=\"document.location='".URL."tcpdf/naissance/adm.php?uc=".$this->user[0]['id']."';\"title=\"Admission\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Demande Admission&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn1b\"  onclick=\"document.location='".URL."tcpdf/naissance/ao.php?uc=".$this->user[0]['id']."';\"title=\"Autorisation d oppere\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Autorisation OPP FR &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn1c\"  onclick=\"document.location='".URL."tcpdf/naissance/aoar.php?uc=".$this->user[0]['id']."';\"title=\"Autorisation d oppere\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Autorisation OPP AR &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn1d\"  onclick=\"document.location='".URL."tcpdf/naissance/altfr.php?uc=".$this->user[0]['id']."';\"title=\"Autorisation ligature\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Autorisation ligature &nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btn1e\"  onclick=\"document.location='".URL."tcpdf/naissance/dossier.php?uc=".$this->user[0]['id']."';\"title=\"Dossier médical\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Dossier médical &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn1f\"  onclick=\"document.location='".URL."tcpdf/naissance/inscription.php?uc=".$this->user[0]['id']."';\"title=\"bulletin d'inscription matarnité\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;bulletin d'inscription&nbsp;</button> " ;



echo "<button class=\"naissance\"  id=\"btn2a\"  onclick=\"document.location='".URL."tcpdf/naissance/bilan.php?uc=".$this->user[0]['id']."';\" title=\"Bilan biologique - radiologique \">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Bilan BIO-RAD &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn2b\"  onclick=\"document.location='".URL."tcpdf/naissance/rbilan.php?uc=".$this->user[0]['id']."';\" title=\"Resultat Bilan biologique - radiologique \">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Resultat Bilan BIO &nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btn3a\"  onclick=\"document.location='".URL."tcpdf/naissance/trans.php?uc=".$this->user[0]['id']."';\"title=\"Transfusion\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Transfusion PSL &nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btn4a\" onclick=\"document.location='".URL."tcpdf/naissance/parto.php?uc=".$this->user[0]['id']."';\"title=\"Partogramme\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Partogramme&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn4b\" onclick=\"document.location='".URL."tcpdf/naissance/sur.php?uc=".$this->user[0]['id']."';\"title=\"Fiche de surveillance\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Fiche surveillance&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn4c\" onclick=\"document.location='".URL."naissance/bishop/".$this->user[0]['id']."';\"title=\"score de Bishop\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Score  Bishop&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn4d\" onclick=\"document.location='".URL."naissance/apgar/".$this->user[0]['id']."';\"title=\"score d\'apgar\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Score  Apgar&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn4e\" onclick=\"document.location='".URL."naissance/silverman/".$this->user[0]['id']."';\"title=\"score de Silverman\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Score  Silverman&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn4f\" onclick=\"document.location='".URL."naissance/Glasgow/".$this->user[0]['id']."';\"title=\"score de Glascow\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Score  Glascow&nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btn5a\"  onclick=\"document.location='".URL."tcpdf/naissance/caccouchemt.php?uc=".$this->user[0]['id']."';\"title=\"Certificat d\'accouchement\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Certificat accouchem&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn5b\"  onclick=\"document.location='".URL."tcpdf/naissance/declarationn.php?uc=".$this->user[0]['id']."';\"title=\"Déclaration de naissance\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Déclaration naissance&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn5c\"  onclick=\"document.location='".URL."tcpdf/naissance/ord.php?uc=".$this->user[0]['id']."';\"title=\"Ordonnance\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Ordonnance sortie&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn5d\"  onclick=\"document.location='".URL."tcpdf/naissance/rss.php?uc=".$this->user[0]['id']."';\"title=\"RSS\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Résumé Std/Cli &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn5e\"  onclick=\"document.location='".URL."tcpdf/naissance/fn.php?uc=".$this->user[0]['id']."';\"title=\"Fiche Navette\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Fiche Navette&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn5f\"  onclick=\"document.location='".URL."tcpdf/naissance/cs.php?uc=".$this->user[0]['id']."';\"title=\"Certificat de sejour\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Certificat de sejour&nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btn6a\"  onclick=\"document.location='".URL."tcpdf/naissance/vac.php?uc=".$this->user[0]['id']."';\"title=\"Calendrier de vaccination nne \">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Vaccination Nne&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn6b\"  onclick=\"document.location='".URL."tcpdf/naissance/vacf.php?uc=".$this->user[0]['id']."&datedt=".date('Y-m-d')."';\"title=\"Calendrier de vaccination femme\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp; Vaccination Femme&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn6c\"  onclick=\"document.location='".URL."tcpdf/naissance/fcvmamo.php?uc=".$this->user[0]['id']."';\" title=\"Dépistage kc col/sein\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Dépistage kc col/sein &nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btn7a\" onclick=\"document.location='".URL."tcpdf/naissance/deces/".$this->user[0]['id']."';\"title=\"certificat de deces nné\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Certificat de deces&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn7b\" onclick=\"document.location='".URL."tcpdf/naissance/deces/".$this->user[0]['id']."';\"title=\"certificat de deces femme\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Certificat de deces&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn7c\" onclick=\"document.location='".URL."tcpdf/naissance/evac.php?uc=".$this->user[0]['id']."';\"title=\"Evacuation\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Evacuation Ancienne &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btn7d\" onclick=\"document.location='".URL."tcpdf/naissance/evacmg.php?uc=".$this->user[0]['id']."';\"title=\"Evacuation\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Evacuation Nouvelle&nbsp;</button> " ;

?>
</div>	
<div class="scontentl2"><?php echo "Nouveau Née";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	