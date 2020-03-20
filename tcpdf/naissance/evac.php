<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');$pdf->SetFont('aefurat','B',13);$pdf->SetTextColor(0,0,0);
$pdf->mysqlconnect();
$query = "select * from naissance WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(245);
$nec =$result->id;//ROUGE NOIR $pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
$pdf->RoundedRect($x=4,  $y=4,   $w=202, $h=22, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());// $pdf->RoundedRect(4, 4, 202, 15, 2, $style = '');
$pdf->SetXY(5,5);$pdf->Cell(200,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+12);$pdf->Cell(200,6,"FICHE D'ÉVACUATION DE MALADE ENTRE ETABLISSEMENT DE SANTÉ",0,1,'C',1,0);
$pdf->SetFont('aefurat','B',12);
$pdf->Text(5,50,"Identification de l'établissement évacuateur : _________________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(85,50,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,60,"Date :________________");                     $pdf->Text(50,60," Heurs de départ : _________________________________________________________ ");
$pdf->Text(16,60,date('d/m/Y'));                                $pdf->Text(82,60,date('H:i'));



$pdf->Text(5,70,"Identification du service évacuateur : _______________________________________________________________"); 
$pdf->SetTextColor(255,0,0);$pdf->Text(70,70,"GYNECO-OBSTETRIQUE");$pdf->SetTextColor(0,0,0);
$pdf->Text(5,80,"Identification du médecin évacuateur : ______________________________________________________________");
$pdf->SetFont('aefurat','B',14);
$pdf->Text(70,90,"Renseignement sur le malade  ");
$pdf->SetFont('aefurat','B',12);
$pdf->Text(5,100,"Nom : ________________________________________________________________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(20,100,$result->NOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,110,"Prénom : ______________________________________________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(25,110,$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,120,"Nom et prénom de l'épouse : _______________________________________________________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(55,120,$result->NOM3.'_'.$result->PRENOM3);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,130,"Date et lieu de naissance : ______________");   $pdf->Text(80,130," à : _______________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(55,130,$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$pdf->SetTextColor(255,0,0);$pdf->Text(88,130,$pdf->nbrtostring("com","IDCOM",$result->COMMUNE2,"COMMUNE"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,140,"Adresse : ___________________________ "); $pdf->Text(80,140,"Wilaya : ___________________________________________________  ");
$pdf->SetTextColor(255,0,0);$pdf->Text(22,140,$result->ADRESSE4);$pdf->SetTextColor(0,0,0);
$pdf->SetTextColor(255,0,0);$pdf->Text(97,140,$pdf->nbrtostring("wil","IDWIL",$result->WILAYA4,"WILAYAS"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,150,"Caise de sécurité : CNAS /CASNOS /_____ ");          $pdf->Text(80,150," N° d'immatriculation : ________________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(120,150,$result->NSSMERE);$pdf->SetTextColor(0,0,0);

$pdf->Text(5,160,"Autres : _______________________________________________________________________________________");
$pdf->Text(5,170,"Renseingnements cliniques : _______________________________________________________________________ ");
$pdf->Text(5,180," ______________________________________________________________________________________________ ");
$pdf->Text(5,190,"Préstation dispensées : ____________________________________________________________________________ ");
$pdf->Text(5,200,"Motif d'évacuation : ______________________________________________________________________________ ");
$pdf->Text(5,210,"Identification de l'établissement d'acceuil : ____________________________________________________________");
$pdf->Text(5,220,"Moyens d'évacuation  : Ambulance _________________________________________________________________");
$pdf->Text(5,230,"Identification de ou des accompagnateurs et signature : __________________________________________________ ");
$pdf->SetFont('aefurat','U',12);
$pdf->Text(65,240,"Signatures de l'établissement évacuateur"); 
$pdf->Text(8,250,"Le médecin :");  $pdf->Text(80,250,"Le directeur de l'établissement :");$pdf->Text(160,250,"l'Auxiliaire médical :");


$pdf->AddPage('p','A4');$pdf->SetFont('aefurat','B',13);$pdf->SetTextColor(0,0,0);
$pdf->RoundedRect($x=4,  $y=4,   $w=202, $h=26, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());// $pdf->RoundedRect(4, 4, 202, 15, 2, $style = '');
$pdf->SetXY(5,5);$pdf->Cell(200,6,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->dspfr.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"FICHE DE RECEPTION DE MALADE ",0,1,'C',1,0);
$pdf->SetFont('aefurat','B',12);
$pdf->Text(5,50,"Identification de l'établissement d'accueil :___________________________________________________________"); 
$pdf->Text(5,60,"_____________________________________________________________________________________________"); 
$pdf->Text(5,70,"_____________________________________________________________________________________________"); 
$pdf->Text(5,80,"_____________________________________________________________________________________________"); 
$pdf->Text(5,90,"Date : ____________________________________"); 
$pdf->Text(95,90,"Heure d'arrivée du malade évacué : ______________________"); 
$pdf->Text(5,100,"Identification du service d'accueil : _________________________________________________________________"); 
$pdf->Text(5,110,"Identification du médecin d'accueil : ________________________________________________________________"); 
$pdf->SetFont('aefurat','B',14);
$pdf->Text(70,120,"Renseignement sur le malade ");
$pdf->SetFont('aefurat','B',12);
$pdf->Text(5,130,"Nom : ______________________________________ ");$pdf->Text(100,130,"Prénom : _________________________________________"); 
$pdf->SetTextColor(255,0,0);$pdf->Text(17,130,$result->NOM2);$pdf->Text(117,130,$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,140,"Date et lieu de naissance : ________________________________________________________________________");  
$pdf->SetTextColor(255,0,0);$pdf->Text(50,140,$pdf->dateUS2FR($result->DATENS2).'_'.$pdf->nbrtostring("com","IDCOM",$result->COMMUNE2,"COMMUNE"));$pdf->SetTextColor(0,0,0);  
$pdf->Text(5,150,"Adresse : _____________________________________________________________________________________"); 
$pdf->SetTextColor(255,0,0);$pdf->Text(23,150,$result->ADRESSE4.'_'.$pdf->nbrtostring("wil","IDWIL",$result->WILAYA4,"WILAYAS"));$pdf->SetTextColor(0,0,0); 
$pdf->Text(5,160,"Etat du malade a l'arrivée : Vivant ________________________________________");  $pdf->Text(150,160,"Décédé __________________"); 
$pdf->SetFont('aefurat','U',12);
$pdf->Text(65,180,"Signature de l'étalibssement d'accueil "); 
$pdf->Text(5,190,"Le médecin : "); $pdf->Text(80,190,"Le Directeur de garde : ");   $pdf->Text(160,190,"Le surveillant : "); 
$pdf->SetTextColor(225,0,0);
}


// $pdf->Text(18,130,$NOM);
// $pdf->Text(118,130,$PRENOM);
// $pdf->Text(58,140,$pdf->dateUS2FR($DATENAISSANCE));
///$pdf->Text(90,140,"A: ".$pdf->nbrtostring("grh","com","IDCOM",$COMMUNE,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("grh","wil","IDWIL",$WILAYA,"WILAYAS"));
//$pdf->Text(25,150,$pdf->nbrtostring("grh","com","IDCOM",$COMMUNER,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("grh","wil","IDWIL",$WILAYAR,"WILAYAS"));

//$pdf->Text(85,70,$pdf->nbrtostring("grh","SERVICE","ids",$SERVICEHOSP,"servicefr")); 
//$pdf->Text(85,80,"Dr  ".$_SESSION["USER"]);
//$pdf->Text(18,100,$NOM);
//$pdf->Text(23,110,$PRENOM);
//$pdf->Text(56,130,$pdf->dateUS2FR($DATENAISSANCE));
/////$pdf->Text(90,130,$pdf->nbrtostring("grh","com","IDCOM",$COMMUNE,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("grh","wil","IDWIL",$WILAYA,"WILAYAS"));
// $pdf->Text(25,140,$pdf->nbrtostring("grh","com","IDCOM",$COMMUNER,"COMMUNE"));
// $pdf->Text(100,140,$pdf->nbrtostring("grh","wil","IDWIL",$WILAYAR,"WILAYAS"));
// $pdf->Text(42,150,$CSS);         $pdf->Text(126,150,$NIMM);
// $pdf->Text(62,170,$RC);
// $pdf->Text(50,190,$PD);
// $pdf->Text(50,200,$MEVAC);
// $pdf->Text(92,210,$IEA);
// $pdf->Text(52,220,"Ambulance ");
// $pdf->Text(115,230,$IACOMP);
// $pdf->SetTextColor(0,0,0);
// $IDP=$_POST["id"]; 
// $NOM=$_POST["NOM"];             
// $PRENOM=$_POST["PRENOM"];        
// $SEXE=$_POST["SEXE"];                  
// $DATENAISSANCE=$_POST["DATENAISSANCE"];
// $AGE=$_POST["AGE"];
// $FILS=$_POST["FILS"];
// $ETDE=$_POST["ETDE"];
// $COMMUNE=$_POST["COMMUNE"];
// $WILAYA=$_POST["WILAYA"];
// $COMMUNER=$_POST["COMMUNER"];
// $WILAYAR=$_POST["WILAYAR"];
// $ADRESSE=$_POST["ADRESSE"];
// $SERVICEHOSP=$_POST["SERVICEHOSP"];
// $PRATICIEN=$_POST["PRATICIEN"];
// $DATE=$_POST["DATE"];
// $HEURE=$_POST["HEURE"];
// $dateeuro=date('d/m/Y');
// $dateeuro1=;
// $CSS=$_POST["1"];//Caise de sécurité:
// $NIMM=$_POST["2"];//N° d'immatriculation
// $RC=$_POST["3"];//Renseingnement cliniques:
// $PD=$_POST["4"];//Préstation dispensées
// $MEVAC=$_POST["5"];//Motif d'évacuation:
// $IEA=$_POST["6"];//Identification de l'établissement d'acceuil 
// $IACOMP=$_POST["7"];//Identification de ou des accompagnateurs et signature
// require_once('../tcpdf/GP.php');
// $pdf = new GP('P', 'mm', 'A4', true, 'UTF-8', false);
// $pdf->setPrintHeader(false);
// $pdf->setPrintFooter(false);
// $dateeuro=date('d/m/Y');
// $dateeuro1=date('H:i');
////1ERE PAGE
// $pdf->AddPage('p','A4');
// $pdf->SetDisplayMode('fullpage','two');//mode d affichage
// $pdf->SetFont('aefurat','B',12);
// $pdf->RoundedRect(4, 5, 202, 30, 2, $style = '');  $pdf->RoundedRect(5, 6, 202, 30, 2, $style = '');
// $pdf->RoundedRect(4, 45, 202, 240, 2, $style = '');$pdf->RoundedRect(5, 46, 202, 240, 2, $style = '');
// $pdf->Text(50,5,"Minstére de la Santé de la Population et de réforme hospitaliére ");
// $pdf->Text(50,10,"Direction de la Santé et de la Population de la Wilaya de Djelfa ");
// $pdf->Text(65,15,"Etablissement public hospitalier d'Ain oussera  ");
// $pdf->SetFont('aefurat','B',16);
// $pdf->Text(40,23,"Fiche D'évacuation De Malade Entre Etablissement De Santé  ");
// $pdf->SetFont('aefurat','B',14);
// $pdf->Text(5,50,"Identification de l'établissement évacuateur : EPH AIN OUSSERA WILAYA DE DJELFA ");
// $pdf->Text(5,60,"Date : ".$dateeuro);                     $pdf->Text(50,60," Heurs de départ : ".$dateeuro1);
// $pdf->Text(5,70,"Identification du service évacuateur:"); 
// $pdf->Text(5,80,"identification du médecin évacuateur:");
// $pdf->Text(70,90,"Renseignement sur le malade  ");
// $pdf->Text(5,100,"Nom:");
// $pdf->Text(5,110,"Prénom:");
// $pdf->Text(5,120,"Nom de l'épouse: ");
// $pdf->Text(5,130,"Date et lieu de naissance:");   $pdf->Text(80,130," à:");
// $pdf->Text(5,140,"Adresse: ");                    $pdf->Text(80,140,"Wilaya:  ");
// $pdf->Text(5,150,"Caise de sécurité: ");          $pdf->Text(80,150," N° d'immatriculation: ");
// $pdf->Text(5,160,"Autre : ");
// $pdf->Text(5,170,"Renseingnement cliniques: ");
// $pdf->Text(5,190,"Préstation dispensées : ");
// $pdf->Text(5,200,"Motif d'évacuation: ");
// $pdf->Text(5,210,"Identification de l'établissement d'acceuil : ");
// $pdf->Text(5,220,"Moyens d'évacuation  : ");
// $pdf->Text(5,230,"Identification de ou des accompagnateurs et signature :  ");
// $pdf->Text(90,240,"Signatures "); 
// $pdf->Text(8,250,"Le médecin  ");  $pdf->Text(80,250,"Le directeur de l'établissement : ");$pdf->Text(160,250,"l'Auxiliaire médical: ");
// $pdf->Text(8,255,"Dr  ".$_SESSION["USER"]);
// $pdf->SetFont('aefurat','B',14);
// $pdf->SetTextColor(225,0,0);
// $pdf->Text(85,70,$pdf->nbrtostring("grh","SERVICE","ids",$SERVICEHOSP,"servicefr")); 
// $pdf->Text(85,80,"Dr  ".$_SESSION["USER"]);
// $pdf->Text(18,100,$NOM);
// $pdf->Text(23,110,$PRENOM);
// $pdf->Text(56,130,$pdf->dateUS2FR($DATENAISSANCE));
/////$pdf->Text(90,130,$pdf->nbrtostring("grh","com","IDCOM",$COMMUNE,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("grh","wil","IDWIL",$WILAYA,"WILAYAS"));
// $pdf->Text(25,140,$pdf->nbrtostring("grh","com","IDCOM",$COMMUNER,"COMMUNE"));
// $pdf->Text(100,140,$pdf->nbrtostring("grh","wil","IDWIL",$WILAYAR,"WILAYAS"));
// $pdf->Text(42,150,$CSS);         $pdf->Text(126,150,$NIMM);
// $pdf->Text(62,170,$RC);
// $pdf->Text(50,190,$PD);
// $pdf->Text(50,200,$MEVAC);
// $pdf->Text(92,210,$IEA);
// $pdf->Text(52,220,"Ambulance ");
// $pdf->Text(115,230,$IACOMP);
// $pdf->SetTextColor(0,0,0);
///2EME PAGE
// $pdf->AddPage('p','A4');
// $pdf->RoundedRect(4, 5, 202, 285, 2, $style = '');$pdf->RoundedRect(5, 6, 202, 285, 2, $style = '');
// $pdf->SetFont('aefurat','B',12);
// $pdf->Text(55,10,"République Algerienne Démocratique et Populaire "); 
// $pdf->Text(40,20,"Ministére de la Santé de la Population et de la Réforme Hospitaliére"); 
// $pdf->SetFont('aefurat','B',14);
// $pdf->Text(55,35,"FICHE DE RECEPTION DE MALADE "); 
// $pdf->SetFont('aefurat','B',14);
// $pdf->Text(5,50,"Identification de l'établissement d'accueil :------------------------------------------------------------------"); 
// $pdf->Text(5,60,"----------------------------------------------------------------------------------------------------------------------"); 
// $pdf->Text(5,70,"----------------------------------------------------------------------------------------------------------------------"); 
// $pdf->Text(5,80,"----------------------------------------------------------------------------------------------------------------------"); 
// $pdf->Text(5,90,"Date :------------------------------------------------"); 
// $pdf->Text(95,90,"Heure d'arrivée du malade évacué :-------------------"); 
// $pdf->Text(5,100,"Identification du service d'accueil :------------------------------------------------------------------------------"); 
// $pdf->Text(5,110,"Identification du médecin d'accueil :----------------------------------------------------------------------------"); 
// $pdf->Text(65,120,"Renseignement sur le malade "); 
// $pdf->Text(5,130,"Nom: ");                   $pdf->Text(100,130,"Prénom:"); 
// $pdf->Text(5,140,"Date et lieu de naissance:");  
// $pdf->Text(5,150,"Adresse :"); 
// $pdf->Text(5,160,"Etat du malade a l'arrivée : Vivant  -------------");  $pdf->Text(150,160,"Décédé -----------"); 
// $pdf->Text(65,180,"Signature de l'étalibssement d'accueil "); 
// $pdf->Text(5,190,"Le médecin ");         $pdf->Text(160,190,"Le surveillant "); 
// $pdf->Text(90,210,"Le Directeur");  
///
// $pdf->SetTextColor(225,0,0);
// $pdf->Text(18,130,$NOM);
// $pdf->Text(118,130,$PRENOM);
// $pdf->Text(58,140,$pdf->dateUS2FR($DATENAISSANCE));
/////$pdf->Text(90,140,"A: ".$pdf->nbrtostring("grh","com","IDCOM",$COMMUNE,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("grh","wil","IDWIL",$WILAYA,"WILAYAS"));
// $pdf->Text(25,150,$pdf->nbrtostring("grh","com","IDCOM",$COMMUNER,"COMMUNE")." wilaya de : ".$pdf->nbrtostring("grh","wil","IDWIL",$WILAYAR,"WILAYAS"));
// $pdf->SetTextColor(0,0,0);
/////
$pdf->Output();
?>