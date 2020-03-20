<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">Créer un nouveau certificat de décès</div><div class="sheader2r">
ID Défunt( e ) : xxxxxxxx
<label style="display: none;" id="show_codeP">
<input type="text" name="code_patient" id="code_patient"  style="border: none; background-color: green; color: white; font-family:courier; text-align:center;  "   size="15" readonly="">
</label>                                

                                   


</div>
<div class="listl">
	<form  action="<?php echo URL."dashboard/create/";  ?>"  method="POST"> 
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
			"DINS"           => date('d-m-Y'), 
			"HINS"           => date('H:m'), 
			"NOM"            => '', 
			"PRENOM"         => '', 
			"FILSDE"         => '', 
			"ETDE"           => '',
			"SEXE"           => array("Masculin"=>"M","Feminin"=>"F"),
			"DATENS"         => date('d-m-Y'),
			"WILAYAN1"       => $wilayad1, 
			"WILAYAN2"       => $wilayad2, 
			"COMMUNEN1"      => $commune1,
			"COMMUNEN2"      => $commune2, 
			"WILAYAR1"       => $wilayad1, 
			"WILAYAR2"       => $wilayad2, 
			"COMMUNER1"      => $commune1,
			"COMMUNER2"      => $commune2,
			"ADRESSE"        => '', 
			"OMLI"           => '',
			"MIEC"           => '',
			"EPFP"           => '',
			"DOM"            => '',
			"VP"             => '',
			"AAPLD"          => '',
			"SSP"            => 'checked',
			"SSPV"           => '',
			"AUTRES"         => '',
			"PROFESSION1"    => '1',
			"PROFESSION2"    => 'Sans Profession',
			"DATEHOSPI"      => date('d-m-Y'),
			"HEURESHOSPI"    => date('H:m'),
			"SERVICEHOSPIT1" => '21',
			"SERVICEHOSPIT2" => 'Sans Service',
			"MEDECINHOSPIT1" => '1', 
			"MEDECINHOSPIT2" => 'Sans Medecin',
			"CIM1"           => '', 
			"CIM2"           => '', 
			"CIM3"           => '', 
			"CIM4"           => '', 
			"CIM5"           => '', 
			"CODECIM01"      => '0', 
			"CODECIM02"      => 'CIM 10 - Chapitre  (*la Cause initiale)', 
			"CODECIM1"       => '0', 
			"CODECIM2"       => 'CIM 10 - Catégorie (*la Cause initiale)', 
			"CN"             => 'checked',
			"CV"             => '',
			"CI"             => '',
			"NAT"            => 'checked',
			"ACC"            => '',
			"AID"            => '',
			"AGR"            => '',
			"IND"            => '',
			"AAP"            => '',
			"NDLMAAP"        => 'x', 
			"DECEMAT"        => '',//checked
			"DGRO"           => '',
			"DACC"           => '',
			"DAVO"           => '',
			"AGESTATION"     => '',
			"IDETER"         => 'checked',
			"GM"             => '',//checked
			"MN"             => '',//checked
			"AGEGEST"        => '00',
			"POIDNSC"        => '0000',
			"AGEMERE"        => '00',
			"DPNAT"          => '',//checked
			"EMDPNAT"        => '',
			"POSTOPP"        => '',//checked
			"NOMAR"          => '',
			"PRENOMAR"       => '',
			"FILSDEAR"       => '',
			"ETDEAR"         => '',
			"NOMPRENOMAR"    => '',
			"PROAR"          => '',
			"ADAR"           => ''
			);
			HTML::tabs($data);
			
			?>				
		</div> 
	</form> 
</div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	