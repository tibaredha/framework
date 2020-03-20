<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('L','A4');
$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$dateeuro=date('d/m/Y');
$pdf->SetFillColor(245);
$pdf->SetTextColor(0,0,255);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(5,5);$pdf->Cell(135,5,"المؤسسة العمومية "." ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,1,'C',1,0);
$pdf->SetXY(5,12);$pdf->Cell(135,5,"ETABLISSEMENT PUBLIC ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
$pdf->SetXY(5,19);$pdf->Cell(135,5,"SERVICE ".$pdf->nbrtostring("servicedeces","id",$result->SERVI,"service"),0,1,'C',1,0);
$pdf->Text(80,30,"A ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"com")." Le : ".$dateeuro);
$pdf->SetFont('aefurat', '', 15);
$pdf->SetXY(5,40);$pdf->Cell(135,5,"DEMANDE D 'EXAMENS",0,1,'C',1,0);
$pdf->SetXY(5,48);$pdf->Cell(135,5,"BIOLOGIQUES",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(5,60,"Delivrée par le Docteur :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(5,70,"A Mme/Melle :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetTextColor(0,0,0);$pdf->Text(40,70,$result->NOM2.'  '.$result->PRENOM2);$pdf->SetTextColor(0,0,255);
$pdf->Text(103,70,"Age : _ _ _ _Ans");$pdf->SetTextColor(0,0,0);$pdf->Text(118,70,$result->AGE2);$pdf->SetTextColor(0,0,255);
$pdf->Text(5,80,"Domicile :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetTextColor(0,0,0);$pdf->Text(26,80,$result->ADRESSE4.'_'.$pdf->nbrtostring("com","IDCOM",$result->COMMUNE4,"COMMUNE"));$pdf->SetTextColor(0,0,255);
$pdf->SetXY(5,90);$pdf->Cell(135,5,"Faire SVP",0,1,'C',1,0);
$pdf->SetTextColor(0,0,0);
$pdf->Text(5,105,"* Frottis Cervico-Vaginal  (FCV).");
$pdf->Text(5,120,"* Colposcopie (si frottis pathologique).");
$pdf->Text(5,135,"* Biopsie du col(si frottis pathologique).");
$pdf->Text(5,150,"*** NB: 03 Mois aprés  appartir du : ".$pdf->dateUS2FR($pdf->datePlus(date('Y-m-d'),90))."");
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(100,160,"Le Médecin");
$pdf->Line(5 ,174+2 ,140 ,174+2 );
$pdf->SetXY(5,175+3);$pdf->Cell(135,5,"لاتتركو ابدا الادوية فى متناول الاطفال",0,1,'C',1,0);
$pdf->SetXY(5,182+3);$pdf->Cell(135,5,"Ne Laissez Jamais Les Medicaments à La Portée Des Enfants",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 10);
$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);
 $pdf->SetXY(10,24);$pdf->write1DBarcode($result->id, 'C39', '', '', '', 18, 0.4, $style, 'N');

//**************************************************************************************************************************************************************//
$pdf->RoundedRect($x=145, $y=0, $w=1, $h=210, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFillColor(245);
$pdf->SetTextColor(0,0,255);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(150,5);$pdf->Cell(135,5,"المؤسسة العمومية "." ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,1,'C',1,0);
$pdf->SetXY(150,12);$pdf->Cell(135,5,"ETABLISSEMENT PUBLIC ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
$pdf->SetXY(150,19);$pdf->Cell(135,5,"SERVICE ".$pdf->nbrtostring("servicedeces","id",$result->SERVI,"service"),0,1,'C',1,0);
$pdf->Text(80+145,30,"A ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"com")." Le : ".$dateeuro);
$pdf->SetFont('aefurat', '', 15);
$pdf->SetXY(150,40);$pdf->Cell(135,5,"DEMANDE D 'EXAMENS",0,1,'C',1,0);
$pdf->SetXY(150,48);$pdf->Cell(135,5,"RADIOLOGIQUES",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(5+145,60,"Delivrée par le Docteur :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(5+145,70,"A Mme/Melle :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetTextColor(0,0,0);$pdf->Text(40+145,70,$result->NOM2.'  '.$result->PRENOM2);$pdf->SetTextColor(0,0,255);
$pdf->Text(103+145,70,"Age : _ _ _ _Ans");$pdf->SetTextColor(0,0,0);$pdf->Text(115+149,70,$result->AGE2);$pdf->SetTextColor(0,0,255);
$pdf->Text(5+145,80,"Domicile :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetTextColor(0,0,0);$pdf->Text(26+145,80,$result->ADRESSE4.'_'.$pdf->nbrtostring("com","IDCOM",$result->COMMUNE4,"COMMUNE"));$pdf->SetTextColor(0,0,255);
$pdf->SetXY(5+145,90);$pdf->Cell(135,5,"Faire SVP",0,1,'C',1,0);
$pdf->SetTextColor(0,0,0);
$pdf->Text(5+145,105,"* Mammographie  (face et oblique externe).");
$pdf->Text(5+145,120,"* Echo mammaire (si Mammographie pathologique).");
$pdf->Text(5+145,135,"* IRM mammaire  (si Mammographie+Echo pathologique)");
$pdf->Text(5+145,150,"");
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(100+145,160,"Le Médecin");
$pdf->Line(5+145 ,174+2 ,142+143 ,174+2 );
$pdf->SetXY(150,175+3);$pdf->Cell(135,5,"لاتتركو ابدا الادوية فى متناول الاطفال",0,1,'C',1,0);
$pdf->SetXY(150,182+3);$pdf->Cell(135,5,"Ne Laissez Jamais Les Medicaments à La Portée Des Enfants",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 10);
$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);
$pdf->SetXY(10+145,24);$pdf->write1DBarcode($result->id, 'C39', '', '', '', 18, 0.4, $style, 'N');
$pdf->Output("EPA_".$result->STRUCTURED.".PDF",'I');
}

?>
