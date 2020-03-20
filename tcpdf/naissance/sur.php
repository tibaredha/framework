<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'L', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('L','A4');
$pdf->mysqlconnect();$query = "select * from naissance WHERE  id = '$id'";$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat','B',13);$pdf->SetFillColor(245);
$pdf->SetXY(5,4);$pdf->Cell(174,5,"FEUILLE DE SURVEILLANCE (Médicaments /T° /TA /DIU)",0,1,'L',1,0);
$pdf->SetXY(182,4);$pdf->Cell(76,5,"SERVICE : ".$pdf->nbrtostring("servicedeces","id",$result->SERVI,"service"),0,1,'L',1,0);///.$pdf->nbrtostring("MVC","service","ids",$result->SERVICE,"servicefr")
$pdf->SetXY(260,4);$pdf->Cell(29,5,"N° LIT : ".$pdf->nbrtostring("lit","id",$result->NLIT,"nlit"),0,1,'L',1,0);///.$pdf->nbrtostring("grh","lit","idlit",$result->NLIT,"nlit")
$pdf->SetFont('aefurat','B',13);
$pdf->Text(5,12,"Nom :");$pdf->SetTextColor(225,0,0);$pdf->Text(5+12,12,$result->NOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(50,12,"Prénom :");$pdf->SetTextColor(225,0,0);$pdf->Text(50+18,12,$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(100,12,"Date de naissance :");$pdf->SetTextColor(225,0,0);$pdf->Text(100+38,12,$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$pdf->Text(170,12,"Age :"."_ _ _"."Ans");$pdf->SetTextColor(225,0,0);$pdf->Text(182,12,$result->AGE2);$pdf->SetTextColor(0,0,0);
$pdf->Text(210,12,"DATE :");$pdf->SetTextColor(225,0,0);$pdf->Text(225,12,$pdf->dateUS2FR($result->HOSPI));$pdf->SetTextColor(0,0,0);
$pdf->Text(260,12,"HEURE :");$pdf->SetTextColor(225,0,0);$pdf->Text(278,12,$result->HHOSP);$pdf->SetTextColor(0,0,0);
$datehosp=$result->HOSPI;
}
$pdf->RoundedRect(3,3,288,8, 2, $round_corner='1111', $style='', $border_style=array(),  $fill_color=array());
$pdf->RoundedRect(3,11,288,8, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect(3,69.5,26,133, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());


$pdf->SetFillColor(255);
$pdf->SetXY(3,22);$pdf->Cell(26,8,"",1,1,'L',1,0);
$pdf->SetXY(3,30);$pdf->Cell(26,8,"",1,1,'L',1,0);
$pdf->SetXY(3,38);$pdf->Cell(26,8,"",1,1,'L',1,0);
$pdf->SetXY(3,46);$pdf->Cell(26,8,"",1,1,'L',1,0);
$pdf->SetXY(3,54);$pdf->Cell(26,8,"",1,1,'L',1,0);

$pdf->SetXY(3,62);$pdf->Cell(8,8,"T°",1,1,'C',1,0);
$pdf->SetXY(11,62);$pdf->Cell(9,8,"TA",1,1,'C',1,0);
$pdf->SetXY(20,62);$pdf->Cell(9,8,"DI",1,1,'C',1,0);


$pdf->SetFillColor(255);
//********************************//
$x=5;$y=30;$h=8;$w=10;$pdf->SetLineWidth(0.2);
$pdf->SetXY($x,$y);
for($i=0; $i <5; $i++) //lignes
{
 for($ii=30; $ii<=284; $ii += $w)//colones
 {
 $data="";// $data=$i.($ii/7)-4;
 $pdf->SetXY($ii,$pdf->GetY()-$h);$pdf->cell($w,$h,$data,1,1,'C',1,0);
 }
 $pdf->SetXY($x,$pdf->GetY()+$h);	
}
//********************************//
$h=8;$w=10;$pdf->SetFillColor(255 ,255 ,0);	
for($i=0;$i<=25;$i +=1) {
$pdf->SetXY($i."3"+27,62);$pdf->cell($w,$h,substr($pdf->datePlus($datehosp,$i),8,2),1,1,'C',1,0);	
}
$pdf->SetFillColor(255);

//********************************//
$x=5;$y=76;$h=6;$w=5;
$pdf->SetXY($x,$y);
for($i=0; $i <22; $i++) //lignes
{
 for($ii=30; $ii<=289; $ii += $w)//colones
 {
 $data="";// $data=$i.($ii/7)-4;
 $pdf->SetXY($ii,$pdf->GetY()-$h);$pdf->cell($w,$h,$data,1,1,'C',1,0);
 }
 $pdf->SetXY($x,$pdf->GetY()+$h);	
}
//*****************************************************************************************************************************//
$pdf->SetFont('aefurat','B',10);
// DU
$x=5;$y=76;$h=6;$w=8;$pdf->SetLineWidth(0.2);
$pdf->SetXY($x,$y);
for($i=0; $i <22; $i++) //lignes
{
 for($ii=20; $ii<=20; $ii += $w)//colones
 {
 $data="110";// 
 $data=2200-($i*100);$pdf-> SetDrawColor(0,100,0);$pdf->SetTextColor(0,100,0);
 $pdf->SetXY($ii,$pdf->GetY()-$h);$pdf->cell($w,$h,$data,0,1,'C',1,0);$pdf->SetDrawColor(0,0,0);$pdf->SetTextColor(0,0,0);
 }
 $pdf->SetXY($x,$pdf->GetY()+$h);	
}
$i=178;$pdf-> SetDrawColor(0,200,0);$pdf->SetLineWidth(1);$pdf->Line($ii-$w ,$i,290 ,$i );$pdf->SetDrawColor(0,0,0);


// ta
$x=5;$y=76;$h=6;$w=8;$pdf->SetLineWidth(0.2);
$pdf->SetXY($x,$y);
for($i=0; $i <22; $i++) //lignes
{
 for($ii=12; $ii<=12; $ii += $w)//colones
 {
 $data="110";// 
 $data=210-($i*10);$pdf-> SetDrawColor(0,0,225);$pdf->SetTextColor(0,0,225);
 $pdf->SetXY($ii,$pdf->GetY()-$h);$pdf->cell($w,$h,$data,0,1,'C',1,0);$pdf->SetDrawColor(0,0,0);$pdf->SetTextColor(0,0,0);
 }
 $pdf->SetXY($x,$pdf->GetY()+$h);	
}
$i=112;$pdf-> SetDrawColor(0,0,225);$pdf->SetLineWidth(1);$pdf->Line($ii-$w ,$i,290 ,$i );$pdf->SetDrawColor(0,0,0);
$i=154;$pdf-> SetDrawColor(0,0,225);$pdf->SetLineWidth(1);$pdf->Line($ii-$w ,$i,290 ,$i );$pdf->SetDrawColor(0,0,0);


// temperature
$x=5;$y=76;$h=6;$w=8;$pdf->SetLineWidth(0.2);
$pdf->SetXY($x,$y);
for($i=0; $i <22; $i++) //lignes
{
 for($ii=4; $ii<=4; $ii += $w)//colones
 {
 $data="110";// 
 $data=39.00-($i*0.10);$pdf-> SetDrawColor(225,0,0);$pdf->SetTextColor(225,0,0);
 $pdf->SetXY($ii,$pdf->GetY()-$h);$pdf->cell($w,$h,$data,0,1,'C',1,0);
 }
 $pdf->SetXY($x,$pdf->GetY()+$h);	
}
$i=196;$pdf-> SetDrawColor(225,0,0);$pdf->SetLineWidth(1);$pdf->Line($ii-$w ,$i,290 ,$i );$pdf->SetDrawColor(0,0,0);








//***********************POOLS TA *********************************//

$ap=array(120=>0,110=>1,100=>2,90=>3,80=>4,70=>5,60=>6);
$cp=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
$tiba = array();
$redha = array();
$pdf->mysqlconnect();
$query = "select * from obser WHERE  IDF = '$id' order by  DHE1 asc   ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
// $pdf->SetFont('aefurat', '', 20);$pdf->SetTextColor(0,0,225);$pdf->Text($cp[$result->DHE1],131+(5*$ap[$result->POOLS]),"O");$pdf->SetTextColor(0,0,0);$pdf->SetFont('aefurat', '', 10);
// array_push($tiba,$cp[$result->DHE2]);
// array_push($redha,(13+(5*$ap[$result->POOLS])));
}
//$pdf->SetLineWidth(0.8);$pdf->setDrawColor(0,0,225);for($i=0;$i<(count($tiba)-1);$i++){$pdf->Line($tiba[$i]+3.5,$redha[$i]+222,$tiba[$i+1]+3.5,$redha[$i+1]+222);}$pdf->SetLineWidth(0);$pdf->setDrawColor(0,0,0);
// $pdf->mysqlconnect();
// $query = "select * from trav WHERE  IDF = '$id'  order by  DHE2 asc  ";
// $resultat=mysql_query($query);
// while($result=mysql_fetch_object($resultat))
// {
// $pdf->ta($result->TAS,$result->TAD,$result->DHE2);
// }

for ($i=30; $i<=280; $i += 10)
{

$pdf->Text($i,100,"O");

}



















$pdf->Output();
?>

