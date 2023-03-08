
<?php
// session_start();

require_once '../BackEnd/db.php';

// if(isset($_SESSION['id'])!="") {
//     header("Location: dashboard.php");
// }

if (isset($_POST['submit'])) {
    $username = $_POST['Username'];

    password_hash($password = $_POST['Password'],PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "Insert Into tblusers (username,password) Values (username = '$username', password = 'mb5($password)')");
  //  if(!empty($result)){
  //       if ($row = mysqli_fetch_array($result)) {
  //           // $_SESSION['user_id'] = $row['uid'];
  //           // $_SESSION['user_role'] = $row['RoleID'];
  //           // $_SESSION['user_name'] = $row['name'];
  //           header("Location: dashboard.php");
  //       } 
  //   }else {
  //       $error_message = "Incorrect Email or Password!!!";
  //   }
  if (mysqli_query($conn, $result)) {
    echo 'Create successfully';
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);
}
?>