<?php
require_once '../BackEnd/db.php';
echo "you here";
if (isset($_POST['Submit'])) {
    $qury="select * from tblusers";
    $ResultUser=mysqli_query($conn,$qury);
    $username = $_POST['username'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $name=$_POST['name'];
    $roleid=$_POST['roleid'];
    $hashPassword=null;
    $photo=null;
    while ($check=mysqli_fetch_assoc($ResultUser))
    {
        if($check['username']==$username){
           header("Location:../FrontEnd/register.php?msg= User Name Aready Exist");
            break;
        }
    }
    if($password==$confirm){
        $hashPassword=md5($password);
    }
    else
    {
    header("Location:../FrontEnd/register.php?msg=Password is not the Same");
    }
    if($_FILES["img"]["size"]==null)
    {
        header("Location:../FrontEnd/register.php?msg=No Profile Picture");
    }
    else
    {
        if(move_uploaded_file($_FILES["img"]["tmp_name"],"../BackEnd/images/".date("Ymdhis").$_FILES["img"]["name"]))
        {
            $photo= date("Ymdhis").$_FILES["img"]["name"];
        }
    }
    if($name==null)
    {
        header("Location:../FrontEnd/register.php?msg=Input Your Name");
    }
    if($roleid==null)
    {
        header("Location:../FrontEnd/register.php?msg=Please Pick Role");
    }

    $result="insert into `tblusers` (`username`,`password`,`roleid`,`Name`,`Image`) values ('$username','$hashPassword','$roleid','$name','$photo')";
  if (mysqli_query($conn, $result)) {
      header("Location: ../FrontEnd/dashboard.php?msg=Account Have Been Created");
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);
}

