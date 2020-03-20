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
$dateeuro=date('d/m/Y');
$pdf->SetFillColor(245);
$pdf->SetTextColor(0,0,255);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(5,5);$pdf->Cell(200,5,"المؤسسة العمومية "." ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,1,'C',1,0);
$pdf->SetXY(5,12);$pdf->Cell(200,5,"ETABLISSEMENT PUBLIC ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
$pdf->SetXY(5,19);$pdf->Cell(200,5,"SERVICE ".$pdf->nbrtostring("servicedeces","id",$result->SERVI,"service"),0,1,'C',1,0);
$pdf->Text(165,30,"A ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"com")." Le : ".$dateeuro);
$pdf->SetFont('aefurat', '', 15);
$pdf->SetXY(5,40);$pdf->Cell(200,5,"RESULTATS D 'EXAMENS",0,1,'C',1,0);
$pdf->SetXY(5,48);$pdf->Cell(200,5,"BIOLOGIQUES",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
// $pdf->Text(5,60,"Delivrée par le laboratoire  :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
// $pdf->Text(5,70,"A Mme/Melle :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
// $pdf->SetTextColor(0,0,0);$pdf->Text(40,70,$result->NOM2.'  '.$result->PRENOM2);$pdf->SetTextColor(0,0,255);
// $pdf->Text(103,70,"Age : _ _ _ _Ans");$pdf->SetTextColor(0,0,0);$pdf->Text(115,70,$result->AGE2);$pdf->SetTextColor(0,0,255);
// $pdf->Text(5,80,"Domicile :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
// $pdf->SetTextColor(0,0,0);$pdf->Text(26,80,$result->ADRESSE4.'_'.$pdf->nbrtostring("com","IDCOM",$result->COMMUNE4,"COMMUNE"));$pdf->SetTextColor(0,0,255);



$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(90,5,"Biochimie          Resultats          Normes",0,1,'L',1,0);                                                                     $pdf->SetXY(115,$pdf->GetY()-6);$pdf->Cell(90,5,"Hemostase",0,1,'L',1,0);
$pdf->SetTextColor(0,0,0);$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"glycémie",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);                 $pdf->SetXY(115,$pdf->GetY());$pdf->Cell(30,5,"taux de prothrombine",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"hba1c",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);                    $pdf->SetXY(115,$pdf->GetY());$pdf->Cell(30,5,"inr",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"urée",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);                     $pdf->SetXY(115,$pdf->GetY());$pdf->Cell(30,5,"tck",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"creatinemie",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);              $pdf->SetXY(115,$pdf->GetY());$pdf->Cell(30,5,"taux de febrinemie",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"acid urique",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"cholesterol t",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"cholesterol ldl",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"cholesterol hdl",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"triglyceride",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"phosphatase alcaline",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"tgo ou asat",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"tgp ou ",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"gama gt",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"proteinemie t",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"albuminemie",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"bilirubine t",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"bilirubine direct",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(90,5,"Hématologie",0,1,'L',1,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"GR",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"GB",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"PNN",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"PNE",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"PNB",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"LYMP",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"MONO",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"PLAQT",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"HB",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"HT",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"VGM",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"TCMH ",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"CCMH",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"groupage ABO",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(30,5,"groupage RH",0,0,'L',0,0);$pdf->Cell(30,5,"_____________",0,0,'C',0,0);$pdf->Cell(30,5,"0.70-1.10 g/l",0,0,'C',0,0);

$pdf->SetTextColor(0,0,255);



$pdf->SetFont('aefurat', '', 12);
$pdf->Text(100,$pdf->GetY()+10,"Le Responssable ");
$pdf->Line(5 ,$pdf->GetY()+10 ,205 ,$pdf->GetY()+10 );
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->Cell(200,5,"لاتتركو ابدا الادوية فى متناول الاطفال",0,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"Ne Laissez Jamais Les Medicaments à La Portée Des Enfants",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 10);
$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);
 $pdf->SetXY(10,24);$pdf->write1DBarcode($result->id, 'C39', '', '', '', 18, 0.4, $style, 'N');



}
$pdf->Output();
?>
