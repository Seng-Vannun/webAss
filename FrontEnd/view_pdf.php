<?php
require_once('../BackEnd/db.php');
$StudentEditID = $_GET['ViewID'];
$sqlSex = "select * from tblsex";
$resultSex = mysqli_query($conn, $sqlSex);
$sqlNationality = "select * from tblnationality";
$resultNationality = mysqli_query($conn, $sqlNationality);
$sqlCountry = "select * from tblcountry";
$resultCountry = mysqli_query($conn, $sqlCountry);
$sqlFaculty = "select * from tblfaculty";
$resultFaculty = mysqli_query($conn, $sqlFaculty);
$sqlMajor = "select * from tblmajor";
$resultMajor = mysqli_query($conn, $sqlMajor);
$sqlOccupation = "select * from tbloccupation";
$resultOccupation = mysqli_query($conn, $sqlOccupation);
$Nationality_array = array();
$Country_array = array();
$Occupation_array = array();
while ($nationality = mysqli_fetch_assoc($resultNationality)) {
    $Nationality_array[] = $nationality;
}
while ($occupation = mysqli_fetch_assoc($resultOccupation)) {
    $Occupation_array[] = $occupation;
}
while ($country = mysqli_fetch_assoc($resultCountry)) {
    $Country_array[] = $country;
}
$StudentEditQuery = "select * from tblstudentInfo where StudentID=$StudentEditID";
$StudentEditResult = mysqli_query($conn, $StudentEditQuery);
$FamilyEditQuery = "select * from tblfamiltybackground where FamilyBackgroundID=$StudentEditID";
$FamilyEditResult = mysqli_query($conn, $FamilyEditQuery);
$EducationEditQuery = "select * from tbleducationalbackground where EducationalBackgroundID=$StudentEditID";
$EducationEditResult = mysqli_query($conn, $EducationEditQuery);
$ProgramEditQuery = "select * from tblprogram where ProgramID=$StudentEditID";
$ProgramEditResult = mysqli_query($conn, $ProgramEditQuery);

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
if($StudentEditRow=mysqli_fetch_assoc($StudentEditResult)) {
    $name=$StudentEditRow['NameInLatin'];
    $passport=$StudentEditRow['IDPassportNo'];
    $dob=strftime('%Y-%m-%d', strtotime( $StudentEditRow['DOB']));
    $pob=$StudentEditRow['POB'];
    $email=$StudentEditRow['Email'];
    $phone=$StudentEditRow['PhoneNumber'];
    $address=$StudentEditRow['CurrentAddress'];
    $gender=null;
    $nationalityShow=null;
    $CountryShow=null;
while ($rowSex= mysqli_fetch_assoc($resultSex)){
     if($StudentEditRow['SexID']==$rowSex['SexID']){$gender=$rowSex['SexEN'];}
 }
 foreach ($Nationality_array as $nationality){
     if($StudentEditRow['NationalityID']==$nationality['NationalityID']){$nationalityShow=$nationality['NationalityEN'];}
 }
 foreach ($Country_array as $country){
        if($StudentEditRow['CountryID']==$country['CountryID']){$CountryShow=$country['CountryEN'];}
    }
    $pdf->SetXY(155, 50);
    $pdf->Image('../BackEnd/images/'.$StudentEditRow['Photo'], '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
    $tbl = <<<EOD
 <h1>Personal Detail</h1>
 <table>
    <tr>
      <td>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: normal">$name</span></td>
      <td>Gender  &nbsp;&nbsp; <span style="font-weight: normal">$gender</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
      <td>PASSPORT ID  &nbsp;&nbsp; <span style="font-weight: normal">$passport</span></td>
      <td>NATIONALITY  
      <span style="font-weight: normal">$nationalityShow</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
      <td>COUNTRY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: normal">$CountryShow</span></td>
      <td>DATE OF BIRTH  &nbsp;&nbsp; <span style="font-weight: normal">$dob</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
     <td>Tel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: normal">$phone</span></td>
      <td>EMAIL &nbsp;&nbsp; <span style="font-weight: normal">$email</span></td>
      <td></td>
    </tr>
</table>
<table>
    <tr>
    <td>POB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-weight: normal">$pob</span></td>
      <td>CURRENT ADD&nbsp;&nbsp; <span style="font-weight: normal">$address</span></td>
      <td></td>
    </tr>
</table>
EOD;
}
    $pdf->writeHTML($tbl, true, false, false, false, '');
if($FamilyRowEdit=mysqli_fetch_assoc($FamilyEditResult)) {
    $fatherName=$FamilyRowEdit['FatherName'];
    $fatherAge=$FamilyRowEdit['FatherAge'];
    $fatherNational=null;
    $fatherCountry=null;
    $fatherJob=null;
    foreach ($Nationality_array as $nationality){
        if($FamilyRowEdit['FatherNationalityID']==$nationality['NationalityID']){
            $fatherNational=$nationality['NationalityEN'];
        }
    }
    foreach ($Country_array as $country){
        if($FamilyRowEdit['FatherCountryID']==$country['CountryID']){
            $fatherCountry=$country['CountryEN'];
        }
    }
    foreach ($Occupation_array as $occupation){
        if($FamilyRowEdit['FatherOccupationID']==$occupation['OccupationID']){
            $fatherJob=$occupation['OccupationEN'];
        }
    }
    $motherName=$FamilyRowEdit['MotherName'];
    $motherAge=$FamilyRowEdit['MotherAge'];
    $motherNational=null;
    $motherCountry=null;
    $motherJob=null;
    foreach ($Nationality_array as $nationality){
        if($FamilyRowEdit['MotherNationalityID']==$nationality['NationalityID']){
            $motherNational=$nationality['NationalityEN'];
        }
    }
    foreach ($Country_array as $country){
        if($FamilyRowEdit['MotherCountryID']==$country['CountryID']){
            $motherCountry=$country['CountryEN'];
        }
    }
    foreach ($Occupation_array as $occupation){
        if($FamilyRowEdit['MotherOccupationID']==$occupation['OccupationID']){
            $motherJob=$occupation['OccupationEN'];
        }
    }
    $spouse=$FamilyRowEdit['SpouseName'];
    $spouseAge=$FamilyRowEdit['SpouseAge'];
    $familyAddress=$FamilyRowEdit['FamilyCurrentAddress'];
    $GPhone=$FamilyRowEdit['GuardianPhoneNumber'];
    if($ProgramEditRow=mysqli_fetch_assoc($ProgramEditResult)) {
        $start=strftime('%Y-%m-%d', strtotime( $ProgramEditRow['StartDate']));
        $end=strftime('%Y-%m-%d', strtotime( $ProgramEditRow['EndDate']));
        $faculty=null;
        $major=null;
        $campus=null;
        $degree=null;
        $academicYear=null;
        $Semester=null;
        $year=null;
        $batch=null;
        $shift=null;
        $program=null;

        while ($rowFaculty= mysqli_fetch_assoc($resultFaculty)){
            if($ProgramEditRow['ProgramID']==$rowFaculty['FacultyID']){
                $faculty= $rowFaculty['FacultyEN'];}
        }
        while ($rowMajor= mysqli_fetch_assoc($resultMajor)){
            if($ProgramEditRow['MajorID']==$rowMajor['MajorID']){
                $major= $rowMajor['MajorEN'];}
        }
        $sql = "Select *From tblCampus";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['CampusID']==$data['CampusID']){
                $campus= $data['CampusEN'];
            }
        }
        $sql = "Select *From tblDegree";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['DegreeID']==$data['DegreeID']){
                $degree= $data['DegreeNameEN'];
            }
        }
        $sql = "Select *From tblacademicyear";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['AcademicYearID']==$data['AcademicYearID']){
                $academicYear= $data['AcademicYear'];
            }
        }
        $sql = "Select *From tblsemester";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['SemesterID']==$data['SemesterID']){
                $Semester= $data['SemesterEN'];
            }
        }
        $sql = "Select *From tblyear";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['YearID']==$data['YearID']){
                $year= $data['Year'];
            }
        }
        $sql = "Select *From tblbatch";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['BatchID']==$data['BatchID']){
                $batch= $data['BatchEN'];
            }
        }
        $sql = "Select *From tblshift";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['ShiftID']==$data['ShiftID']){
                $shift= $data['ShiftEN'];
            }
        }
        $sql = "Select *From tblprogramtype";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
            if($ProgramEditRow['ProgramTypeID']==$data['ProgramTypeID']){
                $program= $data['ProgramTypeEN'];
            }
        }
        $tbl = <<<EOD
