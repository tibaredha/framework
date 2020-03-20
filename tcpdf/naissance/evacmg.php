<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');$pdf->SetFont('aefurat','B',12);$pdf->SetTextColor(0,0,0);
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
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,6,"FICHE DE LIAISON",0,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"ENTRE ETABLISSEMENT DE SANTÉ DANS LE CAS D'EVACUATION OU TRASNFERT DE MALADE",0,1,'C',1,0);
$pdf->SetFont('aefurat','B',12);


$pdf->RoundedRect($x=4,  $y=50,   $w=202, $h=18, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());// $pdf->RoundedRect(4, 4, 202, 15, 2, $style = '');
$pdf->Text(5,50,"Identification de l'établissement évacuateur (Nom et Adresse exacte)");
$pdf->Text(10,$pdf->GetY()+5,"- Public : ___________________________________________________________________________________");$pdf->SetTextColor(255,0,0);$pdf->Text(28,$pdf->GetY(),$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structure"));$pdf->SetTextColor(0,0,0);
$pdf->Text(10,$pdf->GetY()+5,"- Privé  : ___________________________________________________________________________________");
$pdf->Text(5,$pdf->GetY()+5,"");
$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+3,   $w=202, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+5,"Date :________________"); $pdf->Text(50,$pdf->GetY()," Heurs de départ de l'évacuation : ____________________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(16,$pdf->GetY(),date('d/m/Y'));           $pdf->Text(108,$pdf->GetY(),date('H:i'));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"");
$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+3,   $w=202, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+5,"Identification du service évacuateur : _______________________________________________________________"); 
$pdf->SetTextColor(255,0,0);$pdf->Text(70,$pdf->GetY(),"GYNECO-OBSTETRIQUE");$pdf->SetTextColor(0,0,0);

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+8,   $w=202, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Identification du médecin évacuateur : ______________________________________________________________");
$pdf->Text(5,$pdf->GetY()+5,"_____________________________________________________________________________________________");
$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+8,   $w=202, $h=50, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Renseignement sur le malade  ");
$pdf->Text(5,$pdf->GetY()+5,"Nom : ______________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(20,$pdf->GetY(),$result->NOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(100,$pdf->GetY(),"Prénom : ________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(120,$pdf->GetY(),$result->PRENOM2);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"Nom et prénom de l'épouse : _____________________________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(55,$pdf->GetY(),$result->NOM3.'_'.$result->PRENOM3);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"Date et lieu de naissance : ______________");   $pdf->Text(80,$pdf->GetY()," à : ______________________________________________________");
$pdf->SetTextColor(255,0,0);$pdf->Text(55,$pdf->GetY(),$pdf->dateUS2FR($result->DATENS2));$pdf->SetTextColor(0,0,0);
$pdf->SetTextColor(255,0,0);$pdf->Text(88,$pdf->GetY(),$pdf->nbrtostring("com","IDCOM",$result->COMMUNE2,"COMMUNE"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"Adresse : _____________________________________________________________________________________ "); 
$pdf->SetTextColor(255,0,0);$pdf->Text(22,$pdf->GetY(),$result->ADRESSE4);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"Wilaya : ______________________________________________________________________________________  ");
$pdf->SetTextColor(255,0,0);$pdf->Text(22,$pdf->GetY(),$pdf->nbrtostring("wil","IDWIL",$result->WILAYA4,"WILAYAS"));$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"Caise de sécurité : CNAS /CASNOS /_______________________________________________________________ ");          
$pdf->Text(5,$pdf->GetY()+5,"N° d'immatriculation : ___________________________________________________________________________ ");
$pdf->SetTextColor(255,0,0);$pdf->Text(45,$pdf->GetY(),$result->NSSMERE);$pdf->SetTextColor(0,0,0);
$pdf->Text(5,$pdf->GetY()+5,"Autres : _______________________________________________________________________________________");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+8,   $w=202, $h=30, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Renseingnements cliniques : _______________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+8,   $w=202, $h=30, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Traitement recus : ____________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+8,   $w=202, $h=30, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Motif d'évacuation : ______________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+8,   $w=202, $h=30, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Identification de l'établissement d'acceuil : ____________________________________________________________");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");

$pdf->AddPage('p','A4');$pdf->SetFont('aefurat','B',12);$pdf->SetTextColor(0,0,0);
//$pdf->RoundedRect($x=4,  $y=4,   $w=202, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());// $pdf->RoundedRect(4, 4, 202, 15, 2, $style = '');
$pdf->RoundedRect($x=4,  $y=$pdf->GetY()-6,   $w=202, $h=25, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY(),"Moyens d'évacuation  : immatriculation de l'Ambulance _________________________________________________");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=30, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Identification de ou des accompagnateurs et signature : __________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=60, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(18,$pdf->GetY()+15,"Le médecin :"); $pdf->Text(90,$pdf->GetY(),"Le directeur de l'établissement ou son representant:");
$pdf->Text(18,$pdf->GetY()+5,"Nom griffe et Signature"); $pdf->Text(90,$pdf->GetY()+5,"Le directeur de garde ou le directeur médical"); $pdf->Text(90,$pdf->GetY()+5,"Nom griffe et Signature");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+49,   $w=202, $h=20, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+50,"Identification de l'établissement d'accueil :___________________________________________________________");
$pdf->Text(10,$pdf->GetY()+5,"- Public : ___________________________________________________________________________________");
$pdf->Text(10,$pdf->GetY()+5,"- Privé  : ___________________________________________________________________________________");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Date :________________"); $pdf->Text(50,$pdf->GetY()," Heurs de départ de l'évacuation : ____________________________________________ ");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Identification du service évacuateur : _______________________________________________________________"); 
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Identification du médecin évacuateur : ______________________________________________________________");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Etat du malade a l'arrivée");  
$pdf->Text(5,$pdf->GetY()+5,"Vivant ________________________________________");  $pdf->Text(150,$pdf->GetY(),"Décédé __________________"); 

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(5,$pdf->GetY()+10,"Identification de l'acompagnateur et signature : ________________________________________________________");
$pdf->Text(5,$pdf->GetY()+5," ______________________________________________________________________________________________ ");

$pdf->RoundedRect($x=4,  $y=$pdf->GetY()+9,   $w=202, $h=70, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->Text(18,$pdf->GetY()+15,"Le médecin :"); $pdf->Text(90,$pdf->GetY(),"Le directeur de l'établissement ou son representant:");
$pdf->Text(18,$pdf->GetY()+5,"Nom griffe et Signature"); $pdf->Text(90,$pdf->GetY()+5,"Le directeur de garde ou le directeur médical"); $pdf->Text(90,$pdf->GetY()+5,"Nom griffe et Signature");

}



$pdf->Output();
?>