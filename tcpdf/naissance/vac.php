<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat','B',13);
$pdf->SetFillColor(245);
$nec =$result->id;//ROUGE NOIR $pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
$pdf->RoundedRect($x=4,  $y=4,   $w=202, $h=26, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(5,5);$pdf->Cell(200,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"le calendrier de vaccination Arrêté du 19 Chaoual 1439 correspondant au 3 juillet 2018 ",0,1,'C',1,0);

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(135,5,"المؤسسة العمومية "." ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(135,5,"ETABLISSEMENT PUBLIC ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
$pdf->SetFont('aefurat','B',14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Renseignement sur le nouveau née ",0,1,'C',1,0);
$pdf->SetFont('aefurat','B',12);
$pdf->Text(5,$pdf->GetY()+5,"Nom : ________________________________________________________________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(20,$pdf->GetY(),$result->NOM3);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+10,"Prénom : ______________________________________________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(25,$pdf->GetY(),$result->PRENOM5);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+10,"Nom et prénom de la mère : _______________________________________________________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(55,$pdf->GetY(),$result->NOM2.'_'.$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+10,"Date et lieu de naissance : ______________");   $pdf->Text(80,$pdf->GetY()," à : _______________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(55,$pdf->GetY(),$pdf->dateUS2FR($result->DINS1));$pdf->SetTextColor(0,0,0);
$pdf->SetTextColor(255,0,0);$pdf->Text(88,$pdf->GetY(),$pdf->nbrtostring("com","IDCOM",$result->COMMUNE1,"COMMUNE"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+10,"Adresse : ___________________________ "); $pdf->Text(80,$pdf->GetY(),"Wilaya : ___________________________________________________  ");
$pdf->SetTextColor(255,0,0);$pdf->Text(22,$pdf->GetY(),$result->ADRESSE4);$pdf->SetTextColor(0,0,0);
$pdf->SetTextColor(255,0,0);$pdf->Text(97,$pdf->GetY(),$pdf->nbrtostring("wil","IDWIL",$result->WILAYA4,"WILAYAS"));$pdf->SetTextColor(0,0,0);

$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"le calendrier de vaccination",0,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"Ages de la vaccination",0,1,'C',1,0); $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,"Date vaccination",0,1,'C',1,0);                                   $pdf->SetXY(105,$pdf->GetY()-5);$pdf->Cell(100,5,"Vaccins",0,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"Naissance",0,1,'L',1,0);               $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,0)),0,1,'C',1,0);    $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(238 ,130 ,238);$pdf->Cell(50,5,"BCG",0,1,'C',1,0);$pdf->SetXY(155,$pdf->GetY()-5.5);$pdf->SetFillColor(255 ,255 ,0);$pdf->Cell(50,5,"HVB",0,1,'C',1,0);$pdf->SetFillColor(245);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"2 mois",0,1,'L',1,0);                  $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,60)),0,1,'C',1,0);   $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(176 ,242 ,182);$pdf->Cell(100,5,"DTCOQ-PI-HIB-HVB-PN13",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"4 mois",0,1,'L',1,0);                  $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,120)),0,1,'C',1,0);  $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(176 ,242 ,182);$pdf->Cell(100,5,"DTCOQ-PI-PO-HIB-HVB-PN13",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"11 mois",0,1,'L',1,0);                 $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,330)),0,1,'C',1,0);  $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(255 ,127 ,80);$pdf->Cell(100,5,"ROR",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"12 mois",0,1,'L',1,0);                 $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,360)),0,1,'C',1,0);  $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(176 ,242 ,182);$pdf->Cell(100,5,"DTCOQ-PI-PO-HIB-HVB-PN13",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"18 mois",0,1,'L',1,0);                 $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,540)),0,1,'C',1,0);  $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(255 ,127 ,80);$pdf->Cell(100,5,"ROR",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"6 ans",0,1,'L',1,0);                   $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,2160)),0,1,'C',1,0); $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(176 ,242 ,182);$pdf->Cell(100,5,"DTCOQ-PI",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"11-13 ans",0,1,'L',1,0);               $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,4320)),0,1,'C',1,0); $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(176 ,242 ,182);$pdf->Cell(100,5,"DT",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"16-18 ans",0,1,'L',1,0);               $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,6120)),0,1,'C',1,0); $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(176 ,242 ,182);$pdf->Cell(100,5,"DT",0,1,'C',1,0);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(50,5,"> 18 ans / 10 ans",0,1,'L',1,0);       $pdf->SetXY(60,$pdf->GetY()-5);$pdf->Cell(40,5,$pdf->dateUS2FR($pdf->datePlus($result->DINS1,6120)),0,1,'C',1,0);    $pdf->SetXY(105,$pdf->GetY()-5);$pdf->SetFillColor(176 ,242 ,182);$pdf->Cell(100,5,"DT",0,1,'C',1,0);$pdf->SetFillColor(245);

$pdf->Text(160,$pdf->GetY()+5,"Le Médecin");
$pdf->Line(5 ,$pdf->GetY()+15 ,205 ,$pdf->GetY()+15 );
$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(200,5,"لاتتركو ابدا الادوية فى متناول الاطفال",0,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Ne Laissez Jamais Les Medicaments à La Portée Des Enfants",0,1,'C',1,0);
$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);
$pdf->SetXY(150,37);$pdf->write1DBarcode($result->id, 'C39', '', '', '', 18, 0.4, $style, 'N');

$pdf->Output("EPA_".$result->STRUCTURED.".PDF",'I');
}
// shema statu vaccinal inconnu 
// dt1  2t de grossessse  ou 1er contact femme en age de procreer 
// dt2  4semaine apres le dt1
// dt3  6 mois   apres le dt2
// dt4  1 an     apres le dt3
// dt5  1 an     apres le dt4
// instruction n 932 du MSPRH/DP du 10 aout 2002



?>



