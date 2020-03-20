<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-template-rows: 45px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}
#DATESBD{background: yellow; text-align: center; border-radius: 5px;width:50%;height: 100%;}
#DATECSBD{ text-align: center; border-radius: 5px;width:50%;height: 100%;}


#x  {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 2  / 6;   grid-row: 1 / 2;}#y  {background: yellow;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10; grid-row: 1 / 2;}
#x1 {background: yellow;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 13;  grid-row: 1 / 2;}#y1 {background: yellow;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 1 / 2;}
#x2 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 10;  grid-row: 2 / 3;}#y2 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 16; grid-row: 2 / 3;}
#x3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 13;  grid-row: 7 / 8;}#y3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 7 / 8;}
.ax {background: yellow; text-align: center; border-radius: 5px;width:11%;height: 100%;}.bx {background: white;  text-align: center; border-radius: 5px;width:11%;height: 100%;}
#a {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 3 / 4;}#b {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 3 / 4;}
#c {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 4 / 5;}#d {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 4 / 5;}
#e {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 5 / 6;}#f {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 5 / 6;}
#g {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 6 / 7;}#h {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 6 / 7;}
.ax1 {background: yellow; text-align: center; border-radius: 5px;width:17%;height: 100%;}.bx1 {background: white;  text-align: center; border-radius: 5px;width:17%;height: 100%;}
#a1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 3 / 4;}#b1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 3 / 4;}
#c1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 4 / 5;}#d1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 4 / 5;}
#e1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 5 / 6;}#f1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 5 / 6;}
#g1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 6 / 7;}#h1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 6 / 7;}
.remember{background: #00cc00; text-align: center;border-radius: 5px;width: 10%;height: 70%; color: white;}
#l {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 16;  grid-row: 8 / 9;}
#l1 {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#l1:hover {background: red;color: #fff;}
</style>

<div class="sheader1l">
<?php 
// echo $_COOKIE['rememberme'];
// Session::init();
// if (isset($_SESSION['errorlogin'])){echo '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';}else{echo '<p id="llogin">Gérer un compte </p>';}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php //html::NAV();?></p></div>
<div class="sheader2l"> <?php //echo EDRSFR;?></div>
<div class="sheader2r"></div>
<div class="listl">
	<form action="<?php echo URL.'sscolaire/createexamen';?>" method="post">			
		<div id="inner-grid">
		
			<div id="x">Date examen : <input id="DATESBD"   type="txt"  name="DATESBD"   value="<?php echo date('d-m-Y');?>"  /> </div>
			<div id="y"><input type="checkbox"  class="remember"  name="HYGIENE"   value="1" />&nbsp;<a href="<?php echo URL ;?>">Hygiene NA</a> </div>			
			<div id="x1"><input type="checkbox" class="remember"  name="GINGIVITE" value="1"/>&nbsp;<a href="<?php echo URL ;?>">Gingivite</a> </div>
			<div id="y1"><input type="checkbox" class="remember"  name="AODF"/>&nbsp;<a href="<?php echo URL ;?>">Anomalie ODF</a> </div>
			
			<div id="x2">Dents permanentes </div><div id="y2">Dents temporaires </div>
			<div id="a"><?php for ($i = 18; $i >= 11; $i-= 1){html::cao("d".$i);} ?></div> <div id="b"><?php for ($i = 21; $i <= 28; $i+= 1){html::cao("d".$i);} ?></div>
			<div id="c"><?php for ($i = 18; $i >= 11; $i-= 1){html::caol($i);} ?></div>    <div id="d"><?php for ($i = 21; $i <= 28; $i+= 1){html::caol($i);} ?></div>
			<div id="e"><?php for ($i = 48; $i >= 41; $i-= 1){html::caol($i);} ?></div>    <div id="f"><?php for ($i = 31; $i <= 38; $i+= 1){html::caol($i);} ?></div>
			<div id="g"><?php for ($i = 48; $i >= 41; $i-= 1){html::cao("d".$i);} ?></div> <div id="h"><?php for ($i = 31; $i <= 38; $i+= 1){html::cao("d".$i);}?></div>
			
			<div id="a1"><?php for ($i = 55; $i >= 51; $i-= 1){html::cao1("d".$i);} ?></div> <div id="b1"><?php for ($i = 61; $i <= 65; $i+= 1){html::cao1("d".$i);} ?></div>
			<div id="c1"><?php for ($i = 55; $i >= 51; $i-= 1){html::caol1($i);} ?></div>    <div id="d1"><?php for ($i = 61; $i <= 65; $i+= 1){html::caol1($i);} ?></div>
			<div id="e1"><?php for ($i = 85; $i >= 81; $i-= 1){html::caol1($i);} ?></div>    <div id="f1"><?php for ($i = 71; $i <= 75; $i+= 1){html::caol1($i);} ?></div>
			<div id="g1"><?php for ($i = 85; $i >= 81; $i-= 1){html::cao1("d".$i);} ?></div> <div id="h1"><?php for ($i = 71; $i <= 75; $i+= 1){html::cao1("d".$i);}?></div>
			
			
			
			<div id="x3">     <input type="checkbox" title="Cocher pour activer le RDV" id="YOURBOX"  class="remember"  name="OKRDV"     value="1"  />&nbsp;Convocation  </div>
			<div id="y3">Le : <input type="txt"      title="Date rdv RDV"               id="DATECSBD"                   name="DATECSBD"   value=""  /> </div>
			

			<div id="l"><input id="l1" onclick="playSound()"  type="submit" value="Envoyer"/> </div>
			<div ><input type="hidden" name="IDELEVE"  value="5"/> </div>
			<div ><input type="hidden" name="NIVEAUS"  value="0"/> </div>
			<div ><input type="hidden" name="ETABLIS"  value="1"/> </div>
			<div ><input type="hidden" name="UDS"      value="1"/> </div>
			
		</div>
	</form>
</div>	
<div class="scontentl2"></div>		
<div class="scontentl3"></div>
<div class="scontentr1"></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			
<div class="sheader1l"><p id="dashboard"><?php //echo TXT_SMENUE1 ;?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">a</div>
<div class="sheader2r">b</div>	
<div class="scontentl2">c</div>		
<div class="scontentl3">d</div>
<div class="scontentr1">e</div>
<script>
var checkbox = document.querySelector("#YOURBOX");
var input = document.querySelector("#DATECSBD");
var toogleInput = function(e){input.disabled = !e.target.checked;};
toogleInput({target: checkbox});
checkbox.addEventListener("change", toogleInput);
</script>
	