<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "Créer le certificat de décès de : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">
<?php
$ctrl='dashboard';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'impr',            "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG');

echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>


</div>
<div class="listl">
	<form  action="<?php echo URL."naissance/nd/".$this->user[0]['id'];?>"  method="POST"> 
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>
			<?php
			$commune1=HTML::nbrtostring('structure','id',Session::get('structure'),'numcom');
	        $commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
			$wilayad1=Session::get('wilaya');
			$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
			
			$data = array(
			"WILAYAD1"       => $wilayad1, 
			"WILAYAD2"       => $wilayad2, 
			"COMMUNED1"      => $commune1, 
			"COMMUNED2"      => $commune2, 
			"DINS"           => date('d-m-Y'),//ok 
			"HINS"           => date('H:m'),//ok 
			"NOM"            => $this->user[0]['NOM2'],//ok 
			"PRENOM"         => $this->user[0]['PRENOM2'],//ok 
			"FILSDE"         => '',//ok 
			"ETDE"           => '',//ok
			"SEXE"           => array("Feminin"=>"F"),//ok
			"DATENS"         => HTML::dateUS2FR($this->user[0]['DATENS2']),//ok 
			"WILAYAN1"       => $this->user[0]['WILAYA2'], //ok  
			"WILAYAN2"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA2'],'WILAYAS'),//ok  
			"COMMUNEN1"      => $this->user[0]['COMMUNE2'],//ok 
			"COMMUNEN2"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE2'],'COMMUNE'), //ok  
			"WILAYAR1"       => $this->user[0]['WILAYA4'],//ok 
			"WILAYAR2"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA4'],'WILAYAS'),//ok  
			"COMMUNER1"      => $this->user[0]['COMMUNE4'],//ok 
			"COMMUNER2"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE4'],'COMMUNE'), //ok  
			"ADRESSE"        => $this->user[0]['ADRESSE4'], //ok  
			"OMLI"           => '',//ok
			"MIEC"           => '',//ok
			"EPFP"           => '',//ok
			"DOM"            => '',//ok  
			"VP"             => '',//ok 
			"AAPLD"          => '',//ok  
			"SSP"            => 'checked',//ok 
			"SSPV"           => '',//ok  
			"AUTRES"         => '',//ok
			"PROFESSION1"    => $this->user[0]['PROFESSION2'], 
			"PROFESSION2"    => HTML::nbrtostring('Profession','id',$this->user[0]['PROFESSION2'],'Profession'),
			"DATEHOSPI"      => HTML::dateUS2FR($this->user[0]['HOSPI']),//ok
			"HEURESHOSPI"    => $this->user[0]['HHOSP'],//ok
			"SERVICEHOSPIT1" => $this->user[0]['SERVI'],//ok
			"SERVICEHOSPIT2" => HTML::nbrtostring('servicedeces','id',$this->user[0]['SERVI'],'service'), //ok
			"MEDECINHOSPIT1" => '',//ok
			"MEDECINHOSPIT2" => '',//ok
			"CIM1"           => '',//ok
			"CIM2"           => '',//ok
			"CIM3"           => '',//ok
			"CIM4"           => '',//ok
			"CIM5"           => '',//ok
			"CODECIM01"      => '',//ok 
			"CODECIM02"      => '',//ok 
			"CODECIM1"       => '',//ok
			"CODECIM2"       => '',//ok 
			"CN"             => 'checked',//ok 
			"CV"             => '',//ok 
			"CI"             => '',//ok 
			"NAT"            => 'checked',//ok 
			"ACC"            => '',//ok 
			"AID"            => '',//ok 
			"AGR"            => '',//ok  
			"IND"            => '',//ok 
			"AAP"            => '',//ok 
			"NDLMAAP"        => '',//ok 
			"DECEMAT"        => 'checked',//ok
			"DGRO"           => '',//ok 
			"DACC"           => 'checked',//ok 
			"DAVO"           => '',//ok 
			"AGESTATION"     => $this->user[0]['SA'],//ok 
			"IDETER"         => '',//ok  
			"GM"             => '',//ok
			"MN"             => '',//ok
			"AGEGEST"        => '',//ok
			"POIDNSC"        => '',//ok
			"AGEMERE"        => '',//ok
			"DPNAT"          => '',//ok
			"EMDPNAT"        => '',//ok
			"POSTOPP"        => '',//ok 
			"NOMAR"          => $this->user[0]['NOMARM'],//ok
			"PRENOMAR"       => $this->user[0]['PRENOMARM'],//ok
			"FILSDEAR"       => '',//ok
			"ETDEAR"         => '',//ok
			"NOMPRENOMAR"    => $this->user[0]['NOMARP'].'_'.$this->user[0]['PRENOMARP'],//ok
			"PROAR"          => $this->user[0]['PROFESSION2'],//ok
			"ADAR"           => $this->user[0]['ADARPM'] //ok
			);
			HTML::tabs($data);
			?> 
		</div> 
	</form> 
</div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	