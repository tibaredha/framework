<div class="sheader1l"><p id="lregister">Gérer les sage-femmes <?php //echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l"> Modifier une sage-femme</div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	<form class="tabaut" method="post" action="<?php echo URL."sf/editSave/".$this->user[0]['id'];?>">
		<div class="section"><span>2</span>Nom</div>
		<div class="inner-wrap"><input  type="text" name="Nom" value="<?php echo $this->user[0]['Nom'];?>"/></div>
		<div class="section"><span>3</span>Prénom</div>
		<div class="inner-wrap"><input  type="text" name="Prenom" value="<?php echo $this->user[0]['Prenom'];?>"/></div>
	    </br>
		<input type="hidden" name="wilaya" value="<?php echo Session::get('wilaya')  ;?>"/>
        <input type="hidden" name="structure" value="<?php echo Session::get('structure')  ;?>"/>
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/med.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>			
<div class="scontentl2">Modifier une sage-femme</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		