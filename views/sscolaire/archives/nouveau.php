<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-template-rows: 40px  ;
  grid-gap: 10px;
}

#wilayarg,#structurerg,#role,#dd,#ee,#ff,#gg {background: yellow; text-align: center;border-radius: 5px;width: 100%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}

#a {
  background: salmon;padding: 8px;text-align: center;border-radius: 5px;
  grid-column: 1  /4;  grid-row: 1 / 2;
}
#b {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 4  / 5;  grid-row: 1 / 2;
}
#c {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 5  / 6;  grid-row: 1 / 2;
}
#d {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 6  / 7;  grid-row: 1 / 2;
}
#e {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 7  / 13;  grid-row: 1 / 2;
}

</style>

<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">Créer un nouveau certificat de décès <span id ="decret" >Conforme au décret exécutif N° 16-80 du 24 février 2016</span></div>
<div class="sheader2r">ID Défunt( e ) : <label style="display: none;" id="show_codeP"><input type="text" name="code_patient" id="code_patient"  style="border: none; background-color: green; color: white; border-radius: 15px; font-family:courier; text-align:center;  "   size="15" readonly=""></label></div>
<div class="listl">
	<form  action="<?php echo URL."dashboard/create/";?>"  method="POST"> 
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>    	 
			<?php
			$commune1=HTML::nbrtostring('structure','id',Session::get('structure'),'numcom');
	        $commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
			$wilayad1=Session::get('wilaya');
			$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
			$data = array(
			"WILAYAD1"       => $wilayad1, 
			"WILAYAD2"       => $wilayad2, 
			"COMMUNED1"      => $commune1, 
			"COMMUNED2"      => $commune2, 
			"DINS"           => date('d-m-Y'), 
			"HINS"           => date('H:m'), 
			"NOM"            => '', 
			"PRENOM"         => '', 
			"FILSDE"         => '', 
			"ETDE"           => '',
			"SEXE"           => array("M"=>"M","F"=>"F"),"DUREE" => array("Inconnue"=>"IN","Minutes"=>"MI","Heures"=>"HE","Jours"=>"JO","Mois"=>"MO","Annees"=>"AN"),
			"DATENS"         => date('d-m-Y'),
			"WILAYAN1"       => $wilayad1, 
			"WILAYAN2"       => $wilayad2, 
			"COMMUNEN1"      => $commune1,
			"COMMUNEN2"      => $commune2, 
			"WILAYAR1"       => $wilayad1, 
			"WILAYAR2"       => $wilayad2, 
			"COMMUNER1"      => $commune1,
			"COMMUNER2"      => $commune2,
			"ADRESSE"        => '', 
			"OMLI"           => '',
			"MIEC"           => '',
			"EPFP"           => '',
			"DOM"            => '',
			"VP"             => '',
			"AAPLD"          => '',
			"SSP"            => 'checked',
			"SSPV"           => '',
			"AUTRES"         => '',
			"PROFESSION1"    => '1',
			"PROFESSION2"    => 'Sans Profession',
			"DATEHOSPI"      => date('d-m-Y'),
			"HEURESHOSPI"    => date('H:m'),
			"SERVICEHOSPIT1" => '21',
			"SERVICEHOSPIT2" => 'Sans Service',
			"MEDECINHOSPIT1" => '1', 
			"MEDECINHOSPIT2" => 'Sans Medecin',
			"CIM1"           => '', 
			"CIM2"           => '', 
			"CIM3"           => '', 
			"CIM4"           => '', 
			"CIM5"           => '', 
			"CODECIM01"      => '0', 
			"CODECIM02"      => 'CIM 10 - Chapitre  (*la Cause initiale)', 
			"CODECIM1"       => '0', 
			"CODECIM2"       => 'CIM 10 - Catégorie (*la Cause initiale)', 
			"CN"             => 'checked',
			"CV"             => '',
			"CI"             => '',
			"NAT"            => 'checked',
			"ACC"            => '',
			"AID"            => '',
			"AGR"            => '',
			"IND"            => '',
			"AAP"            => '',
			"NDLMAAP"        => 'x', 
			"DECEMAT"        => '',//checked
			"DGRO"           => '',
			"DACC"           => '',
			"DAVO"           => '',
			"AGESTATION"     => '',
			"IDETER"         => 'checked',
			"GM"             => '',//checked
			"MN"             => '',//checked
			"AGEGEST"        => '00',
			"POIDNSC"        => '0000',
			"AGEMERE"        => '00',
			"DPNAT"          => '',//checked
			"EMDPNAT"        => '',
			"POSTOPP"        => '',//checked
			"NOMAR"          => '',
			"PRENOMAR"       => '',
			"FILSDEAR"       => '',
			"ETDEAR"         => '',
			"NOMPRENOMAR"    => '',
			"PROAR"          => '',
			"ADAR"           => ''
			);
			HTML::tabs($data);
			?>
<!--
<div id="content_1" class="contenttabs1">
         <div id="inner-grid">
         <div id="a">a</div>
		 <div id="b">b</div>
		 <div id="c">c</div>
		 <div id="d">d</div>
		 <div id="e">e</div>
		 </div> 
 </div> 		
<div id="content_2" class="contenttabs2">
         <div id="inner-grid">
         <div id="a">a</div>
		 <div id="b">b</div>
		 <div id="c">c</div>
		 <div id="d">d</div>
		 <div id="e">e</div>
		 </div> 
 </div> 		

<div id="content_3" class="contenttabs3">
         <div id="inner-grid">
         <div id="a">a</div>
		 <div id="b">b</div>
		 <div id="c">c</div>
		 <div id="d">d</div>
		 <div id="e">e</div>
		 </div> 
 </div> 		
 
 <div id="content_4" class="contenttabs4">
         <div id="inner-grid">
         <div id="a">a</div>
		 <div id="b">b</div>
		 <div id="c">c</div>
		 <div id="d">d</div>
		 <div id="e">e</div>
		 </div> 
 </div> 		
 
 -->

 
		</div> 
	</form> 
</div>	
<div class="scontentl2">Créer un nouveau certificat de décès</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp;?></div>

<script type="text/javascript">
window.onload = function(){
document.getElementById("NOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("PRENOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("FILSDEAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("ETDEAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("NOMPRENOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("ADAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
}
</script>



	