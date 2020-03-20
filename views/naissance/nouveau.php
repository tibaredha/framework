<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">Ajouter une femme gestatante</div><div class="sheader2r">
ID NN ( e ) : xxxxxxxx
<label style="display: none;" id="show_codeP">
<input type="text" name="code_patient" id="code_patient"  style="border: none; background-color: green; color: white; font-family:courier; text-align:center;  "   size="15" readonly="">
</label>                                                                 
</div>
<div class="listl">
	<form  action="<?php echo URL."naissance/create/";  ?>"  method="POST"> 
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Etat civil</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">ATCD</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul> 
			<?php
			$commune1=HTML::nbrtostring('structure','id',Session::get('structure'),'numcom');
	        $commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
			$wilayad1=Session::get('wilaya');
			$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
			$data = array(
			"WILAYA1"        => $wilayad1, 
			"COMMUNE1"       => $commune1, 
			"STRUCTURED"     => Session::get('structure'),
			"DINS1"          => date('d-m-Y'), 
			"HINS1"          => date('H:m'), 
			"LOGIN"          => Session::get('login'),
			"NOM2"           => '', 
			"PRENOM2"        => '', 
			"DATENS2"        => date('d-m-Y'),
			"WILAYA21"       => $wilayad1, 
			"WILAYA22"       => $wilayad2, 
			"COMMUNE21"      => $commune1,
			"COMMUNE22"      => $commune2, 
			"PROFESSION21"   => '1',
			"PROFESSION22"   => 'Sans Profession',
			"GROUPAGE"       => array(""=>"","A"=>"A","B"=>"B","AB"=>"AB","O"=>"O"),
			"RH"             => array(""=>"","Positif"=>"P","Negatif"=>"N"),
			"TELMERE"        => '000000000000',
			"NSSMERE"        => '000000000000',
			"NOM3"           => '', 
			"PRENOM3"        => '', 
			"DATENS3"        => date('d-m-Y'),
			"WILAYA31"       => $wilayad1, 
			"WILAYA32"       => $wilayad2, 
			"COMMUNE31"      => $commune1,
			"COMMUNE32"      => $commune2, 
			"PROFESSION31"   => '1',
			"PROFESSION32"   => 'Sans Profession',
			"GROUPAGEP"      => array(""=>"","A"=>"A","B"=>"B","AB"=>"AB","O"=>"O"),
			"RHP"            => array(""=>"","Positif"=>"P","Negatif"=>"N"),
			"TELPERE"        => '000000000000',
			"NSSPERE"        => '000000000000',
			"WILAYA41"       => $wilayad1, 
			"WILAYA42"       => $wilayad2, 
			"COMMUNE41"      => $commune1,
			"COMMUNE42"      => $commune2, 
			"ADRESSE4"       => '', 
			"NUMLF"          => '00000', 
			"DNUMLF"         => date('d-m-Y'), 
			"WILAYALF1"      => $wilayad1, 
			"WILAYALF2"      => $wilayad2, 
			"COMMUNELF1"     => $commune1,
			"COMMUNELF2"     => $commune2, 
			"GESTE"          => array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"PARITE"         => array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"ABRT"           => array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"CESA"           => array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"EVBP"           => array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"DT12"           => '',
			"HTA"            => '',
			"CRD"            => '',
			"EPL"            => '',
			"AUT"            => '',
			"NOMARM"         => '',
			"PRENOMARM"      => '',
			"NOMARP"         => '',
			"PRENOMARP"      => '',
			"ADARPM"         => ''
			);
			HTML::tabsns($data);
			?>				
		</div> 
	</form> 
</div>	
<div class="scontentl2"><?php echo '<a class="naissance"  id="mois" href="'.URL.'naissance/XXX/XXX/">XXX</a>';echo '&nbsp;';?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>



              



<script type="text/javascript">
  window.onload = function(){
	        document.getElementById("NOMAR6").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
            document.getElementById("PRENOMAR6").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
            document.getElementById("NOMAR7").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
            document.getElementById("PRENOMAR7").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
            document.getElementById("ADAR8").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
			}
</script>

<script>
function playSound() {
var sound = document.getElementById("beep");
sound.play();
} 
</script>
	
<audio id="beep" src="<?php echo URL;?>public/beep-09.wav" type="audio/wav"></audio>		
	
	
	