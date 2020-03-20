<div class="sheader1l"><p id="dashboard"><?php echo "Gérer Bordereau Numerique Mensuel";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">

<?php
$ctrl='bnm';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'Evaluation',            "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
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

		if (isset($this->userListview))
		{
		ob_start();$colspan=14;
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		$urlx = explode('/',$_GET['url']);
		$order   = !empty($_GET["ad"])   ? $_GET["ad"]   : "asc";
		$ad = "asc";
		if($order == "asc") {$ad = "desc";$down='minidown.png';}else {$down='miniup.png';}
		echo '<div class="listl">';
		echo'</br>';
		echo'<table>';
			echo'<tr bgcolor="#00CED1">';
			echo'<th class="crtl">id</th>';
			echo'<th class="crtldate"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=mois&ad='.$ad.'">Mois Bordereau</A></th>';
			echo'<th class="crtldate"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=annee&ad='.$ad.'">Annee Bordereau</A></th>';
			echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=COMMUNED&ad='.$ad.'">Commune Bordereau</A></th>';
			echo'<th class="crtl">Naissance</th>';
			echo'<th class="crtl">Mort Nee</th>';
			echo'<th class="crtl">Maraige</th>';
			echo'<th class="crtl">Deces</th>';
			echo'<th class="crtl">BNM</th>';
			echo'<th class="crtl">Update</th>';
			echo'<th class="crtl">Delete</th>';
			echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td align="center"  >'.$value['id'].'</td>';
			echo '<td align="center"  >'.$value['mois'].'</td>';
			echo '<td align="center"  >'.$value['annee'].'</td>';
			echo'<td align="center" >'.view::nbrtostring('com','IDCOM',$value['COMMUNED'],'COMMUNE').'</td>';
			echo'<td align="center" >'.intval($value['nm1']+$value['nf1']+$value['nm2']+$value['nf2']).'</td>';
			echo'<td align="center" >'.intval($value['mnm1']+$value['mnf1']).'</td>';
			echo'<td align="center" >'.intval($value['m1']+$value['m2']).'</td>';
			echo'<td align="center" >'.intval($value['dm1']+$value['dm2']+$value['dm3']+$value['dm4']+$value['dm5']+$value['dm6']+$value['dm7']+$value['dm8']+$value['dm9']+$value['dm10']+$value['dm11']+$value['dm12']+$value['dm13']+$value['dm14']+$value['dm15']+$value['dm16']+$value['dm17']+$value['dm18']+$value['dm19']+$value['df1']+$value['df2']+$value['df3']+$value['df4']+$value['df5']+$value['df6']+$value['df7']+$value['df8']+$value['df9']+$value['df10']+$value['df11']+$value['df12']+$value['df13']+$value['df14']+$value['df15']+$value['df16']+$value['df17']+$value['df18']+$value['df19']).'</td>';
			echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="bnm"  href="'.URL.'fpdf/deces/fbnm.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="editer"  href="'.URL.$ctrl.'/edit/'.$value['id'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a class="delete" title="supprimer"  href="'.URL.$ctrl.'/delete/'.$value['id'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';
			}
			
			if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/nouveau/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
		
		echo "</table>";
		echo "</div>";
		ob_end_flush();
		}
		else 
		{
		echo '<div class="contentl">';
		//HTML::normaldist(30,340,'Normal distribution : ','','avi','date','',date('Y'),'','='.Session::get('structure'));
		//HTML::multigraphe(30,340,'Naissance Par annee et sexe  Arret Au : ','bordereau','DINS','SEX','M','F','='.Session::get('structure')) ;
		echo "</div>";
		echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
		echo'<div class="contentr"><img id="image" src="'.URL.'public/images/'.logod.'"></div>';
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
	echo '<a href="'.URL.'naissance/graphe/0">Année</a>';echo '&nbsp;'; 
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
	
	echo '<a href="'.URL.'naissance/graphe/1">Mois</a>';echo '&nbsp;';
?>
</div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		