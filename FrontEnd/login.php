<?php 

   if(isset($_POST['Login'])){

       $user = $_POST['username'];
       $pass = $_POST['password'];

       if($user == "admin" && $pass == "123"){
        header("Location:dashboard.php");
       }
       else{
        echo '<script>alert("Fail to login")</script>';
       }

   }


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }
  </style>

<meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
          href="https://belteigroup.com.kh/images/beltei_international_university_in_cambodia.png"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

</head>
<body>
           <div class="form"  method="post" action= "login.php">
           <div class="container" style="margin-top: 20vh;">
                <div class="card">
                    <div class="card card-header align-items-center">
                            <img src="https://belteigroup.com.kh/images/beltei_international_university_in_cambodia.png" alt="" width="100px">
                    </div>
                    <div class="card card-body">
                        
                    <div class="row">
                        <div class="col col-lg-2"></div>
                        <div class="col col-lg-8 align-items-center">
                               <label class="col col-form-label" for="basic-icon-default-company">UserName</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-user"></i
                                           ></span>
                                       <input
                                               required
                                               name="username"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="User Name"
                                       />
                                   </div>
                               </div>
                           </div>
                        <div class="col col-lg-2"></div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-2"></div>
                        <div class="col col-lg-8 align-items-center">
                               <label class="col col-form-label" for="basic-icon-default-company">Password</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-key"></i
                                           ></span>
                                       <input
                                               required
                                               name="password"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="Paassword"
                                       />
                                   </div>
                               </div>
                           </div>
                        <div class="col col-lg-2"></div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col col-lg-2"></div>
                        <div class="col col-lg-8">
                        <input type="button" value="Login" class="btn btn-primary" name="Login">
                        </div>
                        <div class="col col-lg-2"></div>
                    </div>

                    </div>
                </div>
            </div>
           </div>
</body>
</html>
