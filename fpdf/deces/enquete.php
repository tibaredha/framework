<?php
require('deces.php');
$pdf = new deces();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('corona.pdf');
$tplIdx = $pdf->importPage(38);
$pdf->useTemplate($tplIdx, 5, 5, 200);

$pdf->AddPage();
$pdf->setSourceFile('corona.pdf');
$tplIdx = $pdf->importPage(39);
$pdf->useTemplate($tplIdx, 5, 5, 200);

$pdf->AddPage();
$pdf->setSourceFile('corona.pdf');
$tplIdx = $pdf->importPage(40);
$pdf->useTemplate($tplIdx, 5, 5, 200);







$pdf->Output();


?>