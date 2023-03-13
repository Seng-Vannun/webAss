<?php
require_once ('../BackEnd/db.php');
if (isset($_POST['submit'])) {
    $StudentEditID=$_POST['ID'];
    $status=null;
    $check=$_POST['submit'];
    echo $StudentEditID;
    echo $check;
    if($check=="Approve"){
        $status=1;
    }
    else if ($check=="Disable"){
        $status=3;
    }
    echo  $status;
    $qury="update `tblstudentstatus` set `statusID`='$status' where StudentID = $StudentEditID ";
      $result = mysqli_query($conn,$qury);
    if( mysqli_query($conn,$qury)){
        header("Location: ../FrontEnd/dashboard.php?msg=Edit Succesfully");
   };

}
