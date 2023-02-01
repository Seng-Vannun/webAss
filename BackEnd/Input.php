<?php
require_once 'db.php';
if(isset($_POST['Submit']))
{
    $NameInKhmer=$_POST['khName'];
$LatinName=$_POST['NameInLatin'];
$FamilyName=$_POST['FamilyName'];
$GivenName=$_POST['GivenName'];
$Sex=$_POST['Sex'];
$Passport=$_POST['Passport'];
$nationality=$_POST['Nationality'];
$County=$_POST['Country'];
$DOB=$_POST['dob'];
$POD=$_POST['pod'];
$PhoneNumber=$_POST['phonenumber'];
$Email=$_POST['email'];
$CurrentAddress=$_POST['currentAddress'];
$CurrentAddressPP=$_POST['currentAddressPP'];
$photo=null;
$StudentInfoSql="insert into `tblstudentinfo`
    (`NameInKhmer`, `NameInLatin`,`FamilyName`,`GivenName`,`SexID`,`IDPassportNo`, `NationalityID`,`CountryID`,`DOB`,`POB`,`PhoneNumber`,`Email`,`CurrentAddress`,`CurrentAddressPP`,`Photo`,`RegisterDate`) 
values
    ('$NameInKhmer','$LatinName','$FamilyName','$GivenName','$Sex','$Passport','".$nationality."','$County','$DOB','$POD','$PhoneNumber','$Email','$CurrentAddress','$CurrentAddressPP','$photo', now())";
    if(mysqli_query($conn,$StudentInfoSql)){
        echo ("Info Has Been Added");
    }
    else
    {
    echo ("Error".$StudentInfoSql.":-".mysqli_error($conn))   ;
    }
mysqli_close($conn);
}
