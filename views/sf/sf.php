<div class="sheader1l"><p id="lregister">Gérer les sage-femmes <?php //echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php 
$ctrl='sf';
$mdl='searchsf';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array( 
                    "id"     => 'id',
					"Nom" => 'Nom',
                    "Prenom" => 'Prenom',
                    "structure" => 'structure'
				  ),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'createsf',  "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'imp',            "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG'
);
html::form($data) ;
						
?>
</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\" onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/".Session::get('structure')."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="contentl">';
if (isset($this->userListview))
{
$colspan=5;
$urlx = explode('/',$_GET['url']);
$order   = !empty($_GET["ad"])   ? $_GET["ad"]   : "asc";
$ad = "asc";
if($order == "asc") {$ad = "desc";$down='minidown.png';}else {$down='miniup.png';}
echo '<br>';
echo'<table width="100%" border="1" cellpadding="5" cellspacing="1" align="center">';
	echo'<tr bgcolor="#00CED1"   >';
	echo'<th colspan="'.$colspan.'" >';
	echo 'Relevé des medecins '; echo '&nbsp;';		
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th id="nomprenom" >Nom</th>';
	echo'<th id="nomprenom">Prenom</th>';
	echo'<th id="nomprenom">structure</th>';
	echo'<th >Update</th>';
	echo'<th >Delete</th>';
	echo'</tr>';
		
		foreach($this->userListview as $key => $value)
		{ 
            $bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td align="left" ><b>'.$value['Nom'].'<b></td>';
			echo '<td align="left" >'.$value['Prenom'].'</td>'; 
			echo '<td align="left" >'.html::nbrtostring('structure','id',$value['structure'],'structure') .'</td>'; 
			
			//echo '<td align="center"  ><a target="_blank" title="unité"   href="'.URL.$ctrl.'/comm/'.$value['id'].'" ><img src="'.URL.'public/images/comm.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center"  ><a target="_blank" title="editer"    href="'.URL.$ctrl.'/editsf/'.$value['id'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center"  ><a class="delete" title="supprimer"  href="'.URL.$ctrl.'/deletesf/'.$value['id'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/createsf/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="btdn" ><span>'.$total_count1.'</span></td><td id="btdn"><span>'.$total_count.' Record(s) found</span></td><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
		
	
echo "</table>";
}
else 
{
HTML::multigraphe(30,340,'Décés Par annee et sexe  Arret Au : ','deceshosp','DINS','SEX','M','F','='.Session::get('structure')) ;
}
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/med.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
		
<div class="scontentl2">Gérer les sage-femmes<?php //echo "";echo $this->msg; echo "2";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "";echo $this->msg; echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		