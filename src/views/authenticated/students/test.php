<?php
    include_once('../../../../header.php');
?>
    <style>
        body {
            background-color: #f5f5f7;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        .mail-card {
            width: 90%;
            max-width: 1200px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            background-color: white;
        }
        .mail-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            padding: 12px 20px;
        }
        .mail-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }
        .dot-danger {
            background-color: #ff453a;
        }
        .dot-warning {
            background-color: #ff9f0a;
        }
        .dot-success {
            background-color: #30d158;
        }
        .mail-title {
            font-size: 16px;
            font-weight: 500;
            color: #1c1c1e;
            margin-left: 10px;
        }
        .mail-column {
            padding: 0;
            border-right: 1px solid #e9ecef;
        }
        .mail-list {
            height: calc(100vh - 120px);
            overflow-y: auto;
        }
        .mail-item {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 12px 16px;
            border-bottom: 1px solid #e9ecef;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .mail-item:hover {
            background-color: #f8f9fa;
        }
        .mail-item.unread {
            background-color: #f0f7ff;
        }
        .mail-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .mail-subject {
            font-weight: 500;
            color: #1c1c1e;
            margin-bottom: 2px;
        }
        .mail-preview {
            font-size: 13px;
            color: #636366;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .mail-detail {
            padding: 20px;
            height: calc(100vh - 120px);
            overflow-y: auto;
        }
        .mail-detail-header {
            margin-bottom: 20px;
        }
        .mail-detail-subject {
            font-size: 18px;
            font-weight: 500;
            color: #1c1c1e;
            margin-bottom: 8px;
        }
        .mail-detail-body {
            line-height: 1.6;
            color: #1c1c1e;
            white-space: pre-wrap;
        }
        .mail-response {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 16px;
            margin-top: 20px;
        }
        .mail-response-header {
            margin-bottom: 12px;
        }
        .mail-response-subject {
            font-weight: 500;
            color: #1c1c1e;
        }
        .mail-response-body {
            line-height: 1.6;
            color: #1c1c1e;
        }
        @media (max-width: 768px) {
            .mail-column {
                border-right: none;
                border-bottom: 1px solid #e9ecef;
            }
            .mail-list, .mail-detail {
                height: auto;
                max-height: 300px;
            }
        }
        .off-top{
            margin-top: 70px;
        }
    </style>
<div class="container flex_centered off-top">
    <div class="mail-card">
        <div class="mail-header d-flex align-items-center">
            <span class="mail-dot dot-danger"></span>
            <span class="mail-dot dot-warning"></span>
            <span class="mail-dot dot-success"></span>
            <span class="mail-title">Student Mailbox</span>
        </div>
        
        <div class="row g-0">
            <!-- Left Column - Mail List -->
            <div class="col-md-4 mail-column">
                <div class="mail-list">
                    <?php
                        $sql = "SELECT * FROM mail_logs 
                                WHERE student_id = $user_id
                                AND status != 'pending'
                                ORDER BY created_at DESC";

                        $query = $conn->query($sql);

                        while ($row = $query->fetch_object()) {
                            $statusText = ($row->student_read == 0) ? 'UNREAD' : 'READ';
                            $badgeClass = ($row->student_read == 0) ? 'bg-warning' : 'bg-secondary';  
                            $state = ($row->status);
                            if (isset($state)) {
                                switch($state) {
                                    case 'approved':
                                        $message='Request accepted by Student  Affairs. See more ';
                                        $alertClass = "alert-success";
                                        break;
                                    case 'declined':
                                        $message='Request not approved by Student Affairs.  See more</a>';
                                        $alertClass = "alert-danger";
                                        break;
                                    default:
                                        $message='Your request is pending review by Student Affairs. View details ';
                                        $alertClass = "alert-secondary";
                                        break;
                                } 
                            }
                            echo"
                                <a href='?id={$row->mail_id}'>
                                    <div class='mail-item unread text-break'>
                                        <div class='d-flex '>
                                            <img src='/ncst/public/uploads/profile/officer.png' class='mail-avatar me-3' alt='Student'>
                                            <div class='flex-grow-1'>
                                                <div class='mail-subject'>ncstOffice@violation.edu.ph</div>
                                                <p class='mail-preview  w-75'>$message</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            ";
                        }
                    ?>
                </div>
            </div>
            
            <?php
            $id = intval($_GET['id']) ?? null;
            $result = $conn->query("SELECT * FROM mail_logs WHERE mail_id='$id'");
            $row = $result->fetch_assoc();
            extract($row);
            include __DIR__ . "/../../mails/student/mail_verdict.php";
            ?>



        </div>
    </div>
</div>
<?php
    include('../../../../footer.php');
?>
