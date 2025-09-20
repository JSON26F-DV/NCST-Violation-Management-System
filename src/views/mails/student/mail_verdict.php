<style>
    .attachment-preview {
        border: 1px dashed #dddfe2;
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        background-color: #f7f8fa;
    }
    .attachment-preview img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 4px;
    }
</style>

<div class="col-md-8">
    <?php
        if($status == "approved"){
            $alertClass = "alert-success";
            $message = "Request accepted by Student  Affairs.";
        }elseif($status == "declined"){
            $alertClass = "alert-danger";
            $message = "Request  not approved by Student  Affairs.";
        }else {
            $alertClass = "alert-secondary";
            $message = "Request is pending approval by Student Affairs.";
        }
        $created_time = date("h:i A", strtotime($created_at));
        $responded_time = date("h:i A", strtotime($responded_at));
        echo "
        
        <div class='mail-detail'>
            <button type='button' class='w-100 border-0 bg-white shadow-none' data-bs-toggle='modal' data-bs-target='#studentMail'> 
                <div class='p-3 border-bottom d-flex justify-content-start gap-3'>
                    <img src='/ncst/public/uploads/profile/$profile_pic' class='rounded-circle' width='50' height='50' alt='student'>
                        <div class='position-relative w-100 text-start'>
                            <p class='position-absolute end-0'>$created_time</p>
                            <h6 class='fw-semibold mb-1 '>Email Preview</h6>
                            <p class='text-muted small mb-0'>$message</p>
                        </div>
                </div>
            </button>

            <div class='modal fade' id='studentMail' tabindex='-1' aria-labelledby='studentMailLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <form method='post'  autocomplete='off' enctype='multipart/form-data'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                    <div class='modal-dots'>
                                        <div class='dot dot-danger'></div>
                                        <div class='dot dot-warning'></div>
                                        <div class='dot dot-success'></div>
                                    </div>
                                    <h5 class='modal-title ms-auto fw-medium'>Email Details</h5>
                            </div>
                            <div class='modal-body'>
                                <div class=' d-flex flex_centered'>
                                    <label for='from' class='form-label mt-1'>From </label>
                                    <input type='text' class='form-control border-0 bg-white' id='from' value=': $email' disabled>
                                </div>
                                <div class=' d-flex flex_centered'>
                                    <label for='to' class='form-label mt-1'>To</label>
                                    <input type='text' class='form-control border-0 bg-white' id='to' value=': ncstoffice@affair.edu.ph' disabled>
                                </div>
                                <div class=' d-flex flex_centered'>
                                    <label for='subject' class='form-label mt-1'>Subject</label>
                                    <input type='text' class='form-control border-0 bg-white' id='subject' value=': $subject' disabled>
                                </div>
                                <div class='mb-2'>
                                    <label for='body' class='form-label'>Body</label>
                                    <textarea class='form-control' id='body' rows='6' disabled>$message</textarea>
                                </div>
                                <div class='mb-2'>
                                <label class='form-label'>Attached Picture</label>
                                    <div class='attachment-preview'>
                                        <img src='/ncst/public/uploads/reports/$attachment' alt='Violation Evidence' class='img-fluid'>
                                        <p class='mt-2 text-muted'>Evidence_2023-0456.jpg</p>
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <div class='w-100 text-center  alert $alertClass'>
                                    $message
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            ";
        ?>
        <div class='mail-response'>
            <div class='mail-response-header'>
                <div class='d-flex align-items-center mb-2 position-relative'>
                    <img src='/ncst/public/uploads/profile/officer.png' class='mail-avatar me-3' alt='Admin'>
                    <div>
                        <p class='position-absolute end-0'><?= $responded_time?></p>
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


