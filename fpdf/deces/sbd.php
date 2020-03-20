<?php

require('deces.php');
$pdf = new deces('L', 'mm', 'A4');$pdf->AliasNbPages();

//1//
$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);

$pdf->SetXY(5,10);             $pdf->cell(200,5,"Ministère de la Santé, de la Population et de la Réforme Hospitalière",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,"Direction Générale de la Prévention et de la Promotion de la Santé",1,0,'C',0,0);


$pdf->SetXY(5,$pdf->GetY()+15);            $pdf->cell(160,5,"PROGRAMME NATIONAL DE SANTE BUCCODENTAIRE ",1,0,'C',0,0); $pdf->cell(40,10,"PAGE ".$pdf->PageNo().'/{nb}',1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(160,5,"EN MILIEU SCOLAIRE « STOP A LA CARIE » ",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(40,5,"DSP",1,0,'C',0,0);$pdf->cell(40,5,"EPSP",1,0,'C',0,0);$pdf->cell(40,5,"UDS",1,0,'C',0,0);$pdf->cell(40,5,"ANNEE SCOLAIRE",1,0,'C',0,0);$pdf->cell(40,5,"TRIMESTRE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(40,5,"DJELFA",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);    $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);              $pdf->cell(40,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"1",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - DEPISTAGE",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"1A",1,0,'C',1,0);                $pdf->cell(48,10,"Nombre d'élèves",1,0,'C',0,0);$pdf->cell(128,10,"Nombre d'élèves ayant ....",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0);  $pdf->cell(16,10,"inscrits",1,0,'C',0,0);$pdf->cell(32,10,"examinés",1,0,'C',0,0);                                  $pdf->cell(32,10,"hygiène BD-NA",1,0,'C',0,0);                                 $pdf->cell(32,10,"carie",1,0,'C',0,0);                                     $pdf->cell(32,10,"gingivite",1,0,'C',0,0);                                     $pdf->cell(32,10,"Anomalie ODF",1,0,'C',0,0);    
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,20,"",1,0,'C',0,0);                 $pdf->cell(16,10,"Nbre",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);  $pdf->cell(16,10,"%",1,0,'C',0,0);      $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0); $pdf->cell(16,10,"%",1,0,'C',0,0);       $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(16,10,"(A)",1,0,'C',0,0);     $pdf->cell(16,10,"(B)",1,0,'C',0,0); $pdf->cell(16,10,"(B/A)",1,0,'C',0,0);$pdf->cell(16,10,"(C)",1,0,'C',0,0);   $pdf->cell(16,10,"(C/B)",1,0,'C',0,0);  $pdf->cell(16,10,"X",1,0,'C',0,0);   $pdf->cell(16,10,"(X/B)",1,0,'C',0,0);$pdf->cell(16,10,"(D)",1,0,'C',0,0);  $pdf->cell(16,10,"(D/B)",1,0,'C',0,0);   $pdf->cell(16,10,"(E)",1,0,'C',0,0); $pdf->cell(16,10,"(E/B)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Préscolaire",1,0,'L',0,0);      $pdf->cell(16,10,"1",1,0,'C',0,0);       $pdf->cell(16,10,"2",1,0,'C',0,0);   $pdf->cell(16,10,"3",1,0,'C',0,0);    $pdf->cell(16,10,"4",1,0,'C',0,0);     $pdf->cell(16,10,"5",1,0,'C',0,0);      $pdf->cell(16,10,"6",1,0,'C',0,0);   $pdf->cell(16,10,"7",1,0,'C',0,0);    $pdf->cell(16,10,"10",1,0,'C',0,0);   $pdf->cell(16,10,"9",1,0,'C',0,0);       $pdf->cell(16,10,"10",1,0,'C',0,0);  $pdf->cell(16,10,"11",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"1°AP",1,0,'L',0,0);             $pdf->cell(16,10,"1",1,0,'C',0,0);       $pdf->cell(16,10,"2",1,0,'C',0,0);   $pdf->cell(16,10,"3",1,0,'C',0,0);    $pdf->cell(16,10,"4",1,0,'C',0,0);     $pdf->cell(16,10,"5",1,0,'C',0,0);      $pdf->cell(16,10,"6",1,0,'C',0,0);   $pdf->cell(16,10,"7",1,0,'C',0,0);    $pdf->cell(16,10,"10",1,0,'C',0,0);   $pdf->cell(16,10,"9",1,0,'C',0,0);       $pdf->cell(16,10,"10",1,0,'C',0,0);  $pdf->cell(16,10,"11",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"5°AP",1,0,'L',0,0);             $pdf->cell(16,10,"1",1,0,'C',0,0);       $pdf->cell(16,10,"2",1,0,'C',0,0);   $pdf->cell(16,10,"3",1,0,'C',0,0);    $pdf->cell(16,10,"4",1,0,'C',0,0);     $pdf->cell(16,10,"5",1,0,'C',0,0);      $pdf->cell(16,10,"6",1,0,'C',0,0);   $pdf->cell(16,10,"7",1,0,'C',0,0);    $pdf->cell(16,10,"10",1,0,'C',0,0);   $pdf->cell(16,10,"9",1,0,'C',0,0);       $pdf->cell(16,10,"10",1,0,'C',0,0);  $pdf->cell(16,10,"11",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Total",1,0,'L',1,0);            $pdf->cell(16,10,"1",1,0,'C',1,0);       $pdf->cell(16,10,"2",1,0,'C',1,0);   $pdf->cell(16,10,"3",1,0,'C',1,0);    $pdf->cell(16,10,"4",1,0,'C',1,0);     $pdf->cell(16,10,"5",1,0,'C',1,0);      $pdf->cell(16,10,"6",1,0,'C',1,0);   $pdf->cell(16,10,"7",1,0,'C',1,0);    $pdf->cell(16,10,"10",1,0,'C',1,0);   $pdf->cell(16,10,"9",1,0,'C',1,0);       $pdf->cell(16,10,"10",1,0,'C',1,0);  $pdf->cell(16,10,"11",1,0,'C',1,0);

$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"1B",1,0,'C',1,0);                $pdf->cell(80,10,"Dents temporaires cao (petit)",1,0,'C',0,0);$pdf->cell(80,10,"Dents permanentes CAO (grand)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0);  $pdf->cell(16,10,"c",1,0,'C',0,0);       $pdf->cell(16,10,"a",1,0,'C',0,0);   $pdf->cell(16,10,"o",1,0,'C',0,0);    $pdf->cell(16,10,"cao",1,0,'C',0,0);   $pdf->cell(16,10,"Icao",1,0,'C',0,0);    $pdf->cell(16,10,"C",1,0,'C',0,0);   $pdf->cell(16,10,"A",1,0,'C',0,0);    $pdf->cell(16,10,"O",1,0,'C',0,0);   $pdf->cell(16,10,"CAO",1,0,'C',0,0);     $pdf->cell(16,10,"ICAO",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"",1,0,'C',0,0);                 $pdf->cell(16,10,"Nbre",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"Nbre",1,0,'C',0,0); $pdf->cell(16,10,"Nbre",1,0,'C',0,0);  $pdf->cell(16,10,"Nbre",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"Nbre",1,0,'C',0,0); $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"Nbre",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"",1,0,'C',0,0);                 $pdf->cell(16,10,"(F)",1,0,'C',0,0);     $pdf->cell(16,10,"(G)",1,0,'C',0,0); $pdf->cell(16,10,"(H)",1,0,'C',0,0);  $pdf->cell(16,10,"(I)",1,0,'C',0,0);   $pdf->cell(16,10,"(I/B)",1,0,'C',0,0);   $pdf->cell(16,10,"(J)",1,0,'C',0,0); $pdf->cell(16,10,"(K)",1,0,'C',0,0);  $pdf->cell(16,10,"(L)",1,0,'C',0,0); $pdf->cell(16,10,"(M)",1,0,'C',0,0);     $pdf->cell(16,10,"(M/B)",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Préscolaire",1,0,'L',0,0);      $pdf->cell(16,10,"1",1,0,'C',0,0);       $pdf->cell(16,10,"2",1,0,'C',0,0);   $pdf->cell(16,10,"3",1,0,'C',0,0);    $pdf->cell(16,10,"4",1,0,'C',0,0);     $pdf->cell(16,10,"5",1,0,'C',0,0);       $pdf->cell(16,10,"6",1,0,'C',0,0);   $pdf->cell(16,10,"7",1,0,'C',0,0);    $pdf->cell(16,10,"8",1,0,'C',0,0);   $pdf->cell(16,10,"9",1,0,'C',0,0);       $pdf->cell(16,10,"10",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"1°AP",1,0,'L',0,0);             $pdf->cell(16,10,"1",1,0,'C',0,0);       $pdf->cell(16,10,"2",1,0,'C',0,0);   $pdf->cell(16,10,"3",1,0,'C',0,0);    $pdf->cell(16,10,"4",1,0,'C',0,0);     $pdf->cell(16,10,"5",1,0,'C',0,0);       $pdf->cell(16,10,"6",1,0,'C',0,0);   $pdf->cell(16,10,"7",1,0,'C',0,0);    $pdf->cell(16,10,"8",1,0,'C',0,0);   $pdf->cell(16,10,"9",1,0,'C',0,0);       $pdf->cell(16,10,"10",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"5°AP",1,0,'L',0,0);             $pdf->cell(16,10,"1",1,0,'C',0,0);       $pdf->cell(16,10,"2",1,0,'C',0,0);   $pdf->cell(16,10,"3",1,0,'C',0,0);    $pdf->cell(16,10,"4",1,0,'C',0,0);     $pdf->cell(16,10,"5",1,0,'C',0,0);       $pdf->cell(16,10,"6",1,0,'C',0,0);   $pdf->cell(16,10,"7",1,0,'C',0,0);    $pdf->cell(16,10,"8",1,0,'C',0,0);   $pdf->cell(16,10,"9",1,0,'C',0,0);       $pdf->cell(16,10,"10",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Total",1,0,'L',1,0);            $pdf->cell(16,10,"1",1,0,'C',1,0);       $pdf->cell(16,10,"2",1,0,'C',1,0);   $pdf->cell(16,10,"3",1,0,'C',1,0);    $pdf->cell(16,10,"4",1,0,'C',1,0);     $pdf->cell(16,10,"5",1,0,'C',1,0);       $pdf->cell(16,10,"6",1,0,'C',1,0);   $pdf->cell(16,10,"7",1,0,'C',1,0);    $pdf->cell(16,10,"8",1,0,'C',1,0);   $pdf->cell(16,10,"9",1,0,'C',1,0);       $pdf->cell(16,10,"10",1,0,'C',1,0); 

$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(67,10,"Coordinateur de la SBD à l'UDS",1,0,'C',0,0); $pdf->cell(66,10,"Coordinateur de la SBD à l'EPSP",1,0,'C',0,0);  $pdf->cell(66,10,"Coordinateur de la SBD à la DSP",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,10,"(Nom, cachet et signature)",1,0,'C',0,0);     $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);       $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,15,"",1,0,'C',0,0);                               $pdf->cell(66,15,"",1,0,'C',0,0);                                 $pdf->cell(66,15,"",1,0,'C',0,0);




