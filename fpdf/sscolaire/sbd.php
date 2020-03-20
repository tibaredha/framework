<?php
require('sscolaire.php');
$pdf = new sscolaire('L', 'mm', 'A4');$pdf->AliasNbPages();
$datejour1='2000-01-01';
$datejour2='2020-01-01';
$UDS='1';
//1//
$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->SetXY(5,10);             $pdf->cell(200,5,$pdf->mspfr,1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,$pdf->dspfr,1,0,'C',0,0);
$pdf->entete();
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"1",1,0,'C',1,0);                  $pdf->cell(176,5,"BILAN D'EVALUATION - DEPISTAGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"1A",1,0,'C',1,0);                $pdf->cell(48,10,"Nombre d'élèves",1,0,'C',0,0);$pdf->cell(128,10,"Nombre d'élèves ayant",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0);  $pdf->cell(16,10,"Inscrits",1,0,'C',0,0);$pdf->cell(32,10,"Examinés",1,0,'C',0,0);                                  $pdf->cell(32,10,"Hygiène BD-NA",1,0,'C',0,0);                                 $pdf->cell(32,10,"Au moins une carie",1,0,'C',0,0);                                     $pdf->cell(32,10,"Une gingivite",1,0,'C',0,0);                                     $pdf->cell(32,10,"Une Anomalie ODF",1,0,'C',0,0);    
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,20,"",1,0,'C',0,0);                 $pdf->cell(16,10,"Nbre",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);  $pdf->cell(16,10,"%",1,0,'C',0,0);      $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0); $pdf->cell(16,10,"%",1,0,'C',0,0);       $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(16,10,"(A)",1,0,'C',0,0);     $pdf->cell(16,10,"(B)",1,0,'C',0,0); $pdf->cell(16,10,"(B/A)",1,0,'C',0,0);$pdf->cell(16,10,"(C)",1,0,'C',0,0);   $pdf->cell(16,10,"(C/B)",1,0,'C',0,0);  $pdf->cell(16,10,"X",1,0,'C',0,0);   $pdf->cell(16,10,"(X/B)",1,0,'C',0,0);$pdf->cell(16,10,"(D)",1,0,'C',0,0);  $pdf->cell(16,10,"(D/B)",1,0,'C',0,0);   $pdf->cell(16,10,"(E)",1,0,'C',0,0); $pdf->cell(16,10,"(E/B)",1,0,'C',0,0);
$pdf->lDEPISTAGE('0',$datejour1,$datejour2,$UDS);
$pdf->lDEPISTAGE('1',$datejour1,$datejour2,$UDS);
$pdf->lDEPISTAGE('5',$datejour1,$datejour2,$UDS);
$pdf->lTDEPISTAGE($datejour1,$datejour2,$UDS);

