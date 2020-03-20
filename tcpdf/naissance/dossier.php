<?php
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->mysqlconnect();$id=$_GET["uc"];
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');
$nec =$result->id;//ROUGE NOIR $pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,5,"Etablissement public ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C');

$pdf->SetFillColor(245);$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,10,"DOSSIER MEDICAL",0,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,10,"SERVICE DE GYNECOLOGIE OBSTETRIQUE",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);

$pdf->RoundedRect($x=5, $y=55, $w=200,   $h=10,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=5, $y=65, $w=150,   $h=55,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=155, $y=65, $w=50,   $h=55,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->RoundedRect($x=5, $y=65+55, $w=150,   $h=20,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=155, $y=65+55, $w=50,   $h=20,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->RoundedRect($x=5, $y=140, $w=200,   $h=40,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=5, $y=180, $w=200,   $h=90,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->Text(5,$pdf->GetY()+5,"Nom : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  " );$pdf->Text(75,$pdf->GetY(),"Prénom : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");$pdf->Text(155,$pdf->GetY(),"Salle : _ _ _ _ _ _ _ _ _ ");
$pdf->Text(5,$pdf->GetY()+10,"Epouse : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(155,$pdf->GetY(),"N°du lit : _ _ _ _ _ _ _ _");
$pdf->Text(5,$pdf->GetY()+10,"Date de naissance : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");$pdf->Text(155,$pdf->GetY(),"Entré le : _ _ _ _ _ _ _ _");
$pdf->Text(5,$pdf->GetY()+10,"Adresse : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(155,$pdf->GetY(),"Sorti le : _ _ _ _ _ _ _ _");
$pdf->Text(5,$pdf->GetY()+10,"Profession : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");$pdf->Text(155,$pdf->GetY(),"****** : _ _ _ _ _ _ _ _");
$pdf->Text(5,$pdf->GetY()+10,"Adressée par  : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(155,$pdf->GetY(),"MAT : _ _ _ _ _ _ _ _ _");
$pdf->Text(5,$pdf->GetY()+10,"Admise par : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");$pdf->Text(155,$pdf->GetY(),"N DOS : _ _ _ _ _ _ _ _");
$pdf->Text(5,$pdf->GetY()+10,"Diagnostic : _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(5,$pdf->GetY()+10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");


$pdf->Text(5,$pdf->GetY()+10,"Présentation");
	$pdf->Text(10,$pdf->GetY()+10,"longitudinale");
		$pdf->Text(15,$pdf->GetY()+10,"cephalique");
			$pdf->Text(20,$pdf->GetY()+10,"sommet");
			$pdf->Text(20,$pdf->GetY()+10,"face");
			$pdf->Text(20,$pdf->GetY()+10,"front");
		$pdf->Text(15,$pdf->GetY()+10,"podalique");
			$pdf->Text(20,$pdf->GetY()+10,"complet");
			$pdf->Text(20,$pdf->GetY()+10,"decomplet");
			$pdf->Text(20,$pdf->GetY()+10,"semicomplet");
	$pdf->Text(10,$pdf->GetY()+10,"transversale");
		$pdf->Text(15,$pdf->GetY()+10,"epaule");
$pdf->AddPage('P','A4');

$pdf->AddPage('P','A4');
}
$pdf->Output();

	
?>