//2//
$pdf->AddPage('P','A4');
$pdf->SetXY(5,$pdf->GetY()+5);            $pdf->cell(160,5,"PROGRAMME NATIONAL DE SANTE BUCCODENTAIRE ",1,0,'C',0,0); $pdf->cell(40,10,"PAGE ".$pdf->PageNo().'/{nb}',1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(160,5,"EN MILIEU SCOLAIRE « STOP A LA CARIE » ",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(40,5,"DSP",1,0,'C',0,0);$pdf->cell(40,5,"EPSP",1,0,'C',0,0);$pdf->cell(40,5,"UDS",1,0,'C',0,0);$pdf->cell(40,5,"ANNEE SCOLAIRE",1,0,'C',0,0);$pdf->cell(40,5,"TRIMESTRE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);    $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);              $pdf->cell(40,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"2",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
//*****//

$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"",1,0,'C',0,0); 
$pdf->cell(43.98,10,"Nombre d'élèves",1,0,'C',0,0);
$pdf->cell(102.62,10,"Nombre de dents",1,0,'C',0,0);
$pdf->cell(29.32,10,"Nombre d'élèves",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"",1,0,'C',0,0); 
$pdf->cell(14.66,10,"carie",1,0,'C',0,0);
$pdf->cell(29.32,10,"reçus au cabinet",1,0,'C',0,0);
$pdf->cell(14.66,10,"cariées",1,0,'C',0,0);
$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);
$pdf->cell(29.32,10,"trt provisoirement",1,0,'C',0,0);
$pdf->cell(29.32,10,"non encore trt ",1,0,'C',0,0);
$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);



