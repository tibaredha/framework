<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l"><P><?php echo "Ajouter nouveau né(e) a la femme  : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P></div>
<div class="sheader2r">

<?php
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/caccouchemt.php?uc=".$this->user[0]['id']."';\"title=\"Certificat\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Certificat</button> " ;
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/ord.php?uc=".$this->user[0]['id']."';\"title=\"Ordonnance\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Ordonnance</button> " ;
?>
</div>
<div class="contentl formaut">
<form  action="<?php echo URL."naissance/editSaveNnee/".$this->user[0]['id'];  ?>" method="post">			
<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">identification</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">ATCD</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">NAISSANCE</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">ACCOUCHEMENT</a></li> 	
			</ul> 
<?php
$commune1=HTML::nbrtostring('structure','id',Session::get('structure'),'numcom');
$commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
$wilayad1=Session::get('wilaya');
$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
function verif($id,$val) {if($id == $val){return 'checked';}}
$data = array(
"SA"             => $this->user[0]['SA'],
"WILAYA11"       => $this->user[0]['WILAYA1'], 
"WILAYA12"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA1'],'WILAYAS'),
"COMMUNE11"      => $this->user[0]['COMMUNE1'], 
"COMMUNE12"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE1'],'COMMUNE'),
"DINS1"          => HTML::dateUS2FR($this->user[0]['DINS1']),
"HINS1"          => $this->user[0]['HINS1'],
"SEXE5"          => array($this->user[0]['SEXE5']=>$this->user[0]['SEXE5'],"Masculin"=>"M","Feminin"=>"F"),
"PRENOM5"        => $this->user[0]['PRENOM5'],
"POIDS"          => $this->user[0]['POIDS'],
"APGAR"          => array("10"=>"10","9"=>"9","8"=>"8","7"=>"7","6"=>"6","5"=>"5","4"=>"4","3"=>"3","2"=>"2","1"=>"1"),
"GROUPAGENN"     => array($this->user[0]['GROUPAGENN']=>$this->user[0]['GROUPAGENN'],"A"=>"A","B"=>"B","AB"=>"AB","O"=>"O"),
"RHNN"           => array($this->user[0]['RHNN']=>$this->user[0]['RHNN'],"Positif"=>"P","Negatif"=>"N"),
"SAGEFEMME51"    => $this->user[0]['SAGEFEMME5'],
"SAGEFEMME52"    => HTML::nbrtostring('sagefemme','id',$this->user[0]['SAGEFEMME5'],'Nom').'_'.HTML::nbrtostring('sagefemme','id',$this->user[0]['SAGEFEMME5'],'Prenom'),
"VB"             => verif("VB",$this->user[0]['MAC']),  
"VH"             => verif("VH",$this->user[0]['MAC']),  
"V"              => verif("V",$this->user[0]['VMN']),  
"M"              => verif("M",$this->user[0]['VMN']),  
"PRENOMARE"      => $this->user[0]['PRENOMARE']
);

echo '<div    id="content_1" class="contenttabs1">  ';
$colspan=4;
	echo "<table id='trav' >" ;	 
		echo'</tr>';
		echo'<tr bgcolor="#00CED1">';
		echo'<th id="travth">H</th>';
		echo'<th id="travth">RCF</th>';
		echo'<th id="travth">DIC</th>';
		echo'<th id="travth">DEP</th>';
		echo'<th id="travth">POOLS</th>';
		echo'<th id="travth">TA</th>';
		echo'<th id="travth">Sup</th>';
		echo'</tr>';
	foreach($this->userListview as $key => $value)
	{ 
	$bgcolor_donate ='#EDF7FF';
	echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
	echo'<td id="travth" >'.$value['SA'].'</td>';
	echo'<td id="travth" >'.$value['SEXE5'].'</td>';
	echo'<td id="travth" >'.$value['PRENOM5'].'</td>';
	echo'<td id="travth" >'.$value['MAC'].'</td>';
	echo'<td id="travth" >'.$value['VMN'].'</td>';
	echo'<td id="travth" >'.$value['POIDS'].'/'.$value['APGAR'].'</td>';
	echo '<td id="travth" ><a class="delete" title="supprimer"  href="'.URL.'naissance/deletennex/'.$value['id'].'/'.$this->user[0]['id'].'/'.'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
	echo '</tr>';			
	}
	echo "</table>";	
	// echo '</div>';
echo '</div>';

