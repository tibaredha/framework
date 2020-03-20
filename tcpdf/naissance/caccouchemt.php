<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
// $pdf->setRTL(true); 
$pdf->RoundedRect($x=5,  $y=5,   $w=200, $h=139, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=5,  $y=139+8,   $w=200, $h=139, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());



$pdf->RoundedRect($x=65, $y=44,  $w=1,   $h=98,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=65, $y=177, $w=1,   $h=106,  $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$nec =$result->id;//ROUGE NOIR $pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetFillColor(245);
$pdf->SetXY(65+5,$pdf->GetY()+10);$pdf->Cell(140-10,10,"Certificat d'accouchement",0,1,'C',1,0);
$pdf->SetXY(5+5,$pdf->GetY()-10);$pdf->Cell(50,10,'Etablissement public',0,1,'C',1,0);
$pdf->SetXY(5+5,$pdf->GetY());$pdf->Cell(50,10,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 13);
$pdf->Text(75,$pdf->GetY(),"Je soussigné Docteur / Sage-femme _________________________");
//$pdf->SetTextColor(255,0,0);$pdf->Text(140,$pdf->GetY()-0.5,$pdf->nbrtostring("sagefemme","id",$result->SAGEFEMME5,"Nom"));$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"Atteste que Mme/Mlle  ______________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(115,$pdf->GetY()-0.5,$result->NOM2.'_'.$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"Née le ___________________________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(85,$pdf->GetY()-0.5,$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"A accouchée d'un enfant de sexe :  _____________________________");if($result->SEXE5=='M') {$pdf->SetTextColor(255,0,0);$pdf->Text(150,$pdf->GetY()-0.5,"Masculin");$pdf->SetTextColor(0,0,0);} else {$pdf->SetTextColor(255,0,0);$pdf->Text(150,$pdf->GetY()-0.5,"Féminin");$pdf->SetTextColor(0,0,0);}
$pdf->Text(68,$pdf->GetY()+8,"le (date)_______________________ à (heure)___________________");$pdf->SetTextColor(255,0,0);$pdf->Text(85,$pdf->GetY()-0.5,$pdf->dateUS2FR($result->DINS1));$pdf->Text(155,$pdf->GetY()-0.5,$result->HINS1);$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"Certificat établi à la demande de l'intéressée et remis en main propre ");
$pdf->Text(68,$pdf->GetY()+8,"Pour faire valoir ce que de droit.");
$pdf->Text(125,$pdf->GetY()+8,"Fait le : __________ A : ________");$pdf->SetTextColor(255,0,0);$pdf->Text(140,$pdf->GetY()-0.5,$pdf->dateUS2FR($result->DINS1));$pdf->Text(172,$pdf->GetY()-0.5,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"com"));$pdf->SetTextColor(0,0,0);
$pdf->Text(135,$pdf->GetY()+8,"Cachet et Signature");


$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,142);$pdf->Cell(200,6,"----------------------------------------------------------------------------------------------------------------------",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetFillColor(245);
$pdf->SetXY(65+5,$pdf->GetY()+10);$pdf->Cell(140-10,10,"Congé de maternité",0,1,'C',1,0);
$pdf->SetXY(5+5,$pdf->GetY()-10);$pdf->Cell(50,10,'Etablissement public',0,1,'C',1,0);
$pdf->SetXY(5+5,$pdf->GetY());$pdf->Cell(50,10,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 13);
$pdf->Text(75,$pdf->GetY(),"Je soussigné Docteur / Sage-femme _________________________");
//$pdf->SetTextColor(255,0,0);$pdf->Text(140,$pdf->GetY()-0.5,$pdf->nbrtostring("sagefemme","id",$result->SAGEFEMME5,"Nom"));$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"Atteste que Mme/Mlle  _____________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(115,$pdf->GetY()-0.5,$result->NOM2.'_'.$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"Née le ___________________________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(85,$pdf->GetY()-0.5,$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"Necessite un congé de maternité de 98 jours a compté du ");$pdf->SetTextColor(255,0,0);$pdf->Text(175,$pdf->GetY(),$pdf->dateUS2FR($result->DINS1));$pdf->SetTextColor(0,0,0);
$pdf->Text(68,$pdf->GetY()+8,"Certificat établi à la demande de l'intéressée et remis en main propre ");
$pdf->Text(68,$pdf->GetY()+8,"Pour faire valoir ce que de droit.");
$pdf->Text(125,$pdf->GetY()+8,"Fait le : __________ A : ________");$pdf->SetTextColor(255,0,0);$pdf->Text(140,$pdf->GetY()-0.5,$pdf->dateUS2FR($result->DINS1));$pdf->Text(172,$pdf->GetY()-0.5,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"com"));$pdf->SetTextColor(0,0,0);
$pdf->Text(135,$pdf->GetY()+8,"Cachet et Signature");


$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);

$pdf->SetXY(10,95+20);$pdf->write1DBarcode($nec, 'C39', '', '', '', 18, 0.4, $style, 'N');$pdf->SetXY(10,70);$pdf->Cell(50,15,'N° : '.$nec.'/'.date('Y'),0,1,'C',1,0);
$pdf->SetXY(10,230+20);$pdf->write1DBarcode($nec, 'C39', '', '', '', 18, 0.4, $style, 'N');$pdf->SetXY(10,205);$pdf->Cell(50,15,'N° : '.$nec.'/'.date('Y'),0,1,'C',1,0);
$pdf->Ln();
}





$pdf->Output();
?>


