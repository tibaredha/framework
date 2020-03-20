<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
// $pdf->setRTL(true); 
$pdf->RoundedRect($x=5,  $y=5,   $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(245);
$nec =$result->id;//ROUGE NOIR $pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(5,$pdf->GetY()-5);$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,5,"Etablissement public ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C');
$pdf->SetFont('aefurat', '', 22);
$pdf->SetXY(6,$pdf->GetY());$pdf->Cell(190,10,"DEMANDE DE PRODUITS SANGUINS",0,1,'C',1,0);
$pdf->SetFont('aefurat','B',10);
$pdf->Text(5,40,"Nom : ");$pdf->SetTextColor(255,0,0);$pdf->Text(15,40,$result->NOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(45,40,"Prénom : ");$pdf->SetTextColor(255,0,0);$pdf->Text(58,40,$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(91,40,"Date de naissance : ");$pdf->SetTextColor(255,0,0);$pdf->Text(118,40,$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$A= date('Y')- substr($result->DATENS2,0,4);
$pdf->Text(156,40,"Age : ");$pdf->SetTextColor(255,0,0);$pdf->Text(166,40,$A);$pdf->SetTextColor(0,0,0);
$pdf->Text(180,40,"Sexe : ");$pdf->SetTextColor(255,0,0);$pdf->Text(190,40,"F");$pdf->SetTextColor(0,0,0);
$pdf->Text(5,50,"Service : ________________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(20,50,$pdf->nbrtostring("servicedeces","id",$result->SERVI,"service"));   $pdf->SetTextColor(0,0,0);
$pdf->Text(91,50,"Matricule : ___________________________");$pdf->SetTextColor(255,0,0);          $pdf->Text(108,50,$result->MATRI);  $pdf->SetTextColor(0,0,0);
$pdf->Text(156,50,"Dossier : ______________");$pdf->SetTextColor(255,0,0);                        $pdf->Text(170,50,$result->NDOSS); $pdf->SetTextColor(0,0,0);


$pdf->Text(5,60,"Groupage : _______________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(25,60,$result->GROUPAGE); $pdf->SetTextColor(0,0,0);
$pdf->Text(91,60,"Rhésus : _____________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(105,60,$result->RH); $pdf->SetTextColor(0,0,0);
$pdf->Text(156,60,"Phénotype : ____________");$pdf->SetTextColor(255,0,0);$pdf->Text(175,60,"C c / D d / E e"); $pdf->SetTextColor(0,0,0);

$pdf->Rect(5, 66, 191, 40 ,"d");
$pdf->Text(7,72-4,"Diagnostic et motif de la transfusion : ________________________________________________________________________");
$pdf->Text(7,80-4,"Polytransfusé : Oui Non _____________________________________ ");
$pdf->Text(110,80-4,"Date de la dernière transfusion : ___________________");
$pdf->Text(7,88-4,"Date de la dernière RAI : _____________________________________");
$pdf->Text(110,88-4,"Résultats : _____________________________________ ");
$pdf->Text(7,96-4,"Réactions transfusionnelles antérieures Oui/ Non __________________");
$pdf->Text(110,96-4,"Types : _______________________________________");
$pdf->Text(7,104-4,"Nombre de grossesses antérieures : ___________________________________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(70,104-4,"G ".$result->GESTE."  P ".$result->PARITE."   ABRT ".$result->ABRT);$pdf->SetTextColor(0,0,0);

$pdf->SetXY(5,107);$pdf->Cell(63,8,'PRODUITS DEMANDE',0,1,'C',1,0);                $pdf->SetXY(69,107);$pdf->Cell(63,8,'QUANTITE',0,1,'C',1,0);$pdf->SetXY(133,107);$pdf->Cell(63,8,'QUALIFICATION',0,1,'C',1,0);
$pdf->SetFont('aefurat','B',10);
$pdf->Rect(5, 116, 63, 54 ,"d");                                               $pdf->Rect(69, 116, 63, 54 ,"d");                        $pdf->Rect(133, 116, 63, 54 ,"d");
$pdf->Text(7,120-4,"O");$pdf->Text(14,120-4,"Sang total");                     $pdf->Text(95,120-4,"_____");                              $pdf->Text(135,120-4,"O");$pdf->Text(140,120-4,"Phénotype");
$pdf->Text(7,128-4,"O");$pdf->Text(14,128-4,"Concentré érythrocytaire");       $pdf->Text(95,128-4,"_____");                              $pdf->Text(135,128-4,"O");$pdf->Text(140,128-4,"Déleucocyté");
$pdf->Text(7,136-4,"O");$pdf->Text(14,136-4,"Concentré plaquettaire standard");$pdf->Text(95,136-4,"_____");                              $pdf->Text(135,136-4,"O");$pdf->Text(140,136-4,"Lavé ");
$pdf->Text(7,144-4,"O");$pdf->Text(14,144-4,"Concentré unitaire plaquettaire");$pdf->Text(95,144-4,"_____");                              $pdf->Text(135,144-4,"O");$pdf->Text(140,144-4,"Autres");
$pdf->Text(7,152-4,"O");$pdf->Text(14,152-4,"PFC");                            $pdf->Text(95,152-4,"_____");
$pdf->Text(7,160-4,"O");$pdf->Text(14,160-4,"Cryoprécipité");                  $pdf->Text(95,160-4,"_____");
$pdf->Text(7,168-4,"O");$pdf->Text(14,168-4,"Autres");                         $pdf->Text(95,168-4,"_____");

$pdf->SetXY(5,171);$pdf->Cell(63,8,'MEDECIN PRESCRIPTEUR',0,1,'C',1,0);$pdf->SetXY(69,171);$pdf->Cell(30,8,'TELEPHONE',0,1,'C',1,0);$pdf->SetXY(100,171);$pdf->Cell(32,8,'SIGNATURE',0,1,'C',1,0);$pdf->SetXY(133,171);$pdf->Cell(63,8,'CACHET',0,1,'C',1,0);
$pdf->SetXY(5,180);$pdf->Cell(63,13,"____",1,1,'C');                   $pdf->SetXY(69,180);$pdf->Cell(30,13,"____",1,1,'C');        $pdf->SetXY(100,180);$pdf->Cell(32,13,"____",1,1,'C');        $pdf->SetXY(133,180);$pdf->Cell(63,13,"____",1,1,'C');                 

$pdf->Text(160,200,"Date ".date('d-m-Y'));
$pdf->Text(10,208," Joindre à la demande ");
$pdf->Text(70,208," - Carte de groupe sanguin ");
$pdf->Text(70,216," - Echantillon de sang du malade pour test de compatibilité  ");
$pdf->Text(10,224," Numéros des Unités distribuées ");
$pdf->Text(11,232,"-----------        -----------         ----------- ");
$pdf->Text(70,232," Date : ".date('d-m-Y'));
$pdf->Text(120,232,"Nom et Signature du porteur ");
$pdf->Text(11,240,"-----------        -----------         ----------- ");
$pdf->Text(11,248,"-----------        -----------         ----------- ");
$pdf->SetFont('aefurat','B',8);
$pdf->Line(10 ,253 ,200 ,253 ); 
$pdf->Text(10,256,"- Avant toute transfusion , S'assurer que  les unités à transfuser correspondent à ceux inscrites sur la présente demande.");
$pdf->Text(10,262,"- Effectuer le contrôle prétransfusionnel ultime au lit du malade. ");
$pdf->Text(10,268,"- Consigner toute transfusion d'un produit sanguin sur le registre transfusionnel du service et sur la fiche transfusionnelle du receveur");
$pdf->Line(10 ,275 ,200 ,275 ); 

$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 13);
$pdf->RoundedRect($x=5,  $y=5,   $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->SetXY(5,$pdf->GetY()-5);$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,5,"Etablissement public ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C');
$pdf->SetFillColor(245);$pdf->SetFont('aefurat', '', 22);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(190,10,"FICHE TRANSFUSIONNELLE",0,1,'C',1,0);
$pdf->SetFont('aefurat','B',10);
$pdf->Text(5,40,"Nom : ");$pdf->SetTextColor(255,0,0);$pdf->Text(15,40,$result->NOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(45,40,"Prénom : ");$pdf->SetTextColor(255,0,0);$pdf->Text(58,40,$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(91,40,"Date de naissance : ");$pdf->SetTextColor(255,0,0);$pdf->Text(118,40,$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$A= date('Y')- substr($result->DATENS2,0,4);
$pdf->Text(156,40,"Age : ");$pdf->SetTextColor(255,0,0);$pdf->Text(166,40,$A);$pdf->SetTextColor(0,0,0);
$pdf->Text(180,40,"Sexe : ");$pdf->SetTextColor(255,0,0);$pdf->Text(190,40,"F");$pdf->SetTextColor(0,0,0);
$pdf->Text(5,50,"Service : ________________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(20,50,$pdf->nbrtostring("servicedeces","id",$result->SERVI,"service"));   $pdf->SetTextColor(0,0,0);
$pdf->Text(91,50,"Matricule : ___________________________");$pdf->SetTextColor(255,0,0);          $pdf->Text(108,50,$result->MATRI);  $pdf->SetTextColor(0,0,0);
$pdf->Text(156,50,"Dossier : ______________");$pdf->SetTextColor(255,0,0);                        $pdf->Text(170,50,$result->NDOSS); $pdf->SetTextColor(0,0,0);
$pdf->Text(5,60,"Groupage : _______________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(25,60,$result->GROUPAGE); $pdf->SetTextColor(0,0,0);
$pdf->Text(91,60,"Rhésus : _____________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(105,60,$result->RH); $pdf->SetTextColor(0,0,0);
$pdf->Text(156,60,"Phénotype : ____________");$pdf->SetTextColor(255,0,0);$pdf->Text(175,60,"C c / D d / E e"); $pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat','',10);
$h=70;
$pdf->SetXY(05,$h);$pdf->cell(19,10,"Date",0,1,'C',1,0);
$pdf->SetXY(25,$h);$pdf->cell(19,10,"Heure",0,1,'C',1,0);
$pdf->SetXY(45,$h);$pdf->cell(44,10,"Produits transfusés",0,1,'C',1,0);
$pdf->SetXY(90,$h);$pdf->cell(29,10,"Référence",0,1,'C',1,0);
$pdf->SetXY(120,$h);$pdf->cell(39,10,"Médecin",0,1,'C',1,0);
$pdf->SetXY(160,$h);$pdf->cell(38,10,"Observation",0,1,'C',1,0);

$pdf->SetXY(05,82);
for($i=0; $i <15; $i++)
{
$pdf->SetXY(05,$pdf->GetY());$pdf->cell(19,10,"",1,1,'C');
$pdf->SetXY(25,$pdf->GetY()-10);$pdf->cell(19,10,"",1,1,'C');
$pdf->SetXY(45,$pdf->GetY()-10);$pdf->cell(44,10,"",1,1,'C');
$pdf->SetXY(90,$pdf->GetY()-10);$pdf->cell(29,10,"",1,1,'C');
$pdf->SetXY(120,$pdf->GetY()-10);$pdf->cell(39,10,"",1,1,'C'); 
$pdf->SetXY(160,$pdf->GetY()-10);$pdf->cell(38,10,"",1,1,'C');
$pdf->SetXY(5,$pdf->GetY());
}
$pdf->SetFont('aefurat','',14);
$pdf->SetXY(75,$pdf->GetY()+10);$pdf->cell(125,05,"Structure de transfusion sanguine ",0,0,'C',0);
}
$pdf->Output();






?>


