<div class="sheader1l"><p id="lregister"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php 
$ctrl='users';
$mdl='searchusers';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array( 
                    "id"     => 'id',
					"login" => 'login'	
				  ),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveauusers',        "tb1" => 'nouveau',"vb1" => '',    "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'imp',            "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '', "icon4" => 'search.PNG'
);
html::form($data) ;
						
?>
</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\" onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="contentl">';
if (isset($this->userListview))
{
$colspan=12;
$urlx = explode('/',$_GET['url']);
$order   = !empty($_GET["ad"])   ? $_GET["ad"]   : "asc";
$ad = "asc";
if($order == "asc") {$ad = "desc";$down='minidown.png';}else {$down='miniup.png';}
echo '<br>';
echo'<table width="100%" border="1" cellpadding="5" cellspacing="1" align="center">';
	echo'<tr bgcolor="#00CED1"   >';
	echo'<th colspan="'.$colspan.'" >';
	echo'Liste des Membres '; echo '&nbsp;';		
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th id="nomprenom" >Membres</th>';
	
	echo'<th id="nomprenom">Niveaux Membres</th>';
	// echo'<th >Update</th>';
	echo'<th >Activation</th>';
	echo'<th >Delete</th>';
	echo'</tr>';
		
		foreach($this->userListview as $key => $value)
		{ 
            $bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		    echo '<td align="left"><a  title="Visualiser le Profil"    href="'.URL.$ctrl.'/profil/'.$value['id'].'" > '.$value['login'].'</a></td>';
		
			echo '<td align="center"><a  title="Editer role"    href="'.URL.$ctrl.'/roleusers/'.$value['id'].'" > '.HTML::nbrtostring('niveau','id',$value['role'],'nom_niveau').'</a></td>';
		
			if ($value['activation']==1) {
			echo '<td align="center"><a  title="Désactiver"    href="'.URL.$ctrl.'/Bannirusers/'.$value['id'].'/0" ><img src="'.URL.'public/images/ok.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			}
			else
			{
			echo '<td align="center"><a  title="Activer"   href="'.URL.$ctrl.'/Bannirusers/'.$value['id'].'/1" ><img src="'.URL.'public/images/non.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			}
			
			echo '<td align="center"><a class="delete" title="Supprimer"  href="'.URL.$ctrl.'/Deleteusers/'.$value['id'].'/'.$value['role'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/nouveauusers/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="btdn" ><span>'.$total_count1.'</span></td><td id="btdn"><span>'.$total_count.' Record(s) found</span></td><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
		
		
echo "</table>";
}
else 
{
HTML::multigraphe(30,340,'Décés Par annee et sexe  Arret Au : ','deceshosp','DINS','SEX','M','F','='.Session::get('structure')) ;
}
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/users.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
		
<div class="scontentl2"><?php echo "";echo $this->msg; echo "2";?></div>		
<div class="scontentl3"><?php echo "";echo $this->msg; echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		