<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l"><P><?php echo "Admettre la femme  : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P></div>
<div class="sheader2r">
<?php
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/adm.php?uc=".$this->user[0]['id']."';\"title=\"Admission\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Admission&nbsp;</button> " ;
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/aoar.php?uc=".$this->user[0]['id']."';\"title=\"Autorisation\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Autorisation&nbsp;</button> " ;

?>
</div>
<div class="contentl formaut">
<form  action="<?php echo URL."naissance/editSaveEntrer/".$this->user[0]['id'];  ?>" method="post">			
<?php
$data = array(			
"HOSPI"          => HTML::dateUS2FR($this->user[0]['HOSPI']),
"HHOSP"          => $this->user[0]['HHOSP'],
"SERVI1"         => $this->user[0]['SERVI'], 
"SERVI2"         => HTML::nbrtostring('servicedeces','id',$this->user[0]['SERVI'],'service'), 
"NLIT1"          => $this->user[0]['NLIT'],
"NLIT2"          => HTML::nbrtostring('lit','id',$this->user[0]['NLIT'],'nlit'),
"MATRI"          => $this->user[0]['MATRI'],
"NDOSS"          => $this->user[0]['NDOSS'],
"MODEE1"         => $this->user[0]['MODEE'],  
"MODEE2"         => HTML::nbrtostring('modeent','id',$this->user[0]['MODEE'],'mods'),  
"MOTIF"          => 'Accouchement',
"DGCNS"          => 'Accouchement',
"NOM2"           => $this->user[0]['NOM2'],
"PRENOM2"        => $this->user[0]['PRENOM2'],
"SAGEFEMME5"     => $this->user[0]['SAGEFEMME5']
);

echo '<label class="NAIS"  id="lMODEE">Mode d\'entrée :</label>';          HTML::MODEES('MODEE','MODEE','MODEE','modeent',$data['MODEE1'],$data['MODEE2']); 	
echo '<label class="NAIS"  id="lHOSPI">Date Hospitalisation :</label>';    echo '<input class="NAIS" id="HOSPI"   type="txt"  name="HOSPI"   value="'.$data['HOSPI'].'" placeholder="00-00-0000" onblur="genererCodeP()"/>';
																		   echo '<input class="NAIS" id="HHOSP"   type="txt"  name="HHOSP"   value="'.$data['HHOSP'].'" placeholder="00:00"/>';
echo '<label class="NAIS"  id="lSERVI">'; 
echo '<a title="Ajouter service/num lits si manque dans la liste "  href="'.URL.'lits/createnumlit/"> Service/Nlit : </a>';
echo'<img src="'.URL.'public/images/add.PNG" width="12" height="12" border="0" alt="" />';
echo '</label>';
$this->SERNSC('NAIS','SERVI','SERVI','servicedeces',$data['SERVI1'],$data['SERVI2']);
$this->NLIT('NAIS','NLIT','NLIT',$data['NLIT1'],$data['NLIT2']);
echo '<label class="NAIS"  id="lMATRI">Matricule/Ndos :</label>';          echo '<input class="NAIS" id="MATRI"   type="txt"  name="MATRI"   value="'.$data['MATRI'].'" />';
																		   echo '<input class="NAIS" id="NDOSS"   type="txt"  name="NDOSS"   value="'.$data['NDOSS'].'" />';
echo '<label class="NAIS"  id="lMOTIF">Motif:</label>';                    echo '<input class="NAIS" id="MOTIF"   type="txt"  name="MOTIF"   value="'.$data['MOTIF'].'" />';
echo '<label class="NAIS"  id="lDGCNS">Diagnostic:</label>';               echo '<input class="NAIS" id="DGCNS"   type="txt"  name="DGCNS"   value="'.$data['DGCNS'].'" />';
echo '<input id="STR" type="hidden" name="STRUCTURE"   value="'.Session::get('structure').'"/>';
echo '<input id="STR" type="hidden" name="NOM2"        value="'.$data['NOM2'].'"/>';
echo '<input id="STR" type="hidden" name="PRENOM2"     value="'.$data['PRENOM2'].'"/>';
echo '<input id="STR" type="hidden" name="SAGEFEMME5"  value="'.$data['SAGEFEMME5'].'"/>';

echo '<input id="submitnewx" type="submit" />	'; 
?>
</form>
</div>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/sante.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo "Admettre la femme";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	