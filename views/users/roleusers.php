<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}
#aa {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
#bb {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
#cc {background: yellow; text-align: left;border-radius: 5px;width: 100%;height: 70%;}

#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}

.x {color: #fff;}
#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 3 / 4;}
#c {background: salmon;text-align: left;  border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 4 / 7;}
#g {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 8 / 9;}
</style>
<div class="sheader1l">
<?php 
echo '<p id="llogin">Gérer les roles</p>';

?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Modifier le role ( <?php echo HTML::nbrtostring('niveau','id',$this->user[0]['role'],'nom_niveau')  ;?> ) du membre : <?php echo HTML::nbrtostring('users','id',$this->user[0]['id'],'login')  ;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">

	<form action="<?php echo URL.'users/rolecreate/'.$this->user[0]['id'];?>" method="post">	
		<div id="inner-grid">
            
			<?php if($this->user[0]['role']== 1) {?><div id="a">Role : <?php html::ROLE("=1");?> </div><?php } else {?><div id="a">Role : <?php html::ROLE("!=1");?> </div><?php }?>
			<div id="b">Titre du Message :  <input id="bb"  type="text"     name="titre"    value="role"  required=""   /></div>
			<div id="c">La raison : <textarea id="cc" name="message" cols="42" rows="3"></textarea></div>
			<?php 
			echo '<input type="hidden" name="Email"     value="'.$this->user[0]['Email'].'"/>';
			echo '<input type="hidden" name="id"        value="'.Session::get('id').'"/>';
			echo '<input type="hidden" name="structure" value="'.Session::get('structure').'"/>';
			?>  
			
			<div id="g"><input id="dd" onclick="playSound()"  type="submit" value="Envoyer"/> </div>
		
		</div>
	</form>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/users.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2">Gérer les messages <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>	
	