
<?php
    session_start();
    include('../../../header.php');
?>

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }
        .mail-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .mail-header {
            background-color: #1877f2;
            color: white;
            padding: 20px;
            border-bottom: 1px solid #e4e6eb;
        }
        .mail-content {
            padding: 30px;
        }
        .form-label {
            font-weight: 600;
            color: #65676b;
        }
        .form-control, .form-control:focus {
            border-radius: 6px;
            border: 1px solid #dddfe2;
            box-shadow: none;
        }
        .form-control:disabled {
            background-color: #f0f2f5;
        }
        .section-title {
            color: #1877f2;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e4e6eb;
        }
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .attachment-preview {
            border: 1px dashed #dddfe2;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
            background-color: #f7f8fa;
        }
        .attachment-preview img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 4px;
        }

    </style>

    <div class="container-fluid">
        <div class="mail-container">
            <div class="mail-header">
                <h4 class="mb-0 text-light">
                    <span class="icon-3d">📨</span> Student Violation Report
                </h4>
            </div>
<?php
    $sql = "SELECT * FROM Mail_log WHERE id = ".$_GET['id'];
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    $form = $row['form_id'];
    $email = $row['email'];
    $subject = $row['subject'];
    $body = $row['body'];
    $attachment = $row['attachment'];
    $state = $row['status'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_POST['decline'])){
            $status = 'declined';
        } elseif(isset($_POST['accepted'])){
            $status = 'accepted';
        }

        if(isset($status)){
            $sql = "UPDATE Mail_log SET status='$status', admin_read=1 WHERE id=".$_GET['id'];
            if($conn->query($sql) == TRUE){
                    header('Location: ../../views/admin/admin_Notification.php');
                exit;
            } else {
                echo "Failed to update status";
            }
        }
    }

    echo "
            <div class='mail-content'>
                <h5 class='section-title'>Mail Details</h5>
                <div class='row'>
                    <div class='col-6 mb-4'>
                        <label class='form-label'>From</label>
                        <input type='text' class='form-control' value='$email' disabled>
                    </div>
                    
                    <div class='col-6 mb-4'>
                        <label class='form-label'>To</label>
                        <input type='text' class='form-control' value='admin@ncst.edu.ph' disabled>
                    </div>
                </div>
                
                <div class='mb-4'>
                    <label class='form-label'>Subject</label>
                    <input type='text' class='form-control' value='$subject ' disabled>
                </div>
                
                <div class='mb-4'>
                    <label class='form-label'>Body</label>
                    <textarea class='form-control' rows='5' disabled>$body</textarea>
                </div>
                
                <div class='mb-4'>
                    <label class='form-label'>Attached Picture</label>
                    <div class='attachment-preview'>
                        <img src='/ncst/public/uploads/reports/$attachment' alt='Violation Evidence' class='img-fluid'>
                        <p class='mt-2 text-muted'>Evidence_2023-0456.jpg</p>
                    </div>
                </div>
                    ";
                ?>
                <h5 class='section-title'>Actions</h5>
                <div class='action-buttons'>
                    <?php
                        if (isset($state)) {
                            switch($state) {
                                case 'pending':
                                    echo "
                                    <form method='post'>
                                        <button type='submit' name='decline' class='btn btn-danger'>
                                            <span class='iconify' data-icon='fluent-color:dismiss-circle-24' data-width='30px'></span> Deny
                                        </button>
                                        <button type='submit' name='accepted' class='btn btn-success'>
                                            <span class='iconify' data-icon='fluent-color:add-circle-24' data-width='30px'></span> Allow
                                        </button>
                                    </form>";
                                    break;

                                case 'accepted':
                                    echo "<div class='alert alert-success w-100 text-centered d-flex justify-content-center'>Accepted</div>";
                                    break;

                                case 'declined':
                                    echo "<div class='alert alert-danger w-100 text-centered d-flex justify-content-center'>Declined</div>";
                                    break;

                                default:
                                    echo "<div class='alert alert-secondary w-100 text-centered d-flex justify-content-center'>Unknown status</div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
    include('footer.php');
?>