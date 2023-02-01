



<!DOCTYPE html>
<html
        lang="en"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="../assets/"
        data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Student Registration Form</title>

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
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="text-center">
                        <img src="https://belteigroup.com.kh/images/beltei_international_university_in_cambodia.png"
                             width=10% class="animate__animated animate__flip">
                        <h5 class="mb-5 mt-2">Student Registration Form</h5>
                    </div>
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header bg-primary mb-4">
                                <h1 style="color: white;">Step 1</h1>
                            </div>
                            <div class="card-body">
                                <form>
                                    <!--TblAcademicYear-->
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Academic Year</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Year--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblacademicyear";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['AcademicYearID'] ?>">
                                                      <?php echo $data['AcademicYear']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Degree in KHmer</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Degree in Khmer--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblDegree";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['DegreeID'] ?>">
                                                      <?php echo $data['DegreeNameKH']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                    </div>
                                    <!--TblAcademicYear-->
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Degree in English</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>-- Select Degree in English --</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblDegree";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['DegreeID'] ?>">
                                                      <?php echo $data['DegreeNameEN']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Campus in Khmer</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>-- Select Campus in Khmer --</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblCampus";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['CampusID'] ?>">
                                                      <?php echo $data['CampusKH']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                    </div>
                                     <!--TblAcademicYear-->
                                     <div class="row">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Campus in English</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Campus in English--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblCampus";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['CampusID'] ?>">
                                                      <?php echo $data['CampusEN']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Program Type in Khmer</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Program Type Khmer--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblprogramtype";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['ProgramTypeID'] ?>">
                                                      <?php echo $data['ProgramTypeKH']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                    </div>
                                     <!--TblAcademicYear-->
                                     <div class="row">
                                     <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Program Type in English</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Program Type English--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblprogramtype";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['ProgramTypeID'] ?>">
                                                      <?php echo $data['ProgramTypeEN']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Shift in Khmer</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Shift in Khmer--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblDegree";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['DegreeID'] ?>">
                                                      <?php echo $data['DegreeNameKH']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                    </div>
                                     <!--TblAcademicYear-->
                                     <div class="row">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Shift in English</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblacademicyear";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['AcademicYearID'] ?>">
                                                      <?php echo $data['AcademicYear']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Degree in KHmer</label>
                                        <div class="col-sm-10">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Degree in Khmer--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblDegree";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['DegreeID'] ?>">
                                                      <?php echo $data['DegreeNameKH']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                    </div>

                                  
                                    <!--button -->
                                    <div class="row justify-content-start mb-3">
                                        <div class="col-sm-10">
                                             <a type="submit" class="btn btn-outline-danger" href="../index.php">Cancel</a>
                                             <input type="button" name="password" class="next btn btn-info" value="Next" />
                                           
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/pages-account-settings-account.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
