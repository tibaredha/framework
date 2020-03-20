<?php
$id=$_GET["uc"];
require('gav.php');
$pdf = new gav( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
$pdf->setRTL(true); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->RoundedRect($x=145, $y=46, $w=1, $h=244, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->mysqlconnect();
$query = "select * from deceshosp WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(245);
$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(6,10);            $pdf->Cell(95,5,$pdf->repar,0,0,'C',1,0);$pdf->SetXY($pdf->GetX()+5,10);$pdf->Cell(95,5,$pdf->repfr,0,0,'C',1,0);
$pdf->SetXY(6,$pdf->GetY()+5);$pdf->Cell(95,5,$pdf->mspar,0,0,'C',1,0);$pdf->SetXY($pdf->GetX()+5,$pdf->GetY());$pdf->Cell(95,5,$pdf->mspfr,0,0,'C',1,0);
$pdf->SetXY(6,$pdf->GetY()+5);$pdf->Cell(95,5,$pdf->dspar.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYASAR"),0,0,'C',1,0);$pdf->SetXY($pdf->GetX()+5,$pdf->GetY());$pdf->Cell(95,5,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,0,'C',1,0);
$pdf->SetXY(6,$pdf->GetY()+5);$pdf->Cell(95,5,'المؤسسـة العموميـة '.$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,0,'C',1,0);$pdf->SetXY($pdf->GetX()+5,$pdf->GetY());$pdf->Cell(95,5,' '.$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,0,'C',1,0);

$pdf->setRTL(false); $pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,10,"Certificat d'examen médical d'une personne placée en garde à vue",1,1,'C',1,0);


$pdf->SetXY(7,$pdf->GetY()+10);$pdf->Cell(26,5,"Je sousssigné",0,0,'C',0,0);$pdf->Cell(70,5,"________________________________",0,0,'C',0,0);$pdf->Cell(100,5,"docteur en médecine ,agissant sur réquisition judiciaire de ",0,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(56,5,"M./Mme __________________",0,0,'C',0,0);$pdf->Cell(53,5,"certifie avoir éxaminé, à la fin",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);$pdf->Cell(16,5,"au début",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);$pdf->Cell(16,5,"pendant",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);$pdf->Cell(25,5,"la garde à vue",0,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(30,5,"Le : ".date('d-m-Y'),0,0,'C',0,0);$pdf->Cell(18,5,"à : ".date('H:s'),0,0,'C',0,0);$pdf->Cell(148,5,"la personne gardée à vue dont l'identité suit : ",0,0,'L',0,0);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(14,5,"Nom :",0,0,'C',0,0);$pdf->Cell(60,5,"___________________",0,0,'C',0,0);$pdf->Cell(18,5,"Prénom :",0,0,'C',0,0);$pdf->Cell(60,5,"___________________",0,0,'C',0,0);$pdf->Cell(16,5,"Sexe : ",0,0,'C',0,0);$pdf->Cell(14,5,"-M:X",1,0,'C',0,0);$pdf->Cell(14,5,"-F:X",1,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(40,5,"Né(e) Le : ".date('d-m-Y'),0,0,'C',0,0);$pdf->Cell(25,5,"présenté par : ",0,0,'C',0,0);$pdf->Cell(131,5,"_________________________________________________________",0,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(30,5,"-Sans la présence ",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);$pdf->Cell(25,5,"en présence ",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);$pdf->Cell(121,5,"- d'un agent de l'ordre sur notre demande , le gardé à vue susnommé(e) ",0,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(30,5,"Nous a déclaré : ",0,0,'C',0,0);



$pdf->SetFont('aefurat', 'U', 12);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(70,5,"1-Antécédents médico-chirurgicaux :",0,0,'L',0,0);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(7,$pdf->GetY()+6);
$pdf->Cell(39,5,"Asthme",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Diabète",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Epilepsie",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Cardiopathie",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+7);
$pdf->Cell(39,5,"HTA",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Pathologie mentale",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Maladie infectieuse",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Autres",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);


$pdf->SetFont('aefurat', 'U', 12);
$pdf->SetXY(7,$pdf->GetY()+5);$pdf->Cell(70,5,"2-Conduites addictives :",0,0,'L',0,0);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(7,$pdf->GetY()+6);
$pdf->Cell(39,5,"Tabac",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Alcool",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Drogues",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Psychotropes",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);



$pdf->SetFont('aefurat', 'U', 12);
$pdf->SetXY(7,$pdf->GetY()+6);$pdf->Cell(70,5,"3-Autres antécédents :",0,0,'L',0,0);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(7,$pdf->GetY()+6);
$pdf->Cell(39,5,"Antécédents suicidaires",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Grossesse en cours",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"Autres",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(49,5," ",0,0,'C',0,0);



$pdf->SetFont('aefurat', 'U', 12);
$pdf->SetXY(7,$pdf->GetY()+6);$pdf->Cell(70,5,"4-Allégations de mauvais traitement :",0,0,'L',0,0);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(7,$pdf->GetY()+6);
$pdf->Cell(39,5,"Avant la garde a vue",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"pendant la garde a vue",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"avant déclaration",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->Cell(39,5,"pendant déclaration",0,0,'C',0,0);$pdf->Cell(10,5,"X",1,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+6);
$pdf->Cell(70,5,"Nature des mauvais traitements allegués",0,0,'C',0,0);$pdf->Cell(126,5,"",0,0,'C',0,0);
$pdf->SetXY(7,$pdf->GetY()+6);
$pdf->Cell(196,5,"",0,0,'C',0,0);
$pdf->SetFont('aefurat', '', 12);




$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,10,"EXAMEN CLINIQUE",1,1,'C',1,0);










// $pdf->SetXY(5+5,$pdf->GetY()-10);
// $pdf->SetFont('aefurat', '', 12);
// $pdf->SetXY(5+5,$pdf->GetY());$pdf->Cell(50,10,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),1,1,'C',1,0);
// $pdf->SetFont('aefurat', '', 14);
// $pdf->SetFont('aefurat', '', 13);$pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
// $pdf->Text(65,$pdf->GetY()-5,$pdf->ANNEEAR($result->DINS));$pdf->Text(65+20,$pdf->GetY(),'....................................................................................................');
// $pdf->Text(65,$pdf->GetY()+10,$pdf->JOURAR($result->DINS));$pdf->Text(65+20,$pdf->GetY(),'....................................................................................................');
// $pdf->Text(65,$pdf->GetY()+10,$pdf->MOISAR($result->DINS));$pdf->Text(65+20,$pdf->GetY(),'....................................................................................................');
// $pdf->Text(65,$pdf->GetY()+10,"نحن مدير المؤسسة العمومية ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear")  );

// $pdf->Text(65,$pdf->GetY()+10,"نشعر رئيس المجلس الشعبي البلدي ضابط الحالة المدنية ببلدية ".'.............................');

// $pdf->Text(168,$pdf->GetY(),$pdf->nbrtostring("structure","id",$result->STRUCTURED,"daira"));
//////$pdf->Text(65,$pdf->GetY()+10," انه و قي هذا اليوم و على الساعة : ".$pdf->HEURSAR($result->HINS));$pdf->Text(60+55,$pdf->GetY(),".........................................................................");
// $pdf->Text(65,$pdf->GetY()+10," انه و في هذا اليوم و على الساعة : ".$pdf->HEURSAR($result->HINS));$pdf->Text(60+55,$pdf->GetY(),".........................................................................");

// $pdf->Text(65,$pdf->GetY()+10,"والدقيقة : ".$pdf->MINUTEAR($result->HINS));$pdf->Text(82,$pdf->GetY(),".....................................................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"توفي (ت) المسمى (ة) : ".$result->NOMAR."  ".$result->PRENOMAR);$pdf->Text(102,$pdf->GetY(),"...................................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"المولود (ة) : ".$result->DATENAISSANCE);$pdf->Text(85,$pdf->GetY(),"......................................");
// $pdf->Text(130,$pdf->GetY()," بـ : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNE,"communear")." ولاية ".$pdf->nbrtostring("wil","IDWIL",$result->WILAYA,"WILAYASAR") );$pdf->Text(138,$pdf->GetY(),"....................................................");
// $pdf->Text(65,$pdf->GetY()+10,"إبن (ة) : ".$result->FILSDEAR);$pdf->Text(85,$pdf->GetY(),"......................................");
// $pdf->Text(130,$pdf->GetY(),"و : ".$result->ETDEAR);$pdf->Text(138,$pdf->GetY(),"....................................................");
// $pdf->Text(65,$pdf->GetY()+10,"زوج (ة) : ".$result->NOMPRENOMAR);$pdf->Text(82,$pdf->GetY(),".....................................................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"المهنة : ".$pdf->nbrtostring("profession","id",$result->Profession,"Professionar"));$pdf->Text(78,$pdf->GetY(),"..........................................");
// $pdf->Text(130,$pdf->GetY(),"عنوان الإقامة : ".$result->ADAR);$pdf->Text(158,$pdf->GetY(),"...................................");
// $pdf->Text(65,$pdf->GetY()+10,"دخل (ت) الى المستشفى يوم : ".$result->DATEHOSPI);$pdf->Text(114,$pdf->GetY(),".........................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"و توفي (ت) يوم : ".$result->DINS);$pdf->Text(94,$pdf->GetY(),".............................");
// $pdf->Text(130,$pdf->GetY(),"على الساعة : ".$result->HINS);$pdf->Text(150,$pdf->GetY(),"..........................................");
// $pdf->Text(130,$pdf->GetY()+25,"في : ".$result->DINS);
// $pdf->Text(150,$pdf->GetY()+10,"امضاء المدير");
// $pdf->Text(25,$pdf->GetY()-10,"امضاء الطبيب");                             
// $pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(60,6,".......................................... ",0,1,'C');
// $pdf->setRTL(false); $pdf->Text(150,$pdf->GetY()-8,$result->MEDECINHOSPIT);$pdf->setRTL(true); 
// $pdf->Text(5,$pdf->GetY()+20,"الكتابة السابقة للاسم و اللقب :");
// $pdf->Text(7,$pdf->GetY()+10,"_____________________");
// $pdf->setRTL(false); $pdf->Text(150,$pdf->GetY(),$result->NOM);$pdf->setRTL(true); 
// $pdf->Text(7,$pdf->GetY()+10,"_____________________");
// $pdf->setRTL(false); $pdf->Text(150,$pdf->GetY(),$result->PRENOM);$pdf->setRTL(true); 
// $nec =$result->id;
// $pdf->SetXY(10,80);$pdf->Cell(50,15,'الرقم : '.date('Y').'/'.$nec,1,1,'C',1,0);
// $pdf->SetXY(10,120);$pdf->Cell(50,10,'دفتر عائلي رقم : ',1,1,'R',1,0);
// $pdf->SetXY(10,135);$pdf->Cell(50,10,'صادر بتاريخ : ',1,1,'R',1,0);
// $pdf->SetXY(10,150);$pdf->Cell(50,10,'ولاية :',1,1,'R',1,0);
// $pdf->SetFont('helvetica', '', 10);
//////define barcode style
// $style = array(
    // 'position' => '',
    // 'align' => 'R',
    // 'stretch' => false,
    // 'fitwidth' => false,
    // 'cellfitalign' => '',
    // 'border' => false,
    // 'hpadding' => 'auto',
    // 'vpadding' => 'auto',
    // 'fgcolor' => array(0,0,0),
    // 'bgcolor' => false, //array(255,255,255),
    // 'text' => true,
    // 'font' => 'helvetica',
    // 'fontsize' => 8,
    // 'stretchtext' => 4
// );
// $pdf->SetXY(10,99);$pdf->write1DBarcode($nec, 'C39', '', '', '', 18, 0.4, $style, 'N');
// $pdf->Ln();
$pdf->Output($result->NOM.'_'.$result->PRENOM.'.pdf');
}
?>


