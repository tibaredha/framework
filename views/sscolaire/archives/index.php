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
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">

<?php
$ctrl='dashboard';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => 'nouveau',     "tb1" => 'Créer un nouveau certificat ',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation Mortalité hospitalière', "vb2" => '',  "icon2" => 'eva.png',
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
		$colspan=18;
		$commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
		$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		$urlx = explode('/',$_GET['url']);
		$order   = !empty($_GET["ad"]) ? $_GET["ad"] : "asc"; $ad = "asc";
		if($order == "asc") {$ad = "desc";$down='minidown.png';}else {$down='miniup.png';}
		echo '<div class="listl">';
		echo '<br>';
		echo'<table>';
			echo'<tr bgcolor="#00CED1"><th colspan="'.$colspan.'" ><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'"> La liste des certificats de décès </A> : <span>'.$total_count1.'/'.$total_count.' enregistrement(s) trouvé(s)</span></th></tr>';
			echo'<tr bgcolor="#00CED1">';
			echo'<th class="crtl"><img src="'.URL.'public/images/table/'.$down.'"   width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=aprouve&ad='.$ad.'">Ok</A></th>';
			echo'<th class="nomprenom"><img src="'.URL.'public/images/table/'.$down.'"   width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=NOM&ad='.$ad.'">Nom_Prénom_( Fils de )</A></th>';
			echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=SEX&ad='.$ad.'">Sexe</A></th>';
			echo'<th class="crtldate"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=DATENAISSANCE&ad='.$ad.'">Date naissance</A></th>';
			echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=Days&ad='.$ad.'">Age</A></th>';
			echo'<th class="crtldate"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=DINS&ad='.$ad.'">Date décès</A></th>';
			echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=HINS&ad='.$ad.'">Heure</A></th>';
			echo'<th class="service"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=SERVICEHOSPIT&ad='.$ad.'">Service d\'hospitalisation</A></th>';
			echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=DUREEHOSPIT&ad='.$ad.'">DH</A></th>';
			echo'<th class="crtl">SGML</th>';
			echo'<th class="crtl">ISGML</th>';
			echo'<th class="crtl"><a target="_blank" title="Certificat de décès normal verso "  href="'.URL.'fpdf/deces/deceshospv.php?com='.$commune2.'&wil='.$wilayad2.'" >CD</a></th>';
			echo'<th class="crtl">DD</th>';
			echo'<th class="crtl">CDM</th>';
			echo'<th class="crtl">ADM</th>';
			echo'<th class="crtl">CDP</th>';
			echo'<th class="crtl"><img src="'.URL.'public/images/table/edit.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'<th class="crtl"><img src="'.URL.'public/images/table/erase.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			$url1 = explode('/',$_GET['url']);if ($value['aprouve']==1){echo '<td align="center"><a  title="Désaprouvé Certificat de décès  "  href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/0/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/ok.jpg"   width="16" height="16" border="0" alt=""   /></a></td>'; } else{echo '<td align="center"><a  title="Aprouvé Certificat de décès"     href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/1/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/non.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';  }
			echo '<td align="left" ><b><a target="_blank" title="valider décès "  href="'.URL.$ctrl.'/view/'.$value['id'].'" >'.strtoupper($value['NOM']).'_'.strtolower($value['PRENOM']).' ('.strtolower($value['FILSDE']).')'.'<b></a></td>';
			echo '<td align="center"  >'.$value['SEX'].'</td>';
			echo '<td align="center"style="width:100px;" >'.HTML::dateUS2FR($value['DATENAISSANCE']).'</td>';
			if ($value['Years'] > 0 ){echo "<td style=\"width:50px;\" align=\"center\" >".$value['Years']." A </td>" ;} else {if ($value['Days'] <= 30 ) {echo "<td style=\"width:50px;\" align=\"center\" >".$value['Days']." J </td>" ;} else{echo "<td style=\"width:50px;\" align=\"center\" >".$value['Months']." M </td>" ;} }
			echo '<td align="center"style="width:100px;" >'.HTML::dateUS2FR($value['DINS']).'</td>';
			echo '<td align="center"  >'.$value['HINS'].'</td>';
			echo '<td align="left"  >'.HTML::nbrtostring('servicedeces','id',$value['SERVICEHOSPIT'],'service').'</td>';
			echo '<td align="center"  >'.$value['DUREEHOSPIT'].'</td>';
			
			echo '<td align="center" style="width:10px;"  ><a target="_blank" title="Signalement graphique médecine légale"  href="'.URL.$ctrl.'/mlegale/'.$value['id'].'" ><img src="'.URL.'public/images/mlegaleicon.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			
			echo '<td align="center" style="width:10px;"  ><a target="_blank" title="Signalement graphique médecine légale"  href="'.URL.'tcpdf/deces/sgml.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/mlegaleicon.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			
			echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="Certificat de décès normal recto"  href="'.URL.'fpdf/deces/deceshosp.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			
            echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="Déclaration de décès arabe" href="'.URL.'tcpdf/deces/declaration.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			if ($value['DECEMAT']=='1'  and  $value['Years'] >= '20') {echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="Certificat de décès maternel"  href="'.URL.'fpdf/deces/certdecesmat.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="Audit de décès maternel"  href="'.URL.$ctrl.'/decesmaternel/'.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';} else {echo '<td align="center" style="width:10px;" bgcolor="#FF0000"><a  title="Selection invalide "   ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';echo '<td align="center" style="width:10px;" bgcolor="#FF0000"><a  title="Selection invalide "   ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';} 
			if ($value['Days'] >= '30') {echo '<td align="center" style="width:10px;" bgcolor="#FF0000" ><a  title="Selection invalide"><img src="'.URL.'public/images/b_props.png" width="16" height="16" border="0" alt=""   /></a></td>';} else {echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="Certificat de décès périnatal"  href="'.URL.$ctrl.'/decesperinatal/'.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';} 
			if ($value['aprouve']==0){
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="Editer Certificat de décès"  href="'.URL.$ctrl.'/edit/'.$value['id'].'" ><img src="'.URL.'public/images/table/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a class="delete" title="Supprimer Certificat de décès"  href="'.URL.$ctrl.'/delete/'.$value['id'].'" ><img src="'.URL.'public/images/table/erase.png"   width="16" height="16" border="0" alt=""   /></a></td>';}
			else{
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="Edition non autoriser"><img src="'.URL.'public/images/table/edit.png"   width="16" height="16" border="0" alt=""/></a></td>';
			echo '<td align="center" style="width:10px;" ><a class="delete" title="Suppression non autoriser"><img src="'.URL.'public/images/table/erase.png"   width="16" height="16" border="0" alt=""/></a></td>';}
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
		$this->clgraphe->multigraphe(30,340,'Décès par année et sexe  arreté au : ','deceshosp','DINS','SEX','M','F','='.Session::get('structure')) ;
		echo "</div>";
		echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
		echo'<div class="contentr" id="suggesstion-box"  ><img id="image" src="'.URL.'public/images/'.logo.'"></div>';
		}
		
// echo session_id() ;
// echo "</br>";
// echo Session::get('time');
// echo "</br>";		
// var_dump(Session::get('time'), session_id());	var_dump($_COOKIE);	
// exec('D:\framework\tiba.bat', $output);
?>	
<div class="scontentl2"><?php echo '<a class="DECES"  id="annee"  href="'.URL.$ctrl.'/graphe/0">Année</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/1">Mois</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/7">LN</a>';?></div>		
<div class="scontentl3"><?php echo '<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/2">Sexe</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/3">Age</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/4">CD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/5">LD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/6">DM</a>';?></div>
<div class="scontentr1"><?php echo dsp; ?></div>
<!--
<a href="#" id="alert">Alert Dialog</a><br>
<a href="#" id="confirm">Confirm Dialog</a><br>
<a href="#" id="prompt">Prompt Dialog</a><br>
<a href="#" id="labels">Custom Labels</a><br>
<a href="#" id="focus">Button Focus</a><br>
<a href="#" id="order">Button Order</a>
 -->
<script src="<?php echo URL;?>public/js/alertify.js?t=<?php echo time();?>"></script>
	