<?php
    session_start();
    include('../../../../header.php');
    include('../../../components/navigationBar.php');
?>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border-radius: 12px;
        }
        .document-card {
            border-radius: 12px;
            transition: transform 0.2s;
            border: none;
        }
        .document-card:hover {
            transform: translateY(-5px);
        }
        .document-preview {
            background-color: #f8f9fa;
            border-radius: 8px;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-download {
            border-radius: 20px;
            padding: 8px 20px;
        }
        .btn-view {
            border-radius: 20px;
            padding: 8px 20px;
        }
        a {
            text-decoration: none; 
            color: inherit;       
        }
        a {
            text-decoration: none;
            color: #333333;
        }
    </style>

    <div class='container py-4 mt-5'>
        <div class='row justify-content-center'>
            <div class='col-12 col-lg-8'>
                <?php
                    $user_id = $_SESSION["student_id"];
                    $result = $conn->query("SELECT * FROM students WHERE student_id='$user_id'");
                    while ($row = $result->fetch_object()){
                        #Profile Header 
                        echo "
                            <!-- STUDENT PROFILE -->
                            <div class='profile-header p-4 mb-4 shadow-sm' style='background: linear-gradient(to right, #0d6efd, #66b2ff);'>
                                <div class='d-flex align-items-center'>
                                    <img src='/ncst/public/uploads/profile/{$row->profile_pic}' alt='Student Avatar' class='rounded-circle me-3 bg-light' style='width: 80px; height: 80px; object-fit: cover; border: 3px solid rgba(255,255,255,0.2)'>
                                    <div>
                                        <h2 class='mb-1 text-white'>{$row->first_name} {$row->last_name}</h2>
                                        <p class='mb-0 opacity-75 text-white'>{$row->course} • {$row->year_level} Year</p>
                                    </div>
                                </div>
                            </div>
                            <!--TRANSCRIPT OF RECORDS-->
                            <div class='card document-card shadow-sm mb-4'>
                                <div class='card-body p-4'>
                                    <div class='d-flex justify-content-between align-items-center mb-3'>
                                        <h5 class='mb-0 fw-bold'>Transcript of Records</h5>
                                        <span class='badge bg-primary bg-opacity-10 text-primary'>Official</span>
                                    </div>
                                    <div class='document-preview mb-4'>
                                        <img src='/ncst/public/assets/ncstLogo.png' alt='Transcript Preview' class='img-fluid rounded' style='max-height: 100%; max-width: 100%; object-fit: contain;'>
                                    </div>
                                    <div class='d-flex justify-content-end gap-2'>
                                        <a href='#' class='btn btn-outline-secondary btn-view'>View PDF</a>
                                        <a href='#' class='btn btn-primary btn-download'>Download</a>
                                    </div>
                                </div>
                            </div>
                            <!--GRADES--> 
                            <div class='card document-card shadow-sm'>
                                <div class='card-body p-4'>
                                    <h5 class='fw-bold mb-3'>Academic Summary</h5>
                                    <div class='row'>
                                        <div class='col-md-6 mb-3'>
                                            <div class='p-3 bg-light rounded'>
                                                <h6 class='text-muted small mb-2'>GPA</h6>
                                                <h4 class='mb-0'>{$row->current_gpa}</h4>
                                            </div>
                                        </div>
                                        <div class='col-md-6 mb-3'>
                                            <div class='p-3 bg-light rounded'>
                                                <h6 class='text-muted small mb-2'>Student Credits</h6>
                                                <h4 class='mb-0'>{$row->student_credits}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='progress mb-3' style='height: 8px;'>
                                        <div class='progress-bar bg-primary' role='progressbar' style='width: 95%' aria-valuenow='95' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                    <p class='text-muted small mb-0'>Degree completion: 95%</p>
                                </div>
                            </div>
                        ";
                    }
                ?>
        </div>
    </div>
</div>

<div class='container py-5'>
    <!-- GOOD MORAL CERTIFICATION -->

    <?php
            $user_id = $_SESSION["student_id"];
            $result = $conn->query("SELECT * FROM students WHERE student_id='$user_id'");
            while ($row = $result->fetch_object()){
                $student_id = $row->student_id;
                $row->student_id = substr($student_id, 0, 4) . "-" . substr($student_id, 4);
                if ($row->student_credits < 80 ) {
                    echo "
                        <div class='card certificate-card shadow-sm border-0 mb-4 position-relative'>
                            <div class='card-body p-4' style='filter: blur(3px); opacity: 0.7;'>
                                        
                                <div class='d-flex justify-content-between align-items-center mb-4'>
                                    <img src='/ncst/public/assets/ncstLogo.png' alt='NCST Logo' width='100' class='school-logo'>
                                    <div class='text-end'>
                                        <span class='badge bg-primary bg-opacity-10 text-primary rounded-pill'>Official Document</span>
                                        <div class='text-muted small mt-1'>Ref: GM-2023-55851</div>
                                    </div>
                                </div>
                        
                                <h4 class='text-center text-uppercase fw-bold mb-4' style='letter-spacing: 2px;'>
                                    Certificate of Good Moral Character
                                </h4>
                        
                                <div class='text-center mb-4'>
                                    <p class='lead'>This is to certify that</p>
                                    <h3 class='fw-bold text-primary'>JASON VERZOSA BEGORNIA</h3>
                                    <p class='lead'>is a bona fide student of this institution</p>
                                </div>

                                <div class='p-4 bg-white rounded-3 mb-4'>
                                    <p class='mb-0'>
                                        This certifies that the above-named student has exhibited good moral character 
                                        and has complied with all the rules and regulations of the National College of 
                                        Science and Technology during his/her stay in this institution.
                                    </p>
                                </div>
                            
                                <div class='row mt-4'>
                                    <div class='col-md-6'>
                                        <p class='mb-1'><strong>Issued on:</strong></p>
                                        <p>June 15, 2023</p>
                                    </div>
                                    <div class='col-md-6 text-md-end'>
                                        <p class='mb-1'><strong>Valid until:</strong></p>
                                        <p>June 15, 2024</p>
                                    </div>
                                </div>
                            
                                <div class='text-center mt-4'>
                                    <div class='signature-line mx-auto'></div>
                                    <p class='fw-bold mb-0'>Dr. Jason MapagMahal</p>
                                    <p class='text-muted small'>Registrar, NCST</p>
                                </div>
                                
                                <div class='mt-4 text-center'>
                                    <span class='badge bg-light text-dark border rounded-pill p-2'>
                                        <i class='bi bi-shield-check me-1'></i> Official Document - Not Valid Without Seal
                                    </span>
                                </div>
                        </div>
                        
                        <!-- LOCK TRALALA -->
                        <div class='position-absolute top-50 start-50 translate-middle text-center' style='z-index: 10;'>
                            <span class='iconify' data-icon='fluent-color:lock-closed-24' data-width='100px'></span>  
                            <div class='mt-3'>
                                <p class='mt-2 text-muted small'>
                                    <strong>Students with less than <i class='text-danger fw-1'>80 CREDITS</i> are not allowed to access their Good Moral Certificate. This policy ensures that only those who meet the required academic progress can request it. For more information, please send us a message.</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    ";
                } else {
                    echo "
                        <div class='card certificate-card shadow-sm border-0 mb-4'>
                            <div class='card-body p-4'>

                            <div class='d-flex justify-content-between align-items-center mb-4'>
                                <img src='/ncst/public/assets/ncstLogo.png' alt='NCST Logo' width='100' class='school-logo'>
                                <div class='text-end'>
                                    <span class='badge bg-primary bg-opacity-10 text-primary rounded-pill'>Official Document</span>
                                    <div class='text-muted small mt-1'>Ref: GM-{$row->student_id}</div>
                                </div>
                            </div>
                            
                            <h4 class='text-center text-uppercase fw-bold mb-4' style='letter-spacing: 2px;'>
                                Certificate of Good Moral Character
                            </h4>
                            
                            <div class='text-center mb-4'>
                                <p class='lead'>This is to certify that</p>
                                <h3 class='fw-bold text-primary'>{$row->first_name} {$row->middle_name} {$row->last_name}</h3>
                                <p class='lead'>is a bona fide student of this institution</p>
                            </div>

                                <div class='p-4 bg-white rounded-3 mb-4'>
                                    <p class='mb-0'>
                                        This certifies that the above-named student has exhibited good moral character 
                                        and has complied with all the rules and regulations of the National College of 
                                        Science and Technology during his/her stay in this institution.
                                    </p>
                                </div>
                                
                                <div class='row mt-4'>
                                    <div class='col-md-6'>
                                        <p class='mb-1'><strong>Issued on:</strong></p>
                                        <p>June 15, 2023</p>
                                    </div>
                                    <div class='col-md-6 text-md-end'>
                                        <p class='mb-1'><strong>Valid until:</strong></p>
                                        <p>June 15, 2024</p>
                                    </div>
                                </div>
                                
                                <div class='text-center mt-4'>
                                    <div class='signature-line mx-auto'></div>
                                    <p class='fw-bold mb-0'>Dr. Jason MapagMahal</p>
                                    <p class='text-muted small'>Registrar, NCST</p>
                                </div>
                                
                                <div class='mt-4 text-center'>
                                    <span class='badge bg-light text-dark border rounded-pill p-2'>
                                        <i class='bi bi-shield-check me-1'></i> Official Document - Not Valid Without Seal
                                    </span>
                                </div>
                            </div>
                        </div>
                    ";
                }
        }
    ?>
</div>




<?php
    include('student_mail.php');
    include('../../../../footer.php');
?>