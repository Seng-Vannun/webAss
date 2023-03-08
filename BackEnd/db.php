<?php
$db="localhost";
$username="root";
$password="";
$dbname="btb5eg5studentregistration";
$conn=mysqli_connect($db,$username,$password,"$dbname");
if(!$conn)
{
echo("Error".mysqli_error($conn));
}

?>