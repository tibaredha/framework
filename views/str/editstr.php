<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}

#wilayarg,#structurerg,#lang,#dd,#ee,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 50%;height: 100%;}

#WILAYA2,#communefr,#communear,#pop2018 {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}

#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}

#ddx {background: #00cc00; text-align: center;border-radius: 5px;width: 50%;height: 100%; color: white;}
#ddx:hover {background: red;color: #fff;}

.per{background: #00cc00; text-align: right;border-radius: 5px;width: 10%;height: 60%; color: white;}


#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 3 / 4;}
#c {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 4 / 5;}
#d {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 5 / 6;}
#e {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 6 / 7;}

#ax {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 2 / 3;}
#bx {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 3 / 4;}
#cx {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 4 / 5;}
#dx {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 5 / 6;}
#ex {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 6 / 7;}
#g {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 10;  grid-row: 8 / 9;}
</style>

<div class="sheader1l"><p id="lregister"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Modifier une structure sanitaire
<?php 
$ctrl='cim';
$mdl='searchcim';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'row_id',"diag_nom" =>'diag_nom',"diag_cod" =>'diag_cod'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',           "tb1" => 'nouveau',"vb1" => '',"icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'imp',               "tb2" => 'Print', "vb2" => '',"icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',               "tb3" => 'graphe',"vb3" => '',"icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',                  "tb4" => 'Search',"vb4" => '',"icon4" => 'search.PNG'
);
// html::form($data) ;						
?>
</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\" onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="contentl">';?>
  
	<form method="post" action="<?php echo URL."str/editSave/".$this->user[0]['id'];?>">
	<div id="inner-grid">     
	      
			<div id="a">Structure fr :  <input  type="text" id ="communefr" name="structure"  value="<?php echo $this->user[0]['structure'];?>"/>  </div>
			<div id="b">Structure ar :  <input  type="text" id ="communear" name="structurear" value="<?php echo $this->user[0]['structurear'];?>"/></div>
			
		    <div id="ax">lat :  <input  type="text" id ="communefr" name="lat" value="<?php echo $this->user[0]['lat'];?>"/></div>
			<div id="bx">lg :   <input  type="text" id ="communear" name="lg"  value="<?php echo $this->user[0]['lg'];?>"/></div>

		    <div id="g"><input id="dd" onclick="playSound()"  type="submit"  name="submitx"    value="Mettre &agrave; jour la Structure"/> </div>
	</form>
	</div>
<?php
echo "</div>";	
?>

<div class="content"><img id="image" src="<?php echo URL;?>public/images/eph.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
		
<div class="scontentl2"><?php echo "";echo $this->msg; //echo "2";?></div>		
<div class="scontentl3"><?php echo "";echo $this->msg; //echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>

<script type="text/javascript">
  window.onload = function(){
	        document.getElementById("structurear").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
			}
</script>	




		