$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"1B",1,0,'C',1,0);                $pdf->cell(87.5,10,"Dents temporaires cao (petit)",1,0,'C',0,0);$pdf->cell(87.5,10,"Dents permanentes CAO (grand)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0);   $pdf->cell(17.5,10,"c",1,0,'C',0,0);       $pdf->cell(17.5,10,"a",1,0,'C',0,0);   $pdf->cell(17.5,10,"o",1,0,'C',0,0);    $pdf->cell(17.5,10,"cao",1,0,'C',0,0);   $pdf->cell(17.5,10,"Icao",1,0,'C',0,0);    $pdf->cell(17.5,10,"C",1,0,'C',0,0);   $pdf->cell(17.5,10,"A",1,0,'C',0,0);    $pdf->cell(17.5,10,"O",1,0,'C',0,0);   $pdf->cell(17.5,10,"CAO",1,0,'C',0,0);     $pdf->cell(17.5,10,"ICAO",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,20,"",1,0,'C',0,0);                  $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);  $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); 
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(17.5,10,"(F)",1,0,'C',0,0);     $pdf->cell(17.5,10,"(G)",1,0,'C',0,0); $pdf->cell(17.5,10,"(H)",1,0,'C',0,0);  $pdf->cell(17.5,10,"(I)",1,0,'C',0,0);   $pdf->cell(17.5,10,"(I/B)",1,0,'C',0,0);   $pdf->cell(17.5,10,"(J)",1,0,'C',0,0); $pdf->cell(17.5,10,"(K)",1,0,'C',0,0);  $pdf->cell(17.5,10,"(L)",1,0,'C',0,0); $pdf->cell(17.5,10,"(M)",1,0,'C',0,0);     $pdf->cell(17.5,10,"(M/B)",1,0,'C',0,0); 
$pdf->LDEPISTAGECAO('0',$datejour1,$datejour2,$UDS);
$pdf->LDEPISTAGECAO('1',$datejour1,$datejour2,$UDS);
$pdf->LDEPISTAGECAO('5',$datejour1,$datejour2,$UDS);
$pdf->LTDEPISTAGECAO($datejour1,$datejour2,$UDS);

$pdf->foot();

//2//
$pdf->entete();
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetFont('Times','B',9);
$pdf->SetXY(29,$pdf->GetY()+5); $pdf->cell(176,5,"NB : il est impératif d'assurer la prise en charge et le suivi des élèves d'année en année scolaire pour une cavité buccale saine",1,0,'C',0,0);
$pdf->SetFont('Times','B',10);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
//*****//
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0); $pdf->cell(43.98,10,"Nombre d'élèves ayant ",1,0,'C',0,0);$pdf->cell(102.62,10,"Nombre de dents",1,0,'C',0,0);$pdf->cell(29.32,10,"Nombre d'élèves",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,30,"",1,0,'C',0,0); $pdf->cell(14.66,10,"=> carie",1,0,'C',0,0);$pdf->cell(29.32,10,"reçus au cabinet",1,0,'C',0,0);                             $pdf->cell(14.66,10,"cariées",1,0,'C',0,0);$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);                          $pdf->cell(29.32,10,"trt provisoirement",1,0,'C',0,0);                          $pdf->cell(29.32,10,"Cariées non trt ",1,0,'C',0,0);$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                  $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0); $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);    $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);   $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);   $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);   $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                  $pdf->cell(14.66,10,"(X)",1,0,'C',0,0);  $pdf->cell(14.66,10,"(A)",1,0,'C',0,0); $pdf->cell(14.66,10,"(A/X)",1,0,'C',0,0);$pdf->cell(14.66,10,"(B)",1,0,'C',0,0);    $pdf->cell(14.66,10,"(C)",1,0,'C',0,0);$pdf->cell(14.66,10,"(C/B)",1,0,'C',0,0);$pdf->cell(14.66,10,"(D)",1,0,'C',0,0);$pdf->cell(14.66,10,"(D/B)",1,0,'C',0,0);$pdf->cell(14.66,10,"(E)",1,0,'C',0,0);$pdf->cell(14.66,10,"(E/B)",1,0,'C',0,0);$pdf->cell(14.66,10,"(F)",1,0,'C',0,0);$pdf->cell(14.66,10,"(F/A)",1,0,'C',0,0);

$pdf->TRTDC ('0',$datejour1,$datejour2,$UDS,10);
$pdf->TRTDC ('1',$datejour1,$datejour2,$UDS,5);



$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Sub total",1,0,'L',0,0); 
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Autres",1,0,'L',0,0); 
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);


$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Moyen",1,0,'L',0,0); 
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Secondaire",1,0,'L',0,0); 
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);



$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Total",1,0,'L',1,0); 
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
      



// 25.14
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"2B",1,0,'C',1,0); 
$pdf->cell(75.42,10,"Gingivites",1,0,'C',0,0);
$pdf->cell(25.14,10,"Extractions ",1,0,'C',0,0);
$pdf->cell(75.42,10,"Anomalies ODF",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,5,"",1,0,'L',0,0); 
$pdf->cell(25.14,5,"ayant gingivite",1,0,'C',0,0);
$pdf->cell(50.28,5,"traités pour gingivite",1,0,'C',0,0);
$pdf->cell(25.14,5,"Nbre de dents ",1,0,'C',0,0);
$pdf->cell(25.14,5,"anomalie ODF",1,0,'C',0,0);
$pdf->cell(50.28,5,"anomalie ODF",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"",1,0,'L',0,0);
$pdf->cell(25.14,5,"(G)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(H)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(H/G)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(I)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(J)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(K)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(K/J)",1,0,'C',0,0);	

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Préscolaire",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"1°AP",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
 
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Sub total",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Autres",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Moyen",1,0,'L',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);	  
 
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Secondaire",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);	 	  	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Total",1,0,'L',1,0); 
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);		  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2C",1,0,'C',1,0);               $pdf->cell(176,10,"Scellement des sillons des dents (SSD) de 6 ans",1,0,'C',0,0);	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,5,"",1,0,'L',0,0); 
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"",1,0,'L',0,0); 
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"1°AP",1,0,'L',0,0); 
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->foot();

//3//
$pdf->AddPage('P','A4');
$pdf->entete();
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"3",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - SUIVI SYSTEMATIQUE DE LA PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"3A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
$pdf->foot();


//4//
$pdf->AddPage('P','A4');
$pdf->entete();
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"4",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - EDUCATION POUR LA SANTE BUCCO-DENTAIRE",1,0,'C',0,0);
$pdf->foot();


//5//
$pdf->AddPage('P','A4');
$pdf->entete();
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"5",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - CAMPAGNES D'EDUCATION SANITAIRE ET DE COMMUNICATION SOCIALE",1,0,'C',0,0);
$pdf->foot();
$pdf->Output("UDS".'----'.".PDF",'I');
?>