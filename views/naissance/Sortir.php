<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l"><P><?php echo "Sortir la femme  : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P></div>
<div class="sheader2r">
<?php
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/declarationn.php?uc=".$this->user[0]['id']."';\"title=\"Déclaration\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Déclaration</button> " ;
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/rss.php?uc=".$this->user[0]['id']."';\"title=\"RSS\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;RSS</button> " ;
?>
</div>
<div class="contentl formaut">

<form  action="<?php echo URL."naissance/editSaveSortir/".$this->user[0]['id'];  ?>" method="post">			
<?php
$data = array(			
"MSORT1"         => $this->user[0]['MSORT'],  
"MSORT2"         => HTML::nbrtostring('modesrt','id',$this->user[0]['MSORT'],'mods'),  
"SORT"           => HTML::dateUS2FR($this->user[0]['SORT']),
"HSORT"		     => $this->user[0]['HSORT']	 
);	
echo '<label class="NAIS"  id="lMODES">Mode sortie:</label>';              HTML::MODEES('MSORT','MSORT','MSORT','modesrt',$data['MSORT1'],$data['MSORT2']);
echo '<label class="NAIS"  id="lSORT">Date Sortie:</label>';               echo '<input class="NAIS" id="SORT"   type="txt"  name="SORT"   value="'.$data['SORT'].'" placeholder="00-00-0000" onblur="genererCodeP()"/>';
                                                                           echo '<input class="NAIS" id="HSORT"   type="txt"  name="HSORT"   value="'.$data['HSORT'].'" placeholder="00:00"/>';
echo '<input id="submitnewx" type="submit" />	'; 																		   
?>			
</form>

</div>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/sante.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo "Sortir la femme";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	