<h1>Family Background</h1>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>FATHER NAME</td>
        <td>FATHER AGE</td>
        <td>FATHER NATIONAL</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$fatherName</span></td>
        <td><span style = "font-weight: normal">$fatherAge</span></td>
        <td><span style = "font-weight: normal">$fatherNational</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>FATHER COUNTRY</td>
        <td>FATHER OCCUPATION</td>
        <td>MOTHER NAME</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$fatherCountry</span></td>
        <td><span style = "font-weight: normal">$fatherJob</span></td>
        <td><span style = "font-weight: normal">$motherName</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>MOTHER AGE</td>
        <td>MOTHER NATIONAL</td>
        <td>MOTHER COUNTRY</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$motherAge</span></td>
        <td><span style = "font-weight: normal">$motherNational</span></td>
        <td><span style = "font-weight: normal">$motherCountry</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>MOTHER OCCUPATION</td>
        <td>SPOUSE NAME</td>
        <td>SPOUSE AGE</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$motherJob</span></td>
        <td><span style = "font-weight: normal">$spouse</span></td>
        <td><span style = "font-weight: normal">$spouseAge</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>FAMILY CURRENT ADDRESS</td>
        <td>GUARDIAN PHONE NUMBER</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$familyAddress</span></td>
        <td><span style = "font-weight: normal">30</span>$GPhone</td>
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
        <td><span style = "font-weight: normal">$faculty</span></td>
        <td><span style = "font-weight: normal">$major</span></td>
        <td><span style = "font-weight: normal">$campus</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>DEGREE</td>
        <td>ACADEMIC YEAR</td>
        <td>SEMESTER</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$degree</span></td>
        <td><span style = "font-weight: normal">$academicYear</span></td>
        <td><span style = "font-weight: normal">$Semester</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>YEAR</td>
        <td>BATCH</td>
        <td>SHIFT</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$year</span></td>
        <td><span style = "font-weight: normal">$batch</span></td>
        <td><span style = "font-weight: normal">$shift</span></td>
    </tr>

</table>

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td>PROGRAM TYPE</td>
        <td>START DATE</td>
        <td>END DATE</td>
    </tr>
    <tr>
        <td><span style = "font-weight: normal">$program</span></td>
        <td><span style = "font-weight: normal">$start   </span></td>
        <td><span style = "font-weight: normal">$end</span></td>
    </tr>

</table>


EOD;
    }}
$pdf->writeHTML($tbl, true, false, false, false, '');


// print a block of text using Write()


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('doc.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>