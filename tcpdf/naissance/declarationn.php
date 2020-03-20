<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
$pdf->setRTL(true); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=195, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=5, $y=203, $w=200, $h=90, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=145, $y=40, $w=1, $h=155, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$nec =$result->id;
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYASAR"),0,1,'C');
$pdf->SetFillColor(245);
$pdf->SetXY(65+5,$pdf->GetY()+10);$pdf->Cell(140-10,10,'التصريح بالولادة',0,1,'C',1,0);
$pdf->SetXY(5+5,$pdf->GetY()-10);$pdf->Cell(50,10,'المؤسسـة العموميـة',0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5+5,$pdf->GetY());$pdf->Cell(50,10,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 13);
$pdf->Text(65,$pdf->GetY()-5,"في عـــام الفيــــن و");$pdf->SetTextColor(255,0,0);$pdf->Text(105,$pdf->GetY(),$pdf->ANNEEAR($result->DINS1));$pdf->SetTextColor(0,0,0);$pdf->Text(65+40,$pdf->GetY(),'..................................................................................');
$pdf->Text(65,$pdf->GetY()+7,"وفي اليـــوم ");       $pdf->SetTextColor(255,0,0);$pdf->Text(87,$pdf->GetY(),$pdf->JOURAR($result->DINS1));  $pdf->SetTextColor(0,0,0);$pdf->Text(65+20,$pdf->GetY(),'...................................................................................................');
$pdf->Text(65,$pdf->GetY()+7,"من شهـــر ");          $pdf->SetTextColor(255,0,0);$pdf->Text(85,$pdf->GetY(),$pdf->MOISAR($result->DINS1));  $pdf->SetTextColor(0,0,0);$pdf->Text(65+20,$pdf->GetY(),'...................................................................................................');
$pdf->Text(65,$pdf->GetY()+7,"نحن مدير المؤسسة العمومية ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear")  );
$pdf->Text(65,$pdf->GetY()+7,"نشعر رئيس المجلس الشعبي البلدي  ضابط الحالة المدنية ببلدية".'.............................');
$pdf->Text(168,$pdf->GetY(),$pdf->nbrtostring("structure","id",$result->STRUCTURED,"daira"));
$pdf->Text(65,$pdf->GetY()+7," انه و في هذا اليوم و على الساعة ".$pdf->HEURSAR($result->HINS1));$pdf->Text(60+55,$pdf->GetY(),"........................................................................");
$pdf->Text(65,$pdf->GetY()+7,"والدقيقة :".$pdf->MINUTEAR($result->HINS1));$pdf->Text(82,$pdf->GetY(),".....................................................................................................");
$pdf->Text(65,$pdf->GetY()+7,"السيدة :".$result->NOMARM.'  '.$result->PRENOMARM);$pdf->Text(82,$pdf->GetY(),".....................................................................................................");
$pdf->Text(65,$pdf->GetY()+7,"المولودة بتاريخ :".$result->DATENS2);
$pdf->Text(115,$pdf->GetY(),"بـ : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNE2,"communear"));
$pdf->Text(121,$pdf->GetY(),' ...................................................................');
$pdf->Text(65,$pdf->GetY()+7,"مهنتها : ".$pdf->nbrtostring("profession","id",$result->PROFESSION2,"Professionar"));
$pdf->Text(80,$pdf->GetY()," .......................................................................................................");
$pdf->Text(65,$pdf->GetY()+7," و زوجها : ".$result->NOMARP.'  '.$result->PRENOMARP);
$pdf->Text(82,$pdf->GetY()," .....................................................................................................");
$pdf->Text(65,$pdf->GetY()+7,"المولود بتاريخ :".$result->DATENS3);
$pdf->Text(65+50,$pdf->GetY(),"بـ : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNE3,"communear"));
$pdf->Text(71+50,$pdf->GetY(),' ...................................................................');

$pdf->Text(65,$pdf->GetY()+7,"مهنته : ".$pdf->nbrtostring("profession","id",$result->PROFESSION3,"Professionar") );
$pdf->Text(80,$pdf->GetY()," .......................................................................................................");
$pdf->Text(65,$pdf->GetY()+7,"الساكنان  بـ: ".$result->ADARPM.' بلدية  '.$pdf->nbrtostring("com","IDCOM",$result->COMMUNE4,"communear"));
$pdf->Text(87,$pdf->GetY()," .................................................................................................");
if ($result->SEXE5=='M') {$pdf->Text(65,$pdf->GetY()+7,"والتي وضعت صبي  من جنس "." ذكــر");} 
if ($result->SEXE5=='F') {$pdf->Text(65,$pdf->GetY()+7,"والتي وضعت صبية من جنس "."انــثى");} 
$pdf->Text(120,$pdf->GetY(),' ....................................................................');$pdf->SetTextColor(255,0,0);
if ($result->VMN=='V') {$pdf->Text(158,$pdf->GetY(),"على قيد الحياة");} 
if ($result->VMN=='M') {$pdf->Text(158,$pdf->GetY()," متوفي (ة) ");} $pdf->SetTextColor(0,0,0);
$pdf->Text(65,$pdf->GetY()+10,"واعطي له  (ها)  الاسم الآتي : ".$result->PRENOMARE);
$pdf->Text(115,$pdf->GetY(),' ........................................................................');
$pdf->Text(150,$pdf->GetY()+10,"في : ".date('Y-m-d'));
$pdf->Text(150,$pdf->GetY()+10,"امضاء المدير");

//************************************************************************************************************************//
$pdf->setRTL(true); 
$pdf->SetXY(6,$pdf->GetY()+15);$pdf->Cell(199,5,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,1,'C');

$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+3);$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYASAR"),0,1,'C');
$pdf->SetFillColor(245);
$pdf->SetXY(65+5,$pdf->GetY()+5);$pdf->Cell(140-10,10,'شهادة ولادة',0,1,'C',1,0);
$pdf->SetXY(5+5,$pdf->GetY()-10);$pdf->Cell(50,10,'المؤسسـة العموميـة',0,1,'C',1,0);
$pdf->SetXY(5+5,$pdf->GetY());$pdf->Cell(50,10,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,1,'C',1,0);

$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,$pdf->GetY()+5,"انا الممضى اسفله السيد مدير المؤسسة العمومية ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"));
$pdf->Text(5,$pdf->GetY()+5,'اشهد بان السيدة '.$result->NOMARM.' '.$result->PRENOMARM.' المولودة بتاريخ '.$result->DATENS2);
$pdf->Text(5,$pdf->GetY()+5,"زوجة السيد ".$result->NOMARP.'  '.$result->PRENOMARP.' المولود بتاريخ '.$result->DATENS3);
$pdf->Text(5,$pdf->GetY()+5,"قد وضعت في هذا اليوم ".$pdf->JOURAR($result->DINS1).' من شهر '.$pdf->MOISAR($result->DINS1).' عام الفين و '.$pdf->ANNEEAR($result->DINS1).'على الساعة '.$pdf->HEURSAR($result->HINS1).' و الدقيقة  '.$pdf->MINUTEAR($result->HINS1));
if ($result->SEXE5=='M') {$pdf->Text(5,$pdf->GetY()+5,"مولود من جنس ذكر ");}if ($result->SEXE5=='F') {$pdf->Text(5,$pdf->GetY()+5,"مولود من جنس انثى");}  
$pdf->Text(35,$pdf->GetY()," سمي (ت)  ".$result->PRENOMARE.' تحت رقم '.date('Y').'/'.$nec);
$pdf->Text(50,$pdf->GetY()+5,"سلمت هذه الشهادة للإدلاء بها في حدود ما يسمح به القانون");
$pdf->Text(150,$pdf->GetY()+5,"امضاء المدير");
//************************************************************************************************************************//
$pdf->SetXY(10,65);$pdf->Cell(50,5,'الرقم : '.date('Y').'/'.$nec,0,1,'C',1,0);
// define barcode style
$style = array(
    'position' => '',
    'align' => 'R',
    'stretch' => false,
    'fitwidth' => false,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
//$pdf->SetXY(70,100);$pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
$pdf->SetXY(10,$pdf->GetY()+3);$pdf->write1DBarcode($nec, 'C39', '', '', '', 15, 0.4, $style, 'N');
// $pdf->Ln();

$pdf->SetXY(10,$pdf->GetY()+2);$pdf->Cell(50,5,'الإيداع',0,1,'C',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,5,'دفتر عائلي رقم : '.$result->NUMLF,0,1,'R',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,5,'صادر بتاريخ : '.$result->DNUMLF,0,1,'R',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,5,'بلدية : '.$pdf->nbrtostring("com","IDCOM",$result->COMMUNELF,"communear"),0,1,'R',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,5,'ولاية : '.$pdf->nbrtostring("wil","IDWIL",$result->WILAYALF,"WILAYASAR"),0,1,'R',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,5,'وثائق مقدمة',0,1,'C',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,5,'........................................',0,1,'C',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,5,'........................................',0,1,'C',1,0);

$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(50,5,'الكتابة السابقة للاسم و اللقب',0,1,'C',1,0);
$pdf->Text(7,$pdf->GetY()+5,"_____________________");$pdf->setRTL(false); 
$pdf->Text(150,$pdf->GetY(),$result->NOM3);$pdf->setRTL(true); 
$pdf->Text(7,$pdf->GetY()+10,"_____________________");$pdf->setRTL(false); 
$pdf->Text(150,$pdf->GetY(),$result->PRENOM5);$pdf->setRTL(true); 

$pdf->SetXY(10,$pdf->GetY()+10);$pdf->Cell(50,10,'حررت من طرف السيد(ة) ',0,1,'C',1,0);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,10,'الامضاء',0,1,'C',1,0);$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(50,10,".......................................... ",0,1,'C',1,0); 

$pdf->SetFont('helvetica', '', 10);
}





$pdf->Output();
?>


