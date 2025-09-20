<?php
    include_once('../../../../header.php');
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
        right: 50px;
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
    
</style>

    <!-- STUDENT PROFILE CONTENT -->
<main class="user_profile container my-5 ">
    <div class="row g-4 ">
        <div class="col-lg-4  top-offset">
            <!-- STUDENT PROFILE -->
        <?php
            echo "
                <div class='card shadow-sm rounded-4'>
                    <div class='bg-light-blue p-4 text-center d-flex flex-column'>
                        <div class='user_content flex_centered mb-3 position-relative'>
                            <div class='user_picture overflow-hidden'>
                            <img src='/ncst/public/uploads/profile/$profile_pic' alt='profile' width='180px'>
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
                            <span class='iconify' data-icon='fluent-color:link-multiple-24' data-width='30px'></span>  
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
                    $state = getStudentStatus($student_credits);
                    echo"
                    <!-- SYSTEM STATUS -->
                        <div class='col-12  top-offset'>
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
                                                <div class='circle' style='background: conic-gradient({$state['status']}  0% $student_credits%, #e9ecef $student_credits% 100%);''>
                                                    <span class='bg-light text-{$state['status']}  percentage flex_centered fs-1' >$student_credits</span>
                                                </div>

                                            <div class='content d-flex flex-column mt-3'>
                                                    <h4 class='text-center text-{$state['status']}'>{$state['violation_status']}</h4>
                                                    <p><strong>Description</strong>: {$state['description']}</p>
                                                    <p><strong>Access</strong>: {$state['access']}</p>
                                            </div>
                                        </div>

                                        <div class='row g-3 px-3'>
                                            <div class='col-12'>
                                                <div class='d-flex justify-content-between align-items-center'>
                                                    <span class='text-secondary fw-semibold text-black'>Clearance</span>
                                                    <span class='badge bg-{$state['pendingStatus']} status-badge'>{$state['clearance']}</span>

                                                </div>
                                            </div>
                                            <div class='col-12'>
                                                <div class='d-flex justify-content-between align-items-center'>
                                                    <span class='text-secondary fw-semibold text-black'>Certificate Requests</span>
                                                    <span class='badge bg-{$state['requests_status']} status-badge'>{$state['requests_certificate']}</span>
                                                </div>
                                            </div>
                                            <div class='col-12'>
                                                <div class='d-flex justify-content-between align-items-center'>
                                                    <span class='text-secondary fw-semibold text-black'>Next Term Enrollment</span>
                                                    <span class='badge bg-{$state['isallowed']} status-badge'>{$state['Enrollment']}</span>
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
                                            <p class='mb-0 text-dark'>$student_status</p>
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
    include('student_mail.php');
    include('../../../../footer.php');
?>
