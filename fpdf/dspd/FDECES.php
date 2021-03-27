<?php
$Datedebut =$_POST['Datedebut'];
$Datefin   =$_POST['Datefin'];
$wilaya    =$_POST['wilaya'];
$structure =$_POST["structure"];
$deces     =$_POST['deces'];
$login     =$_POST["login"];

if ($_POST['format']=='1')
{
	require('deces.php');
	$pdf = new deces('P','mm', 'A4');$pdf->AliasNbPages();// $pdf->SetAutoPageBreak('auto', 1.5);$pdf->SetDisplayMode('fullwidth','two');
	$pdf->ctrldate($Datedebut,$Datefin);	
	
	if ($deces=='0') {
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	
	$pdf->SetTitle('Évolution de la mortalité néonatale au niveau  des structures hospitalieres de la wilaya de djelfa (Algérie) '."de ".$pdf->datejour1." à ".$pdf->datejour2);
	
	$pdf->SetFont('Arial','',12);$pdf->SetTextColor(0,0,0);$pdf->SetFillColor(230);
	$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(200,5,"Évolution de la mortalité néonatale au niveau  des structures hospitalieres de la wilaya de djelfa (Algérie) ",0,0,'L',1,0);
	$pdf->SetXY(5,$pdf->GetY()+6);  $pdf->cell(200,5,"de ".$pdf->dateUS2FR($pdf->datejour1)." à ".$pdf->dateUS2FR($pdf->datejour2),0,0,'L',1,0);
	
	// $pdf->SetFont('Arial','',11);$pdf->SetTextColor(0,0,0);$pdf->SetFillColor(230);
	// $pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"Evolution of neonatal mortality at the Blida University Teaching Hospital (Algeria) "."between ".$pdf->dateUS2FR($pdf->datejour1)." and ".$pdf->dateUS2FR($pdf->datejour2),0,0,'L',1,0);
	
	$pdf->SetFont('Arial','',10);$pdf->SetTextColor(0,0,0);$pdf->SetFillColor(230);
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"R. Tiba ",0,0,'L',1,0);
	
	$pdf->SetFont('Arial','',10);$pdf->SetTextColor(0,0,0);$pdf->SetFillColor(255);
	
	
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->cell(95,5,"Introduction",0,0,'L',1,0);                                                      
	
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->cell(200,5,"   Le taux de mortalité néonatale, calculé comme le nombre d'enfants décédés entre 0 et 28 jours de vie, rapporté à 1 000",0,0,'L',1,0);            
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"naissances vivantes, pouvait être estimé en Algérie, au milieu des années 2000, à 25 pour 1 000, représentant 80 % de la",0,0,'L',1,0);     
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"mortalité infantile. La mortalité néonatale précoce survenant dans les six premiers jours de la vie était, quant à elle, estimée",0,0,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"à 20 pour 1 000 naissances vivantes, représentant 80 % de la mortalité néonatale [18].",0,0,'L',1,0);                                           
	                                                                                                                                                                                               
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"   Le taux de mortalité périnatale (mortinatalité et mortalité néonatale précoce) est un indicateur remarquable de la",0,0,'L',1,0);          
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"qualité des soins obstétricaux et néonatals. En l'absence de statistiques systématiques sur les morts foetales pour",0,0,'L',1,0);              
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"déterminer la mortinatalité, la mortalité néonatale précoce peut être considérée comme un indicateur de la façon dont",0,0,'L',1,0);            
	
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"sont prodigués les soins aux nouveau-nés dans un établissement.En effet, la mortalité néonatale figure parmi les",0,0,'L',1,0);               
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"indicateurs de développement d'une collectivité donnée et constitue le reflet de la qualité des soins obstétricaux et",0,0,'L',1,0);           
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"néonatals dans un établissement de santé.",0,0,'L',1,0);                                                                                       
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"   La mortalité néonatale précoce dans les services de néonatalogie des hôpitaux des pays pauvres peut frôler",0,0,'L',1,0);                   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"l'hécatombe en dépassant 50 % [4], lorsque le nombre de décès recensés entre zéro et six jours de vie est ramené au",0,0,'L',1,0);              
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"nombre d'enfants nés vivants admis au sein de ces services.",0,0,'L',1,0);                                                                      
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,5,"   Dans le cadre du système d'information sur la mortalité hospitalière mis en place par la direction de la santé et de la population",0,0,'L',1,0);              
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"(DSP) de la wilaya de Djelfa , il était particulièrement intéressant d'apprécier l'importance et l'évolution de la",0,0,'L',1,0);                      
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"mortalité néonatale enregistrée au niveau des structures hospitalieres ainsi que celles des causes du décès néonatal.",0,0,'L',1,0);                                            
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,5,"Matériel et méthodes",0,0,'L',1,0);                                                                                                             
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"Ce rapport couvre une période de huit ans, de ".$pdf->dateUS2FR($pdf->datejour1)." à ".$pdf->dateUS2FR($pdf->datejour2).",depuis que le système sur la mortalité hospitalière ",0,0,'L',1,0);                          
	
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(200,5,"mis en place par la DSP existe. Tous les décès survenus au niveau des structures hospitalieres de la wilaya ",0,0,'L',1,0); 
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"étaient activement recensés par les techniciens des bureaux des entrées au niveau des différents services ",0,0,'L',1,0);                                                                                                                                    
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"des structures hospitalieres de la wilaya .",0,0,'L',1,0);                                                                                                                                   
	
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"   La Classification internationale des maladies (CIM-10) et ses règles de classement ont été utilisées pour coder la nature",0,0,'L',1,0);   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"de la maladie causale, tandis que les opérations de saisie, de contrôle et d'analyse ont été effectuées par l'utilisation du",0,0,'L',1,0);   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"logiciel ----***** dans sa sixième version.",0,0,'L',1,0);                                                                                    
	
	$pdf->SetXY(5,$pdf->GetY()+7);$pdf->cell(95,5,"   Le système sur la mortalité hospitalière mis en place par la DSP  permet de déterminer la mortalité proportionnelle",0,0,'L',1,0);        
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"(MP) occasionnée par la mortalité néonatale (nombre de décès néonatals sur l'ensemble des décès). Le dénominateur",0,0,'L',1,0);              
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"utilisé pour estimer le taux de mortalité néonatale au niveau des structures hospitalieres provient des données appartenant ",0,0,'L',1,0);        
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"au registre d'admission du service de pédiatrie, au registre des naissances vivantes du service de gynécologie-obstétrique. ",0,0,'L',1,0);     
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"Celui-ci, avec le service de pédiatrie, appartient à la même unité de lieu constituée par le complexe mère-enfant . ",0,0,'L',1,0);     
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"Il a par ailleurs été tenu compte des nouveau-nés transférés des maternités périphériques ou d'autres hôpitaux.",0,0,'L',1,0);   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"   L'analyse des séries chronologiques a essentiellement fait appel au coefficient de corrélation (r) ainsi qu'au coefficient",0,0,'L',1,0);                                                                                                                              
	
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"de corrélation des rangs de Spearman (r0). Le coefficient de corrélation r était déterminé pour apprécier l'évolution",0,0,'L',1,0);                                                                   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"temporelle du nombre mensuel de décès néonatals, tandis que le coefficient de corrélation r0 était déterminé pour",0,0,'L',1,0);                                                                   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"apprécier la tendance dessinée par le taux annuel de la mortalité néonatale et de la proportion annuelle des nouveau",0,0,'L',1,0);                                                                  
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"x",0,0,'L',1,0);                                                                  
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"x",0,0,'L',1,0);                                                                  
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"x",0,0,'L',1,0);                                                                   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"x",0,0,'L',1,0);                                                                   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"x",0,0,'L',1,0);                                                                   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"x",0,0,'L',1,0);                                                                   
	$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(95,5,"x",0,0,'L',1,0);                                                                   
	
	
	
	
	
	
	
	
	
	
	
	
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->dateUS2FR($pdf->datejour1)." au ".$pdf->dateUS2FR($pdf->datejour2));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(200,5,$pdf->repfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->mspfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
	$pdf->SetXY(155,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);		
	$pdf->SetXY(40,$pdf->GetY()+15);$pdf->cell(165,5,"Monsieur le Directeur de la sante et de la population de la wilaya de djelfa ",0,0,'C',0,0);
	$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(165,5,"A",0,0,'C',0,0);
	$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(165,5,"Monsieur le Directeur de l'institut national de la santé publique (INSP)  ",0,0,'C',0,0);
	$pdf->SetXY(5,85);$pdf->cell(200,10,"BORDEREAU D'ENVOI",0,0,'C',1,0);
	$pdf->RoundedRect(5,5, 200, 285, 2, $style = '');
	$pdf->RoundedRect(5,108, 15, 130, 2, $style = '');$pdf->RoundedRect(20,108, 105, 130, 2, $style = '');$pdf->RoundedRect(20+105,108, 15, 130, 2, $style = '');$pdf->RoundedRect(20+105+15,108, 65, 130, 2, $style = '');
	$pdf->SetXY(5,108);$pdf->cell(15,10,"N°",1,0,'C',1,0);$pdf->SetXY(5+15,108);$pdf->cell(105,10,"DESIGNATION",1,0,'C',1,0);$pdf->SetXY(5+15+105,108);$pdf->cell(15,10,"NBR",1,0,'C',1,0);$pdf->SetXY(5+30+105,108);$pdf->cell(65,10,"OBSERVATION",1,0,'C',1,0);
	$pdf->SetXY(5+15,128);$pdf->cell(105,10,"Veuillez trouver ci-joint",0,0,'C',0,0);
	$pdf->SetXY(5,148);$pdf->cell(15,10,"1",0,0,'C',0,0);$pdf->SetXY(5+15,148);$pdf->cell(105,10,"Certificats de décès",0,0,'L',0,0);$pdf->SetXY(5+15+105,148);
	$pdf->cell(15,10,$pdf->valeurmois('deceshosp','DINS',$pdf->datejour1,$pdf->datejour2,'IS NOT NULL'),0,0,'C',0,0);
	$pdf->SetXY(5+30+105,148);$pdf->cell(65,10,"",0,0,'C',0,0);
	$pdf->SetXY(5,158);$pdf->cell(15,10,"2",0,0,'C',0,0);$pdf->SetXY(5+15,158);$pdf->cell(105,10,"Liste nominative des décès hospitaliers",0,0,'L',0,0);$pdf->SetXY(5+15+105,158);$pdf->cell(15,10,"01",0,0,'C',0,0);$pdf->SetXY(5+30+105,158);$pdf->cell(65,10,"Rapport",0,0,'C',0,0);
	$pdf->SetXY(5,168);$pdf->cell(15,10,"3",0,0,'C',0,0);$pdf->SetXY(5+15,168);$pdf->cell(105,10,"Rapport de la mortatlité hospitalière",0,0,'L',0,0);$pdf->SetXY(5+15+105,168);$pdf->cell(15,10,"01",0,0,'C',0,0);$pdf->SetXY(5+30+105,168);$pdf->cell(65,10,"Mortalité Hospitalière",0,0,'C',0,0);
	$pdf->SetXY(5,178);$pdf->cell(15,10,"4",0,0,'C',0,0);$pdf->SetXY(5+15,178);$pdf->cell(105,10,"Support Informatique (CD/DVD)",0,0,'L',0,0);$pdf->SetXY(5+15+105,178);$pdf->cell(15,10,"01",0,0,'C',0,0);$pdf->SetXY(5+30+105,178);$pdf->cell(65,10,"Du ".$pdf->dateUS2FR($pdf->datejour1)." Au ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',0,0);
	$pdf->SetXY(5+30+105,250);$pdf->cell(40,10,"Le Directeur",0,0,'L',0,0);
	$pdf->SetFont('Times', 'B', 11);
	}
	if ($deces=='1') 
	{

		$pdf->AddPage('L','A4');
		$pdf->SetDisplayMode('fullpage','single');
		$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFillColor(230);
		
		$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(285,5,$pdf->repfr,0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->mspfr,0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
		
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(50,5,"Service Prévention",0,0,'L',1,0);  $pdf->SetXY(240,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);	
		$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
		
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(285,5,"RELEVE DES CAUSES DE DECES ",0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',1,0);
		
		$pdf->SetFillColor(200 );
	    $pdf->SetXY(05,$pdf->GetY()+10);
		$pdf->cell(10,10,"N°",1,0,'C',1,0);
		$pdf->cell(20,10,"Date décès",1,0,1,'C',0);
		$pdf->cell(10,10,"Sexe",1,0,'C',1,0);
		$pdf->cell(10,10,"Age",1,0,'C',1,0);
		$pdf->cell(30,10,"Résidence ",1,0,'C',1,0);
		$pdf->cell(25,10,"Profession",1,0,'C',1,0);
		$pdf->cell(40,10,"Service ",1,0,'C',1,0);
		$pdf->cell(15,10,"Durée",1,0,'C',1,0);
		$pdf->cell(126,10,"Cause du décès",1,0,'C',1,0);
		$pdf->mysqlconnect();
		$query = "SELECT * FROM deceshosp where DINS BETWEEN '$pdf->datejour1' AND '$pdf->datejour2' order by  DINS ";
		$resultat=mysql_query($query);
		$totalmbr1=mysql_num_rows($resultat);
		$pdf->SetFont('Arial','',9,'',true);
		$pdf->SetXY(05,$pdf->GetY()+10);
		$x=0;
		while($row=mysql_fetch_object($resultat))
		{
			$x=$x+1;
			$pdf->cell(10,5,$x,1,0,'C',0);
			$pdf->cell(20,5,$pdf->dateUS2FR($row->DINS),1,0,'C',0);
			
			$pdf->cell(10,5,trim($row->SEX),1,0,'C',0);
			if ($row->Years > 0 ){$pdf->cell(10,5,$row->Years." A",1,0,'C',0);} else {if ($row->Days <= 30 ) {$pdf->cell(10,5,$row->Days." J",1,0,'C',0);} else{$pdf->cell(10,5,$row->Months." M",1,0,'C',0);} }
			$pdf->cell(30,5,$pdf->nbrtostring("com","IDCOM",$row->COMMUNER,"COMMUNE"),1,0,'L',0);
			$pdf->cell(25,5,$pdf->nbrtostring("profession","id",$row->Profession,"Profession"),1,0,'L',0);
			$pdf->cell(40,5,$pdf->nbrtostring("servicedeces","id",$row->SERVICEHOSPIT,"service"),1,0,'L',0);
			$pdf->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'C',0);
			$pdf->SetFont('Arial','',8,'',true);
			$pdf->cell(126,5,'('.$pdf->nbrtostring("CIM","row_id",$row->CODECIM,'diag_nom').')_'.$pdf->nbrtostring("CIM","row_id",$row->CODECIM,'diag_cod'),1,0,'L',0);
			$pdf->SetXY(5,$pdf->GetY()+5);
		}
		$pdf->SetFont('Arial', 'B',10, '', true);
		$pdf->SetXY(5,$pdf->GetY());
		$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);
		$pdf->SetXY(45,$pdf->GetY());
		$pdf->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);
		$pdf->SetXY(190,$pdf->GetY()+5); 
		$pdf->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);
		$pdf->SetXY(190,$pdf->GetY()+5); 
		$pdf->cell(90,10,'Dr '.$login,0,0,'L',0);
		
		$querydb= "SELECT COUNT(*) AS nbr_doublon,NOM,PRENOM,FILSDE,STRUCTURED,DINS FROM deceshosp where DINS BETWEEN '$pdf->datejour1' AND '$pdf->datejour2'  GROUP BY NOM,PRENOM,FILSDE HAVING COUNT(*) > 1 ORDER BY nbr_doublon DESC ";//
		$resultatdb=mysql_query($querydb);
		$totalmbrdb=mysql_num_rows($resultatdb);
		
		if ($totalmbrdb>0) 
		{
			
			$pdf->AddPage('L','A4');
			$pdf->SetDisplayMode('fullpage','single');
			$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
			$pdf->SetFont('Arial','B',10);
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFillColor(255, 0, 0);
			
			$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(285,5,$pdf->repfr,0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->mspfr,0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
			
			$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(50,5,"Service Prévention",0,0,'L',1,0);  $pdf->SetXY(240,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);	
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
			
			$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(285,5,"RELEVE DES CAUSES DE DECES (EN DOUBLONS)",0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',1,0);
			
			$pdf->SetFillColor(255, 0, 0 );
			$pdf->SetXY(05,$pdf->GetY()+15);
			$pdf->cell(10,10,"N°",1,0,'C',1,0);
			$pdf->cell(20,10,"Date décès",1,0,'C',1,0);
			$pdf->cell(245,10,"Nom_Prénom",1,0,'C',1,0);
			$pdf->cell(10,10,"Nbr",1,0,'C',1,0);
			$pdf->SetXY(05,$pdf->GetY()+10);
			$x=0;
			while($rowdb=mysql_fetch_object($resultatdb))
			{
			$pdf->SetFont('Arial','',9,'',true);
			$pdf->cell(10,5,$x=$x+1,1,0,'C',1,0);
			$pdf->cell(20,5,$pdf->dateUS2FR($rowdb->DINS),1,0,'C',0);
			$pdf->cell(245,5,trim($rowdb->NOM).'_'.strtolower (trim($rowdb->PRENOM)).' ['.strtolower (trim($rowdb->FILSDE)).']'.'_('.$pdf->nbrtostring("structure","id",$rowdb->STRUCTURED,"structure").')',1,0,'L',0);
			$pdf->cell(10,5,$rowdb->nbr_doublon,1,0,'C',0);
			$pdf->SetXY(5,$pdf->GetY()+5);
			}
			$pdf->SetFont('Arial', 'B',10, '', true);
			$pdf->SetXY(5,$pdf->GetY());
			$pdf->cell(285,05,"TOTAL : ".$totalmbrdb,1,0,1,'C',0);
		}
	}
	
	if ($deces=='2') {

		$pdf->AddPage('L','A4');
		$pdf->SetDisplayMode('fullpage','single');
		$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFillColor(230);
		
		$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(285,5,$pdf->repfr,0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->mspfr,0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
		
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(50,5,"Service Prévention",0,0,'L',1,0);  $pdf->SetXY(240,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);	
		$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
		
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(285,5,"RELEVE DES CAUSES DE DECES ",0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',1,0);
		
		$pdf->SetFillColor(200 );
	    $pdf->SetXY(05,$pdf->GetY()+10);
		$pdf->cell(10,10,"N°",1,0,'C',1,0);
		$pdf->cell(20,10,"Date décès",1,0,1,'C',0);
		$pdf->cell(70,10,"Nom_Prénom",1,0,'C',1,0);
		$pdf->cell(10,10,"Sexe",1,0,'C',1,0);
		$pdf->cell(20,10,"Née le",1,0,'C',1,0);
		$pdf->cell(10,10,"Age",1,0,'C',1,0);
		$pdf->cell(45,10,"résidence",1,0,'C',1,0);
		$pdf->cell(20,10,"Admission",1,0,'C',1,0);
		$pdf->cell(56,10,"Service ",1,0,'C',1,0);
		$pdf->cell(15,10,"Durée",1,0,'C',1,0);
		$pdf->cell(10,10,"CIM",1,0,'C',1,0);
		
		$pdf->mysqlconnect();
		$query = "SELECT * FROM deceshosp where DINS BETWEEN '$pdf->datejour1' AND '$pdf->datejour2' order by  DINS ";
		$resultat=mysql_query($query);
		$totalmbr1=mysql_num_rows($resultat);
		$pdf->SetFont('Arial','',9,'',true);
		$pdf->SetXY(05,$pdf->GetY()+10);
		$x=0;
		while($row=mysql_fetch_object($resultat))
		{
			$x=$x+1;
			$pdf->cell(10,5,$x,1,0,'C',0);
			$pdf->cell(20,5,$pdf->dateUS2FR($row->DINS),1,0,'C',0);
			$pdf->cell(70,5,trim($row->NOM).'_'.strtolower (trim($row->PRENOM)).' ['.strtolower (trim($row->FILSDE)).']',1,0,'L',0);
			$pdf->cell(10,5,trim($row->SEX),1,0,'C',0);
			$pdf->cell(20,5,$pdf->dateUS2FR($row->DATENAISSANCE),1,0,'C',0);
				if ($row->Years > 0 ) 
				{
					$pdf->cell(10,5,$row->Years." A",1,0,'C',0);
				}
				else 
				{
					if ($row->Days <= 30 ){$pdf->cell(10,5,$row->Days." J",1,0,'C',0);}else{$pdf->cell(10,5,$row->Months." M",1,0,'C',0);} 
				}
			$pdf->cell(45,5,$pdf->nbrtostring("com","IDCOM",$row->COMMUNER,"COMMUNE"),1,0,'L',0);
			$pdf->cell(20,5,$pdf->dateUS2FR($row->DATEHOSPI),1,0,'C',0);
			$pdf->cell(56,5,$pdf->nbrtostring("servicedeces","id",$row->SERVICEHOSPIT,"service"),1,0,'L',0);
			$pdf->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'C',0);
			$pdf->cell(10,5,$pdf->nbrtostring("CIM","row_id",$row->CODECIM,'diag_cod'),1,0,'C',0);
			$pdf->SetXY(5,$pdf->GetY()+5);
		}
		$pdf->SetFont('Arial', 'B',10, '', true);
		$pdf->SetXY(5,$pdf->GetY());
		$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);
		$pdf->SetXY(45,$pdf->GetY());
		$pdf->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);
		$pdf->SetXY(190,$pdf->GetY()+5); 
		$pdf->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);
		$pdf->SetXY(190,$pdf->GetY()+5); 
		$pdf->cell(90,10,'Dr '.$login,0,0,'L',0);
		
		$querydb= "SELECT COUNT(*) AS nbr_doublon,NOM,PRENOM,FILSDE,STRUCTURED,DINS FROM deceshosp where DINS BETWEEN '$pdf->datejour1' AND '$pdf->datejour2'  GROUP BY NOM,PRENOM,FILSDE HAVING COUNT(*) > 1 ORDER BY nbr_doublon DESC ";//
		$resultatdb=mysql_query($querydb);
		$totalmbrdb=mysql_num_rows($resultatdb);
		
		if ($totalmbrdb>0) 
		{
			
			$pdf->AddPage('L','A4');
			$pdf->SetDisplayMode('fullpage','single');
			$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
			$pdf->SetFont('Arial','B',10);
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFillColor(255, 0, 0);
			
			$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(285,5,$pdf->repfr,0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->mspfr,0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(285,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
			
			$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(50,5,"Service Prévention",0,0,'L',1,0);  $pdf->SetXY(240,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);	
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
			
			$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(285,5,"RELEVE DES CAUSES DE DECES (EN DOUBLONS)",0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',1,0);
			$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',1,0);
			
			
			
			$pdf->SetFillColor(255, 0, 0 );
			$pdf->SetXY(05,$pdf->GetY()+15);
			$pdf->cell(10,10,"N°",1,0,'C',1,0);
			$pdf->cell(20,10,"Date décès",1,0,'C',1,0);
			$pdf->cell(180,10,"Nom_Prénom",1,0,'C',1,0);
			$pdf->cell(65,10,"Etablissement",1,0,'C',1,0);
			$pdf->cell(10,10,"Nbr",1,0,'C',1,0);
			$pdf->SetXY(05,$pdf->GetY()+10);
			$x=0;
			while($rowdb=mysql_fetch_object($resultatdb))
			{
			$pdf->SetFont('Arial','',9,'',true);
			$pdf->cell(10,5,$x=$x+1,1,0,'C',1,0);
			$pdf->cell(20,5,$pdf->dateUS2FR($rowdb->DINS),1,0,'C',0);
			$pdf->cell(180,5,trim($rowdb->NOM).'_'.strtolower (trim($rowdb->PRENOM)).' ['.strtolower (trim($rowdb->FILSDE)).']',1,0,'L',0);
			$pdf->cell(65,5,$pdf->nbrtostring("structure","id",$rowdb->STRUCTURED,"structure"),1,0,'L',0);
			$pdf->cell(10,5,$rowdb->nbr_doublon,1,0,'C',0);
			$pdf->SetXY(5,$pdf->GetY()+5);
			}
			$pdf->SetFont('Arial', 'B',10, '', true);
			$pdf->SetXY(5,$pdf->GetY());
			$pdf->cell(285,05,"TOTAL : ".$totalmbrdb,1,0,1,'C',0);
		}
		
		
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"NOM");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"PRENOM");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"FILSDE");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"ETDE");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"SEX");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"DATENAISSANCE");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"ADRESSE");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"CIM1");
		$pdf->INFORMATIONM($pdf->datejour1,$pdf->datejour2,"MEDECINHOSPIT");
		
		$querydbX= "SELECT COUNT(*) AS nbr_doublon,NOM,PRENOM,FILSDE,STRUCTURED,DINS,MEDECINHOSPIT FROM deceshosp  GROUP BY MEDECINHOSPIT HAVING COUNT(*) > 1 ORDER BY nbr_doublon DESC ";//
		$resultatdbX=mysql_query($querydbX);
		$totalmbrdbX=mysql_num_rows($resultatdbX);
		if ($totalmbrdbX>0) 
		{
			$pdf->AddPage('L','A4');
			$pdf->SetDisplayMode('fullpage','single');
			$pdf->SetTitle('Releve Des Causes De Deces '."Du ".$pdf->datejour1." Au ".$pdf->datejour2);
			$pdf->SetFont('Arial','B',10);
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFillColor(230);
			$pdf->SetXY(5,$pdf->GetY());$pdf->cell(290,5,$pdf->repfr,0,0,'C',1,0);
			// $pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(290,5,$pdf->mspfr,0,0,'C',1,0);$STRUCTUREDX = explode('=',$STRUCTURED);
			// $pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(290,5,$pdf->dspfr.': '.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$STRUCTUREDX[1],"idwil"),"WILAYAS"),0,0,'C',1,0);
			// if($STRUCTURED =='IS NOT NULL'){$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(90,5,"Service Prévention",0,0,'L',0,0);$pdf->SetXY(205,$pdf->GetY());$pdf->cell(90,5," LE : ".date('d-m-Y'),0,0,'C',0,0);$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(90,5,"N ____ / ".date('Y'),0,0,'L',0,0);} else {$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(90,5,$pdf->nbrtostring("structure","id",$STRUCTUREDX[1],"structure"),0,0,'L',0,0);$pdf->SetXY(205,$pdf->GetY());$pdf->cell(90,5," LE : ".date('d-m-Y'),0,0,'C',0,0);$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(90,5,"SEMEP",0,0,'L',0,0);$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(90,5,"N ____ / ".date('Y'),0,0,'L',0,0);}
			$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(290,5,"RELEVE DES CAUSES DE DECES (MEDECINS)",0,0,'C',0,0);
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(290,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',0,0);
			$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(290,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',0,0);
			$pdf->SetFillColor(200 );
			$pdf->SetXY(05,$pdf->GetY()+15);
			$pdf->cell(10,10,"N°",1,0,'C',1,0);
			$pdf->cell(265,10,"Nom_Prénom",1,0,'C',1,0);
			$pdf->cell(10,10,"Nbr",1,0,'C',1,0);
			$pdf->SetXY(05,$pdf->GetY()+10);
			$x=0;
			while($rowdbX=mysql_fetch_object($resultatdbX))
			{
			$pdf->cell(10,5,$x=$x+1,1,0,'C',0);
			$pdf->cell(265,5,$rowdbX->MEDECINHOSPIT,1,0,'L',0);
			// $pdf->cell(245,5,trim($rowdb->NOM).'_'.strtolower (trim($rowdb->PRENOM)).' ['.strtolower (trim($rowdb->FILSDE)).']'.'_('.$rowdb->STRUCTURED.')',1,0,'L',0);
			$pdf->cell(10,5,$rowdbX->nbr_doublon,1,0,'C',0);
			$pdf->SetXY(5,$pdf->GetY()+5);
			}
			$pdf->SetXY(5,$pdf->GetY());
			$pdf->cell(285,05,"TOTAL : ".$totalmbrdbX,1,0,1,'C',0);
		}
		
		
	}
	if ($deces=='3') {

    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(200,5,$pdf->repfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->mspfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(50,5,"Service Prévention",0,0,'L',1,0);  $pdf->SetXY(155,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
		
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,5,"RELEVE DES CAUSES DE DECES ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',1,0);
	
	//***********************************************************//
	$idwil='17000';
	$pdf->SetXY(05,$pdf->GetY()+10);
	$pdf->cell(10,10,"id",1,0,'C',1,0);
	$pdf->cell(70,10,"Etablissements",1,0,'L',1,0);
	$pdf->cell(30,10,"Valide",1,0,'C',1,0);
	$pdf->cell(30,10,"NValide",1,0,'C',1,0);
	$pdf->cell(30,10,"T",1,0,'C',1,0);
	$pdf->cell(30,10,"P% (Décès)",1,0,'C',1,0);
	$pdf->SetXY(05,$pdf->GetY()+10); 
	$pdf->mysqlconnect();
	$pdf->SetFont('Arial', '',9, '', true);
	$query = "SELECT * FROM structure where idwil=$idwil ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
	$pdf->cell(10,5,$row->id,1,0,'C',0);
	$pdf->cell(70,5,$row->structure,1,0,'L',0);
	$pdf->cell(30,5,$pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,"=".$row->id,'= "1" '),1,0,'C',0);
	$pdf->cell(30,5,$pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,"=".$row->id,'= "0" '),1,0,'C',0);
	$pdf->cell(30,5,$pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,"=".$row->id,'IS NOT NULL'),1,0,'C',0);
	$pdf->cell(30,5,round((($pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,"=".$row->id,'IS NOT NULL')*100) / $pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','IS NOT NULL')),2)." %",1,0,'C',0);
	$pdf->SetXY(5,$pdf->GetY()+5); 
	}
	$pdf->SetFont('Arial', 'B',10, '', true);
	$pdf->cell(80,10,"Total Etablissements",1,0,1,'C',0);
	$pdf->cell(30,10,$pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','= "1" '),1,0,'C',1,0);
	$pdf->cell(30,10,$pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','= "0" '),1,0,'C',1,0);
	$pdf->cell(30,10,$pdf->dspaprouve($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','IS NOT NULL'),1,0,'C',1,0);
	$pdf->cell(30,10,'100 %',1,0,'C',1,0);
    
	

	//***********************************************************//
	
	
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(200,5,$pdf->repfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->mspfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(50,5,"Service Prévention",0,0,'L',1,0);  $pdf->SetXY(155,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
		
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,5,"RELEVE DES CAUSES DE DECES ",0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',1,0);
	
	//***********************************************************//
	$idwil='17000';
	$pdf->SetXY(05,$pdf->GetY()+10);
	$pdf->cell(10,10,"id",1,0,'C',1,0);
	$pdf->cell(70,10,"Etablissements",1,0,'L',1,0);
	
	$pdf->cell(24,10,"M",1,0,'C',1,0);
	$pdf->cell(24,10,"F",1,0,'C',1,0);
	$pdf->cell(24,10,"T",1,0,'C',1,0);
	$pdf->cell(24,10,"Ratio(M/F)",1,0,'C',1,0);
	$pdf->cell(24,10,"P% (Décès)",1,0,'C',1,0);
	$pdf->SetXY(05,$pdf->GetY()+10); 
	$pdf->mysqlconnect();
	$pdf->SetFont('Arial', '',9, '', true);
	$query = "SELECT * FROM structure where idwil=$idwil ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
	$pdf->cell(10,5,$row->id,1,0,'C',0);
	$pdf->cell(70,5,$row->structure,1,0,'L',0);
	$mas=$pdf->dspnbr($pdf->datejour1,$pdf->datejour2,"=".$row->id,'= "M" ');
	$fem=$pdf->dspnbr($pdf->datejour1,$pdf->datejour2,"=".$row->id,'= "F" ');
	$tmf=$pdf->dspnbr($pdf->datejour1,$pdf->datejour2,"=".$row->id,'IS NOT NULL');
	$pdf->cell(24,5,$mas,1,0,'C',0);
	$pdf->cell(24,5,$fem,1,0,'C',0);
	$pdf->cell(24,5,$tmf,1,0,'C',0);
	if($fem != 0){$pdf->cell(24,5,round($mas/$fem,2),1,0,'C',0);	}else{$pdf->cell(24,5,"",1,0,'C',0);}
	$pdf->cell(24,5,round((($pdf->dspnbr($pdf->datejour1,$pdf->datejour2,"=".$row->id,'IS NOT NULL')*100) / $pdf->dspnbr($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','IS NOT NULL')),2)." %",1,0,'C',0);
	$pdf->SetXY(5,$pdf->GetY()+5); 
	}
	$pdf->SetFont('Arial', 'B',10, '', true);
	$pdf->cell(80,10,"Total Etablissements",1,0,1,'C',0);
	$mast=$pdf->dspnbr($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','= "M" ');
	$femt=$pdf->dspnbr($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','= "F" ');
	$tmft=$pdf->dspnbr($pdf->datejour1,$pdf->datejour2,'IS NOT NULL','IS NOT NULL');
	$pdf->cell(24,10,$mast,1,0,'C',1,0);
	$pdf->cell(24,10,$femt,1,0,'C',1,0);
	$pdf->cell(24,10,$tmft,1,0,'C',1,0);
	if($femt!=0){
	$pdf->cell(24,10,round($mast/$femt,2),1,0,'C',1,0);	
	}else{
	$pdf->cell(24,10,"",1,0,'C',1,0);	
	}
	$pdf->cell(24,10,'100 %',1,0,'C',1,0);
    
	

	//***********************************************************//
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
    $pdf->servicehospitalisation($pdf->datejour1,$pdf->datejour2,'SERVICEHOSPIT','IS NOT NULL');
    //***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
    $pdf->dureehospitalisation1($pdf->datejour1,$pdf->datejour2,'SERVICEHOSPIT','IS NOT NULL',30);
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->T2F20x($pdf->datejour1,$pdf->datejour2,'IS NOT NULL',5*20);
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->T2F20xpn($pdf->datejour1,$pdf->datejour2,'IS NOT NULL',28);
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->T2F20xpn($pdf->datejour1,$pdf->datejour2,'IS NOT NULL',7);
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->tblparcim1("VI-Distribution des causes de décès suivant la classification internationale des maladies CIM10 (Chapitres)",$pdf->datejour1,$pdf->datejour2,'IS NOT NULL',"");
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->tblparcim2("VII-Distribution des causes de décès suivant la classification internationale des maladies CIM10 (Catégories)",$pdf->datejour1,$pdf->datejour2,'IS NOT NULL','');
	}
	if ($deces=='4') {
    //***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
    $pdf->tblparwilaya('Deces',$pdf->datejour1,$pdf->datejour2,'IS NOT NULL') ;
    //***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->Algerie($pdf->datasigwil($pdf->datejour1,$pdf->datejour2,'IS NOT NULL'),20,128,3.7,'wilaya'); 	
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);	
	$pdf->djelfad($pdf->datasig($pdf->datejour1,$pdf->datejour2,'IS NOT NULL'),20,128,3.7);
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->tblparcommune('Deces',$pdf->datejour1,$pdf->datejour2,'IS NOT NULL') ;		
	//***********************************************************//
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);	
	$pdf->djelfac($pdf->datasig($pdf->datejour1,$pdf->datejour2,'IS NOT NULL'),20,128,3.7);	
	}
	
	if ($deces=='5') {
    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
    $pdf->T2F20MM($pdf->dataMM(5,42,'Years','deceshosp','DINS','COMMUNER',$pdf->datejour1,$pdf->datejour2,'IS NOT NULL'),$pdf->datejour1,$pdf->datejour2);
    
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->DECESMATERNELS("DECES MATERNELS : ",$pdf->datejour1,$pdf->datejour2,'IS NOT NULL');
	}
	if ($deces=='6') {
	
	}
	if ($deces=='7') {
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);		
    $pdf->SetFillColor(230);$pdf->MEDICOLEGALES("Causes de deces medicolegales : ",$pdf->datejour1,$pdf->datejour2,'IS NOT NULL');
    }
	if ($deces=='8') { 
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->T2F20MM($pdf->dataMMX(5,42,'Years','deceshosp','DINS','COMMUNER',$pdf->datejour1,$pdf->datejour2,'IS NOT NULL'),$pdf->datejour1,$pdf->datejour2);
    
	
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
    $pdf->MORTALITEMATERNELLE("Mortalité maternelle : ",$pdf->datejour1,$pdf->datejour2,'IS NOT NULL');
   }

    if ($deces=='9') { 
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
    
	$pdf->T2F20KC($pdf->datejour1,$pdf->datejour2,'IS NOT NULL',5*19);
	$pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->MORTALITEKC("Mortalité KC : ",$pdf->datejour1,$pdf->datejour2,'IS NOT NULL');
   }

   if ($deces=='10') { 
	
	    $EPH1="IS NOT NULL";
	
	    $pdf->AddPage('P','A4');
	$pdf->SetDisplayMode('fullpage','single');
	$pdf->SetTitle('Releve des causes de décés '."du ".$pdf->datejour1." au ".$pdf->datejour2);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(230);
	$pdf->SetXY(5,$pdf->GetY());  $pdf->cell(200,5,$pdf->repfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->mspfr,0,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(200,5,$pdf->dspfr.': Djelfa ',0,0,'C',1,0);
	
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(50,5,"Service Prévention",0,0,'L',1,0);  $pdf->SetXY(155,$pdf->GetY());$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'C',1,0);	
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(50,5,"N _________ / ".date('Y'),0,0,'L',1,0);
		
	$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,5,"Distribution des décès par mois ",0,0,'C',1,0);
	// $pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"Du  ".$pdf->dateUS2FR($pdf->datejour1)."  Au  ".$pdf->dateUS2FR($pdf->datejour2),0,0,'C',1,0);
	// $pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',1,0);
	
		
		$date0=date("Y")-0;$date1=date("Y")-1;$date2=date("Y")-2;$date3=date("Y")-3;$date4=date("Y")-4;

		$link0=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,5,"0-Sommaire".$pdf->SetLink($link0),0,0,'L',0,$link0);
		$link1=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"1-Distribution des décès par mois année ".$date4,0,0,'L',0,$link1);
		$link2=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"2-Distribution des décès par mois année ".$date3,0,0,'L',0,$link2);
		$link3=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"3-Distribution des décès par mois année ".$date2,0,0,'L',0,$link3);
		$link4=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"4-Distribution des décès par mois année ".$date1,0,0,'L',0,$link4);
		$link5=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"5-Distribution des décès par mois année ".$date0,0,0,'L',0,$link5);
	
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"1-Distribution des décès par mois année ".$date4.$pdf->SetLink($link1),1,0,'C',1,$link0);$pdf->valeurpm($date4);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"2-Distribution des décès par mois année ".$date3.$pdf->SetLink($link2),1,0,'C',1,$link0);$pdf->valeurpm($date3);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"3-Distribution des décès par mois année ".$date2.$pdf->SetLink($link3),1,0,'C',1,$link0);$pdf->valeurpm($date2);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"4-Distribution des décès par mois année ".$date1.$pdf->SetLink($link4),1,0,'C',1,$link0);$pdf->valeurpm($date1);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"5-Distribution des décès par mois année ".$date0.$pdf->SetLink($link5),1,0,'C',1,$link0);$pdf->valeurpm($date0);

		$pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);
		$pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,'Dr '.$login,0,0,'L',0);	  
   }
	$pdf->Output("EPA_".$structure.".PDF",'I');	
	
}
if ($_POST['format']=='2'){header("Location: ../../dspd/XLS/".$Datedebut."/".$Datefin."/") ;}
if ($_POST['format']=='3'){header("Location: ../../dspd/SQL/".$Datedebut."/".$Datefin."/") ;}

?>