<?php
    include('../../../header.php');
    include('../../components/navigationBar.php');
?>
    <style>
        body {
            background-color: #f5f6f7;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        .document-card {
            max-width: 800px;
            border-radius: 12px;
            border: none;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .logo-container {
            padding: 30px 0 20px;
        }
        .document-content {
            padding: 0 40px 30px;
        }
        .subject-line {
            color: #65676B;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        .signature {
            margin-top: 2.5rem;
        }
        .top-offset {
            margin-top: 50px;
        }
    </style>

    <div class=" top-offset container-fluid d-flex justify-content-center align-items-center min-vh-100 p-3 flex-column ">
        <div class="document-card shadow">
    <div class="modal-content">
            <div class="modal-header bg-primary rounded-3">
                <div class="d-flex flex-column align-items-center w-100 p-4">
                        <img src="/ncst/public/assets/ncstLogo.png" alt="NCST Logo" width="64" height="64" class="d-block">
                        <h4 class=" mb-1"><strong class='text-white'>NATIONAL COLLEGE OF SCIENCE AND TECHNOLOGY</strong></h4>
                        <small class="d-block text-white">Amafel Building, Aguinaldo Highway, Dasmariñas, Cavite 4114</small>
                        <small class="d-block text-white">Tel. No.: (046)416-6278 | Telefax: (046) | Mobile No.: +63918-888-6278</small>
                </div>
            </div>
            <div class="document-content">
                <div class="subject-line mt-4">Subject: Response to Your Submitted Concern</div>
                <?php
                    $sql = "SELECT m.*, s.profile_pic 
                            FROM Mail_log m
                            JOIN students s ON m.from_id = s.student_id  
                            WHERE id = ".$_GET['id'];
                    $query = $conn->query($sql);
                    $row = $query->fetch_assoc();

                    $subject = $row['subject'];
                    $body = $row['body'];
                    $profile_pic = $row['profile_pic']; 
                    $state = $row['status'];
                    
                    $approvalStatus = ($state == "accepted") ? 'alert-success' : 'alert-danger';  

                    if (isset($_GET['id'])) {
                        $id = intval($_GET['id']); 
                        $sql = "UPDATE Mail_log 
                                SET student_read = 1 
                                WHERE id = $id";
                        $conn->query($sql);
                    }

                    if($state == "accepted") {
                        echo "
                            <p>Dear Valued Student,</p>

                            <p>Thank you for taking the time to submit your report/concern. After careful review by our committee, we are pleased to inform you that your request has been approved.</p>

                            <p>The information you provided met the necessary criteria and has been accepted in accordance with our current policies and guidelines.</p>

                            <p>If you would like more details or next steps, we encourage you to visit the NCST Department office for further assistance or clarification.</p>

                            <p>We appreciate your cooperation and continued engagement with our institution.</p>
                        ";
                    }else {
                        echo"
                            <p>Dear Valued Student,</p>
                            
                            <p>Thank you for taking the time to submit your report/concern. After careful review by our committee, we regret to inform you that we are unable to approve your request at this time.</p>
                            
                            <p>The information provided did not meet the necessary criteria for further action according to our current policies and guidelines.</p>
                            
                            <p>We understand this may be disappointing, and we encourage you to visit the NCST Department office if you would like to discuss this matter further or need clarification regarding our decision.</p>
                            
                            <p>We appreciate your understanding and continued engagement with our institution.</p>
                        ";
                    }
                
                echo "
                    <div class='signature mb-2'>
                        <p>Sincerely,</p>
                        <p><strong>The NCST Department</strong></p>
                        <img src='/ncst/public/assets/Hitler_signature.png' alt='hitler' width='150px'>
                    </div>
                    <a href='../student/student_mail.php?id=".$_GET['id']."' class='list-group-item list-group-item-action mb-3 p-3 rounded-3 shadow-sm notification-card text-decoration-none' aria-current='false'>
                        <label for='report'>Your Submitted Report : </label>
                            <div class='d-flex gap-3 align-items-start alert $approvalStatus mt-2'>
                                <div class='user_info d-flex justify-content-between w-100'>
                                    <div class='d-flex justify-content-between align-items-start gap-3'>
                                        <img src='/ncst/public/uploads/profile/$profile_pic' width='55px' alt='Student avatar' class='rounded-circle avatar'>
                                        <div>
                                            <div class='fw-semibold'>$subject</div>
                                            <div class='text-muted small'>$body</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </a>
                    ";
                ?>
            </div>
        </div>
    </div>

<?php
    include("../../views/authenticated/students/student_mail.php");
    include('../../../footer.php');
?>
