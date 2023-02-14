<?php
include_once('../BackEnd/db.php'); 

function fetch_data(){

}


include('../tcpdf/library/tcpdf.php');
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'beltie_logo.png';
        $this->Image($image_file, 10, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 25, 'BELTIE INTERNATIONAL UNIVERSITY', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(18);
        $this->SetX(30);
        $this->SetFont('helvetica', 'B', 14);
        $this->Cell(0, 25, 'Quality, Efficiency, Morality, Virtue', 0, false, 'C', 0, '', 0, false, 'M', 'M');
       
        $this->SetY(25);
        $this->SetX(30);
        $this->SetFont('helvetica', '', 12);
        $this->Cell(0, 25, '#54, Street 488, Sangkat Phsar Deum Thkov, Khan Chamka Mon, Phnom Penh.', 0, false, 'C', 0, '', 0, false, 'M', 'M');

        $this->SetY(35);
        $this->SetX(30);
        $this->SetFont('helvetica', 'B', 18);
        $this->Cell(0, 25, 'APPLICATION FORM FOR ADMISSION', 0, false, 'C', 0, '', 0, false, 'M', 'M');

        $this->SetY(42);
        $this->SetX(30);
        $this->SetFont('helvetica', '', 12);
        $this->Cell(0, 25, 'ACADEMIC YEAR: .... - .....', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }



    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

//write HTML
$tbl = <<<EOD
<br><br><br>
<div class="container">
<hr>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
//page01
$pdf->SetXY(155, 50);
$pdf->Image('../img/1.jpg', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

$tbl = <<<EOD
 <h1>Personal Detail</h1>
 <table>
    <tr>
      <td>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: normal">Hong Rakchhai</span></td>
      <td>Gender  &nbsp;&nbsp; <span style="font-weight: normal">Male</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
      <td>PASSPORT ID  &nbsp;&nbsp; <span style="font-weight: normal">N0123456</span></td>
      <td>NATIONALITY  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: normal">Cambodian</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
      <td>COUNTRY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: normal">Cambodia</span></td>
      <td>DATE OF BIRTH  &nbsp;&nbsp; <span style="font-weight: normal">01-02-2021</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
      <td>POB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: normal">Kampong Cham</span></td>
      <td>EMAIL &nbsp;&nbsp; <span style="font-weight: normal">example@gmail.com</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
      <td>Tel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: normal">0123456789</span></td>
      <td>CURRENT ADD&nbsp;&nbsp; <span style="font-weight: normal">Phnom Penh</span></td>
      <td></td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = <<<EOD
<h1>Family Background</h1>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>FATHER NAME</td>
        <td>FATHER AGE</td>
        <td>FATHER NATIONAL</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>FATHER COUNTRY</td>
        <td>FATHER OCCUPATION</td>
        <td>MOTHER NAME</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>MOTHER AGE</td>
        <td>MOTHER NATIONAL</td>
        <td>MOTHER COUNTRY</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>MOTHER OCCUPATION</td>
        <td>SPOUSE NAME</td>
        <td>SPOUSE AGE</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>FAMILY CURRENT ADDRESS</td>
        <td>GUARDIAN PHONE NUMBER</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
    </tr>

</table>



<h1>University Information</h1>
<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>FACULTY</td>
        <td>MAJOR</td>
        <td>CAMPUS</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>DEGREE</td>
        <td>ACADEMIC YEAR</td>
        <td>SEMESTER</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>YEAR</td>
        <td>BATCH</td>
        <td>SHIFT</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>PROGRAM TYPE</td>
        <td>START DATE</td>
        <td>END DATE</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">Seven Killer</span></td>
        <td><span style = "font-weight: normal">30</span></td>
        <td><span style = "font-weight: normal">Cambodian</span></td>
    </tr>

</table>


EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


// print a block of text using Write()


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('doc.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>