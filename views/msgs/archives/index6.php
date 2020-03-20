<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php
$ctrl='dashboard';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => 'nouveau',     "tb1" => 'Créer un nouveau certificat ',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation Mortalité hospitalière', "vb2" => '',  "icon2" => 'print.PNG',
"cb3"         => $ctrl,    "mb3" => '',            "tb3" => '',                                  "vb3" => '',  "icon3" => 'graph.PNG',
"cb4"         => $ctrl,    "mb4" => '',            "tb4" => '',                                  "vb4" => '',  "icon4" => 'search.PNG');
html::form($data) ;
if (!isset($this->nbrvalide)) {echo '<div class="alert0" ><img id="alert1" src="'.URL.'public/images/notification-icon.png" width="30" height="30" border="0" alt="" /></div>' ;} else {echo '<div class="alert0" ><img id="alert1"   src="'.URL.'public/images/notification-icon.png" width="30" height="30" border="0" alt="" /><a id="alert" target="_blank" title="En attente de  validation  "  href="'.URL.$ctrl.'/search/0/10?o=aprouve&q=0'.'" >'.count($this->nbrvalide).'</a></div>' ;}
?>

</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="contentl">';$this->clgraphe->mois(30,340,'Décès maternels par mois arreté au  : ','=1','deceshosp','DINS','',date("Y"),'','='.Session::get('structure'));echo "</div>";
echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
echo'<div class="contentr"><img id="image" src="'.URL.'public/images/'.logo.'"></div>';
?>	
<div class="scontentl2"><?php echo '<a class="DECES"  id="annee"  href="'.URL.$ctrl.'/graphe/0">Année</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/1">Mois</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/7">LN</a>';?></div>		
<div class="scontentl3"><?php echo '<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/2">Sexe</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/3">Age</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/4">CD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/5">LD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/6">DM</a>';?></div>
<div class="scontentr1"><?php echo dsp; ?></div>
