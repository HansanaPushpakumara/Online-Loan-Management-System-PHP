<?php 
	require 'fpdf/fpdf.php';
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Aril','B',15);
	$pdf->Cell(10,10,'piumi',1,0,'c');
	$pdf->Output();

 ?>