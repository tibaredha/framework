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
<div class="sheader1l"><p id="lregister"> <?php echo "Modifier wilaya ";//echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Modifier wilaya</div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>

	<form  method="post" action="<?php echo URL."wca/editSavewil/".$this->user[0]['IDWIL'];?>">
	  <div id="inner-grid">    
	    
		    <div id="a">Wilaya :  <?php HTML::WILAYA('WILAYA2','WILAYA2','WILAYA2','wil',$this->user[0]['IDWIL'],View::nbrtostring('wil','IDWIL',$this->user[0]['IDWIL'],'WILAYAS')) ;?>    </div>
			<div id="b">Wilaya fr :  <input  type="text" id ="communefr" name="WILAYAS" value="<?php echo $this->user[0]['WILAYAS'];?>"/>  </div>
			<div id="c">Commune ar :  <input  type="text" id ="communear" name="WILAYASAR" value="<?php echo $this->user[0]['WILAYASAR'];?>"/></div>
			<div id="d">Superficie :  <input  type="text" id ="pop2018"   name="SUPER" value="<?php echo $this->user[0]['SUPER'];?>"/> </div>
	        <div id="e">                  </div>
	        
			<div id="ax">Pop 2015: <input  type="text" id ="pop2018"   name="p2015" value="<?php echo $this->user[0]['p2015'];?>"/> </div>
	        <div id="bx">Pop 2016: <input  type="text" id ="pop2018"   name="p2016" value="<?php echo $this->user[0]['p2016'];?>"/> </div>
	        <div id="cx">Pop 2017: <input  type="text" id ="pop2018"   name="p2017" value="<?php echo $this->user[0]['p2017'];?>"/> </div>
	        <div id="dx">Pop 2018: <input  type="text" id ="pop2018"   name="p2018" value="<?php echo $this->user[0]['p2018'];?>"/> </div>
	        <div id="ex">Pop 2019: <input  type="text" id ="pop2018"   name="p2019" value="<?php echo $this->user[0]['p2019'];?>"/> </div>
			
			<div id="g"><input id="dd" onclick="playSound()"  type="submit"  name="submitx"    value="Mettre &agrave; jour la Wilaya"/> </div>
	</form>
	</div>
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/com.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>			
<div class="scontentl2"><?php echo "Modifier wilaya";//echo $this->msg; echo "2";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "";echo $this->msg; echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

<script type="text/javascript">
  window.onload = function(){
	        document.getElementById("WILAYASAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
			}
</script>