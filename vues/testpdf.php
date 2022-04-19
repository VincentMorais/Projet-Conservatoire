<?php

FUNCTION creerPdf($Inscription){
    require("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf ->SetLineWidth(1.5);
// Titres des colonnes
$header = array('nomAd', 'prenomAd', 'nomProf', 'prenomProf', 'instru');
// Chargement des données
//$data = $pdf->LoadData('pays.txt');
$pdf->AddPage();

$pdf->SetFont('Courier','BIU',18);
$pdf ->Cell(180,10,'le conservatoire','LTRB', '0', 'C');
$pdf-> Ln();
$pdf->SetFont('Helvetica','BI',16);
$pdf ->Cell(40,15,'Le conservatoire de musique pour monter en competence');


$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();

//$pdf->Image('../images/conservatoires.jpg',48,35, 110, 60);

$pdf ->SetLineWidth(0.7);
$pdf ->Line(0, 100, 220, 100);

$pdf->SetFont('Arial','',13);
$pdf -> cell(40, 10, 'Voici un recapitulatif de votre inscription:',0, 0, 2);

$pdf-> Ln();
$pdf ->SetLineWidth(0.2);
$pdf->SetFont('Times','B',16);
$w = array(30, 30, 30, 60, 30);
// En-tête
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
// Données


$pdf->Output();


}
?>