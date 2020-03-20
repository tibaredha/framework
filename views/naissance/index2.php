<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">

<?php
$ctrl='naissance';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"NOM3"=>'NOM3'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'Evaluation',     "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
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
echo '<div class="contentl">';$this->clgraphe->normaldist(30,340,'normal distribution : ','','avi','date','',date('Y'),'','='.Session::get('structure'));echo "</div>";
echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
echo'<div class="contentr"><img id="image" src="'.URL.'public/images/'.logon.'"></div>';		
?>






	
<div class="scontentl2">
<?php 
	// if (Session::get('loggedIn') == false)
	// {
	// echo '<a href="'.URL.'">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// }
	// else
	// {
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// if (Session::get('login') == admin)
	// {
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
	// }
	// if (Session::get('login') == sadmin)
	// {
	    // echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/x">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
	// }
	echo '<a class="naissance"  id="annee"  href="'.URL.'naissance/graphe/0">Année</a>';echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
	echo '<a class="naissance"  id="ln"  href="'.URL.'naissance/graphe/2">ln</a>';echo '&nbsp;'; 
	// echo '<a href="'.URL.'dashboard/graphe/1">Mois</a>';echo '&nbsp;';
	  
	
	// }
?>			
</div>		
<div class="scontentl3">
<?php 
	// if (Session::get('loggedIn') == false)
	// {
	// echo '<a href="'.URL.'">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// }
	// else
	// {
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// if (Session::get('login') == admin)
	// {
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
	// }
	// if (Session::get('login') == sadmin)
	// {
	    // echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/x">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
	// }
	// echo '<a href="'.URL.'x/user/">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x/x">x</a>';echo '&nbsp;';   
	
	// }
	
	echo '<a class="naissance"  id="mois" href="'.URL.'naissance/graphe/1">Mois</a>';echo '&nbsp;';
?>
</div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		