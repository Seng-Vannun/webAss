<?php
require_once '../BackEnd/db.php';
if (isset($_POST['Submit'])) {
    $qury = "select * from tblusers";
    $ResultUser = mysqli_query($conn, $qury);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $name = $_POST['name'];
    $roleid = $_POST['roleid'];
    $hashPassword = null;
    $photo = null;
    $msg=null;
    if (empty($username)) {
        $msg="Please Input User Name";
    }
    while ($check = mysqli_fetch_assoc($ResultUser)) {
        echo $check['username'];
        if ($check['username'] == $username) {
            $msg="Please UserName Already Exit";
            break;
        }
    }
    if (empty($password))
    {
        $msg="Please Input Password";
    }
    else if ($password == $confirm) {
        $hashPassword = md5($password);
    }
    else {
        $msg="Your Password is not the Same";
    }
    if (empty($name)) {
        $msg="Please Input Name";
    }
    if (empty($roleid)) {
        $msg="Please Select Role";
    }
    if (empty($_FILES["img"]["size"])) {
        $msg="Please Please Input Profile Picture";
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], "../BackEnd/images/" . date("Ymdhis") . $_FILES["img"]["name"])) {
            $photo = date("Ymdhis") . $_FILES["img"]["name"];
        }

    }
    if(empty($msg)){
        $result = "insert into `tblusers` (`username`,`password`,`roleid`,`Name`,`Image`) values ('$username','$hashPassword','$roleid','$name','$photo')";
        if (mysqli_query($conn, $result)) {
            header("Location: ../FrontEnd/dashboard.php?msg=Account Have Been Created");
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }
    else{
        header("Location:../FrontEnd/register.php?msg=".$msg);
    }

}

