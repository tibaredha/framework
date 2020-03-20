<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 2fr 1fr  ;
  grid-template-rows: 45px 55px   ;
  grid-gap: 5px;
}
#wilayarg,#structurerg,#role,#dd,#ee,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 70%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}
#a {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 1 / 2;}
#b {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 2 / 3;}
</style>
<div class="sheader1l"><?php Session::init();if (isset($_SESSION['errorlogin'])) {$sError = '<p id="errorlogin">' . $_SESSION['errorlogin'] . '</p>';echo $sError;}else{$sError='<p id="lregister">Gérer un compte </p>';echo $sError;}?></div>
<div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Mot de passe oublié </div>
<div class="sheader2r">MSPRH</div><!---->
<div class="contentl formaut">
	<form class="tabaut"action="<?php echo URL;?>register/recuperer/" method="post">	
		<div id="inner-grid">
			<div id="a">E-mail : <input id="ee" type="text"   name="Email"   required="" autofocus /></div>
			<div id="b"><input id="hh" onclick="playSound()"  type="submit" /></div>
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