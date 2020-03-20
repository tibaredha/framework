<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "Modifier le certificat de Naissance de : ".$this->user[0]['NOM3'];?> <?php echo $this->user[0]['PRENOM5'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">
<?php
$ctrl='naissance';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'Evaluation',     "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG');

echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="listl">
	<form  action="<?php echo URL."naissance/editSave/".$this->user[0]['id'];?>"  method="POST"> 
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Etat civil</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">ATCD</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>
			<?php
			$commune1=HTML::nbrtostring('structure','id',Session::get('structure'),'numcom');
	        $commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
			$wilayad1=Session::get('wilaya');
			$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
			function verif($id,$val) {if($id == $val){return 'checked';}}
			$data = array(
			"WILAYA1"        => $wilayad1, 
			"COMMUNE1"       => $commune1, 
			"STRUCTURED"     => Session::get('structure'),
			"DINS1"          => HTML::dateUS2FR($this->user[0]['DINS1']), 
			"HINS1"          => $this->user[0]['HINS1'], 
			"LOGIN"          => Session::get('login'),
			"NOM2"           => $this->user[0]['NOM2'],
			"PRENOM2"        => $this->user[0]['PRENOM2'],
			"DATENS2"        => HTML::dateUS2FR($this->user[0]['DATENS2']),
			"WILAYA21"       => $this->user[0]['WILAYA2'],
			"WILAYA22"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA2'],'WILAYAS'),
			"COMMUNE21"      => $this->user[0]['COMMUNE2'],
			"COMMUNE22"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE2'],'COMMUNE'),
			"PROFESSION21"   => $this->user[0]['PROFESSION2'],
			"PROFESSION22"   => HTML::nbrtostring('profession','id',$this->user[0]['PROFESSION2'],'Profession'),
			"GROUPAGE"       => array($this->user[0]['GROUPAGE']=>$this->user[0]['GROUPAGE'],"A"=>"A","B"=>"B","AB"=>"AB","O"=>"O"),
			"RH"             => array($this->user[0]['RH']=>$this->user[0]['RH'],"Positif"=>"P","Negatif"=>"N"),
			"TELMERE"        => $this->user[0]['TELMERE'],
			"NSSMERE"        => $this->user[0]['NSSMERE'],
			"NOM3"           => $this->user[0]['NOM3'],
			"PRENOM3"        => $this->user[0]['PRENOM3'], 
			"DATENS3"        => HTML::dateUS2FR($this->user[0]['DATENS3']),
			"WILAYA31"       => $this->user[0]['WILAYA3'], 
			"WILAYA32"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA3'],'WILAYAS'),
			"COMMUNE31"      => $this->user[0]['COMMUNE3'],
			"COMMUNE32"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE3'],'COMMUNE'),
			"PROFESSION31"   => $this->user[0]['PROFESSION3'],
			"PROFESSION32"   => HTML::nbrtostring('profession','id',$this->user[0]['PROFESSION3'],'Profession'),
			"GROUPAGEP"      => array($this->user[0]['GROUPAGEP']=>$this->user[0]['GROUPAGEP'],"A"=>"A","B"=>"B","AB"=>"AB","O"=>"O"),
			"RHP"            => array($this->user[0]['RHP']=>$this->user[0]['RHP'],"Positif"=>"P","Negatif"=>"N"),
			"TELPERE"        => $this->user[0]['TELPERE'],
			"NSSPERE"        => $this->user[0]['NSSPERE'],
			"WILAYA41"       => $this->user[0]['WILAYA4'],
			"WILAYA42"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA4'],'WILAYAS'),
			"COMMUNE41"      => $this->user[0]['COMMUNE4'],
			"COMMUNE42"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE4'],'COMMUNE'),
			"ADRESSE4"       => $this->user[0]['ADRESSE4'],
			"NUMLF"          => $this->user[0]['NUMLF'], 
			"DNUMLF"         => HTML::dateUS2FR($this->user[0]['DNUMLF']),
			"WILAYALF1"      => $this->user[0]['WILAYALF'], 
			"WILAYALF2"      => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYALF'],'WILAYAS'),
			"COMMUNELF1"     => $this->user[0]['COMMUNELF'], 
			"COMMUNELF2"     => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNELF'],'COMMUNE'),
            "GESTE"          => array($this->user[0]['GESTE']=>$this->user[0]['GESTE'],"0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"PARITE"         => array($this->user[0]['PARITE']=>$this->user[0]['PARITE'],"0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"ABRT"           => array($this->user[0]['ABRT']=>$this->user[0]['ABRT'],"0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"CESA"           => array($this->user[0]['CESA']=>$this->user[0]['CESA'],"0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"EVBP"           => array($this->user[0]['EVBP']=>$this->user[0]['EVBP'],"0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),
			"DT12"           => verif($this->user[0]['DT12'],'1'),
			"HTA"            => verif($this->user[0]['HTA'],'1'),
			"CRD"            => verif($this->user[0]['CRD'],'1'),
			"EPL"            => verif($this->user[0]['EPL'],'1'),
			"AUT"            => verif($this->user[0]['AUT'],'1'),
			"NOMARM"         => $this->user[0]['NOMARM'],
			"PRENOMARM"      => $this->user[0]['PRENOMARM'],
			"NOMARP"         => $this->user[0]['NOMARP'],
			"PRENOMARP"      => $this->user[0]['PRENOMARP'],
			"ADARPM"         => $this->user[0]['ADARPM']
			);
			HTML::tabsns($data);
			?> 
		</div> 
	</form> 
</div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	