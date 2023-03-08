<?php
require_once ('../BackEnd/db.php');
$sqlSex="select * from tblsex";
$resultSex=mysqli_query($conn,$sqlSex);
$sqlNationality="select * from tblnationality";
$resultNationality=mysqli_query($conn,$sqlNationality);
$sqlCountry="select * from tblcountry";
$resultCountry=mysqli_query($conn,$sqlCountry);
$sqlFaculty ="select * from tblfaculty";
$resultFaculty=mysqli_query($conn,$sqlFaculty);
$sqlOccupation="select * from tbloccupation";
$resultOccupation=mysqli_query($conn,$sqlOccupation);
$Nationality_array=array();
$Country_array=array();
$Occupation_array=array();
while($nationality=mysqli_fetch_assoc($resultNationality)){
    $Nationality_array[]=$nationality;
}
while($occupation=mysqli_fetch_assoc($resultOccupation)){
    $Occupation_array[]=$occupation;
}
while($country=mysqli_fetch_assoc($resultCountry)){
    $Country_array[]=$country;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
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
               <form id="regiration_form" novalidate action="../BackEnd/Input.php" enctype="multipart/form-data" method="post">
               <!-- Form Student Infomation Done-->
                   <fieldset>
                       <h2> Step 1: Add Personnel Details</h2>
                       <div class="row mb-2 ">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Name Latin</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-user"></i
                                           ></span>
                                       <input
                                               required
                                               name="NameInLatin"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="NAME IN LATIN"
                                       />
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Name in Khmer</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-user"></i
                                           ></span>
                                       <input
                                               required
                                               name="khName"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="ឈ្មោះ"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-2">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Family Name</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-user"></i
                                           ></span>
                                       <input
                                               required
                                               name="FamilyName"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="SENG"
                                       />
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Given Name</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-user"></i
                                           ></span>
                                       <input
                                               name="GivenName"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="VANNUN"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-0">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Sex</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <select name="Sex" id="" class="form-control form-select form-select mb-3" >
                                           <option selected disabled>--Select--</option>
                                           <?php while ($rowSex= mysqli_fetch_assoc($resultSex)){?>
                                               <option value="<?php echo $rowSex['SexID']?>"><?php echo $rowSex['SexEN']?></option>
                                           <?php }?>
                                       </select>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">PassportNO ID</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-book-add"></i
                                           ></span>
                                       <input
                                               name="Passport"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="NO.12345"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-0">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Nationality</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <select name="Nationality" id="" class="form-control form-select form-select mb-3" >
                                           <option selected disabled>--Select--</option>
                                           <?php foreach ($Nationality_array as $nationality){?>
                                               <option value="<?php echo $nationality['NationalityID']?>"><?php echo $nationality['NationalityEN']?></option>
                                           <?php }?>
                                       </select>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Country</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <select name="Country" id="" class="form-control form-select form-select mb-3" >
                                           <option selected disabled>--Select--</option>
                                           <?php foreach ($Country_array as $country){?>
                                               <option value="<?php echo $country['CountryID']?>"><?php echo $country['CountryEN']?></option>
                                               <?php }?>
                                       </select>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-2">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Date Of Birth</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-calendar"></i
                                       ></span>
                                       <input class="form-control" type="date" name="dob" value="2021-06-18" id="html5-date-input" />
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Place Of Birth</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-building-house"></i
                                           ></span>
                                       <input
                                               type="text"
                                               name="pod"
                                               class="form-control"
                                               id="basic-icon-default-fullname"
                                               placeholder="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                               aria-label="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                               aria-describedby="basic-icon-default-fullname2"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-2">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Email</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                       <input
                                               type="text"
                                               name="email"
                                               id="basic-icon-default-email"
                                               class="form-control"
                                               placeholder="@gmail.com"
                                               aria-label="john.doe"
                                               aria-describedby="basic-icon-default-email2"
                                       />
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Phone Number</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                         <span id="basic-icon-default-fullname2" class="input-group-text"
                                         ><i class="bx bx-phone"></i
                                             ></span>
                                       <input
                                               type="text"
                                               name="PhoneNumber"
                                               class="form-control"
                                               id="basic-icon-default-fullname"
                                               placeholder="011 586 835"
                                               aria-label="011 586 835"
                                               aria-describedby="basic-icon-default-fullname2"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-2">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Current Address</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-building-house"></i
                                           ></span>
                                       <input
                                               type="text"
                                               class="form-control"
                                               name="currentAddress"
                                               id="basic-icon-default-fullname"
                                               placeholder="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                               aria-label="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                               aria-describedby="basic-icon-default-fullname2"
                                       />
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-company">Current Address PP(Optional)</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                         <span id="basic-icon-default-fullname2" class="input-group-text"
                                         ><i class="bx bx-building-house"></i
                                             ></span>
                                       <input
                                               type="text"
                                               name="currentAddressPP"
                                               class="form-control"
                                               id="basic-icon-default-fullname"
                                               placeholder="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                               aria-label="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                               aria-describedby="basic-icon-default-fullname2"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-4">
                           <div class="col-lg-12">
                               <label class="col col-form-label" for="basic-icon-default-company">Photo</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                       <input class="form-control" name="img" type="file" id="formFile" />
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!--button-->
                       <a href="dashboard.php" class="btn btn-outline-danger">Cancel</a>
                       <input type="button" name="next" class="next btn btn-primary" value="Next" />

                   </fieldset>
                <!--Form Family Information Done-->
                   <fieldset>
                       <h2>Step 2: Family BackGround</h2>
                       <div class="row mb-2">
                           <div class="col-lg-6">

                               <label class="col col-form-label" for="basic-icon-default-company">Father Name</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-user"></i
                                           ></span>
                                       <input
                                               name="FatherName"
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
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                      ><i class="bx bx-calendar"></i
                                          ></span>
                                       <input
                                               name="FatherAge"
                                               type="number"
                                               id=""
                                               class="form-control"
                                               placeholder="Father Age"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>


                       <div class="row">

                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Father National</label>
                               <div class="col">
                                   <select name="fatherNationality" id="" class="form-select form-select mb-3" >
                                       <option selected disabled>--Select--</option>
                                       <?php foreach ($Nationality_array as $nationality){?>
                                           <option value="<?php echo $nationality['NationalityID']?>"><?php echo $nationality['NationalityEN']?></option>
                                       <?php }?>
                                   </select>
                               </div>
                           </div>

                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Father Country</label>
                               <div class="col">
                                   <select name="fatherCountry" id="" class="form-select form-select mb-3" >
                                       <option selected disabled>--Select--</option>
                                       <?php foreach ($Country_array as $country){?>
                                           <option value="<?php echo $country['CountryID']?>"><?php echo $country['CountryEN']?></option>
                                       <?php }?>
                                   </select>
                               </div>
                           </div>
                       </div>

                       <div class="row">

                           <div class="col-lg-12">

                               <label class="col col-form-label" for="basic-icon-default-company">Father Occupation</label>
                               <div class="col">
                                   <select name="FatherOccupation" id="" class="form-select form-select mb-3" >
                                       <option selected disabled>--Select--</option>
                                       <<?php foreach ($Occupation_array as $occupation){?>
                                           <option value="<?php echo $occupation['OccupationID']?>"><?php echo $occupation['OccupationEN']?></option>
                                       <?php }?>
                                   </select>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-2">
                           <div class="col-lg-6">

                               <label class="col col-form-label" for="basic-icon-default-company">Mother Name</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span id="basic-icon-default-fullname2" class="input-group-text"
                                       ><i class="bx bx-user"></i
                                           ></span>
                                       <input
                                               name="MotherName"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="Mother Name"
                                       />
                                   </div>
                               </div>
                           </div>

                           <div class="col-lg-6">

                               <label class="col col-form-label" for="basic-icon-default-company">Mother Age</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                      ><i class="bx bx-calendar"></i
                                          ></span>
                                       <input
                                               name="MotherAge"
                                               type="number"
                                               id=""
                                               class="form-control"
                                               placeholder="Mother Age"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>


                       <div class="row">

                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Mother National</label>
                               <div class="col">
                                   <select name="motherNationality" id="motherNa" class="MotherNa form-select form-select mb-3" >
                                       <option selected disabled>--Select--</option>
                                       <?php foreach ($Nationality_array as $nationality){?>
                                           <option value="<?php echo $nationality['NationalityID']?>"><?php echo $nationality['NationalityEN']?></option>
                                       <?php }?>
                                   </select>
                               </div>
                           </div>

                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Mother Country</label>
                               <div class="col">
                                   <select name="motherCountry" id="" class="form-select form-select mb-3" >
                                       <option selected disabled>--Select--</option>
                                       <?php foreach ($Country_array as $country){?>
                                           <option value="<?php echo $country['CountryID']?>"><?php echo $country['CountryEN']?></option>
                                       <?php }?>
                                   </select>
                               </div>
                           </div>
                       </div>

                       <div class="row">

                           <div class="col-lg-12">

                               <label class="col col-form-label" for="basic-icon-default-company">Mother Occupation</label>
                               <div class="col">
                                   <select name="MotherOccupation" id="" class="form-select form-select mb-3" >
                                       <option selected disabled>--Select--</option>
                                       <?php foreach ($Occupation_array as $occupation){?>
                                           <option value="<?php echo $occupation['OccupationID']?>"><?php echo $occupation['OccupationEN']?></option>
                                       <?php }?>
                                   </select>
                               </div>
                           </div>
                       </div>
                       <div class="row mb-2">
                           <div class="col-lg-6">

                               <label class="col col-form-label" for="basic-icon-default-company">Spouse Name</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span class="input-group-text"><i class="bx bx-year"></i></span>
                                       <input
                                               name="spouseName"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="Spouse Name (Optional)"
                                       />
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">

                               <label class="col col-form-label" for="basic-icon-default-company">Spouse Age</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span class="input-group-text"><i class="bx bx-year"></i></span>
                                       <input
                                               name="SpouseAge"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="Spouse Age"
                                       />
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="row mb-4">
                           <div class="col-lg-6">

                               <label class="col col-form-label" for="basic-icon-default-company">Family Current Address</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <span class="input-group-text"><i class="bx bx-year"></i></span>
                                       <input
                                               name="FamilyCurrentAddress"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="Family Address"
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
                                               name="GuardianPhoneNumber"
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
                <!-- Family BackGround End-->
                <!--Education BackGround In Progress-->
                   <fieldset>
                       <h2> Step 3: Education BackGround</h2>
                       <div class="row">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">School Type</label>
                               <div class="col">
                                   <select name="SchoolType" id="" class="form-control form-select form-select mb-3">
                                       <option selected disabled>--Select--</option>
                                       <?php
                                       $sql = "Select *From tblschooltype";
                                       $query = mysqli_query($conn, $sql);
                                       while ($data = mysqli_fetch_assoc($query)) { ?>
                                           <option value="<?php echo $data['SchoolTypeID'] ?>">
                                               <?php echo $data['SchoolTypeEN']?>
                                           </option>

                                       <?php }
                                       ?>
                                   </select>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">School Name</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <input
                                               name="SchoolName"
                                               type="text"
                                               id=""
                                               class="form-control"
                                               placeholder="Beltie"
                                       />
                                   </div>
                               </div>
                           </div>
                           <div class="row mb-3">
                               <div class="col-lg-6">
                                   <label class="col col-form-label" for="basic-icon-default-company">Academic Year</label>
                                   <div class="col">
                                       <div class="input-group input-group-merge">
                                           <span class="input-group-text"><i class="bx bx-year"></i></span>
                                           <input
                                                   name="AcademicYear"
                                                   type="text"
                                                   id=""
                                                   class="form-control"
                                                   placeholder="Year end of Grade 12 "
                                           />
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <label class="col col-form-label" for="basic-icon-default-company">Province</label>
                                   <div class="col">
                                       <div class="input-group input-group-merge">
                                           <span class="input-group-text"><i class="bx bx-year"></i></span>
                                           <input
                                                   Name="Province"
                                                   type="text"
                                                   id=""
                                                   class="form-control"
                                                   placeholder="Province"
                                           />
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                           <!--button-->
                           <input type="button" name="previous" class="previous btn btn-outline-danger" value="Previous" />
                           <input type="button" name="next" class="next btn btn-primary" value="Next" />
                   </fieldset>
                   <!--End Of Education BackGround-->
                   <!--Form Major Information-->
                   <fieldset>
                       <h2>Step 4: University Information</h2>
                       <div class="row">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Faculty</label>
                               <div class="col">
                                   <select name="Faculty" id="Faculty" class="faculty form-select mb-3"aria-label="Default select example")>
                                       <option selected disabled>(--Selected Faculty--)</option>;
                                       <?php while ($rowFaculty= mysqli_fetch_assoc($resultFaculty)){?>
                                           <option value="<?php echo $rowFaculty['FacultyID']?>"><?php echo $rowFaculty['FacultyEN']?></option>
                                       <?php };?>
                                   </select>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Major</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <select name="Major" id="Major" class="faculty form-select mb-3"aria-label="Default select example")">

                                       </select>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Campus</label>
                               <div class="col">
                                   <select name="Campus" id="" class="form-select form-select mb-3">
                                       <option selected disabled>--Select Campush--</option>

                                       <?php
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
                               <label class="col col-form-label" for="basic-icon-default-fullname">Degree</label>
                               <div class="col">
                                   <select name="Degree" id="" class="form-select form-select mb-3">
                                       <option selected disabled>-- Select Degree --</option>

                                       <?php

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
                       </div>
                       <div class="row">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Academic Year</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <select name="AcademicYear" id="" class="form-select form-select mb-3">
                                           <option selected disabled>--Select Academic Year--</option>

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
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Semester</label>
                               <div class="col">
                                   <div class="input-group input-group-merge">
                                       <select name="Semester" id="Semester" class="faculty form-select mb-3"aria-label="Default select example")">
                                            <option selected disabled>--Select Semester--</option>
                                            <?php
                                            $sql = "Select *From tblsemester";
                                            $query = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($query)) {?>
                                                <option value="<?php echo $data['SemesterID']?>"><?php echo $data['SemesterEN']?></option>
                                            <?php }?>
                                       </select>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Year</label>
                               <div class="col">
                                   <select name="Year" id="" class="form-select form-select mb-3">
                                       <option selected disabled>--Select Year--</option>

                                       <?php
                                       include_once '../BackEnd/db.php';

                                       $sql = "Select *From tblyear";
                                       $query = mysqli_query($conn, $sql);
                                       while ($data = mysqli_fetch_assoc($query)) { ?>
                                           <option value="<?php echo $data['YearID'] ?>">
                                               <?php echo $data['Year']?>
                                           </option>

                                       <?php }
                                       ?>
                                   </select>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Batch</label>
                               <div class="col">
                                   <select name="Batch" id="" class="form-select form-select mb-3">
                                       <option selected disabled>--Select Batch--</option>

                                       <?php
                                       include_once '../BackEnd/db.php';

                                       $sql = "Select *From tblbatch";
                                       $query = mysqli_query($conn, $sql);
                                       while ($data = mysqli_fetch_assoc($query)) { ?>
                                           <option value="<?php echo $data['BatchID'] ?>">
                                               <?php echo $data['BatchEN']?>
                                           </option>

                                       <?php }
                                       ?>
                                   </select>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Shift</label>
                               <div class="col">
                                   <select name="Shift" id="" class="form-select form-select mb-3">
                                       <option selected disabled>--Select Shift--</option>

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
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Program Type</label>
                               <div class="col">
                                   <select name="ProgramType" id="" class="form-select form-select mb-3">
                                       <option selected disabled>--Select Program Type--</option>

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
                       </div>
                       <div class="row mb-3">
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">Start Date</label>
                               <div class="col">
                                   <input class="form-control" type="date" name="StartDate" value="now id="html5-date-input" />
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <label class="col col-form-label" for="basic-icon-default-fullname">End Date</label>
                               <div class="col">
                                   <input class="form-control" type="date" name="EndDate" value="now" id="html5-date-input" />
                               </div>
                           </div>
                       </div>
                       <!--button-->
                       <input type="button" name="previous" class="previous btn btn-outline-danger" value="Previous" />
                       <input type="Submit" name="Submit" class="submit btn btn-success" value="Submit" />
                   </fieldset>

                <!--Form 5-->
    </form>
               </div>
</body>
</html>

<script>
    $(document).ready(function (){
        $('#Faculty').on('change',function (){
            var faculty_id = this.value;
            $.ajax({
                url:'../jquery/FacultyDropDown.php',
                type:"POST",
                data:{
                    faculty_data: faculty_id
                },
                success:function (result){
                    $('#Major').html(result);
                }
            })
        })
$(document).ready(function (){
    $('#motherNa').on('change',function (){
        var Mother_id=  this.value;
        console.log(Mother_id);
    })
})
    });
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



