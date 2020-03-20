<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 2fr 1fr  ;
  grid-template-rows: 20px 45px 45px 45px 45px 55px  ;
  grid-gap: 5px;
}

#wilayarg,#structurerg,#lang,#dd,#ee,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 70%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}


#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2 / 3;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2 / 3;  grid-row: 3 / 4;}
#c {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2 / 3;  grid-row: 4 / 5;}
#d {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2 / 3;  grid-row: 5 / 6;}
#e {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2 / 3;  grid-row: 6 / 7;}
#f {background:salmon ;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2 / 3;  grid-row: 7 / 8; color:white;}
#g {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2 / 3;  grid-row: 8 / 9; color:white;}


</style>

<div class="sheader1l">
<?php 
Session::init();
if (isset($_SESSION['errorlogin'])){echo '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';}else{echo '<p id="llogin">Gérer un compte </p>';}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Modifier comte <?php //echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
	<form  method="post" action="<?php echo URL;?>users/userSave/<?php echo Session::get('id');?>">	
		<div id="inner-grid">
			<div id="a">Wilaya : <?php HTML::WILAYA('wilaya','wilayarg','wilaya','wil',Session::get('wilaya'),HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS')) ;?> </div>
			<div id="b">Structure : <?php HTML::structure('structure','structurerg','structure',Session::get('structure'),HTML::nbrtostring('structure','id',Session::get('structure'),'structure')) ?></div>
			<div id="c">Lang : 
			<select id="lang"  name="lang">
			  <option value="fr">FR</option>
			  <option value="en">EN</option>
			  <option value="ar">AR</option>
		    </select></div>
			<div id="d">Login :    <input id="ff" type="text" name="login" value="<?php echo Session::get('login');?>"/> </div>
			<div id="e">Password : <input id="gg" type="password" name="password" /></div>
			<div id="f"><input id="hh" onclick="playSound()"  type="submit"  value="Mettre &agrave; jour le Profil"       /> </div>
		</div>
	</form>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/Login.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			
	