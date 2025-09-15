<?php
    include("../../../header.php");

    $sql = "SELECT * FROM users WHERE id = ".$_GET['id'];
    $query = $conn->query($sql);
    $result = $query->fetch_object();
?>
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
                    <div class="d-flex align-items-center">
                        <div class="logo-container me-3">
                            <img src="/public/images/ncstLogo.png" alt="NCST Logo" width="64" height="64" class="d-block">
                        </div>
                        <div>
                            <h4 class=" mb-1"><strong >NATIONAL COLLEGE OF SCIENCE AND TECHNOLOGY</strong></h4>
                            <small class="d-block">Amafel Building, Aguinaldo Highway, Dasmariñas, Cavite 4114</small>
                            <small class="d-block">Tel. No.: (046)416-6278 | Telefax: (046) | Mobile No.: +63918-888-6278</small>
                        </div>
                    </div>
                    <h2 class="fw-bold mt-4">Edit Student</h2>
                    <p class="text-muted">Please fill out all required information</p>
                </div>

                <!-- Personal Information Card -->
                <div class="card shadow-sm mb-4 bg-white">
                    <div class="card-header bg-primary d-flex gap-2">
                        <div class="p-1 bg-light rounded-2">
                            <span class='iconify' data-icon='fluent-color:person-starburst-32' data-width='30px'></span>
                        </div>
                        <h3 class="text-light">Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="studentId" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="studentId" placeholder="Enter student ID">
                            </div>
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6">
                                <label for="middleName" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" placeholder="Enter middle name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
                            </div>
                            <div class="col-md-6">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday">
                            </div>
                            <div class="col-md-6">
                                <label for="sex" class="form-label">Sex</label>
                                <select class="form-select" id="sex">
                                    <option selected disabled>Select sex</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="religion" class="form-label">Religion</label>
                                <input type="text" class="form-control" id="religion" placeholder="Enter religion">
                            </div>
                            <div class="col-md-6">
                                <label for="nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="nationality" placeholder="Enter nationality">
                            </div>
                            <div class="col-md-6">
                                <label for="guardian" class="form-label">Guardian</label>
                                <input type="text" class="form-control" id="guardian" placeholder="Enter guardian name">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email address">
                            </div>
                            <div class="col-md-6">
                                <label for="socialMedia" class="form-label">Social Media</label>
                                <input type="url" class="form-control" id="socialMedia" placeholder="Enter social media link">
                            </div>
                            <div class="col-md-6">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contactNumber" placeholder="Enter contact number">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter complete address">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Information Card -->
                <div class="card shadow-sm mb-4 bg-white">
                    <div class="card-header bg-primary d-flex gap-2">
                        <div class="p-1 bg-light rounded-2">
                            <span class='iconify' data-icon='fluent-color:book-24' data-width='30px'></span>
                        </div>
                        <h3 class="text-light">
                            Academic Information
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="course" class="form-label">Course</label>
                                <select class="form-select" id="course">
                                    <option selected disabled>Select course</option>
                                    <option>Bachelor of Science in Information Technology</option>
                                    <option>Bachelor of Science in Computer Science</option>
                                    <option>Bachelor of Science in Hospitality Management</option>
                                    <option>Bachelor of Science in Criminology</option>
                                    <option>Bachelor of Science in Nursing</option>
                                    <option>Bachelor of Arts in Communication</option>
                                    <option>Bachelor of Science in Industrial Technology</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="studentCredits" class="form-label">Student Credits</label>
                                <input type="text" class="form-control" id="studentCredits" placeholder="Enter credits">
                            </div>
                            <div class="col-md-6">
                                <label for="academicStanding" class="form-label">Academic Standing</label>
                                <select class="form-select" id="academicStanding">
                                    <option selected disabled>Select academic standing</option>
                                    <option>Good Standing</option>
                                    <option>Probation</option>
                                    <option>Warning</option>
                                    <option>Suspended</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="yearLevel" class="form-label">Year Level</label>
                                <select class="form-select" id="yearLevel">
                                    <option selected disabled>Select year level</option>
                                    <option>1st Year</option>
                                    <option>2nd Year</option>
                                    <option>3rd Year</option>
                                    <option>4th Year</option>
                                    <option>5th Year</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status">
                                    <option selected disabled>Select status</option>
                                    <option>Regular</option>
                                    <option>Irregular</option>
                                    <option>Transferee</option>
                                    <option>Returning</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="currentGPA" class="form-label">Current GPA</label>
                                <input type="text" class="form-control" id="currentGPA" placeholder="Enter current GPA">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financial Information Card -->
                <div class="card shadow-sm mb-4 bg-white">
                    <div class="card-header bg-primary text-light d-flex gap-2">
                        <div class="p-1 bg-light rounded-2">
                            <span class='iconify' data-icon='fluent-color:coin-multiple-24' data-width='30px'></span>
                        </div>
                        <h3 class="text-light">
                            Financial Information
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tuitionBalance" class="form-label">Tuition Balance</label>
                                <input type="text" class="form-control" id="tuitionBalance" placeholder="Enter balance">
                            </div>
                            <div class="col-md-6">
                                <label for="nextPaymentDue" class="form-label">Next Payment Due</label>
                                <input type="date" class="form-control" id="nextPaymentDue">
                            </div>
                            <div class="col-md-6">
                                <label for="lastPayment" class="form-label">Last Payment</label>
                                <input type="date" class="form-control" id="lastPayment">
                            </div>
                            <div class="col-md-6">
                                <label for="scholarship" class="form-label">Scholarship</label>
                                <select class="form-select" id="scholarship">
                                    <option selected disabled>Select scholarship</option>
                                    <option>None</option>
                                    <option>Academic</option>
                                    <option>Athletic</option>
                                    <option>Government</option>
                                    <option>Private</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirements & Documents Card -->
                <div class="card shadow-sm mb-4 bg-white">
                    <div class="card-header bg-primary text-light d-flex gap-2">
                        <div class="p-1 bg-light rounded-2">
                            <span class='iconify' data-icon='fluent-color:document-add-24' data-width='30px'></span>
                        </div>
                        <h3 class="text-light">
                            Requirements & Documents
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="birthCertificate">
                                    <label class="form-check-label" for="birthCertificate">Birth Certificate</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="transcript">
                                    <label class="form-check-label" for="transcript">Transcript of Records</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="diploma">
                                    <label class="form-check-label" for="diploma">Diploma</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="medicalCert">
                                    <label class="form-check-label" for="medicalCert">Medical Certificate</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="validId">
                                    <label class="form-check-label" for="validId">Valid ID</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="photos">
                                    <label class="form-check-label" for="photos">2x2 Photos</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="text-center">
                    <button type="button" class="btn btn-outline-secondary me-3">Clear Form</button>
                    <button type="submit" class="btn btn-primary">Submit Registration</button>
                </div>
            </div>
        </div>
    </div>

<?php
    include("../../../footer.php");
?>