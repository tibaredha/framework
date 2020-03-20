<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
$pdf->RoundedRect($x=5,  $y=5,   $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=4,  $y=4,   $w=202, $h=287, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 10);
$pdf->Text(90,0,"PARTOGRAMME "); 
$pdf->Text(5,5,"Nom,Prénom : ");$pdf->SetTextColor(255,0,0);$pdf->Text(27,5,$result->NOM2.'_'.$result->PRENOM2); $pdf->SetTextColor(0,0,0);
$pdf->Text(80,5,"Geste : "); $pdf->SetTextColor(255,0,0);$pdf->Text(91,5,$result->GESTE);  $pdf->SetTextColor(0,0,0);           
$pdf->Text(110,5,"Parité : "); $pdf->SetTextColor(255,0,0);$pdf->Text(121,5,$result->PARITE);  $pdf->SetTextColor(0,0,0);                  
$pdf->Text(140,5,"Etablissement  : ");$pdf->SetTextColor(255,0,0);$pdf->Text(165,5,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"));$pdf->SetTextColor(0,0,0);
$pdf->Line(5 ,9,200 ,9 );
$pdf->Text(5,10,"Date D'admission : "); $pdf->SetTextColor(255,0,0);$pdf->Text(33,10,$pdf->dateUS2FR($result->HOSPI));  $pdf->SetTextColor(0,0,0);            
$pdf->Text(80,10,"Heure D'admission : "); $pdf->SetTextColor(255,0,0);$pdf->Text(110,10,$result->HHOSP);  $pdf->SetTextColor(0,0,0);                            
$pdf->Text(140,10,"Rupture Des Membranes :");$pdf->SetTextColor(255,0,0);$pdf->Text(180,10,$pdf->rdm($result->id)." Heure");  $pdf->SetTextColor(0,0,0); 
$pdf->Line(5 ,14,200 ,14 );
$pdf->SetFont('aefurat', '', 9);$pdf->SetFillColor(255);
$hadmission=$result->HHOSP;
}
//*******************************RCF*****************************************//
$pdf->SetXY(27,$pdf->GetY()+5);$pdf->cell(7,5,"180",1,1,'C');
for ($x = 170; $x >= 100; $x-=10) {$pdf->SetXY(27,$pdf->GetY());$pdf->cell(7,5,$x,1,1,'C');} 
$pdf->SetXY(5,30);$pdf->cell(21,5,"Rythme",1,1,'L');
$pdf->SetXY(5,35);$pdf->cell(21,5,"Cardiaque",1,1,'L');
$pdf->SetXY(5,40);$pdf->cell(21,5,"Foetal",1,1,'L');
$pdf->SetXY(5,20);
for($i=0; $i <9; $i++){for($ii=35; $ii<=199; $ii += 7){$data="";$pdf->SetXY($ii,$pdf->GetY()-5);$pdf->cell(7,5,$data,1,1,'C',1,0);}$pdf->SetXY(5,$pdf->GetY()+5);}
$s=30;$pdf-> SetDrawColor(225,0,0);$pdf->SetLineWidth(1);$pdf->Line(35 ,$s,203,$s );$pdf->SetLineWidth(0);$pdf->SetDrawColor(0,0,0);
$d=50;$pdf-> SetDrawColor(223,0,0);$pdf->SetLineWidth(1);$pdf->Line(35 ,$d,203,$d );$pdf->SetLineWidth(0);$pdf->SetDrawColor(0,0,0);
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id'  order by  DHE2 asc ";
$resultat=mysql_query($query);
$a=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8);
$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
$tiba = array();$redha = array();	
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 20);$pdf->SetTextColor(0,0,225);$pdf->Text($c[$result->DHE2],13+(5*$a[$result->RCF]),"O");$pdf->SetTextColor(0,0,0);$pdf->SetFont('aefurat', '', 10);
array_push($tiba,$c[$result->DHE2]);array_push($redha,(13+(5*$a[$result->RCF])));
}
$pdf->SetLineWidth(0.8);$pdf->setDrawColor(0,0,225);for($i=0;$i<(count($tiba)-1);$i++){$pdf->Line($tiba[$i]+3.5,$redha[$i]+4,$tiba[$i+1]+3.5,$redha[$i+1]+4);}$pdf->SetLineWidth(0);$pdf->setDrawColor(0,0,0);
//*****************************LA DC*******************************************//
$pdf->SetXY(5,62);$pdf->cell(29,5,"Liquide amniotique",1,1,'L');
$pdf->SetXY(5,67);$pdf->cell(29,5,"Déformation Cranienne",1,1,'L');
for($i1=10; $i1<=5*(3) ; $i1 += 5){for($i=15; $i<=7*(26); $i += 7){$pdf->SetXY($i+20,52+($i1));$pdf->cell(7,5,"",1,1,'C',1,0);}}
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id' order by  DHE2 asc   ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->LA($result->LA,$result->DHE2);
$pdf->DC($result->DC,$result->DHE2);
}
//*************************DIC DES***********************************************//
$pdf->SetXY(27,$pdf->GetY()+7);$pdf->cell(7,5,"10",1,1,'C');
for ($x = 9; $x >= 00; $x-=1){$pdf->SetXY(27,$pdf->GetY());$pdf->cell(7,5,$x,1,1,'C');} 
$pdf->SetXY(27,$pdf->GetY());$pdf->cell(7,15,"H",1,1,'C');
for($i1=10; $i1<=5*(11+1) ; $i1 += 5){for($i=15; $i<=7*(25+1); $i += 7){$pdf->SetXY($i+20,64+($i1)); $pdf->cell(7,5,"",1,1,'C',1,0);}}
for($a=0; $a<=167; $a += 7){$x=(($a/7)+1);$pdf->SetXY(35+$a,129);$pdf->cell(7,5,$x,1,1,'C',1,0);}
$pdf->SetFont('aefurat', 'U', 9);$pdf->SetFillColor(255 ,255 ,0);	
for($a=0; $a<=167; $a += 7){$x1=(($a/7));$pdf->SetXY(35+$a,129+5);$pdf->cell(7,10,$pdf->heuresPlus($hadmission,$x1),1,1,'C',1,0);}	
$pdf->SetXY(5,67+7);$pdf->cell(9,55,"DL-O",1,1,'C');	
$pdf->SetXY(17,92+7);$pdf->cell(9,30,"DS-X",1,1,'C');
$pdf->SetFont('aefurat', '', 9);
$pdf->SetLineWidth(1);$pdf->SetDrawColor(225,0,0);$pdf->Line(35 ,114,91,114 );$pdf->Line(91 ,114,146.7,74 );$pdf->Line(119 ,114,174.7,74 );$pdf->Line(114-23,114,91,129 );$pdf->SetLineWidth(0);$pdf->SetDrawColor(0,0,0);
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id'  order by  DHE2 asc ";
$resultat=mysql_query($query);
$a=array(10=>0,9=>1,8=>2,7=>3,6=>4,5=>5,4=>6,3=>7,2=>8,1=>9,0=>10);
$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
$tiba = array();$redha = array();	
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 20);$pdf->SetTextColor(0,0,225);$pdf->Text($c[$result->DHE2],72+(5*$a[$result->DIC]),"X");$pdf->SetTextColor(0,0,0);$pdf->SetFont('aefurat', '', 10);
array_push($tiba,$c[$result->DHE2]);array_push($redha,(13+(5*$a[$result->DIC])));
}
$pdf->SetLineWidth(0.8);$pdf->setDrawColor(0,0,225);for($i=0;$i<(count($tiba)-1);$i++){$pdf->Line($tiba[$i]+3.5,$redha[$i]+63,$tiba[$i+1]+3.5,$redha[$i+1]+63);}$pdf->SetLineWidth(0);$pdf->setDrawColor(0,0,0);
$aa=array(5=>0,4=>1,3=>2,2=>3,1=>4,0=>5);
$cc=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
$tiba = array();$redha = array();
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id'  order by  DHE2 asc ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 20);$pdf->SetTextColor(0,0,225);$pdf->Text($cc[$result->DHE2],97+(5*$aa[$result->DEP]),"O");$pdf->SetTextColor(0,0,0);$pdf->SetFont('aefurat', '', 10);
array_push($tiba,$cc[$result->DHE2]);array_push($redha,(13+(5*$aa[$result->DEP])));
}
$pdf->SetLineWidth(0.8);$pdf->setDrawColor(0,0,225);for($i=0;$i<(count($tiba)-1);$i++){$pdf->Line($tiba[$i]+3.5,$redha[$i]+88,$tiba[$i+1]+3.5,$redha[$i+1]+88);}$pdf->SetLineWidth(0);$pdf->setDrawColor(0,0,0);	
//*****************************contraction***************************//
$pdf->SetXY(27,145);$pdf->cell(7,5,"5",1,1,'C');
for ($x = 4; $x >= 1; $x-=1){$pdf->SetXY(27,$pdf->GetY());$pdf->cell(7,5,$x,1,1,'C');} 
$pdf->SetXY(5,150);$pdf->cell(21,5,"Nombre de",1,1,'L');
$pdf->SetXY(5,155);$pdf->cell(21,5,"Contraction",1,1,'L');
$pdf->SetXY(5,160);$pdf->cell(21,5,"en 10 mn",1,1,'L');
for($i1=10; $i1<=5*(6) ; $i1 += 5){for($i=15; $i<=7*(26); $i += 7){$pdf->SetXY($i+20,135+($i1));$pdf->cell(7,5,"",1,0,'C',0);}}
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id'  order by  DHE2 asc  ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->NDC($result->NDC,$result->DHE2,$result->DCU);
}
//********************************************************//
$pdf->SetXY(5,166+(5*1));$pdf->cell(29,5,"Oxytocine U/L",1,1,'L');
$pdf->SetXY(5,166+(5*2));$pdf->cell(29,5,"Gouttes/mn",1,1,'L');
for($i1=10; $i1<=15 ; $i1 += 5) {for($i=15; $i<=7*(26); $i += 7){$pdf->SetXY($i+20,161+($i1));$pdf->cell(7,5,"",1,0,'C',0);}}
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id' order by  DHE2 asc   ";
$resultat=mysql_query($query);$pdf->SetFont('aefurat', '', 7);
while($result=mysql_fetch_object($resultat))
{
$pdf->OXY($result->OXY,$result->DHE2);
$pdf->NOXY($result->NOXY,$result->DHE2);
}
//********************************************************//
$pdf->SetXY(5,177+(5*1));$pdf->cell(29,10,"Médicaments",1,1,'L');
$pdf->SetXY(5,177+(5*3));$pdf->cell(29,10,"Prescrits en IV",1,1,'L');
for($i=15; $i<=7*(26); $i += 7){$pdf->SetXY($i+20,182);$pdf->cell(7,20,"",1,0,'C',0);}
//***********************POOLS TA *********************************//
for($i1=10; $i1<=5*(14) ; $i1 += 5){for($i=15; $i<=7*(26); $i += 7){$pdf->SetXY($i+20,193+($i1));$pdf->cell(7,5,"",1,0,'C',0);}}
$pdf->SetXY(27,203+(5*0));$pdf->cell(7,5,"180",1,1,'C');
for ($x = 170; $x >= 60; $x-=10) {$pdf->SetXY(27,$pdf->GetY());$pdf->cell(7,5,$x,1,1,'C');} 
$pdf->SetXY(5,223);$pdf->cell(21,5,"TA (__)",1,1,'L');
$pdf->SetXY(5,243);$pdf->cell(21,5,"POOLS (O) ",1,1,'L');
$pdf->SetDrawColor(225,0,0);$pdf->SetLineWidth(1);$pdf->Line(35 ,228,198+5,228 );$pdf->SetLineWidth(0);$pdf->SetDrawColor(0,0,0);
$pdf->SetDrawColor(225,0,0);$pdf->SetLineWidth(1);$pdf->Line(35 ,258,198+5,258 );$pdf->SetLineWidth(0);$pdf->SetDrawColor(0,0,0);
$ap=array(120=>0,110=>1,100=>2,90=>3,80=>4,70=>5,60=>6);
$cp=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
$tiba = array();$redha = array();
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id' order by  DHE2 asc   ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 20);$pdf->SetTextColor(0,0,225);$pdf->Text($cp[$result->DHE2],231+(5*$ap[$result->POOLS]),"O");$pdf->SetTextColor(0,0,0);$pdf->SetFont('aefurat', '', 10);
array_push($tiba,$cp[$result->DHE2]);array_push($redha,(13+(5*$ap[$result->POOLS])));
}
$pdf->SetLineWidth(0.8);$pdf->setDrawColor(0,0,225);for($i=0;$i<(count($tiba)-1);$i++){$pdf->Line($tiba[$i]+3.5,$redha[$i]+222,$tiba[$i+1]+3.5,$redha[$i+1]+222);}$pdf->SetLineWidth(0);$pdf->setDrawColor(0,0,0);
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id'  order by  DHE2 asc  ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->ta($result->TAS,$result->TAD,$result->DHE2);
}
//************************Température en C°********************************//
for($i1=10; $i1<=5*(2) ; $i1 += 5){for($i=15; $i<=7*(26); $i += 7){$pdf->SetXY($i+20,259+($i1));$pdf->cell(7,5,"",1,0,'C',0);}}
$pdf->SetXY(5,264+(5*1));$pdf->cell(29,5,"Température en C°",1,1,'L');
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id' order by  DHE2 asc   ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->TEMP($result->TEMP,$result->DHE2);
}
//********************************************************//
for($i1=10; $i1<=5*(4) ; $i1 += 5){for($i=15; $i<=7*(26); $i += 7){$pdf->SetXY($i+20,265+($i1));$pdf->cell(7,5,"",1,0,'C',0);}}
$pdf->SetXY(5,270+(5*1));$pdf->cell(29,5,"Proteinurie",1,1,'L');
$pdf->SetXY(5,270+(5*2));$pdf->cell(29,5,"Acétonurie",1,1,'L');
$pdf->SetXY(5,270+(5*3));$pdf->cell(29,5,"Volume urinaire",1,1,'L');
$pdf->mysqlconnect();
$query = "select * from trav WHERE  IDF = '$id' order by  DHE2 asc   ";
$resultat=mysql_query($query);$pdf->SetFont('aefurat', '', 7);
while($result=mysql_fetch_object($resultat))
{
$pdf->PRTU($result->PRTU,$result->DHE2);
$pdf->ACU($result->ACU,$result->DHE2);
$pdf->VU($result->VU,$result->DHE2);
}
//*********************************************************//
$pdf->StartTransform();
$pdf->Rotate(39, 70, 110);$pdf->SetTextColor(225,0,0);$pdf->SetFont('aefurat', '', 15);
$pdf->Text(110, 122, 'Alerte');$pdf->Text(131, 139.5, 'Action');$pdf->SetTextColor(0,0,0);
$pdf->StopTransform();
//*********************************************************//
$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 10);
$pdf->Text(174,85,"Heure:".$result->HINS1);
$pdf->Text(174,90,"Accouchement:".$result->MAC);
$pdf->Text(174,95,"Enfant:".$result->VMN);
$pdf->Text(174,100,"Sexe:".$result->SEXE5);
$pdf->Text(174,105,"Poids:".$result->POIDS);
}


$pdf->Output();
?>


