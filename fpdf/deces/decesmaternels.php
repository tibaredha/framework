<?php
require('deces.php');
$pdf = new deces();$pdf->AliasNbPages();

$pdf->SetFont('Arial','B',9);
$ID=$_GET["uc"];
$pdf->mysqlconnect();
$query = "SELECT * FROM deceshosp where id='".$ID."'  ";
$resultat=mysql_query($query);
$pdf->SetFont('Arial','B',10);
while($row=mysql_fetch_object($resultat))
{
for ($x = 1; $x <= 9; $x++) 
{
$pdf->SetTextColor(0,0,0);
$pdf->AddPage();$pdf->setSourceFile('DM2013.pdf');$tplIdx = $pdf->importPage($x);$pdf->useTemplate($tplIdx, 5, 5, 200);$pdf->SetFont('Arial','B',10); 
$pdf->SetXY(62,10.5);$pdf->Write(0,'ETABLISSEMENT DE SANTE : '.$pdf->nbrtostring('structure','id',$row->STRUCTURED,'structure'));  
$pdf->SetTextColor(255,0,0);
} 

$pdf->SetTextColor(0,0,0);
$pdf->AddPage();$pdf->setSourceFile('DM2013.pdf');$tplIdx = $pdf->importPage(10);$pdf->useTemplate($tplIdx, 5, 5, 200);$pdf->SetFont('Arial','B',10); 
$pdf->SetXY(62,10.5);$pdf->Write(0,'ETABLISSEMENT DE SANTE : '.$pdf->nbrtostring('structure','id',$row->STRUCTURED,'structure'));  
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(95,76);$pdf->Write(0,'***');
$pdf->SetXY(95,75+13);$pdf->Write(0,$row->NOM);
$pdf->SetXY(95,75+13+9);$pdf->Write(0,$row->PRENOM);
$j = substr($row->DATENAISSANCE, 8, 2); 
$m = substr($row->DATENAISSANCE, 5, 2); 
$a = substr($row->DATENAISSANCE, 0, 4); 
$pdf->SetXY(97,75+13+18);$pdf->Write(0,$j);
$pdf->SetXY(95+15,75+13+18);$pdf->Write(0,$m);
$pdf->SetXY(95+35,75+13+18);$pdf->Write(0,$a);

$pdf->SetXY(96,75+13+26);$pdf->Write(0,$row->Years);
$pdf->SetXY(95,75+13+35);$pdf->Write(0,'***');
$pdf->SetXY(95,75+13+35+8);$pdf->Write(0,$row->ADRESSE.'_'.$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'));
$pdf->SetXY(95,75+13+35+15);$pdf->Write(0,'***');
$pdf->SetXY(95,75+13+35+15+9);$pdf->Write(0,$pdf->nbrtostring('WIL','IDWIL',$row->WILAYAR,'WILAYAS'));

$j = substr($row->DINS, 8, 2); 
$m = substr($row->DINS, 5, 2); 
$a = substr($row->DINS, 0, 4); 
$pdf->SetXY(97,75+13+35+15+17);$pdf->Write(0,$j);
$pdf->SetXY(95+15,75+13+35+15+17);$pdf->Write(0,$m);
$pdf->SetXY(95+35,75+13+35+15+17);$pdf->Write(0,$a);
$pdf->SetXY(95,75+13+35+15+17+9);$pdf->Write(0,$row->HINS);

switch($row->LD)  
		{
			case 'DOM':
				{
				$pdf->SetXY(95,75+13+35+15+17+18+5);$pdf->Write(0,'X');
				break;
				}
			case 'VP':
				{
				$pdf->SetXY(95,75+13+35+15+17+18+19);$pdf->Write(0,'X');
				break;
				}
			case 'AAP':
				{
				$pdf->SetXY(95,75+13+35+15+17+18+19);$pdf->Write(0,'X');
				break;
				}
			case 'SSP':
				{
				$pdf->SetXY(95,75+13+35+15+17+18+12);$pdf->Write(0,'X');
				break;
				}
			case 'SSPV':
				{
				///$pdf->SetXY(76,98.2);$pdf->Write(0,'X');
				break;
				}		
		}

$pdf->SetXY(95,75+26+35+23+24+18+26);$pdf->Write(0,$pdf->nbrtostring('structure','id',$row->STRUCTURED,'structure'));

$pdf->SetTextColor(0,0,0);
$pdf->AddPage();$pdf->setSourceFile('DM2013.pdf');$tplIdx = $pdf->importPage(11);$pdf->useTemplate($tplIdx, 5, 5, 200);$pdf->SetFont('Arial','B',10); 
$pdf->SetXY(62,10.5);$pdf->Write(0,'ETABLISSEMENT DE SANTE : '.$pdf->nbrtostring('structure','id',$row->STRUCTURED,'structure'));  
$pdf->SetTextColor(255,0,0);






$pdf->SetTextColor(0,0,0);
$pdf->AddPage();$pdf->setSourceFile('DM2013.pdf');$tplIdx = $pdf->importPage(12);$pdf->useTemplate($tplIdx, 5, 5, 200);$pdf->SetFont('Arial','B',10); 
$pdf->SetXY(62,10.5);$pdf->Write(0,'ETABLISSEMENT DE SANTE : '.$pdf->nbrtostring('structure','id',$row->STRUCTURED,'structure'));  
$pdf->SetTextColor(255,0,0);
$j = substr($row->DATENAISSANCE, 8, 2); 
$m = substr($row->DATENAISSANCE, 5, 2); 
$a = substr($row->DATENAISSANCE, 0, 4); 
$pdf->SetXY(97+14,60);$pdf->Write(0,$j);
$pdf->SetXY(95+15+14,60);$pdf->Write(0,$m);
$pdf->SetXY(95+35+14,60);$pdf->Write(0,$a);
$pdf->SetXY(106,67);$pdf->Write(0,$row->Years);
$j = substr($row->DINS, 8, 2); 
$m = substr($row->DINS, 5, 2); 
$a = substr($row->DINS, 0, 4); 
$pdf->SetXY(97+14,75);$pdf->Write(0,$j);
$pdf->SetXY(95+15+14,75);$pdf->Write(0,$m);
$pdf->SetXY(95+35+14,75);$pdf->Write(0,$a);
$pdf->SetXY(106,82);$pdf->Write(0,$row->HINS);
$pdf->SetXY(106,90);$pdf->Write(0,$pdf->nbrtostring('WIL','IDWIL',$row->WILAYAR,'WILAYAS'));


for ($x = 13; $x <= 87; $x++) 
{
$pdf->SetTextColor(0,0,0);
$pdf->AddPage();$pdf->setSourceFile('DM2013.pdf');$tplIdx = $pdf->importPage($x);$pdf->useTemplate($tplIdx, 5, 5, 200);$pdf->SetFont('Arial','B',10); 
$pdf->SetXY(62,10.5);$pdf->Write(0,'ETABLISSEMENT DE SANTE : '.$pdf->nbrtostring('structure','id',$row->STRUCTURED,'structure'));  
$pdf->SetTextColor(255,0,0);
} 
}	









$pdf->Output();
?>