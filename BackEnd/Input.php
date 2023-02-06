<?php
include_once 'db.php';

    if(isset($_POST['Submit'])) {
        $NameInKhmer = $_POST['khName'];
        $LatinName = $_POST['NameInLatin'];
        $FamilyName = $_POST['FamilyName'];
        $GivenName = $_POST['GivenName'];
        $Sex = $_POST['Sex'];
        $Passport = $_POST['Passport'];
        $nationality = $_POST['Nationality'];
        $County = $_POST['Country'];
        $DOB = $_POST['dob'];
        $POD = $_POST['pod'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['email'];
        $CurrentAddress = $_POST['currentAddress'];
        $CurrentAddressPP = $_POST['currentAddressPP'];
        $photo = null;
        $StudentInfoSql = "insert into `tblstudentinfo`
        (`NameInKhmer`, `NameInLatin`,`FamilyName`,`GivenName`,`SexID`,`IDPassportNo`, `NationalityID`,`CountryID`,`DOB`,`POB`,`PhoneNumber`,`Email`,`CurrentAddress`,`CurrentAddressPP`,`Photo`,`RegisterDate`) 
    values
        ('$NameInKhmer','$LatinName','$FamilyName','$GivenName','$Sex','$Passport','".$nationality."','$County','$DOB','$POD','$PhoneNumber','$Email','$CurrentAddress','$CurrentAddressPP','$photo', now())";
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
        $FamilyBackgroundSQL = "insert into `tblfamiltybackground`
         (`FatherName`, `FatherAge`,`FatherNationalityID`,`FatherCountryID`,`FatherOccupationID`,`MotherName`,`MotherAge`, `MotherNationalityID`,`MotherCountryID`,`MotherOccupationID`,`FamilyCurrentAddress`,`SpouseName`,`SpouseAge`,`GuardianPhoneNumber`) 
            values
        ('$FatherName','$FatherAge','".$FatherNational."','".$FatherCountry."','".$FatherOccupation ."','$MotherName','$MotherAge','" . $MotherNationality . "','" . $MotherCountry . "','" . $MotherOccupation . "','$FamilyCurrentAddress','$SpouseName','$SpouseAge','$GuardianPhoneNumber',";
        //END of Family Background To database
        //Start of educationBackground in to database
        $SchoolType = $_POST['SchoolType'];
        $SchoolName = $_POST['SchoolName'];
        $AcademicYear = $_POST['AcademicYear'];
        $Province = $_POST['Province'];
        $EducationBackGround = " insert into `tbleducationalbackground` (`SchoolTypeID`,`NameSchool`,`AcademicYear`,`Province`) values (`$SchoolType`,`$SchoolName`,`$AcademicYear`,`$Province`)";
        //END of educationBackground in to database
        //Start Of Uni Information
        $Year = $_POST['Year'];
        $Semester = $_POST['Semester'];
        $Shift = $_POST['Shift'];
        $Degree = $_POST['Degree'];
        $academicYear = $_POST['AcademicYear'];
        $Major = $_POST['Major'];
        $Batch = $_POST['Batch'];
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $Campus = $_POST['Campus'];
        $ProgramType = $_POST['ProgramType'];
        $ProgramSQl = " insert into `tblprogram` 
        (`YearID`,`SemesterID`,`ShiftID`,`DegreeID`,`AcademicYearID`,`MajorID`,`BatchID`,`StartDate`,`EndDate`,`DateIsue`,`CampusID`,`ProgramTypeID`)
                      values 
        ('" . $Year . "','".$Semester."','".$Shift."','".$Degree."','".$academicYear."','".$Major."','".$Batch."','$StartDate','$EndDate',now(),'".$Campus."','" .$ProgramType . "')
                     ";
        // End of Uni Info
        if (mysqli_query($conn, $StudentInfoSql)) {
            echo("StudentInfo Has Been Added");
            if (mysqli_query($conn,$FamilyBackgroundSQL)) {
                echo("FamilyBackGround Info Has Been Added");
                if (mysqli_query($conn,$EducationBackGround)) {
                    echo("EducationBackGround Has Been Added");
                    if (mysqli_query($$ProgramSQl)) {
                        echo("Uni INFO Had been Added");
                    } else {
                        echo("Error" . $ProgramSQl . ":-" . mysqli_error($conn));
                    }
                } else {
                    echo("Error" . $EducationBackGround . ":-" . mysqli_error($conn));
                };
            } else {
                echo("Error" . $FamilyBackgroundSQL . ":-" . mysqli_error($conn));
            };
        } else {
            echo("Error" . $StudentInfoSql .":-" . mysqli_error($conn));
            echo("Error" . $FamilyBackgroundSQL . ":-" . mysqli_error($conn));
            echo("Error" . $EducationBackGround . ":-" . mysqli_error($conn));
            echo("Error" . $ProgramSQl . ":-" . mysqli_error($conn));
            //    End StudentInfo To Database
        };
    }
    //End Of StudentInfo To database
mysqli_close($conn);


