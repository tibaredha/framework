<SCRIPT LANGUAGE="JavaScript">
$(document).ready(function(){
	$("#search").keyup(function(){
		$.ajax({
		type: "POST",
		url: "/framework/public/js/A.PHP",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search").css("background","green url(/framework/public/js/LoaderIcon.gif) no-repeat 90px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search").css("background","green");
		}
		});
	});
});
</script>
<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les messages";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">

<?php
$ctrl='Msgs';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => 'nouveau',     "tb1" => 'Créer un nouveau message ',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation messagerie', "vb2" => '',  "icon2" => 'eva.png',
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

		if (isset($this->userListview))
		{
		ob_start();
		$colspan=4;
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		$urlx = explode('/',$_GET['url']);
		$order   = !empty($_GET["ad"]) ? $_GET["ad"] : "asc"; $ad = "asc";
		if($order == "asc") {$ad = "desc";$down='minidown.png';}else {$down='miniup.png';}
		echo '<div class="contentl formaut">';
		echo '<br>';
		echo'<table>';
			echo'<tr bgcolor="#00CED1"><th colspan="'.$colspan.'" ><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'"> La liste des messages </A> : <span>'.$total_count1.'/'.$total_count.' enregistrement(s) trouvé(s)</span></th></tr>';
			echo'<tr bgcolor="#00CED1">';
			echo'<th class="crtl"><img src="'.URL.'public/images/table/'.$down.'"        width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=timestamp&ad='.$ad.'">Date</A></th>';
			echo'<th class="nomprenom"><img src="'.URL.'public/images/table/'.$down.'"   width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=id_expediteur&ad='.$ad.'">Expediteur</A></th>';
			//echo'<th class="nomprenom"><img src="'.URL.'public/images/table/'.$down.'"   width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=id_destinataire&ad='.$ad.'">Destinataire</A></th>';
			echo'<th class="crtl"><img src="'.URL.'public/images/table/'.$down.'"        width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=titre&ad='.$ad.'">Message</A></th>';
			echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td align="center"  >'.html::dateUS2FR($value['timestamp']).'</td>';
			echo '<td align="center" style="width:10px;" ><a title="Visualiser le Profil"  href="'.URL.$ctrl.'/profil/'.$value['id'].'" >'.HTML::nbrtostring('users','id',$value['id_expediteur'],'login').'</a></td>';
			//echo '<td align="center" style="width:10px;" ><a target="_blank" title="Visualiser le Profil"  href="'.URL.$ctrl.'/Profil/'.$value['id'].'" >'.HTML::nbrtostring('users','id',$value['id_destinataire'],'login').'</a></td>';
			echo '<td align="center" style="width:10px;" ><a title="Visualiser le message "  href="'.URL.$ctrl.'/view/'.$value['id'].'" >'.$value['titre'].'</a></td>';
			}
			if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/nouveau/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
		echo "</table>";
		echo "</div>";
		ob_end_flush();
		echo'<div class="content"><img id="image" src="'.URL.'public/images/message.jpg" ></div>';
		echo'<div class="contentr" id="suggesstion-box"  ><img id="image" src="'.URL.'public/images/'.logo.'"></div>';
		}
		else 
		{
		echo '<div class="contentl">';
		// $this->clgraphe->multigraphe(30,340,'Messages par année et lu  arreté au : ','messagerie','timestamp','lu','0','1','='.Session::get('structure')) ;
		echo "</div>";
		echo'<div class="content"><img id="image" src="'.URL.'public/images/message.jpg" ></div>';
		echo'<div class="contentr" id="suggesstion-box"  ><img id="image" src="'.URL.'public/images/'.logo.'"></div>';
		}
		
?>
	
<div class="scontentl2"><?php echo '<a class="DECES"  id="annee"  href="'.URL.$ctrl.'/graphe/0">Année</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/1">Mois</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/7">LN</a>';?></div>		
<div class="scontentl3"><?php echo '<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/2">Sexe</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/3">Age</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/4">CD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/5">LD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/6">DM</a>';?></div>
<div class="scontentr1"><?php echo dsp; ?></div>
<script src="<?php echo URL;?>public/js/alertify.js?t=<?php echo time();?>"></script>
	