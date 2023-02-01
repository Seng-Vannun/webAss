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
    <div class="layout-container"
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
                            <div class="card-body">
                                <form>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">KhName</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-user"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        name="khName"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="សេង វណ្ណនន់"
                                                        aria-label="John Doe"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name in Latin</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-user"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        name="NameInLatin"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="SENG VANNUN"
                                                        aria-label="SENG VANNUN"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Family Name</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-user"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        name="FamilyName"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="SENG"
                                                        aria-label="SENG"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Given Name</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-user"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        name="GivenName"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="VANNUN"
                                                        aria-label="VANNUN"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Gender</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <div class="col-md">
                                                    <div class="form-check form-check-inline mt-1">
                                                        <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Sex"
                                                                id="Male"
                                                                value="Male"
                                                        />
                                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Sex"
                                                                id="Female"
                                                                value="Female"
                                                        />
                                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                <input
                                                        type="text"
                                                        id="basic-icon-default-email"
                                                        class="form-control"
                                                        placeholder="john.doe"
                                                        aria-label="john.doe"
                                                        aria-describedby="basic-icon-default-email2"
                                                />
                                                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Phone Number</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-user"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="011 586 835"
                                                        aria-label="011 586 835"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-calendar"></i
                                                  ></span>
                                                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Birth Place</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-map"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                                        aria-label="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Address</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-map"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                                        aria-label="#21, St 360, Boeung Kengkang 3, Boeung Kengkang Phnom Penh, 12304"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Profile Picture</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" type="file" id="formFile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Father Name</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-user"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="John Doe"
                                                        aria-label="John Doe"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Current Job</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bxs-shopping-bag"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="Seller"
                                                        aria-label="Seller"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Mother Name</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-user"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="John Doe"
                                                        aria-label="John Doe"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Current Job</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bxs-shopping-bag"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="House Wife"
                                                        aria-label="House Wife"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">High School</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                              ><i class="bx bx-building"></i
                                                  ></span>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-icon-default-fullname"
                                                        placeholder="High School"
                                                        aria-label="High School"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">BAC II CERTIFICATE (PDF)</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" type="file" id="formFile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">PAYMENT TRANSACTION (ABA)</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" type="file" id="formFile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">PAYMENT TRANSACTION (ABA)</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" name="Submit"class="btn btn-primary">Send</button>
                                            <a type="submit" class="btn btn-outline-danger" href="../index.php">Cancel</a>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
            <!-- Content wrapper -->
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
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
