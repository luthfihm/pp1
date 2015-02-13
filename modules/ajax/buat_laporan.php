<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 13/02/2015
 * Time: 21:40
 */
require_once dirname(__FILE__)."/../models/keluhan.php";

require_once dirname(__FILE__)."/../../plugins/tcpdf/tcpdf.php";

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo-kota-bandung.jpg';
        $this->Image($image_file, 15, 10, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('times', 'B', 17);
        // Title
        $this->SetY(15);
        $this->SetX(50);
        $this->Cell(0, 10, 'PEMERINTAH KOTA BANDUNG', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(25);
        $this->SetX(50);
        $this->SetFont('times', 'B', 20);
        $this->Cell(0, 10, 'DINAS PEMAKAMAN DAN PERTAMANAN', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(35);
        $this->SetX(50);
        $this->SetFont('times', '', 12);
        $this->Cell(0, 10, 'JL. Ambon, No.1 A, Bandung, West Java, Indonesia, Telp (022) 4231921', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Line(10, 43, 200, 43);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Halaman '.$this->getAliasNumPage().' dari '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "SISTEM PENGADUAN TAMAN KOTA BANDUNG", "");

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();
$pdf->SetY(50);
$html = '
<h1 align="center">Laporan Keluhan Taman di Kota Bandung</h1>
<p align="center">Periode 1 Januari 2015 - 31 Januari 2015</p>
';

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output(dirname(dirname(dirname(__FILE__))).'/laporan/example.pdf', 'F');

//============================================================+
// END OF FILE
//============================================================+
echo "example.pdf";
?>