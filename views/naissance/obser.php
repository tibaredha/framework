<div class="sheader1l">
<?php
Session::init();if (isset($_SESSION['errorlogin'])) {$sError = '<p id="errorlogin">' . $_SESSION['errorlogin'] . '</p>';		echo $sError;}else{$sError='<p id="llogin">Gérer les femmes gestantes  </p>';echo $sError;}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Surveillance de la grossesse</div>
<div class="sheader2r">
<?php
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/dossier.php?uc=".$this->user[0]['id']."';\"title=\"Partogramme\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Dossier</button> " ;
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/sur.php?uc=".$this->user[0]['id']."';\"title=\"Surveillance\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Surveillance</button> " ;
?>
</div>
<div class="contentl formaut">
<form  action="<?php echo URL."naissance/createobser/".$this->user[0]['id'];  ?>" method="post">			
<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">identification</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Clinique</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Echographie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">Biologie</a></li> 	
			</ul>   		
<?php 
$x=html::datePlus0($this->user[0]['id']);
$dphotos='naissance';//dossier photos
$fichier1 = "d:/framework/public/webcam/".$dphotos."/".$this->user[0]['id'].'.jpg' ;
if (file_exists($fichier1)){$fichier = "/".$this->user[0]['id'] ;}else {$fichier = "/f" ;}

	echo '<div   id="content_1" class="contenttabs1">  ';
	//echo '<label class="NAIS"  id="lDHE">Date examen :</label>';             
	//echo '<input class="NAIS" id="DHE1"   type="txt"  name="DHE1"   value="'.$data['DHE1'].'" placeholder="00-00-0000" onblur="genererCodeP()"/>';                                                                        
	echo "<p>";
	echo "<br>";

	echo '<select class="NAIS" id="DHEJ" name="DHE1">';
	for($i=$x+1; $i<=24; $i += 1) 
	{
	echo '<option value="'.$i.'">'.html::dateUS2FR(html::datePlus($this->user[0]['HOSPI'],$i-1)).' : ( J'.$i.' )</option>';
	}
	echo "</select>";
	
	
	if (isset($this->userlastview[0]['TAS'])) {
    echo '<label class="NAIS"  id="lASTTAS"> &nbsp;<img src="'.URL.'public/images/ta.jpg"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['TAS'].'/'.$this->userlastview[0]['TAD'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTTAS"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	if (isset($this->userlastview[0]['POOLS'])) {
    echo '<label class="NAIS"  id="lASTPOOLS"> &nbsp;<img src="'.URL.'public/images/POOLS.jpg"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['POOLS'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTDHE1"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
    $dhe = array(0=>17,1=>17+(14.5*1),2=>17+(14.5*2),3=>17+(14.5*3),4=>17+(14.5*4),5=>17+(14.5*5),6=>17+(14.5*6),7=>17+(14.5*7),8=>17+(14.5*8),9=>17+(14.5*9),10=>17+(14.5*10),11=>17+(14.5*11),12=>17+(14.5*12),13=>17+(14.5*13),14=>17+(14.5*14),15=>17+(14.5*15),16=>17+(14.5*16),17=>17+(14.5*17),18=>17+(14.5*18),19=>17+(14.5*19),20=>17+(14.5*20),21=>17+(14.5*21),22=>17+(14.5*22),23=>17+(14.5*23),24=>17+(14.5*24));$DHE = array();
	$pools = array(120=>0,110=>1,100=>2,90=>3,80=>4,70=>5,60=>6);$POOLS = array();
	$temp = array(40=>0,39=>1,38=>2,37=>3,36=>4);$TEMP = array();
	$hb = array(16=>0,15=>1,14=>2,13=>3,12=>4,11=>5,10=>6,9=>7,8=>8,7=>9,6=>10,5=>11);$HB = array();
	$tas=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8,90=>9,80=>10,70=>11,60=>12,50=>11,40=>10,30=>9,20=>8,10=>7,0=>6);$TAS = array();
	$tad=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8,90=>9,80=>10,70=>11,60=>12,50=>11,40=>10,30=>9,20=>8,10=>7,0=>6);$TAD = array();
	$bip = array(120=>0,110=>1,100=>2,90=>3,80=>4,70=>5,60=>6,0=>6);$BIP = array();
	foreach($this->obser as $key => $value)
	{ 
	array_push($DHE,$dhe[$value['DHE1']-1]);
	array_push($POOLS,(38+(20*$pools[$value['POOLS']])));
	array_push($TAS,(38+(20*$tas[$value['TAS']])));
    array_push($TAD,(38+(20*$tad[$value['TAD']])));
	array_push($TEMP,(38+(20*$temp[$value['TEMP']])));
	array_push($HB,(38+(20*$hb[$value['HB']])));
	array_push($BIP,(38+(20*$bip[$value['BIP']])));
	}
	
	// echo '<pre>';
	// print_r ($BIP) ;
	// echo '</pre>';
	?><canvas id="myCanvasprt" width="365" height="310" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	
	
	$colspan=4;
	echo "<table id='trav' >" ;	 
		echo'</tr>';
		echo'<tr bgcolor="#00CED1">';
		echo'<th id="travth">J</th>';
		echo'<th id="travth">POOLS</th>';
		echo'<th id="travth">TA</th>';
		echo'<th id="travth">TEMP</th>';
		echo'<th id="travth">Sup</th>';
		echo'</tr>';
	foreach($this->userListview as $key => $value)
	{ 
	$bgcolor_donate ='#EDF7FF';
	echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
	echo'<td id="travth" >'.$value['DHE1'].'</td>';
	echo'<td id="travth" >'.$value['POOLS'].'</td>';
	echo'<td id="travth" >'.$value['TAS'].'/'.$value['TAD'].'</td>';
    echo'<td id="travth" >'.$value['TEMP'].'</td>';
	echo '<td id="travth" ><a class="delete" title="supprimer"  href="'.URL.'naissance/deleteobser/'.$value['id'].'/'.$this->user[0]['id'].'/'.'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
	echo '</tr>';			
	}
	echo "</table>";	
	echo '</div>';
	
	
	
	echo '<div    id="content_2" class="contenttabs2">';
	echo '<label class="NAIS"  id="lPOOLS">Pools :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="POOLS" name="POOLS">';
	for($i=60; $i<=120; $i += 10) {echo '<option value="'.$i.'">'.$i.' Pul/mn</option>';}
	echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lTAS">TAS :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TAS" name="TAS">';
	for($i=60; $i<=180; $i += 10) {echo '<option value="'.$i.'">'.$i.' mm/hg</option>';}
	echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lTAD">TAD :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TAD" name="TAD">';
	for($i=60; $i<=180; $i += 10) {echo '<option value="'.$i.'">'.$i.'  mm/hg</option>';}
	echo "</select>";
	echo "</p> ";   


	echo '<label class="NAIS"  id="lTEMP">T° :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TEMP" name="TEMP">';
	for($i=36; $i<=40; $i += 1) {echo '<option value="'.$i.'">'.$i.'°</option>';}
	echo "</select>";
	echo "</p> "; 
	?><canvas id="myCanvasprtf" width="365" height="315" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	echo '</div>';

	echo '<div id="content_3" class="contenttabs3">';
	echo '<label class="NAIS"  id="lPOOLS">BIP :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="POOLS" name="BIP">';
	for($i=60; $i<=120; $i += 10) {echo '<option value="'.$i.'">'.$i.' mm</option>';}
	echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lTAS">DAT :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TAS" name="DAT">';
	for($i=10; $i<=100; $i += 5) {echo '<option value="'.$i.'">'.$i.' mm</option>';}
	echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lTAD">LF :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TAD" name="LF">';
	for($i=10; $i<=80; $i += 5) {echo '<option value="'.$i.'">'.$i.'  mm</option>';}
	echo "</select>";
	echo "</p> ";   
	?><canvas id="myCanvasprtl" width="365" height="315" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	echo '</div>';
	
	echo '<div id="content_4" class="contenttabs4"> ';
	
	echo '<label class="NAIS"  id="lGR">GR :</label>'; 
	echo "<p>";
		echo '<select class="NAIS" id="GR" name="GR">';
			for($i=5; $i<=16; $i += 1) {echo '<option value="'.$i.'">'.$i.' mm3</option>';}
		echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lHB">HB :</label>'; 
	echo "<p>";
		echo '<select class="NAIS" id="HB" name="HB">';
			for($i=5; $i<=16; $i += 1) {echo '<option value="'.$i.'">'.$i.' g/dl</option>';}
		echo "</select>";
	echo "</p> "; 
	
	echo '<label class="NAIS"  id="lHT">HT :</label>'; 
	echo "<p>";
		echo '<select class="NAIS" id="HT" name="HT">';
			for($i=5; $i<=16; $i += 1) {echo '<option value="'.$i.'">'.$i.' %</option>';}
		echo "</select>";
	echo "</p> "; 
	
	?><canvas id="myCanvasprtm" width="365" height="315" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	
	echo '<input id="submitnewx" type="submit" />	'; 
	echo '</div>';
 ?>			
			
	
			
