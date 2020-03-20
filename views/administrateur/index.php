<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 10px 45px 50px  ;
  grid-gap: 5px;
}
#aa,#bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}

.x {color: #fff;}
#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 3;}
#f {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 3 / 4;}
.a {background: salmon;text-align: left;color: white; border-radius: 5px;padding: 3px;}

.ah {color: white;}
.ah:hover {color: black;}
</style>
<div class="sheader1l"><p id="lhelp"><?php echo TXT_SMENUE1  ?></p></div><div class="sheader1r"><p id="lhelp"><?php html::NAV();?></p></div>
<div class="sheader2l">Administrateur</div><div class="sheader2r">MSPRH</div>
<div class="contentl"><br>
<p class="a">Messages Reçus   : <a class="ah" href="<?php echo URL ;?>Msgs">* Vous avez <?php echo $this->nbrmsglu ;?> nouveau(x) message(s).  </a></p>
<p class="a">Messages Envoyés : <a class="ah" href="<?php echo URL ;?>Msgs">* Vous avez <?php echo $this->nbrmsgef ;?> message(s) effacer(x) . </a> </p>
<p class="a"><?php echo "* Votre  ip : ". Ip::get_ip();?> <a class="ah" href="<?php echo URL ;?>administrateur/listeJeton">. Il y a <?php echo $this->nbrip ;?> adresse(s) ip qui se connecte(nt) à votre espace membre. </a> </p>
<p class="a"><a class="ah" href="<?php echo URL ;?>users/searchusers/0/10?o=id&q=">* Il y a <?php echo $this->nbrmembre ;?> membres inscrits </a></p>

<?php 
if (isset($_COOKIE['tibaredha'])) {
	// echo 'Bonjour '.$_COOKIE['tibaredha'].' !';
}

?>


<form action="<?php echo URL.'administrateur/activation';?>" method="post">	<div id="inner-grid"><div id="a">Mode d'Activation : <?php echo '<select id="aa" name="mode">';echo $this->listeActivation;echo "</select>";?> </div><div id="f"><input id="dd" onclick="playSound()"  type="submit" value="Envoyer"/> </div></div></form>
<marquee behavior="slide" direction="up" scrollamount="4"></marquee>	
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/help.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
