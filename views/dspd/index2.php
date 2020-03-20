<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php
$ctrl='dspd';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'Nouveau certificat ',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'Evaluation',     "tb2" => 'Imprimer rapport', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG');
html::form($data) ;
?>
</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="contentl">';$this->clgraphe->multiPie(30,340,'Décès Par sexe  Arret Au : ','deceshosp','DINS',date("Y-01-01"),date("Y-12-31"),'IS NOT NULL') ;echo "</div>";
echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
echo'<div class="contentr"><img id="image" src="'.URL.'public/images/'.logo.'"></div>';
?>	
<div class="scontentl2"><?php echo '<a class="DECES"  id="annee"  href="'.URL.$ctrl.'/graphe/0">Année</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/1">Mois</a>';?></div>		
<div class="scontentl3"><?php echo '<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/2">Sexe</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/3">Age</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/4">CD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/5">LD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/6">DM</a>';?></div>
<div class="scontentr1"><?php echo dsp; ?></div>
