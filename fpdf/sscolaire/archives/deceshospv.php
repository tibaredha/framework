<?php
require('deces.php');
$pdf = new deces();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('decesfrx.pdf');
$tplIdx = $pdf->importPage(14);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(28,63);$pdf->Write(0,$_GET["wil"]);
$pdf->SetXY(32,69);$pdf->Write(0,$_GET["com"] );
$pdf->Output("verso.pdf","I");
?>