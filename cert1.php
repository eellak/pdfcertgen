<?php

require('tfpdf/tfpdf.php');
include('config.php'); 
include('conf_cert1.php'); 

class PDF extends tFPDF
{
// Page header
function Header() {
	//$this->SetLeftMargin(70);
	// Logo
	$this->Image('eellak.png',80,30,140);

	$this->SetFont('DejaVu','B',14);
	// Title
	$this->Text(140,70, 'www.ellak.gr');
	// Line break
	$this->Ln(50);
	// Title
	$this->Text(34,80, 'Βεβαίωση Παρακολούθησης της διημερίδας ');
	// Line break
	$this->Ln(10);
}

// Page footer
function Footer() {
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('DejaVu','',8);
	// Page number
  //n/ $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

// Instanciation of inherited class
$pdf = new PDF('L', 'mm', 'A4');
$pdf->setMargins(23, 44, 11.7);
// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->AddFont('DejaVu','B','DejaVuSansCondensed-Bold.ttf',true);
$pdf->AddFont('DejaVu','I','DejaVuSansCondensed-Oblique.ttf',true);
$pdf->AddFont('DejaVu','BI','DejaVuSansCondensed-BoldOblique.ttf',true);

$pdf->SetFont('DejaVu','',14);

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('DejaVu','',12);

//$pdf->SetLineStyle( array( 'width' => 15, 'color' => array(0,0,0)));
$pdf->SetLineWidth(3);
$pdf->SetDrawColor(245,130,32);
$pdf->Line(7,7,290,7); 

//	$pdf->Cell(0,10,"ΒΕΒΑΙΩΝΟΥΜΕ ΟΤΙ Ο {$tadename} - {$tadelast} ΠΑΡΑΚΟΛΟΥΘΗΣΕ ΤΗΝ ΔΙΗΜΕΡΙΔΑ ΜΑΣ",0,1, 'C');
$pdf->Cell(0,10,"Με το παρόν βεβαιώνεται ότι ο/η ",0,1, 'L');
$pdf->SetX(23);
$pdf->SetFont('DejaVu','BI',14);
$pdf->Cell(0,16,"{$fullname}",0,2, 'C'); // το fullname από την βάση δεδομένων
$pdf->SetX(23);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(0,10,"παρακολούθησε την εκδήλωση....",0,1, 'L');
$pdf->Cell(0,10,"που διοργανώθηκε από τον ....",0,1, 'L');
$pdf->Cell(0,10,"... το Σάββατο 30/05/2022 και την Κυριακή 31/05/2022.",0,1, 'L');
$pdf->Ln(8);
$pdf->Cell(0,10,"Εκ μέρους της Οργανωτικής Επιτροπής",0,1, 'R');
$pdf->Cell(0,10,"....υπογραφή....",0,1, 'R');
$pdf->Output("D","bebaiosh-parakolouthisis.pdf",true);  // όνομα αρχείου βεβαίωσης
?>