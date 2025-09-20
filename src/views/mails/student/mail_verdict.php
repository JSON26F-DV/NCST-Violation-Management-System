<div class="col-md-8">
    <?php
        if($status == "approved"){
            $alertClass = "alert-success";
        }elseif($status == "declined"){
            $alertClass = "alert-danger";
        }else {
            $alertClass = "alert-secondary";
        }
        echo "
            <div class='mail-detail'>
                <div class='p-3 border-bottom d-flex align-items-start gap-3'>
                    <img src='/ncst/public/uploads/profile/$profile_pic' class='rounded-circle' width='50' height='50' alt='student'>
                    <div>
                        <h6 class='fw-semibold mb-1'>$subject</h6>
                        <p class='text-muted small mb-0'>$message</p>
                    </div>
                </div>
            ";
        ?>
                <div class='mail-response'>
                    <div class='mail-response-header'>
                        <div class='d-flex align-items-center mb-2'>
                            <img src='/ncst/public/uploads/profile/officer.png' class='mail-avatar me-3' alt='Admin'>
                            <div>
                                <div class='mail-response-subject'>Response to <?= $subject ?></div>
                                <div class='text-muted small'>From: NCST Department</div>
                            </div>
                        </div>
                    </div>
                    <div class='mail-response-body alert <?= $alertClass?>'>
                        <?php
                            if($status == "approved") {
                                echo "
                                    <p>Dear Valued Student,</p>

                                    <p>Thank you for taking the time to submit your report/concern. After careful review by our committee, we are pleased to inform you that your request has been approved.</p>

                                    <p>The information you provided met the necessary criteria and has been accepted in accordance with our current policies and guidelines.</p>

                                    <p>If you would like more details or next steps, we encourage you to visit the NCST Department office for further assistance or clarification.</p>

                                    <p>We appreciate your cooperation and continued engagement with our institution.</p>
                                ";
                            }elseif( $status == "declined") {
                                echo"
                                    <p>Dear Valued Student,</p>
                                    
                                    <p>Thank you for taking the time to submit your report/concern. After careful review by our committee, we regret to inform you that we are unable to approve your request at this time.</p>
                                    
                                    <p>The information provided did not meet the necessary criteria for further action according to our current policies and guidelines.</p>
                                    
                                    <p>We understand this may be disappointing, and we encourage you to visit the NCST Department office if you would like to discuss this matter further or need clarification regarding our decision.</p>
                                    
                                    <p>We appreciate your understanding and continued engagement with our institution.</p>
                                ";
                            }else{
                                echo "
                                    <p>Dear Valued Student,</p>

                                    <p>Thank you for submitting your report/concern. We kindly request that you visit the NCST Department office for further assistance or clarification regarding your submission.</p>

                                    <p>We appreciate your cooperation and continued engagement with our institution.</p>
                                ";
                            }
                                ?>
                    <div class='signature mb-2'>
                        <p>Sincerely,</p>
                        <p><strong>The NCST Department</strong></p>
                        <img src='/ncst/public/assets/Hitler_signature.png' alt='hitler' width='150px'>
                    </div>
                    </div>
                </div>
            </div>
</div>