$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"",1,0,'C',0,0); 
$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);
$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);
$pdf->cell(14.66,10,"%",1,0,'C',0,0);
$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);
$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);
$pdf->cell(14.66,10,"%",1,0,'C',0,0);
$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);
$pdf->cell(14.66,10,"%",1,0,'C',0,0);
$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);
$pdf->cell(14.66,10,"%",1,0,'C',0,0);
$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);
$pdf->cell(14.66,10,"%",1,0,'C',0,0);




$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"",1,0,'C',0,0); 
$pdf->cell(14.66,10,"(X)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(A)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(A/X)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(B)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(C)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(C/B)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(D)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(D/B)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(E)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(E/B)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(F)",1,0,'C',0,0);
$pdf->cell(14.66,10,"(F/A)",1,0,'C',0,0);



$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,5,"Préscolaire",1,0,'L',0,0); 
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
$pdf->cell(24,5,"1°AP",1,0,'L',0,0); 
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
	  
	  

$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(67,10,"Coordinateur de la SBD à l'UDS",1,0,'C',0,0); $pdf->cell(66,10,"Coordinateur de la SBD à l'EPSP",1,0,'C',0,0);  $pdf->cell(66,10,"Coordinateur de la SBD à la DSP",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,10,"(Nom, cachet et signature)",1,0,'C',0,0);     $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);       $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,15,"",1,0,'C',0,0);                               $pdf->cell(66,15,"",1,0,'C',0,0);                                 $pdf->cell(66,15,"",1,0,'C',0,0);


