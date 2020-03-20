<?php
require('deces.php');
$pdf = new deces();$pdf->AliasNbPages();
$pdf->AddPage('L','A4');$pdf->SetFont('Times', 'B', 10);
$STRUCTURED=$_GET['str'];
$SERVICEHOSPIT=$_GET['uc'];
$login="";
$pdf->SetTitle('Releve Des Causes De Deces '."Du  Au ");$pdf->SetFillColor(230);
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(5,5);$pdf->cell(290,5,html_entity_decode(utf8_decode($pdf->repfr)),0,0,'C',1,0);
$pdf->SetXY(5,10);$pdf->cell(290,5,html_entity_decode(utf8_decode($pdf->mspfr)),0,0,'C',1,0);
$pdf->SetXY(5,15);$pdf->cell(290,5,html_entity_decode(utf8_decode($pdf->dspfr.': '.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$STRUCTURED,"idwil"),"WILAYAS"))),0,0,'C',1,0);
$pdf->Text(05,25,$pdf->nbrtostring("structure","id",$STRUCTURED,"structure"));	$pdf->Text(240,25," LE : ".date('d-m-Y')); 
$pdf->Text(05,30,"SEMEP");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->SetXY(5,35);$pdf->cell(290,5,html_entity_decode(utf8_decode("RELEVE DES CAUSES DE DECES ")),0,0,'C',0,0);
$pdf->SetXY(5,40);$pdf->cell(290,5,html_entity_decode(utf8_decode("Chapitre cim  : ".$pdf->nbrtostring("chapitre","IDCHAP",$SERVICEHOSPIT,"CHAP"))),0,0,'C',0,0);
$pdf->SetXY(5,45);$pdf->cell(290,5,html_entity_decode(utf8_decode("Ref : circulaire numero 607 du 24 septembre 1994  ")),0,0,'C',0,0);	
$h=55;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);
$pdf->cell(10,10,html_entity_decode(utf8_decode("N°")),1,0,1,'C',0);
$pdf->cell(20,10,html_entity_decode(utf8_decode("Date Décès")),1,0,1,'C',0);
$pdf->cell(70,10,"Nom_Prenom",1,0,1,'C',0);
$pdf->cell(10,10,"Sexe",1,0,1,'C',0);
$pdf->cell(20,10,"Nee le",1,0,1,'C',0);
$pdf->cell(10,10,"Age",1,0,1,'C',0);
$pdf->cell(45,10,"residence",1,0,1,'C',0);
$pdf->cell(20,10,"Admission",1,0,1,'C',0);
$pdf->cell(56,10,"Service ",1,0,1,'C',0);
$pdf->cell(15,10,"Duree",1,0,1,'C',0);
$pdf->cell(10,10,"CIM",1,0,1,'C',0);
$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);
$query = "SELECT * FROM deceshosp where CODECIM0=$SERVICEHOSPIT and STRUCTURED=$STRUCTURED  order by  DINS ";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$x=0;
while($row=mysql_fetch_object($resultat))
{
$x=$x+1;
$pdf->SetFillColor(200 );
$pdf->cell(10,5,$x,1,0,'C',0);
$pdf->cell(20,5,$pdf->dateUS2FR($row->DINS),1,0,'C',0);
$pdf->cell(70,5,trim($row->NOM).'_'.strtolower (trim($row->PRENOM)).' ['.strtolower (trim($row->FILSDE)).']',1,0,'L',0);
$pdf->cell(10,5,trim($row->SEX),1,0,'C',0);
$pdf->cell(20,5,$pdf->dateUS2FR($row->DATENAISSANCE),1,0,'C',0);
if ($row->Years > 0 ) 
{
$pdf->cell(10,5,$row->Years." A",1,0,'C',0);
} 
else 
{
if ($row->Days <= 30 ) 
{
$pdf->cell(10,5,$row->Days." J",1,0,'C',0);
} 
else
{
$pdf->cell(10,5,$row->Months." M",1,0,'C',0);
} 
}
$pdf->cell(45,5,$pdf->nbrtostring("com","IDCOM",$row->COMMUNER,"COMMUNE"),1,0,'L',0);
$pdf->cell(20,5,$pdf->dateUS2FR($row->DATEHOSPI),1,0,'C',0);
$pdf->cell(56,5,$row->MEDECINHOSPIT,1,0,'L',0);
$pdf->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'C',0);
$pdf->cell(10,5,html_entity_decode(utf8_decode($pdf->nbrtostring("CIM","row_id",$row->CODECIM,'diag_cod'))),1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200 );
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,'Dr '.$login,0,0,'L',0);
$pdf->Output("EPA_".$STRUCTURED.".PDF",'I');
?>