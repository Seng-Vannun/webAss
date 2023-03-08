<?php
require_once 'db.php';
echo $StudentID=$_GET['Disable'];
$query="update `tblstudentstatus` set `statusID`='3' where StudentID='$StudentID'";
if(mysqli_query($conn,$query)){
    echo "Update Succesfull";
}
