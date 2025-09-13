<?php
    session_start();
    include('../../../../header.php');
    include('../../../components/navigationBar.php');
?>

<style>
    .user_profile {
        width: 75vw !important;
    }
    .card_title {
        background-color: #0D6EFD;
        border-top-left-radius: 0.8rem; 
        border-top-right-radius: 0.8rem; 
        border-bottom-left-radius: 0; 
        border-bottom-right-radius: 0; 
    }
    .flex_centered {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .icon {
        padding: 5px;
        background-color: #fff;
        border-radius: 10px;
    }
    .user_credit {
        height: 110px;
        width: 110px;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-radius: 50%;
        padding-top: 20px;
        font-weight: bold;
        font-size: 20px;
        color: #333;
    }

    .user_content .user_picture {
        height: 170px;
        width: 170px;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-radius: 50%;
        border: 5px solid #b2b2b2ff;
        padding-top: 20px;
        position: relative;
    }
    .camera {
        padding: 8px;
        border: 3px solid white;
        background-color: #b2b2b2ff;
        border-radius: 50%;
        position: absolute;
        bottom: 0;
        right: 55px;
    }

    .popup-animate {
        transform: scale(0.7);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .modal.show .popup-animate {
        transform: scale(1);
        opacity: 1;
    }

    .bg-green {
        background-color: green;
    }
    .bg-yellow {
        background-color: yellow;
    }
    .bg-red {
        background-color: red;
    }

    .text-green {
        color: green !important;
    }
    .text-yellow {
        color: yellow !important;
    }
    .text-red {
        color: red !important;
    }

    .percentage {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        padding: 55px;
    }
.circle {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 20px;
  color: #333;
}
</style>

    <!-- STUDENT PROFILE CONTENT -->
<main class="user_profile container my-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <!-- STUDENT PROFILE -->
            <?php
            $user_id = $_SESSION["student_id"];
            $result = $conn->query("SELECT * FROM students WHERE student_id='$user_id'");
            $row = $result->fetch_assoc();

            // PERSONAL INFORMATION
            $student_id        = $row['student_id'];
            $first_name        = $row['first_name'];
            $middle_name       = $row['middle_name'];
            $last_name         = $row['last_name'];
            $birthday          = $row['birthday'];
            $sex               = $row['sex'];
            $religion          = $row['religion'];
            $nationality       = $row['nationality'];
            $guardian          = $row['guardian'];
            $email             = $row['email'];
            $social_media      = $row['social_media'];
            $address           = $row['address'];
            $contact_number    = $row['contact_number'];

            // ACADEMIC INFORMATION
            $student_credits   = $row['student_credits'];
            $id                = $row['student_id'];
            $student_id        = substr($student_id, 0, 4) . "-" . substr($student_id, 4);
            $course            = $row['course'];
            $year_level        = $row['year_level'];
            $Status            = $row['status'];
            $academic_standing = $row['academic_standing'];
            $current_gpa       = $row['current_gpa'];

            // FINANCIAL INFORMATION
            $tuition_balance   = $row['tuition_balance'];
            $next_payment_due  = $row['next_payment_due'];
            $last_payment      = $row['last_payment'];
            $scholarship       = $row['scholarship'];

            // REQUIREMENTS & DOCUMENTS
            $hasBirthCertificate = $row['hasBirthCertificate'];
            $hasGoodMoral        = $row['hasGoodMoral'];
            $hasReportCard       = $row['hasReportCard'];
            $hasIDPicture        = $row['hasIDPicture'];
            $hasMedical_record   = $row['hasMedical_record'];
            $hasForm137          = $row['hasForm137'];

            echo "
                <div class='card shadow-sm rounded-4'>
                    <div class='bg-light-blue p-4 text-center d-flex flex-column'>
                        <div class='user_content flex_centered mb-3 position-relative'>
                            <div class='user_picture overflow-hidden'>
                                <img src='/public/images/default.png' width='170px' alt='profile'>

                            </div>
                            <div class='camera'>
                                <span class='iconify' data-icon='fluent-color:camera-20' data-width='30px'></span> 
                            </div>
                        </div>
                        <h2 class='h4 fw-bold mb-2'>$first_name $last_name</h2>
                        <p class='text-blue fw-medium mb-0'>$course</p>
                    </div>
                    <div class='card-body border-top'>
                        <div class='d-flex justify-content-between align-items-center mb-3 gap-3'>
                            <span class='iconify' data-icon='fluent-color:mail-32' data-width='30px'></span>  
                            <span class='text-muted overflow-hidden'>$email</span>
                        </div>
                        <div class='d-flex justify-content-between align-items-center mb-3 gap-3'>
                            <span class='iconify' data-icon='fluent-color:contact-card-32' data-width='30px'></span>  
                            <span class='text-muted overflow-hidden'>$social_media</span>
                        </div>
                        <div class='d-flex justify-content-between align-items-center mb-3 gap-3'>
                            <span class='iconify' data-icon='fluent-color:location-ripple-24' data-width='30px'></span>  
                            <span class='text-muted'>$address</span>
                        </div>
                        <div class='d-flex justify-content-between align-items-center mb-3 gap-3'>
                            <span class='iconify' data-icon='fluent-color:number-symbol-square-32' data-width='30px'></span>  
                            <span class='text-muted overflow-hidden'>+63 $contact_number</span>
                        </div>

                        <div class='d-flex justify-content-between align-items-center mt-3'>
                        <button class='btn btn-primary w-100 overflow-hidden' data-bs-toggle='modal' data-bs-target='#profileModal'>Edit Profile</button>
                        </div>
                    </div>
                </div>
                ";
            include('../../../components/editProfile.php');
            ?>
        </div>
        <div class="col-lg-8">
            <div class="row g-4">
                <?php
                    $status                 = 'green'; 
                    $violation_status       = '';
                    $Description            = '';
                    $access                 = '';

                    //CLEARANCE
                    $clearance              = 'OK';
                    $pendingStatus          = 'success';
                    
                    //CERTIFICATE
                    $requests_certificate   = 'Allowed';
                    $requests_status        = 'success';

                    //ENROLLMENT
                    $Enrollment             = 'Allowed';
                    $isallowed              = 'success';

                    if (isset($student_credits)) {
                        switch (true) {
                            case ($student_credits >= 90):
                                $status = 'green';
                                $violation_status       =   'Clear / No Violation';
                                $Description            = 'Student has no record of misconduct.';
                                $access                 = 'Full access to all school services (library, enrollment, good moral certificate, events).';
                                break;
                            case ($student_credits >= 80):
                                //STATUS
                                $status                 = 'yellow';
                                $violation_status       = 'Minor Violation';
                                $Description            = 'Student committed small offenses (e.g., tardiness, dress code issues).';
                                $access                 = 'Normal access, but receives a warning. Records kept for monitoring.';
                                
                                //CLEARANCE
                                $clearance              = 'Pending';
                                $pendingStatus          = 'warning';
                                break;
                            case ($student_credits >= 70):
                                $status                 = 'red';
                                $violation_status       = 'Needs Clearance';
                                $Description            = 'Student has multiple or moderate violations (e.g., cutting classes, disrespect, repeated tardiness).';
                                $access                 = 'Cannot request good moral certificate or clearance for internships until settled with guidance office.';

                                //CLEARANCE
                                $clearance              = 'Pending';
                                $pendingStatus          = 'warning';

                                //CERTIFICATE
                                $requests_certificate   =  'Denied';
                                $requests_status        =    'danger';
                                break;
                            case ($student_credits <= 67):
                                $status                 = 'red';
                                $violation_status       = 'Banned';
                                $Description            = 'Student committed serious violations (e.g., cheating, bullying, vandalism).';
                                $access                 = 'Blocked from enrollment, events, and clearance requests. Must face disciplinary action before regaining access';

                                //CLEARANCE
                                $clearance              = 'Denied';
                                $pendingStatus          = 'danger';
                                
                                //CERTIFICATE
                                $requests_certificate   = 'Denied';
                                $requests_status        = 'danger';

                                //ENROLLMENT
                                $Enrollment             = 'Denied';
                                $isallowed              = 'danger';
                                break;
                            default:
                                $Enrollment             = 'Allowed';
                                $isallowed              = 'success';
                        }
                    }
                    

                    echo"
                    <!-- SYSTEM STATUS -->
                        <div class='col-12'>
                                <div class='card shadow-sm rounded-4'>
                                    <div class='px-4 py-3 card_title'>
                                        <h5 class='fw-semibold text-dark mb-0 d-flex align-items-center gap-2 text-white'>
                                            <div class='icon'>
                                                <span class='iconify' data-icon='fluent-color:data-pie-32' data-width='30px'></span>  
                                            </div>         
                                            System Status
                                        </h5>
                                    </div>
                                    <div class='card-body'>

                                        <div class='container flex_centered flex-column mb-3'>
                                                <div class='circle' style='background: conic-gradient($status  0% $student_credits%, #e9ecef $student_credits% 100%);''>
                                                    <span class='bg-light text-$status  percentage flex_centered fs-1' >$student_credits</span>
                                                </div>

                                           <!-- <div class='user_credit bg-$status' >
                                                        <span class='text-$status student_credits bg-light '>$student_credits</span>
                                            </div>-->
                                            <div class='content d-flex flex-column mt-3'>
                                                    <h4 class='text-center text-$status'>$violation_status</h4>
                                                    <p><strong>Description</strong>: $Description</p>
                                                    <p><strong>Access</strong>: $access</p>
                                            </div>
                                        </div>

                                        <div class='row g-3 px-3'>
                                            <div class='col-12'>
                                                <div class='d-flex justify-content-between align-items-center'>
                                                    <span class='text-secondary fw-semibold text-black'>Clearance</span>
                                                    <span class='badge bg-$pendingStatus status-badge'>$clearance</span>

                                                </div>
                                            </div>
                                            <div class='col-12'>
                                                <div class='d-flex justify-content-between align-items-center'>
                                                    <span class='text-secondary fw-semibold text-black'>Certificate Requests</span>
                                                    <span class='badge bg-$requests_status status-badge'>$requests_certificate</span>
                                                </div>
                                            </div>
                                            <div class='col-12'>
                                                <div class='d-flex justify-content-between align-items-center'>
                                                    <span class='text-secondary fw-semibold text-black'>Next Term Enrollment</span>
                                                    <span class='badge bg-$isallowed status-badge'>$Enrollment</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <!-- PERSONAL INFORMATION -->
                        <div class='col-12'>
                            <div class='card shadow-sm rounded-4'>
                                <div class='card_title px-4 py-3'>
                                    <h5 class='fw-bold text-dark mb-0 d-flex align-items-center gap-2 text-white'>
                                        <div class='icon'>
                                            <span class='iconify' data-icon='fluent-color:person-starburst-32' data-width='30px'></span>  
                                        </div>     
                                        Personal Information
                                    </h5>
                                </div>
                                <div class='card-body'>
                                    <div class='row g-3'>
                                        <div class='col-md-6'>
                                            <label class='form-label text-muted small fw-semibold text-black'>Full name</label>
                                            <p class='mb-0 text-dark'>$first_name $middle_name $last_name</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label text-muted small fw-semibold text-black'>Birthday</label>
                                            <p class='mb-0 text-dark'>$birthday</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label text-muted small fw-semibold text-black'>Sex</label>
                                            <p class='mb-0 text-dark'>$sex</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label text-muted small fw-semibold text-black'>Nationality</label>
                                            <p class='mb-0 text-dark'>$nationality</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label text-muted small fw-semibold text-black'>Religion</label>
                                            <p class='mb-0 text-dark'>$religion</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label text-muted small fw-semibold text-black'>Parent / Guardian</label>
                                            <p class='mb-0 text-dark'>$guardian</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- ACADEMIC INFORMATION -->
                        <div class='col-12'>
                            <div class='card shadow-sm rounded-4'>
                                <div class='card_title px-4 py-3'>
                                    <h5 class='fw-bold text-dark mb-0 d-flex align-items-center gap-2 text-white'>
                                        <div class='icon'>
                                            <span class='iconify' data-icon='fluent-color:book-24' data-width='30px'></span>  
                                        </div>         
                                    Academic Information
                                    </h5>
                                </div>
                                <div class='card-body'>
                                    <div class='row g-3'>
                                        <div class='col-md-6'>
                                            <label class='form-label  small fw-semibold text-black'>Program</label>
                                            <p class='mb-0 text-dark'>$course</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label  small fw-semibold text-black'>Student ID</label>
                                            <p class='mb-0 text-dark'>$student_id</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label  small fw-semibold text-black'>Year Level</label>
                                            <p class='mb-0 text-dark'>$year_level</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label  small fw-semibold text-black'>Status</label>
                                            <p class='mb-0 text-dark'>$Status</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label  small fw-semibold text-black'>Academic Standing</label>
                                            <p class='mb-0 text-dark'>$academic_standing</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label  small fw-semibold text-black'>Current GPA</label>
                                            <p class='mb-0 text-dark'>$current_gpa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";  
                ?>
                
                <!-- REQUIREMENT & DOCUMENTS -->
                <div class='col-12'>
                    <div class='card shadow-sm rounded-4'>
                        <div class='card_title px-4 py-3'>
                            <h5 class='fw-bold text-dark mb-0 d-flex align-items-center gap-2 text-white'>
                                <div class='icon'>
                                    <span class='iconify' data-icon='fluent-color:document-add-20' data-width='30px'></span>  
                                </div>     
                                Requirements & Documents
                            </h5>
                        </div>
                        <div class='card-body'>
                            <div class='row g-3 px-5'>
                                <?php
                                    $docs = [
                                        "Birth Certificate" => $hasBirthCertificate,
                                        "Good Moral"        => $hasGoodMoral,
                                        "Report Card"       => $hasReportCard,
                                        "ID Picture"        => $hasIDPicture,
                                        "Form137"           => $hasForm137,
                                        "Medical Record"    => $hasMedical_record
                                    ];

                                    foreach ($docs as $label => $status) {
                                        $Icon = $status ? 'checkmark-circle-32' : 'dismiss-circle-32';
                                        echo "
                                            <div class='col-md-6 d-flex justify-content-between'>
                                                <label class='form-label small fw-semibold text-black'>$label</label>
                                                <span class='iconify' data-icon='fluent-color:$Icon' data-width='20px'></span>  
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FINANCIAL INFORMATION -->
                <?php
                    echo "
                        <div class='col-12'>
                            <div class='card shadow-sm rounded-4'>
                                <div class='card_title px-4 py-3'>
                                    <h5 class='fw-bold text-dark mb-0 d-flex align-items-center gap-2 text-white'>
                                        <div class='icon'>
                                            <span class='iconify' data-icon='fluent-color:coin-multiple-32' data-width='30px'></span>  
                                        </div>     
                                        Financial Information
                                    </h5>
                                </div>
                                <div class='card-body'>
                                    <div class='row g-3'>
                                        <div class='col-md-6'>
                                            <label class='form-label small fw-semibold text-black'>Tuition Balance</label>
                                            <p class='mb-0 text-dark'>₱ $tuition_balance</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label small fw-semibold text-black'>Scholarship</label>
                                            <p class='mb-0 text-dark'>$scholarship</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label small fw-semibold text-black'>Last Payment</label>
                                            <p class='mb-0 text-dark'>$last_payment</p>
                                        </div>
                                        <div class='col-md-6'>
                                            <label class='form-label small fw-semibold text-black'>Next Payment Due</label>
                                            <p class='mb-0 text-dark'>$next_payment_due</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                ?>
            </div>
        </div>
    </div>
</main>

<?php
    include('../../../../footer.php');
?>