<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "Valider le certificat de décès de : ".$this->user[0]['NOM'];?> <?php echo $this->user[0]['PRENOM'];?><?php //echo $this->user[0]['id'];?></P>
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
	<form  action="<?php echo URL."dashboard/validate/".$this->user[0]['id'];?>"  method="POST"> 
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
			function verif($id,$val) 
			{
				if ($id == $val){return 'checked';}
			}
			$data = array(
			"WILAYAD1"       => $wilayad1, 
			"WILAYAD2"       => $wilayad2, 
			"COMMUNED1"      => $commune1, 
			"COMMUNED2"      => $commune2, 
			"DINS"           => HTML::dateUS2FR($this->user[0]['DINS']),                                           //ok 
			"HINS"           => $this->user[0]['HINS'],                                                            //ok 
			"NOM"            => $this->user[0]['NOM'],                                                             //ok 
			"PRENOM"         => $this->user[0]['PRENOM'],                                                          //ok 
			"FILSDE"         => $this->user[0]['FILSDE'],                                                          //ok 
			"ETDE"           => $this->user[0]['ETDE'],                                                            //ok
			"SEXE"           => array($this->user[0]['SEX']=>$this->user[0]['SEX'],"Masculin"=>"M","Feminin"=>"F"),//ok
			"DATENS"         => HTML::dateUS2FR($this->user[0]['DATENAISSANCE']),                                  //ok 
			"WILAYAN1"       => $this->user[0]['WILAYA'],                                                          //ok  
			"WILAYAN2"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),               //ok  
			"COMMUNEN1"      => $this->user[0]['COMMUNE'],                                                         //ok 
			"COMMUNEN2"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),              //ok  
			"WILAYAR1"       => $this->user[0]['WILAYAR'],                                                         //ok  
			"WILAYAR2"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAR'],'WILAYAS'),              //ok  
			"COMMUNER1"      => $this->user[0]['COMMUNER'],                                                        //ok 
			"COMMUNER2"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNER'],'COMMUNE'),             //ok 
			"ADRESSE"        => $this->user[0]['ADRESSE'],                                                         //ok  
			"OMLI"           => verif($this->user[0]['OMLI'],'1'),                                                 //ok
			"MIEC"           => verif($this->user[0]['MIEC'],'1'),                                                 //ok
			"EPFP"           => verif($this->user[0]['EPFP'],'1'),                                                 //ok
			"DOM"            => verif("DOM",$this->user[0]['LD']),                                                 //ok  
			"VP"             => verif("VP",$this->user[0]['LD']),                                                  //ok 
			"AAPLD"          => verif("AAP",$this->user[0]['LD']),                                                 //ok  
			"SSP"            => verif("SSP",$this->user[0]['LD']),                                                 //ok 
			"SSPV"           => verif("SSPV",$this->user[0]['LD']),                                                //ok  
			"AUTRES"         => $this->user[0]['AUTRES'],                                                          //ok
			"PROFESSION1"    => $this->user[0]['Profession'],                                                      //ok
			"PROFESSION2"    => HTML::nbrtostring('Profession','id',$this->user[0]['Profession'],'Profession'),    //ok
			"DATEHOSPI"      => HTML::dateUS2FR($this->user[0]['DATEHOSPI']),                                      //ok
			"HEURESHOSPI"    => $this->user[0]['HEURESHOSPI'],                                                     //ok
			"SERVICEHOSPIT1" => $this->user[0]['SERVICEHOSPIT'],                                                   //ok
			"SERVICEHOSPIT2" => HTML::nbrtostring('servicedeces','id',$this->user[0]['SERVICEHOSPIT'],'service'),  //ok
			"MEDECINHOSPIT1" => $this->user[0]['MEDECINHOSPIT'],                                                   //ok
			"MEDECINHOSPIT2" => $this->user[0]['MEDECINHOSPIT'],                                                   //ok
			"CIM1"         => $this->user[0]['CIM1'],                                                              //ok
			"CIM2"         => $this->user[0]['CIM2'],                                                              //ok
			"CIM3"         => $this->user[0]['CIM3'],                                                              //ok
			"CIM4"         => $this->user[0]['CIM4'],                                                              //ok
			"CIM5"         => $this->user[0]['CIM5'],                                                              //ok
			"CODECIM01"    => $this->user[0]['CODECIM0'],                                                          //ok 
			"CODECIM02"    => HTML::nbrtostring('chapitre','IDCHAP',$this->user[0]['CODECIM0'],'CHAP'),            //ok 
			"CODECIM1"     => $this->user[0]['CODECIM'],                                                           //ok
			"CODECIM2"     => HTML::nbrtostring('cim','row_id',$this->user[0]['CODECIM'],'diag_nom'),              //ok 
			"CN"           => verif("CN",$this->user[0]['CD']),                                                    //ok 
			"CV"           => verif("CV",$this->user[0]['CD']),                                                    //ok 
			"CI"           => verif("CI",$this->user[0]['CD']),                                                    //ok 
			"NAT"           => verif("NAT",$this->user[0]['NDLM']),                                                //ok 
			"ACC"           => verif("ACC",$this->user[0]['NDLM']),                                                //ok 
			"AID"           => verif("AID",$this->user[0]['NDLM']),                                                //ok 
			"AGR"           => verif("AGR",$this->user[0]['NDLM']),                                                //ok  
			"IND"           => verif("IND",$this->user[0]['NDLM']),                                                //ok 
			"AAP"           => verif("AAP",$this->user[0]['NDLM']),                                                //ok 
			"NDLMAAP"       => $this->user[0]['NDLMAAP'],                                                          //ok 
			"DECEMAT"       => verif($this->user[0]['DECEMAT'],'1'),                                               //ok
			"DGRO"          => verif("DGRO",$this->user[0]['GRS']),                                                //ok 
			"DACC"          => verif("DACC",$this->user[0]['GRS']),                                                //ok 
			"DAVO"          => verif("DAVO",$this->user[0]['GRS']),                                                //ok 
			"AGESTATION"    => verif("AGESTATION",$this->user[0]['GRS']),                                          //ok 
			"IDETER"        => verif("IDETER",$this->user[0]['GRS']),                                              //ok  
			"GM"            => verif($this->user[0]['GM'],'1'),                                                    //ok
			"MN"            => verif($this->user[0]['MN'],'1'),                                                    //ok
			"AGEGEST"       => $this->user[0]['AGEGEST'],                                                          //ok
			"POIDNSC"       => $this->user[0]['POIDNSC'],                                                          //ok
			"AGEMERE"       => $this->user[0]['AGEMERE'],                                                          //ok
			"DPNAT"         => verif($this->user[0]['DPNAT'],'1'),                                                 //ok
			"EMDPNAT"       => $this->user[0]['EMDPNAT'],                                                          //ok
			"POSTOPP"       => verif($this->user[0]['POSTOPP'],'1'),                                               //ok 
			"NOMAR"         => $this->user[0]['NOMAR'],                                                            //ok
			"PRENOMAR"      => $this->user[0]['PRENOMAR'],                                                         //ok
			"FILSDEAR"      => $this->user[0]['FILSDEAR'],                                                         //ok
			"ETDEAR"        => $this->user[0]['ETDEAR'],                                                           //ok
			"NOMPRENOMAR"   => $this->user[0]['NOMPRENOMAR'],                                                      //ok
			"PROAR"         => $this->user[0]['PROAR'],                                                            //ok
			"ADAR"          => $this->user[0]['ADAR']                                                              //ok
			);
			HTML::tabs($data);
			?>  
		</div> 
	</form> 
</div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	