</div>

</form>	
</div>
<?php
$dphotos='naissance';//dossier photos
$fichier1 = "d:/framework/public/webcam/".$dphotos."/".$this->user[0]['id'].'.jpg' ;
if (file_exists($fichier1)){$fichier = "/".$this->user[0]['id'] ;}else {$fichier = "/f" ;}
?>	
<div class="content"><img id="image" src="<?php echo URL;?>public/webcam/naissance/<?php echo $fichier.".jpg?t=".time();?>" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php //echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

<script>
var DHE = <?php echo json_encode($DHE); ?>;
var POOLS = <?php echo json_encode($POOLS); ?>;
var TAS = <?php echo json_encode($TAS); ?>;
var TAD = <?php echo json_encode($TAD); ?>;
var TEMP = <?php echo json_encode($TEMP); ?>;
var HB = <?php echo json_encode($HB); ?>;
var BIP = <?php echo json_encode($BIP); ?>;
//***********************************************************************************//
var canvasm = document.getElementById("myCanvasprtf");var ctxm = canvasm.getContext("2d");
txt(ctxm,"T° /POOLS /TA",10,25);
carrex(ctxm,10,30,5,24,"#FFFFFF");
carrex(ctxm,10,130,6,24,"#7FFFD4");
carrex(ctxm,10,250,3,24,"#FFFFFF");
line(ctxm,10,128,358,128,"#DC143C");
line(ctxm,10,248,358,248,"#DC143C");
horaire(ctxm,17,301);
indicateur(ctxm,120,POOLS,"red");
indicateur(ctxm,0,TEMP,"green");
ta(ctxm,"black");
//***********************************************************************************//
var canvasl = document.getElementById("myCanvasprtl");var ctxl = canvasl.getContext("2d");
txt(ctxl,"BIP",10,25);
carrex(ctxl,10,30,13,24,"#FFFFFF");
line(ctxl,10,108,358,108,"#DC143C");
indicateur(ctxl,120,BIP,"red");
//**********************hb************************//
var canvasb = document.getElementById("myCanvasprtm");var ctxb = canvasb.getContext("2d");
txt(ctxb,"HB g/dl valeur theorique 12-16 ",10,25);
carrex(ctxb,10,30,1,24,"#FFFFFF");
carrex(ctxb,10,50,5,24,"#7FFFD4");
carrex(ctxb,10,150,8,24,"#FFFFFF");
line(ctxb,10,48,358,48,"#DC143C");
line(ctxb,10,148,358,148,"#DC143C");
horaire(ctxb,17,301);
indicateur(ctxb,20,HB,"red");
</script>