<?php

include_once 'db.php';
try {
    if (isset($_POST['Submit'])) {
        //Start Of StudentInfo
        $StudentID=$_POST['StudentID'];
        $NameInKhmer = $_POST['khName'];
        $LatinName = $_POST['NameInLatin'];
        $FamilyName = $_POST['FamilyName'];
        $GivenName = $_POST['GivenName'];
        $Sex = $_POST['Sex'] ?? '';
        $Passport = $_POST['Passport'];
        $nationality = $_POST['Nationality'];
        $County = $_POST['Country'];
        $DOB = $_POST['dob'];
        $POD = $_POST['pod'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['email'];
        $CurrentAddress = $_POST['currentAddress'];
        $CurrentAddressPP = $_POST['currentAddressPP'];
        if(move_uploaded_file($_FILES["NewImg"]["tmp_name"],"../BackEnd/images/".date("Ymdhis").$_FILES["NewImg"]["name"]))
        {
            $photo= date("Ymdhis").$_FILES["NewImg"]["name"];
        }
        //End Of student Info
        $StudentInfoSql = "update `tblstudentinfo` set
        `NameInKhmer`='$NameInKhmer', `NameInLatin`='$LatinName',`FamilyName`='$FamilyName',`GivenName`='$GivenName',`SexID`='$Sex',`IDPassportNo`='$Passport', 
        `NationalityID`='".$nationality."',`CountryID`='$County',`DOB`='$DOB',`POB`='$POD',`PhoneNumber`='$PhoneNumber',`Email`='$Email',`CurrentAddress`='$CurrentAddress',
        `CurrentAddressPP`='$CurrentAddressPP',`Photo`='$photo',`RegisterDate`=now() where StudentID='$StudentID'";
        if (mysqli_query($conn, $StudentInfoSql)) {
            echo("StudentInfo Has Been Edit");
        } else {
            echo("Error" . $StudentInfoSql . ":-" . mysqli_error($conn));
        };
        //    End StudentInfo To Database
        //Start of Family Background To database
        $FatherName = $_POST['FatherName'];
        $FatherAge = $_POST['FatherAge'];
        $FatherNational = $_POST['fatherNationality'];
        $FatherCountry = $_POST['fatherCountry'];
        $FatherOccupation = $_POST['FatherOccupation'];
        $MotherName = $_POST['MotherName'];
        $MotherAge = $_POST['MotherAge'];
        $MotherNationality = $_POST['motherNationality'];
        $MotherCountry = $_POST['motherCountry'];
        $MotherOccupation = $_POST['MotherOccupation'];
        $SpouseName = $_POST['spouseName'];
        $SpouseAge = $_POST['SpouseAge'];
        $FamilyCurrentAddress = $_POST['FamilyCurrentAddress'];
        $GuardianPhoneNumber = $_POST['GuardianPhoneNumber'];
        $FamilyBackgroundSQL = "update `tblfamiltybackground` set
         `FatherName`='$FatherName', `FatherAge`='$FatherAge',`FatherNationalityID`='".$FatherNational."',`FatherCountryID`='".$FatherCountry."',`FatherOccupationID`='".$FatherOccupation."',
         `MotherName`='$MotherName',`MotherAge`='$MotherAge', `MotherNationalityID`='".$MotherNationality."',`MotherCountryID`='".$MotherCountry."',`MotherOccupationID`='".$MotherOccupation."',
         `FamilyCurrentAddress`='$FamilyCurrentAddress',`SpouseName`='$SpouseName',`SpouseAge`='$SpouseAge',`GuardianPhoneNumber`='$GuardianPhoneNumber' where FamilyBackgroundID='$StudentID'";

        if (mysqli_query($conn, $FamilyBackgroundSQL)) {

            echo("FamilyBackGround Info Has Been update");
        } else {
            echo("Error" . $FamilyBackgroundSQL . ":-" . mysqli_error($conn));
        };
        //END of Family Background To database
        //Start of educationBackground in to database
        $SchoolType = $_POST['SchoolType'];
        $SchoolName = $_POST['SchoolName'];
        $AcademicYear = $_POST['AcademicYear'];
        $Province = $_POST['Province'];
        $EducationBackGround = " update `tbleducationalbackground` set `SchoolTypeID`='$SchoolType',`NameSchool`='$SchoolName',`AcademicYear`='$AcademicYear',`Province`='$Province' where EducationalBackgroundID='$StudentID'";
        if (mysqli_query($conn, $EducationBackGround)) {
            echo("EducationBackGround Has Been update");
        } else {
            echo("Error" . $EducationBackGround . ":-" . mysqli_error($conn));
        };
        //END of educationBackground in to database
        //Start Of Uni Information
        $Year = $_POST['Year'];
        $Semester = $_POST['Semester'];
        $Shift = $_POST['Shift'];
        $Degree = $_POST['Degree'] ?? '';
        $academicYear = $_POST['AcademicYear'];
        $Major = $_POST['Major'];
        $Batch = $_POST['Batch'];
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $Campus = $_POST['Campus'];
        $ProgramType = $_POST['ProgramType'];
        $ProgramSQl = " update `tblprogram` set `YearID`='".$Year."',`SemesterID`='".$Semester."',`ShiftID`='".$Shift."',`DegreeID`='".$Degree."',`AcademicYearID`='".$academicYear."',
        `MajorID`='".$Major."',`BatchID`='".$Batch."',`StartDate`='$StartDate',`EndDate`='$EndDate',`DateIsue`=now(),`CampusID`='".$Campus."',`ProgramTypeID`='".$ProgramType."' where ProgramID='$StudentID'";
        if (mysqli_query($conn, $ProgramSQl)) {
            header("Location: ../FrontEnd/dashboard.php?msg=Edit Succesfully");
            mysqli_close($conn);
        } else {
            echo("Error" . $ProgramSQl . ":-" . mysqli_error($conn));
        }
        // End of Uni Info
    };
} catch (Exception $error) {
    echo 'Message: ' . $error->getMessage();
}



