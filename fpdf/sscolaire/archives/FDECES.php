<?php
if ($_POST['type']=='1')
{
	require('deces.php');
	$pdf = new deces('L', 'mm', 'A4');$pdf->AliasNbPages();
	// $pdf->SetAutoPageBreak('auto', 1.5);
	// $pdf->SetDisplayMode('fullwidth','two');
	if (!ISSET($_POST['Datedebut'])||!ISSET($_POST['Datefin'])){$datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");}else{if(empty($_POST['Datedebut'])||empty($_POST['Datefin'])){ $datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");}else{ $datejour1 =$pdf->dateFR2US($_POST['Datedebut']) ;$datejour2 =$pdf->dateFR2US($_POST['Datefin']) ;}}
	if ($datejour1>$datejour2 or  $datejour1==$datejour2 ){header("Location: ../../dashboard/Evaluation") ;}
	$STRUCTURED=$_POST["structure"];$EPH1='='.$STRUCTURED;$login=$_POST["login"];
	if ($_POST['deces']=='0') //0 partie BORDEREAU D'ENVOI
	{
	$pdf->BORDEREAU("BORDEREAU D'ENVOI",$datejour1,$datejour2,$EPH1,$STRUCTURED); 
	}
	
	if ($_POST['deces']=='1') //1 partie  RELEVE DES CAUSES DE DEDECS
	{
	$pdf->listedeces($EPH1,$datejour1,$datejour2,$login,'I');
	}
	if ($_POST['deces']=='2') //2 partie  RELEVE DES CAUSES DE DECES+
	{
	$pdf->listedeces($EPH1,$datejour1,$datejour2,$login,'');
	} 
	if ($_POST['deces']=='3') //3 partie  Mortalite Intra-Hospitaliere
	{
		
		$pdf->PAGEDEGARDE($datejour1,$datejour2,$EPH1,$STRUCTURED);$link0=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+20);$pdf->cell(200,10,"Sommaire".$pdf->SetLink($link0),0,0,'L',0,$link0);
		$link1=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"I-Distribution des décès par Service D'hospitalisation",0,0,'L',0,$link1);
		$link2=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"II-Distribution des décès par Durée D'hospitalisation (00-30 jours)",0,0,'L',0,$link2);
		$link3=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"III-Distribution des décès par tranche d'age et sexe (global)",0,0,'L',0,$link3);
		$link4=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"IV-Distribution des décès par age en jours et sexe (Périnatal en jours)",0,0,'L',0,$link4);
		$link5=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"V-Distribution des décès par age en jours et sexe (Néonatale Précoce en jours) ",0,0,'L',0,$link5);
		$link6=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"VI-Distribution des causes de décès suivant la classification internationale des maladies CIM10 (Chapitres)",0,0,'L',0,$link6);
		$link7=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"VII-Distribution des causes de décès suivant la classification internationale des maladies CIM10 (Catégories)",0,0,'L',0,$link7);
	
		
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"I-Distribution des décès par Service D'hospitalisation".$pdf->SetLink($link1),1,0,'C',1,$link0);$pdf->servicehospitalisation($datejour1,$datejour2,'SERVICEHOSPIT',$EPH1);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"II-Distribution des décès par Durée D'hospitalisation (00-30 jours)".$pdf->SetLink($link2),1,0,'C',1,$link0);$pdf->dureehospitalisation1($datejour1,$datejour2,'SERVICEHOSPIT',$EPH1,30);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"III-Distribution des décès par tranche d'age et sexe (Global en année) ".$pdf->SetLink($link3),1,0,'C',1,$link0);$pdf->T2F20x($datejour1,$datejour2,$EPH1,5*19);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"IV-Distribution des décès par age en jours et sexe (Périnatal en jours) ".$pdf->SetLink($link4),1,0,'C',1,$link0);$pdf->T2F20xpn($datejour1,$datejour2,$EPH1,28);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"V-Distribution des décès par age en jours et sexe (Néonatale Précoce en jours) ".$pdf->SetLink($link5),1,0,'C',1,$link0);$pdf->T2F20xpn($datejour1,$datejour2,$EPH1,7);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->tblparcim1("VI-Distribution des causes de décès suivant la classification internationale des maladies CIM10 (Chapitres)".$pdf->SetLink($link6),$datejour1,$datejour2,$EPH1,$link0);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->tblparcim2("VII-Distribution des causes de décès suivant la classification internationale des maladies CIM10 (Catégories)".$pdf->SetLink($link7),$datejour1,$datejour2,$EPH1,$link0);
	
		
	}
	if ($_POST['deces']=='4') //4 partie SIG
	{
		$pdf->PAGEDEGARDE($datejour1,$datejour2,$EPH1,$STRUCTURED);$link0=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+20);$pdf->cell(200,10,"Sommaire".$pdf->SetLink($link0),0,0,'L',0,$link0);
		$link1=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"I-Distribution des décès par wilaya de residence (Tableau)",0,0,'L',0,$link1);	
		$link2=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"II-Distribution des décès par wilaya de residence (SIG)",0,0,'L',0,$link2);
		$link3=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"III-Distribution des décès par dairas de residence (SIG) ",0,0,'L',0,$link3);
		$link4=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"IV-Distribution des décès par communes de residence (Tableau)",0,0,'L',0,$link4);
		$link5=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"V-Distribution des décès par communes de residence (SIG) ",0,0,'L',0,$link5);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"I-Distribution des décès par wilaya de residence ".$pdf->SetLink($link1),1,0,'C',1,$link0);$pdf->tblparwilaya('Deces',$datejour1,$datejour2,$EPH1) ;
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"II-Distribution des décès par wilaya de residence (SIG) ".$pdf->SetLink($link2),1,0,'C',1,$link0);$pdf->Algerie($pdf->datasigwil($datejour1,$datejour2,$EPH1),20,128,3.7,'wilaya'); 
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"III-Distribution des décès par dairas de residence (SIG) ".$pdf->SetLink($link3),1,0,'C',1,$link0);$wilaya = $pdf->nbrtostring("structure","id",$STRUCTURED,"idwil"); if ($wilaya==17000) {$pdf->djelfad($pdf->datasig($datejour1,$datejour2,$EPH1),20,128,3.7);}// if ($wilaya==38000) {$pdf->tissemssilet($pdf->datasig38($datejour1,$datejour2,$EPH1),20,118,2,'dairas');}
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"IV-Distribution des décès par communes de residence ".$pdf->SetLink($link4),1,0,'C',1,$link0);$pdf->tblparcommune('Deces',$datejour1,$datejour2,$EPH1) ;	
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"IX-Distribution des décès par communes de residence (SIG) ".$pdf->SetLink($link5),1,0,'C',1,$link0);$wilaya = $pdf->nbrtostring("structure","id",$STRUCTURED,"idwil"); if ($wilaya==17000) {$pdf->djelfac($pdf->datasig($datejour1,$datejour2,$EPH1),20,128,3.7);}// if ($wilaya==38000) {$pdf->tissemssilet($pdf->datasig38($datejour1,$datejour2,$EPH1),20,118,2,'commune');}
	}
	if ($_POST['deces']=='5') //5 partie 
	{
	    $pdf->PAGEDEGARDE($datejour1,$datejour2,$EPH1,$STRUCTURED);$link0=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+20);$pdf->cell(200,10,"Sommaire".$pdf->SetLink($link0),0,0,'L',0,$link0);
		
		$link1=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"XII-Distribution des décès suivant l'heure de survenue ",0,0,'L',0,$link1);
		$link2=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"XIII-Décès maternels",0,0,'L',0,$link2);
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->SetXY(5,25);$pdf->cell(200,5,"V-Distribution des deces Maternels par tranche d'age".$pdf->SetLink($link1),1,0,'C',1,$link0);$pdf->T2F20MM($pdf->dataMM(5,42,'Years','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);$pdf->SetXY(120,$pdf->GetY()+15); $pdf->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);$pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,'Dr '.$login,0,0,'L',0);	
		$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->DECESMATERNELS("DECES MATERNELS : ".$pdf->SetLink($link2),$datejour1,$datejour2,$EPH1,$STRUCTURED); $pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);$pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,'Dr '.$login,0,0,'L',0);	
	}
	if ($_POST['deces']=='6') //6 partie 
	{
	   $pdf->PAGEDEGARDE($datejour1,$datejour2,$EPH1,$STRUCTURED);$link0=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+20);$pdf->cell(200,10,"Sommaire".$pdf->SetLink($link0),0,0,'L',0,$link0);
	   $link10=$pdf->AddLink();$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(200,10,"XIV-Situation démographique",0,0,'L',0,$link10);
	   $pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);$pdf->DEMOGRAPHIE("SITUATION DEMOGRAPHIQUE : ".$pdf->SetLink($link10),$datejour1,$datejour2,$EPH1,$STRUCTURED); $pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);$pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,'Dr '.$login,0,0,'L',0);	
	
	}
	
$pdf->Output("EPA_".$STRUCTURED.".PDF",'I');
}
if ($_POST['type']=='2'){header("Location: ../../dashboard/XLS/".$_POST['Datedebut']."/".$_POST['Datefin']."/") ;}
if ($_POST['type']=='3'){header("Location: ../../dashboard/SQL/".$_POST['Datedebut']."/".$_POST['Datefin']."/") ;}
?>