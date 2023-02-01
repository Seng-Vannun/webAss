<?php
include_once '../BackEnd/db.php';
$facultyID =$_POST['faculty_data'];
$sqlMajor="select * from tblmajor where FacultyID = $facultyID";
$resultMajor=mysqli_query($conn,$sqlMajor);
$MajorDropDown='<option selected disabled>(--Selected Major--)</option>';
while($rowMajor=mysqli_fetch_assoc($resultMajor)){
 $MajorDropDown .= '<option value="'.$rowMajor['MajorID'].'">'.$rowMajor['MajorEN'].'</option>';
    }
echo $MajorDropDown;