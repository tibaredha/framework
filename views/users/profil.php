<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}

#wilayarg,#structurerg,#lang,#dd,#ee,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 50%;height: 100%;}

#aa,#bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}

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
<div class="sheader1l"><?php echo '<p id="llogin">Gérer les Membres</p>';?></div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Voir le profil de  : <?php echo HTML::nbrtostring('users','id',$this->user[0]['id'],'login')  ;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
	<form action="<?php echo URL.'users/mprofil/'.$this->user[0]['id'];?>" method="post">			
		<div id="inner-grid">
			<div id="a">Nom :       <input id="aa"  type="text"     name="Nom"          value="<?php echo $this->user[0]['Nom'];?>" />     <input type="checkbox" title="visibiliter du Nom par les membres"       class="per" name="vNom"       value="1"></div>
			<div id="b">Prénom :    <input id="aa"  type="text"     name="Prenom"       value="<?php echo $this->user[0]['Prenom'];?>" />  <input type="checkbox" title="visibiliter du Prenom par les membres"    class="per" name="vPrenom"    value="1"></div>
			<div id="c">Téléphone : <input id="aa"  type="text"     name="Telephone"    value="<?php echo $this->user[0]['Telephone'];?>"/> <input type="checkbox" title="visibiliter du Telephone par les membres" class="per" name="vTelephone" value="1"></div>
			<div id="d">Facebook :  <input id="aa"  type="text"     name="Facebook"     value="<?php echo $this->user[0]['Facebook'];?>"/> <input type="checkbox" title="visibiliter du Facebook par les membres"  class="per" name="vFacebook"  value="1"></div>
			<div id="e">Email :     <input id="bb"  type="text"     name="Email"        value="<?php echo $this->user[0]['Email'];?>"/>    <input type="checkbox" title="visibiliter de l'Email par les membres"   class="per" name="vEmail"     value="1"></div>
			
			<div id="ax">Wilaya : <?php HTML::WILAYA('wilaya','wilayarg','wilaya','wil',Session::get('wilaya'),HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS')) ;?>                   <input type="checkbox" class="per" title="visibiliter de la wilaya par les membres"    name="vwilaya"    value="1"></div>
			<div id="bx">Structure : <?php HTML::structure('structure','structurerg','structure',Session::get('structure'),HTML::nbrtostring('structure','id',Session::get('structure'),'structure')) ?><input type="checkbox" class="per" title="visibiliter de la structure par les membres" name="vstructure" value="1"></div>
			<div id="cx">Lang : 
			<select id="lang"  name="lang">
			  <option value="<?php echo $this->user[0]['lang'];?>"><?php echo $this->user[0]['lang'];?></option>
			  <option value="fr">fr</option>
			  <option value="en">en</option>
			  <option value="ar">ar</option>
            </select>
			<input type="checkbox" class="per" title="visibiliter de la langue par les membres"  name="vlang" value="1"></div>
			<div id="dx">Login :    <input id="ff" type="text"     name="login"    value="<?php echo Session::get('login');?>"/> <input type="checkbox" class="per" title="visibiliter du login par les membres" name="vlogin" value="1"></div>
			<div id="ex">Password : <input id="gg" type="password" name="password" required="" /> <input type="checkbox" class="per" title="visibiliter du password par les membres"name="vpassword" value="1"></div>
			<?php 
			echo '<input type="hidden" name="id"        value="'.Session::get('id').'"/>';
			// echo '<input type="hidden" name="structure" value="'.Session::get('structure').'"/>';
			?>  
			<div id="g"><input id="dd" onclick="playSound()"  type="submit"  name="submitx"    value="Mettre &agrave; jour le Profil"/> </div>
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
	