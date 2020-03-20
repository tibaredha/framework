<?php
$id=$_GET["uc"];
require('gav.php');
$pdf = new gav( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
$pdf->setRTL(false); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=155, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=5, $y=160, $w=200, $h=130, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$file = '../../public/images/mlegale/'.$id.'.jpg';
if (file_exists($file)){$pdf->Image('../../public/images/mlegale/'.$id.'.jpg', $x=6, $y=6, $w=198, $h=150, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array()); }
else{$pdf->Image('../../public/images/mlegale/mlegale.jpg', $x=6, $y=6, $w=198, $h=150, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array()); }
$pdf->SetFont('aefurat', '', 14);

$pdf->mysqlconnect();
$query = "select * from deceshosp WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,160);$pdf->Cell(200,5,"L'autopsie du cadavre : ".$result->NOM.'_'.$result->PRENOM.'_ ('.$result->FILSDE.')'.',âgé de '.$result->Years.'ans,a été pratiquée ce jour le',0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"suite à une Réquisition de Monsieur le Procureur de la République, prés le Tribunal de DJELFA,en date",0,1,'L');


$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"I / Commémoratifs",1,1,'C',1,0);

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"II / Examen externe",1,1,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Effets vestimentaires ",0,1,'L',0,1);
		$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Le cadavre a été présenté nu enveloppé dans un drap bleu d'hôpital ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Phénomènes cadavériques ",0,1,'L',0,1);
		$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Lividités postérieures marquées. ",0,1,'L',0,1);
	    $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Rigidités fixées. ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Inspection du corps  ",0,1,'L',0,1);
       $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Tête : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Visage : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Cou : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Thorax : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Abdomen : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Dos : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Membres supérieurs : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Membres inférieurs : ",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Région ano-rectale :",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Organes génitaux externes :",0,1,'L',0,1);
	   $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(200,5,"- Reste de l'examen :",0,1,'L',0,1);


$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 12);
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=155+130, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());	   
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"III / Examen interne",1,1,'C',1,0);
	
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Tête ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Cou  ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Thorax ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Abdomen ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Prélèvement ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Phénomènes cadavériques ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Phénomènes cadavériques ",0,1,'L',0,1);
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Phénomènes cadavériques ",0,1,'L',0,1);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"IV / Reconstitution du corps",1,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"V / Discussion",1,1,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"VI / Conclusion",1,1,'C',1,0);


$pdf->SetXY(105,$pdf->GetY()+5);$pdf->Cell(100,5,"Le medecin legiste ",1,1,'C',1,0);


$pdf->Output('declaration.pdf');
}
?>


