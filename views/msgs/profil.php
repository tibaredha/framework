<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}
#aa,#bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 80%;height: 100%;}
#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}
#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 3 / 4;}
#c {background: salmon;text-align: left;  border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 4 / 7;}
#g {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 8 / 9;}
</style>
<div class="sheader1l"><?php echo '<p id="llogin">Gérer les messages</p>';?></div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Voir le profil de l'expediteur : <?php echo HTML::nbrtostring('users','id',$this->user[0]['id_expediteur'],'login')  ;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
	<form action="<?php echo URL.'Msgs/search/0/10?o=id&q=';?>" method="post">			
		<div id="inner-grid">
			<div id="a">Login :  <input id="aa"  type="text"     name="titre"    value="<?php echo HTML::nbrtostring('users','id',$this->user[0]['id_expediteur'],'login');?>" /> </div>
			<div id="b">Email :  <input id="bb"  type="text"     name="titre"    value="<?php echo HTML::nbrtostring('users','id',$this->user[0]['id_expediteur'],'Email');?>" /></div>
			<div id="c">  </div>
			<?php 
			echo '<input type="hidden" name="id"        value="'.Session::get('id').'"/>';
			echo '<input type="hidden" name="structure" value="'.Session::get('structure').'"/>';
			?>  
			<div id="g"><input id="dd" onclick="playSound()"  type="submit" value="Mettre &agrave; jour le Profil"/> </div>
		</div>
	</form>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/message.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2">Gérer les messages <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>	
	