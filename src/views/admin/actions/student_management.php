<?php
     include_once __DIR__ . '/../layouts/header_admin.php';
     include_once __DIR__ . "/../../../components/actions/student_status.php";

    $sql = "SELECT * FROM students WHERE student_id = ".$_GET['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    extract($row);
?>
<style>
    :root {
        --primary-blue: #1877f2;
        --primary-blue-hover: #166fe5;
        --surface-bg: #f8f9fa;
        --card-bg: #ffffff;
        --text-primary: #1c1e21;
        --text-secondary: #65676b;
        --border-color: #dadde1;
        --shadow-light: 0 2px 12px rgba(0, 0, 0, 0.08);
        --shadow-medium: 0 4px 24px rgba(0, 0, 0, 0.12);
        --border-radius: 12px;
        --border-radius-lg: 16px;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--text-primary);
        min-height: 100vh;
    }

    .profile-container {
        background: var(--card-bg);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-medium);
        overflow: hidden;
        border: 1px solid var(--border-color);
    }

    .profile-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, #4267b2 100%);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0%, 100% { transform: rotate(0deg); opacity: 0.3; }
        50% { transform: rotate(180deg); opacity: 0.1; }
    }

    .profile-picture-container {
        position: relative;
        width: 120px;
        height: 120px;
        margin: 0 auto 1rem;
        border-radius: 50%;
        background: linear-gradient(145deg, #ffffff, #e6e6e6);
        box-shadow: 
            8px 8px 16px rgba(0, 0, 0, 0.1),
            -8px -8px 16px rgba(255, 255, 255, 0.8);
        padding: 8px;
        transition: all 0.3s ease;
    }

    .profile-picture-container:hover {
        transform: translateY(-2px);
        box-shadow: 
            12px 12px 24px rgba(0, 0, 0, 0.15),
            -12px -12px 24px rgba(255, 255, 255, 0.9);
    }

    .profile-picture {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        background: linear-gradient(45deg, #f0f2f5, #ddd);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: var(--text-secondary);
    }

    .camera-icon {
        position: absolute;
        bottom: 8px;
        right: 8px;
        width: 36px;
        height: 36px;
        background: var(--primary-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
    }

    .camera-icon:hover {
        background: var(--primary-blue-hover);
        transform: scale(1.1);
    }

    .user-info-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: var(--shadow-light);
    }

    .info-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        background: var(--card-bg);
        border-radius: var(--border-radius);
        margin-bottom: 0.75rem;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .info-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: var(--primary-blue);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .info-item:hover {
        transform: translateX(4px);
        box-shadow: var(--shadow-light);
    }

    .info-item:hover::before {
        transform: scaleY(1);
    }

    .info-icon {
        width: 40px !important;
        height: 40px;
        border-radius: var(--border-radius);
        background: linear-gradient(145deg, var(--primary-blue), #4267b2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 1rem;
        font-size: 1.1rem;
        box-shadow: 
            4px 4px 8px rgba(24, 119, 242, 0.2),
            -2px -2px 8px rgba(255, 255, 255, 0.8);
    }

    .nav-tabs-modern {
        border: none;
        background: var(--surface-bg);
        border-radius: var(--border-radius);
        padding: 0.5rem;
        margin-bottom: 2rem;
    }

    .nav-tabs-modern .nav-link {
        border: none;
        background: transparent;
        color: var(--text-secondary);
        border-radius: var(--border-radius);
        padding: 0.75rem 1rem;
        margin: 0 0.25rem;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .nav-tabs-modern .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.5s;
    }

    .nav-tabs-modern .nav-link:hover::before {
        left: 100%;
    }

    .nav-tabs-modern .nav-link:hover {
        background: rgba(255, 255, 255, 0.7);
        color: var(--text-primary);
        transform: translateY(-2px);
        box-shadow: var(--shadow-light);
    }

    .nav-tabs-modern .nav-link.active {
        background: var(--primary-blue);
        color: white;
        box-shadow: 
            0 4px 12px rgba(24, 119, 242, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .tab-content {
        background: var(--card-bg);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-color);
    }

    .form-control, .form-select {
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        background: var(--card-bg);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(24, 119, 242, 0.1);
        background: var(--card-bg);
    }

    .form-label {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .btn-primary {
        background: var(--primary-blue);
        border: none;
        border-radius: var(--border-radius);
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: var(--primary-blue-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(24, 119, 242, 0.3);
    }

    .btn-outline-secondary {
        border: 1px solid var(--border-color);
        color: var(--text-secondary);
        border-radius: var(--border-radius);
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background: var(--surface-bg);
        border-color: var(--text-secondary);
        color: var(--text-primary);
    }

    .modal-footer {
        padding: 1.5rem 2rem;
    }

    /* Form Switch Styling */
    .form-check-input:checked {
        background-color: var(--primary-blue);
        border-color: var(--primary-blue);
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 3px rgba(24, 119, 242, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .profile-container {
            margin: 1rem;
            border-radius: var(--border-radius);
        }
        
        .profile-header {
            padding: 1.5rem;
        }
        
        .nav-tabs-modern {
            flex-direction: column;
        }
        
        .nav-tabs-modern .nav-link {
            margin: 0.25rem 0;
        }
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
</style>

    <div class='container-fluid py-4'>
        <div class='row justify-content-center'>
            <div class='col-12 col-xl-10'>
                <div class='profile-container'>
                    <div class='profile-header'>
                        <h2 class='mb-0 position-relative text-light'>Student Record Management</h2>
                        <p class='mb-0 mt-2 opacity-75 position-relative text-light'>View and manage student information, account settings, violation records, and credits.</p>
                    </div>

                    <div class='row g-0'>
                        <!-- USER PROFILE -->
                        <div class='col-lg-4 p-4' style='background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);'>
                            <?php
                                echo"
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
                                            <h4 class='h4 fw-bold mb-2'>$first_name $middle_name $last_name</h4>
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
                                        </div>
                                    </div>
                                ";
                            ?>
                        </div>

                        <div class='col-lg-8 p-4'>
                            <?php
                                $state = getStudentStatus($student_credits);
                                echo"
                                        <ul class='nav nav-tabs nav-tabs-modern flex_centered' id='profileTabs' role='tablist'>
                                            <li class='nav-item flex_centered' role='presentation'>
                                                <button class='nav-link active' id='personal-tab' data-bs-toggle='tab' data-bs-target='#personal' type='button' role='tab'>
                                                    <i class='iconify' data-icon='fluent-color:contact-card-24' data-width='30px'></i>  Status
                                                </button>
                                            </li>
                                            <li class='nav-item' role='presentation'>
                                                <button class='nav-link' id='academic-tab' data-bs-toggle='tab' data-bs-target='#academic' type='button' role='tab'>
                                                    <i class='iconify' data-icon='fluent-color:content-view-24' data-width='30px'></i> Records
                                                </button>
                                            </li>
                                            <li class='nav-item' role='presentation'>
                                                <button class='nav-link' id='documents-tab' data-bs-toggle='tab' data-bs-target='#documents' type='button' role='tab'>
                                                    <i class='iconify' data-icon='fluent-color:document-folder-24' data-width='30px'></i>Documents
                                                </button>
                                            </li>
                                            <li class='nav-item' role='presentation'>
                                                <button class='nav-link' id='financial-tab' data-bs-toggle='tab' data-bs-target='#financial' type='button' role='tab'>
                                                    <i class='iconify' data-icon='fluent-color:coin-multiple-24' data-width='30px'></i> Financial
                                                </button>
                                            </li>
                                        </ul>


                                        <div class='tab-content' id='profileTabsContent'>
                                            <!-- PERSONAL INFORMATION -->
                                            <div class='tab-pane fade show active' id='personal' role='tabpanel'>
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

                                            <!-- ACADEMIC INFORMATION -->
                                            <div class='tab-pane fade' id='academic' role='tabpanel'>
                                                <div class='row g-3'>
                                                    <div class='col-md-6'>
                                                        <label for='studentCredits' class='form-label'>Student Credits</label>
                                                        <input type='number' class='form-control' id='student_credits' name='student_credits' value='$student_credits' min='60' max='100'>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='course' class='form-label'>Course</label>
                                                        <select class='form-select' name='course'>
                                                            <option value='Bachelor of Science in Information Technology'" . ($course=='Bachelor of Science in Information Technology' ? " selected" : "") . ">Bachelor of Science in Information Technology</option>
                                                            <option value='Bachelor of Science in Computer Science'" . ($course=='Bachelor of Science in Computer Science' ? " selected" : "") . ">Bachelor of Science in Computer Science</option>
                                                            <option value='Bachelor of Science in Hospitality Management'" . ($course=='Bachelor of Science in Hospitality Management' ? " selected" : "") . ">Bachelor of Science in Hospitality Management</option>
                                                            <option value='Bachelor of Science in Criminology'" . ($course=='Bachelor of Science in Criminology' ? " selected" : "") . ">Bachelor of Science in Criminology</option>
                                                            <option value='Bachelor of Science in Nursing'" . ($course=='Bachelor of Science in Nursing' ? " selected" : "") . ">Bachelor of Science in Nursing</option>
                                                            <option value='Bachelor of Arts in Communication'" . ($course=='Bachelor of Arts in Communication' ? " selected" : "") . ">Bachelor of Arts in Communication</option>
                                                            <option value='Bachelor of Science in Industrial Technology'" . ($course=='Bachelor of Science in Industrial Technology' ? " selected" : "") . ">Bachelor of Science in Industrial Technology</option>
                                                        </select>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='yearLevel' class='form-label' name='year_level' >Year Level</label>
                                                        <select class='form-select' name='year_level' id='yearLevel'>
                                                            <option value='1st'" . ($year_level=='1st' ? " selected" : "") . ">1st Year</option>
                                                            <option value='2nd'" . ($year_level=='2nd' ? " selected" : "") . ">2nd Year</option>
                                                            <option value='3rd'" . ($year_level=='3rd' ? " selected" : "") . ">3rd Year</option>
                                                            <option value='4th'" . ($year_level=='4th' ? " selected" : "") . ">4th Year</option>
                                                        </select>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='student_status' class='form-label' >Student Status</label>
                                                        <select class='form-select' name='student_status'>
                                                            <option value='Active'" . ($student_status=='Active' ? " selected" : "") . ">Active</option>
                                                            <option value='Inactive'" . ($student_status=='Inactive' ? " selected" : "") . ">Inactive</option>
                                                            <option value='Graduated'" . ($student_status=='Graduated' ? " selected" : "") . ">Graduated</option>
                                                            <option value='Dropped'" . ($student_status=='Dropped' ? " selected" : "") . ">Dropped</option>
                                                            <option value='Banned'" . ($student_status=='Banned' ? " selected" : "") . ">Banned</option>
                                                        </select>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='academicStanding' class='form-label'>Academic Standing</label>
                                                        <select class='form-select' name='academic_standing'>
                                                            <option value='Regular'" . ($academic_standing=='Regular' ? " selected" : "") . ">Regular</option>
                                                            <option value='Irregular'" . ($academic_standing=='Irregular' ? " selected" : "") . ">Irregular</option>
                                                            <option value='Probation'" . ($academic_standing=='Probation' ? " selected" : "") . ">Probation</option>
                                                            <option value='Dismissed'" . ($academic_standing=='Dismissed' ? " selected" : "") . ">Dismissed</option>
                                                        </select>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='currentGPA' class='form-label'>Current GPA</label>
                                                        <input type='number' step='0.01' class='form-control' id='current_gpa' name='current_gpa' value='$current_gpa'>
                                                    </div>
                                                </div>
                                            </div> 

                                            <!-- DOCUMENTS INFORMATION-->
                                            <div class='tab-pane fade' id='documents' role='tabpanel'>
                                                <div class='row g-4'>
                                                    <div class='col-md-6'>
                                                        <div class='form-check form-switch'>
                                                            <input class='form-check-input' type='checkbox' id='hasBirthCertificate' name='hasBirthCertificate' " . ($hasBirthCertificate ? "checked" : "") . ">
                                                            <label class='form-check-label fw-semibold' for='birthCertificate'>
                                                                Birth Certificate
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class='form-check form-switch'>
                                                            <input class='form-check-input' type='checkbox' id='hasGoodMoral' name='hasGoodMoral' value='1' " . ($hasBirthCertificate ? "checked" : "") . ">
                                                            <label class='form-check-label fw-semibold' for='goodMoral'>
                                                                Good Moral Certificate
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class='form-check form-switch'>
                                                            <input class='form-check-input' type='checkbox' id='hasReportCard' name='hasReportCard' value='1' " . ($hasReportCard ? "checked" : "") . ">
                                                            <label class='form-check-label fw-semibold' for='reportCard'>
                                                                Report Card
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class='form-check form-switch'>
                                                            <input class='form-check-input' type='checkbox' id='hasIDPicture' name='hasIDPicture' value='1' " . ($hasIDPicture ? "checked" : "") . ">
                                                            <label class='form-check-label fw-semibold' for='hasIDPicture'>
                                                                ID Picture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class='form-check form-switch'>
                                                            <input class='form-check-input' type='checkbox' id='hasMedical_record' name='hasMedical_record' value='1' " . ($hasMedical_record ? "checked" : "") . ">
                                                            <label class='form-check-label fw-semibold' for='medicalRecord'>
                                                                Medical Record
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class='form-check form-switch'>
                                                            <input class='form-check-input' type='checkbox' id='hasForm137'  name='hasForm137' value='1' " . ($hasForm137 ? "checked" : "") . ">
                                                            <label class='form-check-label fw-semibold' for='hasForm137'>
                                                                Form 137
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class='tab-pane fade' id='financial' role='tabpanel'>
                                                <div class='row g-3'>
                                                    <div class='col-md-6'>
                                                        <label for='tuition_balance' class='form-label'>Tuition Balance</label>
                                                        <div class='input-group'>
                                                            <span class='input-group-text'>₱</span>
                                                            <input type='number' class='form-control' id='tuition_balance' name='tuition_balance' value='$tuition_balance'>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='nextPaymentDue' class='form-label'>Next Payment Due</label>
                                                        <input type='date' class='form-control' id='next_payment_due' name='next_payment_due' value='$next_payment_due'>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='last_payment' class='form-label'>Last Payment</label>
                                                        <div class='input-group'>
                                                            <span class='input-group-text'>₱</span>
                                                            <input type='datetime-local' class='form-control' name='last_payment' value='" . date('Y-m-d\TH:i', strtotime($last_payment)) . "'>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <label for='scholarship' class='form-label'>Scholarship</label>
                                                        <select class='form-select' id='scholarship' name='scholarship'>
                                                            <option value='None'" . ($scholarship=='None' ? " selected" : "") . ">None</option>
                                                            <option value='Full'" . ($scholarship=='Full' ? " selected" : "") . ">Full</option>
                                                            <option value='Partial'" . ($scholarship=='Partial' ? " selected" : "") . ">Partial</option>
                                                            <option value='Athletic'" . ($scholarship=='Athletic' ? " selected" : "") . ">Athletic</option>
                                                            <option value='Academic'" . ($scholarship=='Academic' ? " selected" : "") . ">Academic</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
    include_once __DIR__ . '/../layouts/footer_admin.php';
?>