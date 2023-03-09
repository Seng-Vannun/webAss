<?php
require_once '../BackEnd/db.php';
header("Location:../FrontEnd/register.php?msg= User Name Aready Exist");
//if (isset($_POST['Submit'])) {
//    $qury="select * from tblusers";
//    $ResultUser=mysqli_query($conn,$qury);
//    $username = $_POST['username'];
//    $password=$_POST['password'];
//    $confirm=$_POST['confirm'];
//    $name=$_POST['name'];
//    $roleid=$_POST['roleid'];
//    $hashPassword=null;
//    $photo=null;
//    while ($check=mysqli_fetch_assoc($ResultUser))
//    {
//        if($check['username']==$username){
//            header("Location:register.php?msg= User Name Aready Exist");
//            break;
//        }
//    }
//    if($password==$confirm){
//    password_hash($hashPassword = $password,PASSWORD_DEFAULT);
//    }
//    else
//    {
//    header("Location:register.php?msg=Password is not the Same");
//    }
//    if($_FILES["NewImg"]["size"]==null)
//    {
//        header("Location:register.php?msg=No Profile Picture");
//    }
//    else
//    {
//        if(move_uploaded_file($_FILES["NewImg"]["tmp_name"],"../BackEnd/images/".date("Ymdhis").$_FILES["img"]["name"]))
//        {
//            $photo= date("Ymdhis").$_FILES["img"]["name"];
//        }
//    }
//    $result="insert into `tblusers` (`username`,`password`,`roleid`,`Name`,`Image`) values ('$username','$hashPassword','$roleid','$name','$photo')";
//  if (mysqli_query($conn, $result)) {
//    echo 'Create successfully';
// } else {
//    echo "Error: " . $sql . ":-" . mysqli_error($conn);
// }
// mysqli_close($conn);
//}

