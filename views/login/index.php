<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}
#aa,#bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}
#remember{background: #00cc00; text-align: center;border-radius: 5px;width: 10%;height: 70%; color: white;}

.x {color: #fff;}

#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 3 / 4;}
#c {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 4 / 5;}
#d {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 5 / 6;color: white;}
#e {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 6 / 7;}
#f {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 7 / 8;}
#g {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 8 / 9;}
</style>
<div class="sheader1l">
<?php 
// echo $_COOKIE['rememberme'];
Session::init();
if (isset($_SESSION['errorlogin'])){echo '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';}else{echo '<p id="llogin">Gérer un compte </p>';}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php if (isset($_SESSION['error'])){echo $_SESSION['error'];}else{echo 'Se Connecter';}//error connection databases classe Model ?></div>

<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
	<form action="<?php echo URL.'login/run';?>" method="post">			
		<div id="inner-grid">
			<div id="a">Programme : 
			<?php 
			echo '<select id="aa" name="demgraphie">';
			echo '<option value="1">Décès</option>';
			echo '<option value="2">Naissance</option>';
			echo '<option value="3">Bnm</option>';
			echo '<option value="4">Evacuation</option>';
			echo "</select>";
			?> 
			
			</div>
			<div id="b">Nom d'utilisateur :  <input id="bb"  type="text"     name="login"    value="tibaredha"  required=""   /></div>
			<div id="c">Mot de passe :       <input id="cc"  type="password" name="password" value="030570"     required=""   /></div>
			<div id="d"><a class="x" href="<?php echo URL;?>register">S'inscrire</a>&nbsp;&nbsp;&nbsp;<a class="x" href="<?php echo URL;?>register/forget">Mot de passe oublié</a> </div>
			
			<div id="e"><input type="checkbox" id="remember" name="remember" value="1"> Se souvenir de moi</div>
			<div id="f"><input id="dd" onclick="playSound()"  type="submit" value="Envoyer"/> </div>
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
	