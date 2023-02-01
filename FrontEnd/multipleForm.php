<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="text-center">
                        <img src="https://belteigroup.com.kh/images/beltei_international_university_in_cambodia.png"
                             width=10% class="animate__animated animate__flip">
                        <h5 class="mb-5 mt-2">Student Registration Form</h5>
                    </div>
                    <div class="col-xxl">
                        <div class="card mb-4">
                        <div class="card-header bg-primary mb-4">
                                <h1 style="color: white;">Registration</h1>
                            </div>
               <div class="card-body">
               <form id="regiration_form" novalidate action="action.php"  method="post">
            <!--Form 1-->
            <fieldset>
                <h2>Step 1: University Information</h2>
                           <div class="row">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Academic Year</label>
                                        <div class="col">
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
                                        <div class="col">
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

                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Degree in English</label>
                                        <div class="col">
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
                                        <div class="col">
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
                                        <div class="col">
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
                                        <div class="col">
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
                                        <div class="col">
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
                                        <div class="col">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Shift in Khmer--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblshift";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['ShiftID'] ?>">
                                                      <?php echo $data['ShiftKH']?>
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
                                        <div class="col">
                                        <select name="AcademicYearID" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select Shift in English--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tblshift";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['ShiftID'] ?>">
                                                      <?php echo $data['ShiftEN']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                        
                                    </div>
                
                
                <!--button-->
                <a type="submit" class="btn btn-outline-danger" href="../index.php">Cancel</a>
                <input type="button" name="password" class="next btn btn-primary" value="Next" />
            </fieldset>

             <!--Form 2-->
            <fieldset>
                <h2> Step 2: Add Personnel Details</h2>
                <div class="row">
                     <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Learning Type in Khmer</label>
                                        <div class="col">
                                        <select name="" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tbllearningtype";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['LearningTypeID'] ?>">
                                                      <?php echo $data['LearningTypeKH']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Learning Type in English</label>
                                        <div class="col">
                                        <select name="" id="" class="form-select form-select mb-3">
                                            <option selected disabled>--Select--</option>
                                            
                                             <?php
                                                include_once '../BackEnd/db.php';
                                        
                                                 $sql = "Select *From tbllearningtype";
                                                 $query = mysqli_query($conn, $sql);
                                                 while ($data = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $data['LearningTypeID'] ?>">
                                                      <?php echo $data['LearningTypeEN']?>
                                                    </option>
                                                
                                             <?php } 
                                             ?>
                                        </select>
                                        </div>
                                        </div>
                 <div class="row">
                                   <div class="col-lg-6">
                                   <label class="col col-form-label" for="basic-icon-default-company">Learning in English</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="English"    
                                                />                
                                            </div>
                                        </div>
                                   </div> 
                                   <div class="col-lg-6">
                                   <label class="col col-form-label" for="basic-icon-default-fullname">Faculty ID</label>
                                        <div class="col">
                                        <select name="" id="" class="form-select form-select mb-3" >
                                            <option selected disabled>--Select--</option>
                                        </select>
                                        </div>
                                   </div>
                  </div>
                  <div class="row">
                                    <div class="col-lg-6">
                                    <label class="col col-form-label" for="basic-icon-default-company">Faculty in Khmer</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="ព័ត៌មានវិទ្យា"    
                                                />                
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-lg-6">
                                    <label class="col col-form-label" for="basic-icon-default-company">Faculty in English</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="Information Technology"    
                                                />                
                                            </div>
                                        </div>
                                    </div>
                  </div>

                  <div class="row">
                                    <div class="col-lg-6">
                                    <label class="col col-form-label" for="basic-icon-default-fullname">Major ID</label>
                                        <div class="col">
                                        <select name="" id="" class="form-select form-select mb-3" >
                                            <option selected disabled>--Select--</option>
                                        </select>
                                        </div>
                                    </div>  
                                    <div class="col-lg-6">
                                    <label class="col col-form-label" for="basic-icon-default-company">Major in KHmer</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="មុខជំនាញ"    
                                                />                
                                            </div>
                                        </div>
                                    </div>
                  </div>

                  <div class="row">
                                    <div class="col-lg-6">
                                    <label class="col col-form-label" for="basic-icon-default-company">Major in English</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="Major"    
                                                />                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <label class="col col-form-label" for="basic-icon-default-fullname">Faculty ID</label>
                                        <div class="col">
                                        <select name="" id="" class="form-select form-select mb-3" >
                                            <option selected disabled>--Select--</option>
                                        </select>
                                        </div>
                                    </div>
                  </div>

                  <div class="row">
                              <div class="col-lg-6">
                              <label class="col col-form-label" for="basic-icon-default-fullname">Sex ID</label>
                                        <div class="col">
                                        <select name="" id="" class="form-select form-select mb-3" >
                                            <option selected disabled>--Select--</option>
                                        </select>
                                        </div>
                              </div>
                              <div class="col-lg-6">
                              <label class="col col-form-label" for="basic-icon-default-company">Gender in Khmer</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="ភេទ"    
                                                />                
                                            </div>
                                        </div>
                              </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-6">
                  <label class="col col-form-label" for="basic-icon-default-company">Gender in English</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="Gender"    
                                                />                
                                            </div>
                                        </div>
                  </div>     
                  <div class="col-lg-6">
                  <label class="col col-form-label" for="basic-icon-default-fullname">National ID</label>
                                        <div class="col">
                                        <select name="" id="" class="form-select form-select mb-3" >
                                            <option selected disabled>--Select--</option>
                                        </select>
                                        </div>
                  </div>                 
                  </div>

                  <div class="row mb-3">
                                          <div class="col-lg-6">
                                          <label class="col col-form-label" for="basic-icon-default-company">National in Khmer</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="សញ្ជាតិ"    
                                                />                
                                            </div>
                                        </div>
                                          </div>
                                          <div class="col-lg-6">
                                          <label class="col col-form-label" for="basic-icon-default-company">National in English</label>
                                        <div class="col">
                                        <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                <input
                                                        type="text"
                                                        id=""
                                                        class="form-control"
                                                        placeholder="National"    
                                                />                
                                            </div>
                                        </div>
                                          </div>
                  </div>



                <!--button-->
                <input type="button" name="previous" class="previous btn btn-outline-danger" value="Previous" />
                <input type="button" name="next" class="next btn btn-primary" value="Next" />
            </fieldset>

             <!--Form 3-->
             <fieldset>
             <h2> Step 3: Add Personnel Details</h2>
             <div class="row ">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Student ID</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Name in KHmer</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="text"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="ឈ្មោះ"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Given Name</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="text"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="Last name"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Sex ID</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">

                                        <label class="col col-form-label" for="basic-icon-default-company">ID passport NO</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="text"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="Passport ID"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <label class="col col-form-label" for="basic-icon-default-fullname">National ID</label>
                                                <div class="col">
                                                <select name="" id="" class="form-select form-select mb-3" >
                                                    <option selected disabled>--Select--</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    

                                    <div class="row">
                                        
                                        <div class="col-lg-6">
                                            <label class="col col-form-label" for="basic-icon-default-fullname">Country ID</label>
                                                <div class="col">
                                                <select name="" id="" class="form-select form-select mb-3" >
                                                    <option selected disabled>--Select--</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Date of birth</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="datetime"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="mm-dd-yy"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                     </div>

                                     <div class="row">

                                       <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Place of birth</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="place"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Phone Number</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="+855.........."    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>
                                     </div>

                                     <div class="row">

                                       <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Email</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="email"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="example@gmail.com"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">curent address</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Address"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                                <div class="col-lg-6">
                                                    
                                                    <label class="col col-form-label" for="basic-icon-default-company">Current address PP</label>
                                                        <div class="col">
                                                        <div class="input-group input-group-merge">
                                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                                <input
                                                                        type="text"
                                                                        id=""
                                                                        class="form-control"
                                                                        placeholder="Address PP"    
                                                                />                
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-lg-6">
                                                    
                                                    <label class="col col-form-label" for="basic-icon-default-company">Photo</label>
                                                    <div class="col">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" type="file" id="formFile" />
                                            </div>
                                        </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">

                                                <div class="col-lg-6">
                                                    
                                                    <label class="col col-form-label" for="basic-icon-default-company">Current address PP</label>
                                                        <div class="col">
                                                        <div class="input-group input-group-merge">
                                                                <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                                <input
                                                                        type="text"
                                                                        id=""
                                                                        class="form-control"
                                                                        placeholder="Address PP"    
                                                                />                
                                                            </div>
                                                        </div>
                                                    </div>

                                        </div>
                                         <!--button-->
                <input type="button" name="previous" class="previous btn btn-outline-danger" value="Previous" />
                <input type="button" name="next" class="next btn btn-primary" value="Next" />

             </fieldset>

              <!--Form 4-->
              <fieldset>
              <h2>Step 4: Contact Information</h2>
              <div class="row ">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">School Type ID</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">School in KHmer</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="text"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="ឈ្មោះ"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">School Name</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="text"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="School"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Family BG ID</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">

                                        <label class="col col-form-label" for="basic-icon-default-company">Father Name</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="text"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="Father Name"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">

                                        <label class="col col-form-label" for="basic-icon-default-company">Father Age</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="number"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="Father Aage"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    

                                    <div class="row">
                                        
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Father National</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Father Country</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                     </div>

                                     <div class="row">

                                       <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Father Occupation</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                             </div>

                                             <div class="col-lg-6">

                                            <label class="col col-form-label" for="basic-icon-default-company">Mother Name</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Mother Name"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                        <div class="col-lg-6">

                                            <label class="col col-form-label" for="basic-icon-default-company">Mother Age</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Mother Age"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Mother National</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                             </div>

                                        </div>

                                        <div class="row">
                                        <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Mother Country</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                             </div>

                                            <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Mother Occupation</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                             </div>

                                        </div>

                                        <div class="row mb-2">
                                        <div class="col-lg-6">

                                            <label class="col col-form-label" for="basic-icon-default-company">Family Current Address</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Family Address"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">

                                            <label class="col col-form-label" for="basic-icon-default-company">Spouse Name</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Spouse Name"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-4">
                                        <div class="col-lg-6">

                                            <label class="col col-form-label" for="basic-icon-default-company">Spouse Age</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="number"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Spouse Age"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">

                                            <label class="col col-form-label" for="basic-icon-default-company">Guardian Phone Number</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Guardian Phone Number"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                                                 <!--button-->
                <input type="button" name="previous" class="previous btn btn-outline-danger" value="Previous" />
                <input type="button" name="next" class="next btn btn-primary" value="Next" />

              </fieldset>

                <!--Form 5-->
                <fieldset>
                <h2>Step 5: Contact Information</h2>
                <div class="row ">
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Student Status</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Student ID</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Program ID</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                              <label class="col col-form-label" for="basic-icon-default-company">Assigned</label>
                                                  <div class="col">
                                                  <div class="input-group input-group-merge">
                                                          <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                          <input
                                                                  type="text"
                                                                  id=""
                                                                  class="form-control"
                                                                  placeholder="Assigned"    
                                                          />                
                                                      </div>
                                                  </div>
                                              </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">

                                        <label class="col col-form-label" for="basic-icon-default-company">Note</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="text"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="Note"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">

                                        <label class="col col-form-label" for="basic-icon-default-company">Assigned Date</label>
                                            <div class="col">
                                            <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                    <input
                                                            type="datetime"
                                                            id=""
                                                            class="form-control"
                                                            placeholder="Assigned Date"    
                                                    />                
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    

                                    <div class="row">
                                        
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Semester Khmer</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-fullname">Semester English</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                        </div>
                                     </div>

                                     <div class="row">

                                       <div class="col-lg-6">
                                            
                                            <label class="col col-form-label" for="basic-icon-default-company">Bath Khmer</label>
                                            <div class="col">
                                            <select name="" id="" class="form-select form-select mb-3" >
                                                <option selected disabled>--Select--</option>
                                            </select>
                                            </div>
                                             </div>

                                             <div class="col-lg-6">

                                            <label class="col col-form-label" for="basic-icon-default-company">Bath English</label>
                                                <div class="col">
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-year"></i></span>
                                                        <input
                                                                type="text"
                                                                id=""
                                                                class="form-control"
                                                                placeholder="Mother Name"    
                                                        />                
                                                    </div>
                                                </div>
                                            </div>

                                                 </div>                                   
                <!--button-->
                <input type="button" name="previous" class="previous btn btn-outline-danger" value="Previous" />
                <input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
            </fieldset>
    </form>
               </div>
</body>
</html>

<script>
    $(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
  });
  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });
  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }
});
</script>



