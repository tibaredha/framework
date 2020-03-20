<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);									
$pdf->AddPage('P','A4');
// $pdf->setRTL(true); 
// $pdf->RoundedRect($x=5,  $y=5,   $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->RoundedRect($x=65, $y=46,  $w=1,   $h=95,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->RoundedRect($x=65, $y=180, $w=1,   $h=95,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$nec =$result->id;//ROUGE NOIR $pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,5,"Etablissement public ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C');

$pdf->SetFillColor(245);
$pdf->SetFont('aefurat', '', 22);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,10,"DEMANDE D'HOSPITALISATION",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);

$pdf->RoundedRect($x=5, $y=55, $w=200,   $h=35,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,56,"Service : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _" );$pdf->SetTextColor(255,0,0);$pdf->Text(29,56,$pdf->nbrtostring("servicedeces","id",$result->SERVI,"service") );$pdf->SetTextColor(0,0,0);
$pdf->Text(100,56,"Spécialité : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(5,66,"Nom du praticien ayant accordé l'hospitalisation :  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(5,76,"Grade : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");

$pdf->RoundedRect($x=5, $y=94, $w=200,   $h=50,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('aefurat','I', 18);
$pdf->SetXY(6,95);$pdf->Cell(198,10,"PATIENT",0,1,'C',1,0);

// $pdf->Text(90,95,"PATIENT");
$pdf->SetFont('aefurat','I', 14);
$A= date('Y')- substr($result->DATENS2,0,4);
$pdf->Text(5,105,"Nom : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->SetTextColor(255,0,0);$pdf->Text(18,105,$result->NOM3);$pdf->SetTextColor(0,0,0);
$pdf->Text(100,105,"Nom de jeune fille : _ _ _ _ _ _ _ _ "); $pdf->SetTextColor(255,0,0);$pdf->Text(141,105,$result->NOM2);$pdf->SetTextColor(0,0,0); 
$pdf->Text(175,105,"Sexe : _ _ _ _ ");$pdf->SetTextColor(255,0,0);$pdf->Text(188,105," F ");$pdf->SetTextColor(0,0,0); 
$pdf->Text(5,115,"Prénom : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->SetTextColor(255,0,0);$pdf->Text(24,115,$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(100,115,"Date  de naissance : _ _ _ _ _ _ _ _  ");$pdf->SetTextColor(255,0,0);$pdf->Text(140,115,$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$pdf->Text(175,115,"Age : _ _ ans " );$pdf->SetTextColor(255,0,0);$pdf->Text(187,115,$A );$pdf->SetTextColor(0,0,0);

$pdf->Text(5,125,"Nom de la salle : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->SetTextColor(255,0,0);$pdf->Text(40,125,"XXX");$pdf->SetTextColor(0,0,0);
$pdf->Text(100,125,"N°du lit d'hospitalisation : _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->SetTextColor(255,0,0);$pdf->Text(152,125,$pdf->nbrtostring("lit","id",$result->NLIT,"nlit"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,135,"Date d'hospitalisation : _ _ _ _ _ _ _ _ _ _ _ _ _ "); $pdf->SetTextColor(255,0,0);$pdf->Text(52,135,$pdf->dateUS2FR($result->HOSPI));$pdf->SetTextColor(0,0,0); 
$pdf->Text(100,135,"Heure d'hospitalisation : _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");$pdf->SetTextColor(255,0,0);$pdf->Text(149,135,$result->HHOSP);$pdf->SetTextColor(0,0,0);

$pdf->RoundedRect($x=5, $y=147, $w=200,   $h=40,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('aefurat','I', 18);
$pdf->SetXY(6,148);$pdf->Cell(198,10,"MALADE ORIENTE OU ADRESSE PAR",0,1,'C',1,0);

$pdf->SetFont('aefurat','I', 14);
$pdf->Text(5,158,"Nom et prémom du médecin : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(5,168,"Grade : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(100,168,"Etablissement : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _"); 
$pdf->Text(5,178,"Etablissement / Unité / Service : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");

$pdf->RoundedRect($x=5, $y=190, $w=200,   $h=50,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('aefurat','I', 18);
$pdf->SetXY(6,191);$pdf->Cell(198,10,"GARDE MALADE",0,1,'C',1,0);
$pdf->SetFont('aefurat','I', 14);
$pdf->Text(5,200,"Nom et prénom du garde malade : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _"); 
$pdf->Text(5,210,"Pièce D'identité N° _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(100,210,"Délivrée Le : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(5,220,"Par : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(120,250,"Date : ");
$pdf->SetTextColor(255,0,0);$pdf->Text(133,250,date("d-m-Y"));$pdf->SetTextColor(0,0,0);
$pdf->Text(120,250+8,"Signature et visa du praticien");

$pdf->SetFont('aefurat','B',9);
$pdf->Text(5,290,"REF : CIRCULAIRE N° 01 MSP/DSS DU 16 JUIN 2001 relative a l'interdiction d'utilisation des ordonnances medicales pour demander une hospitalisation ");
}






$pdf->Output();

	
?>


