<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l"><P><?php echo "Surveillance du travail et de l'accouchement : ";?> <?php echo '<a  href="'.URL.'naissance/search/0/10?o=id&q='.$this->user[0]['id'].'">'.$this->user[0]['NOM2'].'_'.$this->user[0]['PRENOM2'].'</a>'; ?><?php //echo $this->user[0]['id'];?></P></div>
<div class="sheader2r">
<?php
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/parto.php?uc=".$this->user[0]['id']."';\"title=\"Partogramme\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Partogramme</button> " ;
echo "<button   id = \"certificat\"   onclick=\"document.location='".URL."tcpdf/naissance/sur.php?uc=".$this->user[0]['id']."';\"title=\"Surveillance\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Surveillance</button> " ;

?>
</div>
<div class="contentl formaut">
<form  action="<?php echo URL."naissance/createtrav/".$this->user[0]['id'];  ?>" method="post">			

<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">identification</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">foetus</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">travail</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">mere</a></li> 	
			</ul>    	 

			
			
<?php 
$data = array(			
"DHE1"          => date('d-m-Y'),
"DHE2"          => date('H:m')
);

$x=html::heuresPlus0($this->user[0]['id']);
$dphotos='naissance';//dossier photos
$fichier1 = "d:/framework/public/webcam/".$dphotos."/".$this->user[0]['id'].'.jpg' ;
if (file_exists($fichier1))
{
$fichier = "/".$this->user[0]['id'] ;}
else 
{
$fichier = "/f" ;	
}

	echo '<div    id="content_1" class="contenttabs1">  ';
	// echo '<label class="NAIS"  id="lDHE">Date examen :</label>';            
	echo '<input class="NAIS" id="DHE1"   type="txt"  name="DHE1"   value="'.$data['DHE1'].'" placeholder="00-00-0000" onblur="genererCodeP()"/>';                                                                        
	echo "<p>";
	echo '<select class="NAIS" id="DHE2" name="DHE2">';
	for($i=$x+1; $i<=24; $i += 1) {echo '<option value="'.$i.'">'.html::heuresPlus($this->user[0]['HHOSP'],$i-1).' : (H'.$i.')</option>';}
	echo "</select>";
	echo "</p> ";	
	if (isset($this->userlastview[0]['RCF'])) {
	echo '<label class="NAIS"  id="lASTRCF"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['RCF'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTRCF"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
	if (isset($this->userlastview[0]['DIC'])) {
	echo '<label class="NAIS"  id="lASTDIC"> &nbsp;<img src="'.URL.'public/images/cercle.png"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['DIC'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTDIC"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
	if (isset($this->userlastview[0]['DEP'])) {
    echo '<label class="NAIS"  id="lASTDEP"> &nbsp;<img src="'.URL.'public/images/demicercle.png"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['DEP'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTDEP"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
	if (isset($this->userlastview[0]['NDC'])) {
    echo '<label class="NAIS"  id="lASTNDC"> &nbsp;<img src="'.URL.'public/images/rectangle.png"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['NDC'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTNDC"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
	if (isset($this->userlastview[0]['TAD'])) {
    echo '<label class="NAIS"  id="lASTTAS"> &nbsp;<img src="'.URL.'public/images/ta.jpg"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['TAS'].'/'.$this->userlastview[0]['TAD'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTTAS"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
	if (isset($this->userlastview[0]['DHE1'])) {
    echo '<label class="NAIS"  id="lASTDHE1"> &nbsp;<img src="'.URL.'public/images/DHE.PNG"   width="17" height="17" border="0" alt="" />&nbsp;'.HTML::dateUS2FR($this->userlastview[0]['DHE1']).'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTDHE1"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
	if (isset($this->userlastview[0]['DHE2'])) {
    echo '<label class="NAIS"  id="lASTDHE2"> &nbsp;<img src="'.URL.'public/images/DHE.PNG"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['DHE2'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTDHE1"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	if (isset($this->userlastview[0]['POOLS'])) {
    echo '<label class="NAIS"  id="lASTPOOLS"> &nbsp;<img src="'.URL.'public/images/POOLS.jpg"   width="17" height="17" border="0" alt="" />&nbsp;'.$this->userlastview[0]['POOLS'].'</label>';
	} else {
	echo '<label class="NAIS"  id="lASTDHE1"> &nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;***</label>';
	}
	
    $dhe = array(0=>17,1=>17+(14.5*1),2=>17+(14.5*2),3=>17+(14.5*3),4=>17+(14.5*4),5=>17+(14.5*5),6=>17+(14.5*6),7=>17+(14.5*7),8=>17+(14.5*8),9=>17+(14.5*9),10=>17+(14.5*10),11=>17+(14.5*11),12=>17+(14.5*12),13=>17+(14.5*13),14=>17+(14.5*14),15=>17+(14.5*15),16=>17+(14.5*16),17=>17+(14.5*17),18=>17+(14.5*18),19=>17+(14.5*19),20=>17+(14.5*20),21=>17+(14.5*21),22=>17+(14.5*22),23=>17+(14.5*23),24=>17+(14.5*24));$DHE = array();
	$rcf = array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8);$RCF = array();
	$dic = array(10=>0,9=>1,8=>2,7=>3,6=>4,5=>5,4=>6,3=>7,2=>8,1=>9,0=>10);$DIC = array();
	$dep = array(5=>0,4=>1,3=>2,2=>3,1=>4,0=>5);$DEP = array();
	$pools = array(120=>0,110=>1,100=>2,90=>3,80=>4,70=>5,60=>6);$POOLS = array();
	$tas=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8,90=>9,80=>10,70=>11,60=>12,50=>11,40=>10,30=>9,20=>8,10=>7,0=>6);$TAS = array();
	$tad=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8,90=>9,80=>10,70=>11,60=>12,50=>11,40=>10,30=>9,20=>8,10=>7,0=>6);$TAD = array();
	$LA = array();
	$DC = array();
	$NDC = array();
	foreach($this->trav as $key => $value)
	{ 
	array_push($DHE,$dhe[$value['DHE2']-1]);
	array_push($RCF,(38+(20*$rcf[$value['RCF']])));
	array_push($DIC,(38+(20*$dic[$value['DIC']])));
	array_push($DEP,(38+(20*$dep[$value['DEP']])));
	array_push($POOLS,(38+(20*$pools[$value['POOLS']])));
	array_push($TAS,(38+(20*$tas[$value['TAS']])));
    array_push($TAD,(38+(20*$tad[$value['TAD']])));
	array_push($LA,$value['LA']);
	array_push($DC,$value['DC']);
	array_push($NDC,$value['NDC']);
	}
	
	// echo '<pre>';
	// print_r ($NDC) ;
	// echo '</pre>';
	?><canvas id="myCanvasprt" width="365" height="310" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	
	
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
	echo'<td id="travth" >'.$value['DHE2'].'</td>';
	echo'<td id="travth" >'.$value['RCF'].'</td>';
	echo'<td id="travth" >'.$value['DIC'].'</td>';
	echo'<td id="travth" >'.$value['DEP'].'</td>';
	echo'<td id="travth" >'.$value['POOLS'].'</td>';
	echo'<td id="travth" >'.$value['TAS'].'/'.$value['TAD'].'</td>';
	echo '<td id="travth" ><a class="delete" title="supprimer"  href="'.URL.'naissance/deletetrav/'.$value['id'].'/'.$this->user[0]['id'].'/'.'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
	echo '</tr>';			
	}
	echo "</table>";	
	echo '</div>';
	
	
	
	echo '<div    id="content_2" class="contenttabs2">';
	echo '<label class="NAIS"  id="lRCF">&nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;Rythme cardiaque foetal</label>';         
	echo "<p>";
	echo '<select class="NAIS" id="RCF" name="RCF">';
	for($i=100; $i<=180; $i += 10) {echo '<option value="'.$i.'">'.$i.' Pul/mn</option>';}
	echo "</select>";
	echo "</p> ";
																		  
	echo '<label class="NAIS"  id="lLA">&nbsp;<img src="'.URL.'public/images/la.png"   width="17" height="17" border="0" alt="" />&nbsp;Liquide amniotique</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="LA" name="LA">';
	echo '<option value="I">Membranes intactes LA absent</option>';
	echo '<option value="C">Membranes rompues  LA clair </option>';
	echo '<option value="M">Membranes rompues  LA teinte</option>';
	echo '<option value="A">Membranes rompues  LA absent </option>';
	echo "</select>";
	echo "</p> ";

	echo '<label class="NAIS"  id="lDC">&nbsp;<img src="'.URL.'public/images/defcra.jpg"   width="17" height="17" border="0" alt="" />&nbsp;Deformation cranienne</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="DC" name="DC">';
	echo '<option value="O">OS Separés</option>';
	echo '<option value="+">OS Contigues +</option>';
	echo '<option value="++">OS Chevauchés ++ </option>';
	echo '<option value="+++">OS Chevauchés +++</option>';
	echo "</select>";
	echo "</p> ";
	?><canvas id="myCanvasprtf" width="365" height="315" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	echo '</div>';
	
	
	
	echo '<div id="content_3" class="contenttabs3">';
	echo '<label class="NAIS"  id="lDIC">&nbsp;<img src="'.URL.'public/images/cercle.png"   width="17" height="17" border="0" alt="" />&nbsp;Dilatation du col :</label>';        
	echo "<p>";
	echo '<select class="NAIS" id="DIC" name="DIC">';
	for($i=0; $i<=10; $i += 1) {echo '<option value="'.$i.'">'.$i.' cm</option>';}
	echo "</select>";
	echo "</p> ";          
	echo '<label class="NAIS"  id="lDEP">&nbsp;<img src="'.URL.'public/images/demicercle.png"   width="17" height="17" border="0" alt="" />&nbsp;Descente de la tete :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="DEP" name="DEP">';
	for($i=5; $i>=0; $i -= 1) {echo '<option value="'.$i.'">'.$i.'/5</option>';}
	echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lNDC">&nbsp;<img src="'.URL.'public/images/rectangle.png"   width="17" height="17" border="0" alt="" />&nbsp;Nombre de contarction :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="NDC" name="NDC">';
	for($i=1; $i<=5; $i += 1) {echo '<option value="'.$i.'">'.$i.' contarction en 10 min</option>';}
	echo "</select>";
	echo "</p> "; 
	echo '<label class="NAIS"  id="LDCU">&nbsp;<img src="'.URL.'public/images/horloge.png"   width="17" height="17" border="0" alt="" />&nbsp;Duree</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="DCU" name="DCU">';
	echo '<option value="0">0 s</option>';
	echo '<option value="1"> < 20 s</option>';
	echo '<option value="2">20-40 s</option>';
	echo '<option value="3"> > 40 s</option>';
	echo "</select>";
	echo "</p> ";
	?><canvas id="myCanvasprtl" width="365" height="315" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	echo '</div>';
	
	echo '<div id="content_4" class="contenttabs4"> ';
	echo '<label class="NAIS"  id="lPOOLS">&nbsp;<img src="'.URL.'public/images/pools.jpg"   width="17" height="17" border="0" alt="" />&nbsp;Pools :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="POOLS" name="POOLS">';
	for($i=60; $i<=120; $i += 10) {echo '<option value="'.$i.'">'.$i.' Pul/mn</option>';}
	echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lTAS">&nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;TA systolique :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TAS" name="TAS">';
	for($i=60; $i<=180; $i += 10) {echo '<option value="'.$i.'">'.$i.' mm/hg</option>';}
	echo "</select>";
	echo "</p> ";    

	echo '<label class="NAIS"  id="lTAD">&nbsp;<img src="'.URL.'public/images/bpm.jpg"   width="17" height="17" border="0" alt="" />&nbsp;TA diastolique :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TAD" name="TAD">';
	for($i=60; $i<=180; $i += 10) {echo '<option value="'.$i.'">'.$i.'  mm/hg</option>';}
	echo "</select>";
	echo "</p> ";   


	echo '<label class="NAIS"  id="lTEMP">&nbsp;<img src="'.URL.'public/images/temp.jpg"   width="17" height="17" border="0" alt="" />&nbsp;T° :</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="TEMP" name="TEMP">';
	for($i=37; $i<=40; $i += 1) {echo '<option value="'.$i.'">'.$i.'°</option>';}
	echo "</select>";
	echo "</p> "; 

	echo '<label class="NAIS"  id="LPRTU">&nbsp;<img src="'.URL.'public/images/labo.jpg"   width="17" height="17" border="0" alt="" />&nbsp;PR-U</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="PRTU" name="PRTU">';
	echo '<option value="O">(-)</option>';
	echo '<option value="+">(+)</option>';
	echo '<option value="++">(++)</option>';
	echo '<option value="+++">(+++)</option>';
	echo "</select>";
	echo "</p> ";

	echo '<label class="NAIS"  id="LACU">&nbsp;<img src="'.URL.'public/images/labo.jpg"   width="17" height="17" border="0" alt="" />&nbsp;AC-U</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="ACU" name="ACU">';
	echo '<option value="O">(-)</option>';
	echo '<option value="+">(+)</option>';
	echo '<option value="++">(++)</option>';
	echo '<option value="+++">(+++)</option>';
	echo "</select>";
	echo "</p> ";

	echo '<label class="NAIS"  id="LVU">&nbsp;<img src="'.URL.'public/images/vu.png"   width="17" height="17" border="0" alt="" />&nbsp;V-U</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="VU" name="VU">';
	for($i=0; $i<=250; $i += 10) {echo '<option value="'.$i.'">'.$i.' ml</option>';}
	echo "</select>";
	echo "</p> ";


	echo '<label class="NAIS"  id="LOXY">&nbsp;<img src="'.URL.'public/images/pha.jpg"   width="17" height="17" border="0" alt="" />&nbsp;Oxytocine</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="OXY" name="OXY">';
	for($i=0; $i<=20; $i += 5) {echo '<option value="'.$i.'">'.$i.' UI</option>';}
	echo "</select>";
	echo "</p> ";

	echo '<label class="NAIS"  id="LNOXY">&nbsp;<img src="'.URL.'public/images/gs.jpg"   width="17" height="17" border="0" alt="" />&nbsp;Debit</label>'; 
	echo "<p>";
	echo '<select class="NAIS" id="NOXY" name="NOXY">';
	for($i=0; $i<=20; $i += 1) {echo '<option value="'.$i.'">'.$i.' Gtt/mn</option>';}
	echo "</select>";
	echo "</p> ";

	?><canvas id="myCanvasprtm" width="365" height="315" style="border:1px solid #c3c3c3;">Your browser does not support the canvas element.</canvas><?php 
	echo '<input id="submitnewx" type="submit" />	'; 
	echo '</div>';
 ?>			
<?php													

?>			
			
			
</div>


</form>


</div>

<div class="content"><img id="image" src="<?php echo URL;?>public/webcam/naissance/<?php echo $fichier.".jpg?t=".time();?>" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo "Surveillance du travail et de l'accouchement";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>


<script>
var DHE = <?php echo json_encode($DHE); ?>;
var RCF = <?php echo json_encode($RCF); ?>;
var DIC = <?php echo json_encode($DIC); ?>;
var DEP = <?php echo json_encode($DEP); ?>;
var POOLS = <?php echo json_encode($POOLS); ?>;
var TAS = <?php echo json_encode($TAS); ?>;
var TAD = <?php echo json_encode($TAD); ?>;
var LA = <?php echo json_encode($LA); ?>;
var DC = <?php echo json_encode($DC); ?>;
var NDC = <?php echo json_encode($NDC); ?>;
//rcf
var canvas = document.getElementById("myCanvasprtf");var ctx = canvas.getContext("2d");ctx.fillStyle = "#FFFFFF";
//***********************************************************************************//
txt(ctx,"I Rythme Cardiaque Foetal ",10,25);
carrex(ctx,10,30,3,24,"#F5FFFA");horaire(ctx,17,223);
carrex(ctx,10,90,4,24,"#7FFFD4");
carrex(ctx,10,170,3,24,"#F5FFFA");
txt(ctx,"II Liquide amniotique ",10,236);
carres(ctx,10,240,24,"#FFFFFF");
txt(ctx,"III Déformation Cranien",10,266);
carres(ctx,10,270,24,"#FFFFFF");
line(ctx,10,88,358,88,"#DC143C");
line(ctx,10,168,358,168,"#DC143C");
horaire(ctx,17,221);
ctx.beginPath();
for (var i = 0; i < DHE.length; i++) {	
ctx.fillStyle = "black";ctx.textAlign = "center";ctx.font = "12px Arial";
ctx.fillText(LA[i],DHE[i],198+55);
}
for (var i = 0; i < DHE.length; i++) {	
ctx.fillStyle = "black";ctx.textAlign = "center";ctx.font = "10px Arial";
ctx.fillText(DC[i],DHE[i],198+85);
}
indicateur(ctx,1,RCF,"#DC143C");
//labor
var canvasl = document.getElementById("myCanvasprtl");var ctxl = canvasl.getContext("2d");ctxl.fillStyle = "#FFFFFF";
txt(ctxl,"Dilatation du col /Descente de la presentation",10,25);
carrex(ctxl,10,30,8,24,"#FFFFFF");
carrex(ctxl,10,190,3,8,"#FFEBCD");carrex(ctxl,126,190,3,16,"#FFFFFF");
carres(ctxl,10,250,24,"#FFFFFF");horaire(ctxl,17,261);
txt(ctxl,"Nombre de Contractionen 10 mn ",10,285);
carres(ctxl,10,290,24,"#FFFFFF");
line(ctxl,10,188,125,188,"#DC143C");
line(ctxl,125,188,125,248,"#DC143C");
line(ctxl,125,188,242,30,"#DC143C");
line(ctxl,185,188,302,30,"#DC143C");
//*********************DIC*************************//
indicateur(ctxl,1,DIC,"blue");
//**********************DEP************************//
indicateur(ctxl,100,DEP,"green");
//**********************NDC************************//
for (var i = 0; i < DHE.length; i++) {	
ctxl.fillStyle = "black";ctxl.textAlign = "center";ctxl.font = "10px Arial";
ctxl.fillText(NDC[i],DHE[i],303);
}
//maternel
var canvasm = document.getElementById("myCanvasprtm");var ctxm = canvasm.getContext("2d");
txt(ctxm,"POOLS /TA",10,25);
carrex(ctxm,10,30,5,24,"#FFFFFF");
carrex(ctxm,10,130,6,24,"#7FFFD4");
carrex(ctxm,10,250,3,24,"#FFFFFF");
line(ctxm,10,128,358,128,"#DC143C");
line(ctxm,10,248,358,248,"#DC143C");
horaire(ctxm,17,301);
//**********************ta************************//
ta(ctxm,"black");
//**********************POOLS************************//
indicateur(ctxm,120,POOLS,"red");
</script>	