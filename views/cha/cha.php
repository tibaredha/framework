<div class="sheader1l"><p id="lregister"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php 
$ctrl='cha';
$mdl='searchcha';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'IDCHAP'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',           "tb1" => 'nouveau',"vb1" => '',"icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'imp',               "tb2" => 'Print', "vb2" => '',"icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',               "tb3" => 'graphe',"vb3" => '',"icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',                  "tb4" => 'Search',"vb4" => '',"icon4" => 'search.PNG'
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
echo '<div class="listl">';
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
	echo 'La classification internationale des maladies 10e révision (CIM-10) '; echo '&nbsp;';		
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th style="width:25px">code</th>';
	echo'<th style="width:700px">Chapitre diagnostic</th>';
	echo'<th style="width:25px">code</th>';
	echo'<th style="width:25px">Nbr</th>';
	echo'<th style="width:25px">Pdf</th>';
	echo'<th style="width:50px">Update</th>';
	echo'<th style="width:50px">Delete</th>';
	echo'</tr>';
		
		foreach($this->userListview as $key => $value)
		{ 
            $bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td  align="center"><b>'.$value['IDCHAP'].'<b></td>';
			echo '<td  align="left"><b>'.$value['CHAP'].'<b></td>';
			echo '<td  align="center"><b>'.$value['IDCHAP'].'<b></td>';
			echo '<td align="center"   >';echo  HTML::cimnbr(Session::get('structure'),$value['IDCHAP']);echo '</td>';
			echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="pdf"  href="'.URL.'fpdf/deces/chadeces.php?uc='.$value['IDCHAP'].'&str='.Session::get('structure').'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td  align="center"><a target="_blank" title="editer"    href="'.URL.$ctrl.'/editcha/'.$value['IDCHAP'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td  align="center"><a class="delete" title="supprimer"  href="'.URL.$ctrl.'/deletecha/'.$value['IDCHAP'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/nouveaucim/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="btdn" ><span>'.$total_count1.'</span></td><td id="btdn"><span>'.$total_count.' Record(s) found</span></td><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';}			
echo "</table>";
}
else 
{
HTML::multigraphe(30,340,'Décés Par annee et sexe  Arret Au : ','deceshosp','DINS','SEX','M','F','='.Session::get('structure')) ;
}
echo "</div>";	
?>

		
<div class="scontentl2"><?php echo "";echo $this->msg; echo "*";?></div>		
<div class="scontentl3"><?php echo "";echo $this->msg; echo "*";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		