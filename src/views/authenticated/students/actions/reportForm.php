<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ncst/header.php';
?>

<style>
    .modal-container {
        width: 100%;
        max-width: 600px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    .modal-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        align-items: center;
    }
    .modal-dots {
        display: flex;
        gap: 8px;
        margin-right: 12px;
    }
    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
    .dot-danger {
        background-color: #ff5f56;
    }
    .dot-warning {
        background-color: #ffbd2e;
    }
    .dot-success {
        background-color: #27c93f;
    }
    .modal-title {
        font-size: 14px;
        font-weight: 500;
        color: #424245;
        margin: 0;
    }
    .modal-body {
        padding: 20px;
    }
    .form-label {
        font-size: 13px;
        color: #86868b;
        margin-bottom: 4px;
    }
    .form-control, .form-control:disabled {
        background-color: #f5f5f7;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 14px;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #0071e3;
        background-color: #f5f5f7;
    }
    textarea.form-control {
        resize: none;
    }
    .modal-footer {
        padding: 12px 20px;
        border-top: 1px solid #e0e0e0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .btn-light {
        background-color: transparent;
        border: none;
        color: #424245;
        font-size: 14px;
        padding: 6px 12px;
    }
    .btn-light:hover {
        background-color: #f5f5f7;
    }
    .btn-primary {
        background-color: #0071e3;
        border: none;
        font-size: 14px;
        font-weight: 500;
    }
    .btn-primary:hover {
        background-color: #0062c4;
    }
    .top {
        margin-top: 75px;
    }
</style>

<div class="modal fade" id="reportForm" tabindex="-1" aria-labelledby="reportFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post"  autocomplete='off' enctype='multipart/form-data'>
            <div class="modal-content">
                <div class="modal-header">
                        <div class="modal-dots">
                            <div class="dot dot-danger"></div>
                            <div class="dot dot-warning"></div>
                            <div class="dot dot-success"></div>
                        </div>
                        <h5 class="modal-title ms-auto fw-medium">Student Mail</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="from" class="form-label">From</label>
                        <input type="text" class="form-control" id="from" value="<?= $email?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="to" class="form-label">To</label>
                        <input type="text" class="form-control" id="to" value="ncstoffice@affair.edu.ph" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="Enter subject here...">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="body" rows="6" placeholder="Write your message here..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex">
                        <button type="button" class="btn btn-light border-0"><i class='iconify' data-icon='mynaui:paperclip' data-width='22px'></i> Attach File</button>
                        <button type="button" class="btn btn-light border-0"><i class='iconify' data-icon='mynaui:smile-circle' data-width='24px'></i> Emoji</button>
                        <button type="button" class="btn btn-light border-0 flex_centered align-items-center d-flex gap-1"><i class='iconify' data-icon='mynaui:image' data-width='22px'></i> Picture</button>
                    </div>
                    <button type="button" class="btn btn-primary rounded-pill px-4">
                        <i class='iconify' data-icon='mynaui:brand-telegram-solid' data-width='25px'></i>
                        Send
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ncst/footer.php';
?>