//3//
$pdf->AddPage('P','A4');
$pdf->SetXY(5,$pdf->GetY()+5);            $pdf->cell(160,5,"PROGRAMME NATIONAL DE SANTE BUCCODENTAIRE ",1,0,'C',0,0); $pdf->cell(40,10,"PAGE ".$pdf->PageNo().'/{nb}',1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(160,5,"EN MILIEU SCOLAIRE « STOP A LA CARIE » ",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(40,5,"DSP",1,0,'C',0,0);$pdf->cell(40,5,"EPSP",1,0,'C',0,0);$pdf->cell(40,5,"UDS",1,0,'C',0,0);$pdf->cell(40,5,"ANNEE SCOLAIRE",1,0,'C',0,0);$pdf->cell(40,5,"TRIMESTRE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);    $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);              $pdf->cell(40,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"3",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - SUIVI SYSTEMATIQUE DE LA PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"3A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
//****//
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(67,10,"Coordinateur de la SBD à l'UDS",1,0,'C',0,0); $pdf->cell(66,10,"Coordinateur de la SBD à l'EPSP",1,0,'C',0,0);  $pdf->cell(66,10,"Coordinateur de la SBD à la DSP",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,10,"(Nom, cachet et signature)",1,0,'C',0,0);     $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);       $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,15,"",1,0,'C',0,0);                               $pdf->cell(66,15,"",1,0,'C',0,0);                                 $pdf->cell(66,15,"",1,0,'C',0,0);




//4//
$pdf->AddPage('P','A4');
$pdf->SetXY(5,$pdf->GetY()+5);            $pdf->cell(160,5,"PROGRAMME NATIONAL DE SANTE BUCCODENTAIRE ",1,0,'C',0,0); $pdf->cell(40,10,"PAGE ".$pdf->PageNo().'/{nb}',1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(160,5,"EN MILIEU SCOLAIRE « STOP A LA CARIE » ",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(40,5,"DSP",1,0,'C',0,0);$pdf->cell(40,5,"EPSP",1,0,'C',0,0);$pdf->cell(40,5,"UDS",1,0,'C',0,0);$pdf->cell(40,5,"ANNEE SCOLAIRE",1,0,'C',0,0);$pdf->cell(40,5,"TRIMESTRE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);    $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);              $pdf->cell(40,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"4",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - EDUCATION POUR LA SANTE BUCCO-DENTAIRE",1,0,'C',0,0);
//***//
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(67,10,"Coordinateur de la SBD à l'UDS",1,0,'C',0,0); $pdf->cell(66,10,"Coordinateur de la SBD à l'EPSP",1,0,'C',0,0);  $pdf->cell(66,10,"Coordinateur de la SBD à la DSP",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,10,"(Nom, cachet et signature)",1,0,'C',0,0);     $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);       $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,15,"",1,0,'C',0,0);                               $pdf->cell(66,15,"",1,0,'C',0,0);                                 $pdf->cell(66,15,"",1,0,'C',0,0);




//5//
$pdf->AddPage('P','A4');
$pdf->SetXY(5,$pdf->GetY()+5);            $pdf->cell(160,5,"PROGRAMME NATIONAL DE SANTE BUCCODENTAIRE ",1,0,'C',0,0); $pdf->cell(40,10,"PAGE ".$pdf->PageNo().'/{nb}',1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(160,5,"EN MILIEU SCOLAIRE « STOP A LA CARIE » ",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(40,5,"DSP",1,0,'C',0,0);$pdf->cell(40,5,"EPSP",1,0,'C',0,0);$pdf->cell(40,5,"UDS",1,0,'C',0,0);$pdf->cell(40,5,"ANNEE SCOLAIRE",1,0,'C',0,0);$pdf->cell(40,5,"TRIMESTRE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);    $pdf->cell(40,5,"",1,0,'C',0,0);   $pdf->cell(40,5,"",1,0,'C',0,0);              $pdf->cell(40,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"5",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - CAMPAGNES D'EDUCATION SANITAIRE ET DE COMMUNICATION SOCIALE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"5A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
//***//
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(67,10,"Coordinateur de la SBD à l'UDS",1,0,'C',0,0); $pdf->cell(66,10,"Coordinateur de la SBD à l'EPSP",1,0,'C',0,0);  $pdf->cell(66,10,"Coordinateur de la SBD à la DSP",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,10,"(Nom, cachet et signature)",1,0,'C',0,0);     $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);       $pdf->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(67,15,"",1,0,'C',0,0);                               $pdf->cell(66,15,"",1,0,'C',0,0);                                 $pdf->cell(66,15,"",1,0,'C',0,0);

$pdf->Output("UDS".'----'.".PDF",'I');
?>