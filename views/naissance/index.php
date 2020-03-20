<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">

<?php
$ctrl='naissance';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"Nom mère"=>'NOM2',"Prénom mère"=>'PRENOM2'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'Evaluation',     "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG');
html::form($data) ;

if (!isset($this->nbrvalide)) {
echo '<p id="alert"  ><img src="'.URL.'public/images/alerte.jpg"   width="30" height="30" border="0" alt=""   /></p>' ;
} else {
echo '<p id="alert"  > <img src="'.URL.'public/images/alerte.jpg"   width="30" height="30" border="0" alt=""   /><a target="_blank" title="En attente de  validation  "  href="'.URL.$ctrl.'/search/0/10?o=aprouve&q=0'.'" >('.count($this->nbrvalide).')</a></p>' ;
}

?>

</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>

<?php

		if (isset($this->userListview))
		{
		ob_start();
		$colspan=19;
		$urlx = explode('/',$_GET['url']);
		$order   = !empty($_GET["ad"])   ? $_GET["ad"]   : "asc";
		$ad = "asc";
		if($order == "asc") {$ad = "desc";$down='minidown.png';}else {$down='miniup.png';}
		echo '<div class="listl">';
		echo'<table>';
			echo'<tr bgcolor="#00CED1">';
			echo'<th class="crtl">Val</th>';
			echo'<th class="crtl">Pdf</th>';
			echo'<th class="crtl">Photos</th>';
			echo'<th >Nom_Prénom_(mére)</th>';
			echo'<th class="crtl">Entr</th>';
			echo'<th class="crtl">Obser</th>';
			echo'<th class="crtl">Trav</th>';
			echo'<th class="crtl">Nss</th>';
			echo'<th class="crtl">Ord</th>';
			
			echo'<th class="crtl">Sort</th>';
			echo'<th class="crtl">Déces</th>';
			echo'<th class="crtl">Update</th>';
			echo'<th class="crtl">Delete</th>';
			echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			$url1 = explode('/',$_GET['url']);if ($value['aprouve']==1){echo '<td align="center"><a  title="Désaprouvé "  href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/0/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/ok.jpg"   width="16" height="16" border="0" alt=""   /></a></td>'; } else{echo '<td align="center"><a  title="Aprouvé "     href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/1/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/non.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';  }
			echo '<td align="center"><a target="_blank"  title="Documents pdf"  href="'.URL.$ctrl.'/view/'.$value['id'].'" ><img src="'.URL.'public/images/pdf.PNG"   width="16" height="16" border="0" alt=""   /></a></td>'; 
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="photos"  href="'.URL.$ctrl.'/photos/'.$value['id'].'" ><img src="'.URL.'public/images/photos.jpg"   width="17" height="17" border="0" alt=""   /></a></td>';
			echo '<td align="left"  >'.$value['NOM2'].'_'.$value['PRENOM2'].'</td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Entrer Hopital"  href="'.URL.$ctrl.'/Entrer/'.$value['id'].'" ><img src="'.URL.'public/images/HOPI.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Observation"  href="'.URL.$ctrl.'/obser/'.$value['id'].'" ><img src="'.URL.'public/images/FP.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Surveillance travail"  href="'.URL.$ctrl.'/Trav/'.$value['id'].'" ><img src="'.URL.'public/images/parto.png"   width="20" height="20" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Naissance Nouveau né(e)"  href="'.URL.$ctrl.'/Nnee/'.$value['id'].'" ><img src="'.URL.'public/images/naissance.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Ordonnance libre"  href="'.URL.'rds/ordonnace/'.$value['id'].'" ><img src="'.URL.'public/images/pha.jpg"   width="17" height="17" border="0" alt=""   /></a></td>';
			
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Sortir Hopital"  href="'.URL.$ctrl.'/Sortir/'.$value['id'].'" ><img src="'.URL.'public/images/s_loggoff.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Déces"  href="'.URL.$ctrl.'/deces/'.$value['id'].'" ><img src="'.URL.'public/images/logodeces.jpg"   width="17" height="17" border="0" alt=""   /></a></td>';
			if($value['aprouve']==0){
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Editer"  href="'.URL.$ctrl.'/edit/'.$value['id'].'" ><img src="'.URL.'public/images/edit.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a class="delete" title="Supprimer"  href="'.URL.$ctrl.'/delete/'.$value['id'].'" ><img src="'.URL.'public/images/delete.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			}else{
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Edition non autoriser"  href="'.URL.$ctrl.'/search//0/10?o=id&q=" ><img src="'.URL.'public/images/edit.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a class="delete" title="Suppression non autoriser"  href="'.URL.$ctrl.'/search//0/10?o=id&q=" ><img src="'.URL.'public/images/delete.png"   width="17" height="17" border="0" alt=""   /></a></td>';
			}
			echo'</tr>';
			}
			$total_count=count($this->userListview1);
			$total_count1=count($this->userListview);
			if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/nouveau/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="btdn" ><span>'.$total_count1.'</span></td><td colspan="2" id="btdn"><span>'.$total_count.' Record(s) found</span></td><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
		
			
		echo "</table>";
		echo "</div>";
		ob_end_flush();
		}
		else 
		{
		echo '<div class="contentl">';
		$this->clgraphe->multigraphe(30,340,'Naissance Par annee et sexe  Arret Au : ','naissance','DINS1','SEXE5','M','F','='.Session::get('structure')) ;
		// HTML::normaldist(30,340,'normal distribution : ','','avi','date','',date('Y'),'','='.Session::get('structure'));
		echo "</div>";
		echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
		echo'<div class="contentr"><img id="image" src="'.URL.'public/images/'.logon.'"></div>';
		}
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