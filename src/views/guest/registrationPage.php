<?php
    session_start();

    include("../../../header.php");
    include $_SERVER['DOCUMENT_ROOT'].'/ncst/src/views/admin/navbar.php';
?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            border: none;
        }
        .form-control, .form-select {
            height: 45px;
            border-radius: 8px;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
            border-color: #86b7fe;
        }
        .btn-primary {
            background-color: #1877f2;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-outline-secondary {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
        }
        h5 {
            color: #1c1e21;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e4e6eb;
        }
        .form-check-input:checked {
            background-color: #1877f2;
            border-color: #1877f2;
        }
        .card-header {
            display: flex;
            align-items: center;
        }
        .card-header h3 {
            color: white;
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="text-center mb-5">
                    <div class=" p-1 rounded-3 position-relative " style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);" >
                        <img src='/ncst/public/assets/ncstLogo.png' alt='NCST Logo' width='100' class='school-logo'>
                    <div class="d-flex align-items-center mb-4">
                        <div class=" w-100">
                            <h3 class="fw-bold  text-light">National College of Science and Technology</h3>
                            <p class="mb-0 small text-light">Amafel Building, Aguinaldo Highway, Dasmariñas, Cavite 4114</p>
                        </div>
                    </div>
                        <h2 class="fw-bold mt-4 text-light">Student Registration</h2>
                        <p class=" text-warning">Please fill out all required information </br>
                        </p>
                            <?php
                                if (!empty($_SESSION["register_error"])) {
                                    foreach ($_SESSION["register_error"] as $error) {
                                        echo '<div class="alert alert-danger">'.$error.'</div>';
                                    }
                                    unset($_SESSION["register_error"]);
                                }
                            ?>
                    </div>
                </div>
                <form method="POST" action="register_process.php">
                    <!-- Personal Information Card -->
                    <div class="card shadow-sm mb-5 bg-white">
                        <div class="card-header bg-primary d-flex gap-2">
                            <div class="p-1 bg-light rounded-3">
                                <span class='iconify' data-icon='fluent-color:person-starburst-24' data-width='30px'></span>
                            </div>
                            <h4 class="text-light mt-2">Personal Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="Enter middle name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="sex" class="form-label">Sex</label>
                                    <select class="form-select" id="sex" name="sex" required>
                                        <option selected disabled>Select sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="religion" class="form-label">Religion</label>
                                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter religion">
                                </div>
                                <div class="col-md-6">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter nationality">
                                </div>
                                <div class="col-md-6">
                                    <label for="guardian" class="form-label">Guardian</label>
                                    <input type="text" class="form-control" id="guardian" name="guardian" placeholder="Enter guardian name">
                                </div>
                                <div class="col-md-6">
                                    <label for="socialMedia" class="form-label">Social Media</label>
                                    <input type="url" class="form-control" id="socialMedia" name="social_media" placeholder="Enter social media link">
                                </div>
                                <div class="col-md-6">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="contactNumber" name="contact_number" placeholder="Enter contact number">
                                </div>
                                <div class="col-13">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter complete address">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STUDENT ACCOUNT -->
                    <div class="card shadow-sm mb-5 bg-white">
                        <div class="card-header bg-primary d-flex gap-2">
                            <div class="p-1 bg-light rounded-3">
                                <span class='iconify' data-icon='fluent-color:document-lock-24' data-width='30px'></span>
                            </div>
                            <h4 class="text-light mt-2">Login Credentials</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information Card -->
                    <div class="card shadow-sm mb-5 bg-white">
                        <div class="card-header bg-primary d-flex gap-3 align-items-center">
                            <div class="p-1 bg-light rounded-3">
                                <span class='iconify' data-icon='fluent-color:book-24' data-width='30px'></span>
                            </div>
                            <h3 class="text-light mt-1">Academic Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="course" class="form-label">Course</label>
                                    <select class="form-select" id="course" name="course" required>
                                        <option selected disabled>Select course</option>
                                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                                        <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                                        <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                                        <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
                                        <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                                        <option value="Bachelor of Arts in Communication">Bachelor of Arts in Communication</option>
                                        <option value="Bachelor of Science in Industrial Technology">Bachelor of Science in Industrial Technology</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="yearLevel" class="form-label">Year Level</label>
                                    <select class="form-select" id="yearLevel" name="year_level" required>
                                        <option selected disabled>Select year level</option>
                                        <option value="1st">1st Year</option>
                                        <option value="2nd">2nd Year</option>
                                        <option value="3rd">3rd Year</option>
                                        <option value="4th">4th Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Requirements & Documents Card -->
                    <div class="card shadow-sm mb-5 bg-white">
                        <div class="card-header bg-primary text-light d-flex align-items-center gap-3">
                            <div class="p-1 bg-light rounded-3">
                                <span class='iconify' data-icon='fluent-color:document-add-24' data-width='30px'></span>
                            </div>
                            <h4 class="text-light mt-2">Requirements & Documents</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="birthCertificate" name="hasBirthCertificate" value="0">
                                        <label class="form-check-label" for="birthCertificate">Birth Certificate</label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="goodMoral" name="hasGoodMoral" value="0">
                                        <label class="form-check-label" for="goodMoral">Good Moral Certificate</label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="reportCard" name="hasReportCard" value="0">
                                        <label class="form-check-label" for="reportCard">Report Card</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="idPicture" name="hasIDPicture" value="0">
                                        <label class="form-check-label" for="idPicture">ID Picture (1x2)</label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="medicalRecord" name="hasMedical_record" value="0">
                                        <label class="form-check-label" for="medicalRecord">Medical Record</label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="form136" name="hasForm137" value="1">
                                        <label class="form-check-label" for="form136">Form 137</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-secondary me-4" onclick="document.querySelector('form').reset();">Clear Form</button>
                        <button type='submit' class='btn btn-primary animate-pulse' name="signUp">Submit Registration</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    include("../../../footer.php");
?>