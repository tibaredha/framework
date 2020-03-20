<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les certificats de Naissance";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "Ajouter produits pharmaceutiques : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">
<?php
$ctrl='dashboard';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau', "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'impr',    "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',     "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',        "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG');
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="contentl formaut">
<div class="form-style-10   ">
	<form  action="<?php echo URL."naissance/createmedfn/".$this->user[0]['id'];  ?>" method="post">			
		<div class="section"><span>1</span>Date de délivrance</div><div class="inner-wrap"><input type="text" name="DATE" required=""  value="<?php echo date('Y-m-d');  ?>"  /></div>
		<div class="section"><span>2</span>Medicament Fournie</div><div class="inner-wrap"><?php HTML::medicament("classMed","idMed","MED1","1","Medicament");?> </div>
		<div class="section"><span>3</span>Quantité Fournie</div><div class="inner-wrap"><input type="text" name="QUT1" value="1"  required=""/></div>
		</br>
		<div class="inner-wrap"><input    type="submit" /></div>
	</form>
</div>	
</div>


<div class="content"><img id="image" src="<?php echo URL;?>public/images/sante.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	