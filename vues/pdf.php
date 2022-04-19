<?php
  function creerPdf($tab) {
require("fpdf/fpdf.php");

// Instanciation de la classe d�riv�e
$pdf = new FPDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Image("images/conservatoire.png", 48, 35, 110,60);

    $pdf->Cell(50,50,$tab["nomAd"],0,1);
    $pdf->Cell(50,50,$tab["prenomAd"],0,1);
    $pdf->Cell(50,50,$tab["nomProf"],0,1);
    $pdf->Cell(50,50,$tab["prenomProf"],0,1);
    $pdf->Cell(50,50,$tab["instru"],0,1);
    

ob_clean();
$pdf->Output();

  }
?>