echo '<div    id="content_2" class="contenttabs2">';
echo '<label  id="lDDR">DDR : </label>';              echo '<input id="DDR"   type="txt"  name="DDR"   value="'.date('d-m-Y').'" onblur="datep(287)"/>';
echo '<label  id="lDPA">DPA 41 SA: </label>';         echo '<input id="DPA"   type="txt"  name="DPA"   value="'.date('d-m-Y').'"READONLY />';
echo '<label  id="lSA">SA</label>';                   echo '<input id="SA"    style="background-color:yellow;" type="txt"  name="SA"    value="'.$data['SA'].'"READONLY/>';
echo '</div>';

echo '<div id="content_3" class="contenttabs3">';
echo '<label  id="lWILAYA1">Wilaya  :</label>';       HTML::WILAYA('WILAYA1','WILAYA1','WILAYA1','wil',$data['WILAYA11'],$data['WILAYA12']) ;
echo '<label  id="lCOMMUNE1">Commune  :</label>';     HTML::COMMUNE('COMMUNE1','COMMUNE1','COMMUNE1',$data['COMMUNE11'],$data['COMMUNE12']);
echo '<label  id="lDINS1">Date :</label>';            echo '<input id="DINS1"   type="txt"  name="DINS1"   value="'.$data['DINS1'].'" placeholder="00-00-0000" onblur="genererCodeP()"/>';
	                                                  echo '<input id="HINS1"   type="txt"  name="HINS1"   value="'.$data['HINS1'].'" placeholder="00:00"/>';
echo '</div>';

echo '<div id="content_4" class="contenttabs4"> ';
echo '<label  id="lLD05">Mode d’accouchement du G1</label>';
echo '<label  id="lLD15">Naturelle</label>';          echo '<input id="LD15" type="radio"  name="MAC" value="VB"  '.$data['VB'].'/>';
echo '<label  id="lLD25">Césarienne</label>';         echo '<input id="LD25" type="radio"  name="MAC" value="VH"  '.$data['VH'].'/>';
echo '<label  id="lLD16">Vivant</label>';             echo '<input id="LD16" type="radio"  name="VMN" value="V"  '.$data['V'].'/>';
echo '<label  id="lLD26">Mort-né</label>';            echo '<input id="LD26" type="radio"  name="VMN" value="M"  '.$data['M'].'/>';
echo '<label  id="lPRENOM5">Prénom  </label> ';       echo '<input id="PRENOM5" type="txt"  name="PRENOM5" value="'.$data['PRENOM5'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
echo '<label  id="lSEXE5">Sexe  </label>';            $this->combov('SEXE5','SEXE5',$data['SEXE5']);
echo '<label  id="lPRENOM8">: إسم المولود </label>    <input id="PRENOMAR8"    type="txt" name="PRENOMARE"    value="'.$data['PRENOMARE'].'" placeholder="xxxxxxx"/>';
echo '<label  id="lPOIDS">Poids : </label> ';         echo '<input id="POIDS" type="txt"  name="POIDS" placeholder="0000"   value="'.$data['POIDS'].'" />';
echo '<label  id="lAPGAR">Apgar : </label> ';         $this->combov('APGAR','APGAR',$data['APGAR']);
echo '<label  id="lGROUPAGENN">Groupage :</label>';   $this->combov('GROUPAGENN','GROUPAGENN',$data['GROUPAGENN']);$this->combov('RHNN','RHNN',$data['RHNN']);
echo '<label  id="lSAGEFEMME5"  >';
  echo '<a title="Ajouter sage femme si manque dans la liste "  href="'.URL.'sf/createsf/'.Session::get('structure').'"> Sage femme : </a>';
  echo'<img src="'.URL.'public/images/add.PNG" width="12" height="12" border="0" alt=""   />';
echo '</label>';
HTML::SEF(44,44,'SAGEFEMME5','SAGEFEMME5','sagefemme',Session::get('structure'),$data['SAGEFEMME51'],$data['SAGEFEMME52']) ;
echo '<input id="submitnewx" type="submit" />	'; 
echo '</div>';
//   prevoire le nombre de consultation prenatale
// - La 1ère entre la 6ème  et la 9ème semaine
// - La 2ème entre la 10ème et la 15ème semaine
// - La 3ème entre la 20ème et la 24ème semaine
// - La 4ème entre la 36ème et la 40ème semaine
//   prevoire suivie de la grossesse
//abdelkrim_benbia@yahoo.fr
?>	
</form>
</div>
</div>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/naissance.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo "Ajouter nouveau né(e) a la femme";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>

<script type="text/javascript">
  window.onload = function(){
	        document.getElementById("PRENOMAR8").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
           
			}
</script>

	