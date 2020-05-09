<?php
// $ID=$_GET["uc"];
require('deces.php');
$pdf = new deces( );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->setRTL(true);

$pdf->setSourceFile('decesfrx.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(64,30.5);$pdf->Write(0,'بليليبليبليب : ');
$pdf->SetTextColor(255,0,0);
$pdf->Output();
?>