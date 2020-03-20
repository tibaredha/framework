<div class="sheader1l"><p id="lregister"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php 
$ctrl='wca';
$mdl='searchcom';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array( 
                    "id"      => 'IDCOM',
					"commune" => 'COMMUNE',
                    "wilaya" => 'IDWIL'
					
				  ),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveaucom',        "tb1" => 'nouveaucom',"vb1" => '',    "icon1" => 'add.PNG',
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
	echo 'Relevé des communes '; echo '&nbsp;';		
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th>Commune</th>';
	echo'<th>البلدية</th>';
	echo'<th>SUPER </th>';
	echo'<th>RGPRH </th>';
	echo'<th>2018 </th>';
	echo'<th>Wilaya</th>';
	echo'<th style="width:50px">Mort</th>';
	echo'<th style="width:50px">pdf</th>';
	echo'<th style="width:50px">Nata</th>';
	echo'<th style="width:50px">Update</th>';
	echo'<th style="width:50px">Delete</th>';
	echo'</tr>';	
		foreach($this->userListview as $key => $value)
		{ 
            $bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td align="left" ><b>'.$value['COMMUNE'].'<b></td>';
			echo '<td align="right" >'.$value['communear'].'</td>';
			echo '<td align="center" >'.$value['SUPER'].'</td>'; 
			echo '<td align="center" >'.$value['POPULATION'].'</td>'; 
			echo '<td align="center" >'.$value['p2018'].'</td>'; 
			echo '<td align="left" >'.View::nbrtostring('wil','IDWIL',$value['IDWIL'],'WILAYAS').'</td>'; 
			echo '<td align="center" >'.html::commdeces($value['IDCOM']).'</td>'; 
			echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="pdf"  href="'.URL.'fpdf/deces/comdeces.php?uc='.$value['IDCOM'].'&str='.Session::get('structure').'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" >'.html::commnaissance($value['IDCOM']).'</td>'; 
			echo '<td align="center"  ><a target="_blank" title="editer"    href="'.URL.$ctrl.'/editcom/'.$value['IDCOM'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center"  ><a class="delete" title="supprimer"  href="'.URL.$ctrl.'/deletecom/'.$value['IDCOM'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/nouveaucom/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="btdn" ><span>'.$total_count1.'</span></td><td id="btdn"><span>'.$total_count.' Record(s) found</span></td><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
		
	
echo "</table>";
}
else 
{
HTML::multigraphe(30,340,'Décés Par annee et sexe  Arret Au : ','deceshosp','DINS','SEX','M','F','='.Session::get('structure')) ;
}
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/com.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
		
<div class="scontentl2"><?php echo "";echo $this->msg; //echo "2";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "";echo $this->msg; echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		