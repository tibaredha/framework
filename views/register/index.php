<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 2fr 1fr  ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}

#wilayarg,#structurerg,#role,#dd,#ee,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 50%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}
#a {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 3 / 4;}
#c {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 4 / 5;}
#d {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 5 / 6;}
#e {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 6 / 7;}
#f {background: green ;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 7 / 8;color:white;}
#g {background: salmon;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 8 / 9;color:white;}
</style>
<div class="sheader1l"><?php Session::init();if (isset($_SESSION['errorlogin'])) {$sError = '<p id="errorlogin">' . $_SESSION['errorlogin'] . '</p>';echo $sError;}else{$sError='<p id="lregister">Gérer un compte </p>';echo $sError;}?></div>
<div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Créer un compte </div>
<div class="sheader2r">MSPRH</div><!-- -->
<div class="contentl formaut">
		
	<form class="tabaut"action="<?php echo URL;?>register/Registerrun" method="post">	
		<div id="inner-grid">
			<div id="a">Wilaya : <?php HTML::WILAYA('wilaya','wilayarg','wilaya','wil','17000','DJELFA') ;?></div>
			<div id="b">Structure : <?php HTML::structure('structure','structurerg','structure','01','EPH_MOHAD_ABDELKADER');?></div>
			<div id="c">E-mail :             <input id="ee" type="text"     name="Email"    value="tibaredha@yahoo.fr"  required=""   /></div>
			<div id="d">Nom d'utilisateur :  <input id="ff" type="text"     name="login"    value="tibaredha"           required="" /></div>
			<div id="e">Mot de passe :       <input id="gg" type="password" name="password" value="030570"              required="" /></div>
			<div id="f"><p><?php $captcha=captcha::captchax();echo 'Captcha&nbsp;&nbsp;'.$captcha; ?><input id="gg2"type="text" name="captcha"  value="" placeholder="0000"/><input id="gg2"type="hidden" name="captchax"  value="<?php echo $captcha; ?>"/></p></div>
			<div id="g"><input id="hh" onclick="playSound()"  type="submit" value="Envoyer" /></div>
		</div>
	</form>	
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/register.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>	