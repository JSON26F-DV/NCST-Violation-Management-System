<style>
    body {
        background-color: #f0f2f5;
    }
    .card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .header-card {
        background: linear-gradient(135deg, #1877f2 0%, #0d5dbd 100%);
        color: white;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(24, 119, 242, 0.25);
        border-color: #1877f2;
    }
    .btn-primary {
        background-color: #1877f2;
        border-color: #1877f2;
    }
    .btn-outline-secondary {
        border-color: #ced4da;
    }
    textarea {
        min-height: 300px;
        resize: vertical;
    }
    #content {
      height: 200px !important;
    }
    .logo-container {
        background-color: white;
        border-radius: 50%;
        padding: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="modal fade" id="reportForm" tabindex="-1" aria-labelledby="reportFormLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <div class="d-flex align-items-center">
            <div class="logo-container me-3">
                <img src="/ncst/public/assets/ncstLogo.png" alt="NCST Logo" width="64" height="64" class="d-block">
            </div>
            <div>
                <h4 class=" mb-1"><strong class='text-white'>NATIONAL COLLEGE OF SCIENCE AND TECHNOLOGY</strong></h4>
                <small class="d-block text-white">Amafel Building, Aguinaldo Highway, Dasmariñas, Cavite 4114</small>
                <small class="d-block text-white">Tel. No.: (046)416-6278 | Telefax: (046) | Mobile No.: +63918-888-6278</small>
            </div>
        </div>
    </div>
<?php
    $user_id = $_SESSION["student_id"];
    $result = $conn->query("SELECT * FROM students WHERE student_id='$user_id'");
    $row = $result->fetch_assoc();

    $student_id        = $row['student_id'];
    $email             = $row['email'];
    if (isset($_POST["sendingMail"])) {
        try {
            $ncst = 202355851;
            $subject = $_POST['subject'];
            $message = $_POST['body'];
            $profile_pic = null;
            $send_type = 'request';

            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $fileName = $_FILES["image"]["name"];
                $fileSize = $_FILES["image"]["size"];
                $tmpName = $_FILES["image"]["tmp_name"];

                $validImageExtension = ['jpg', 'jpeg', 'png'];
                $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($imageExtension, $validImageExtension)) {
                    echo "<script>alert('Invalid Image Extension');</script>";
                } elseif ($fileSize > 5000000) {
                    echo "<script>alert('Image Size Is Too Large');</script>";
                } else {
                    $newImageName = uniqid() . '.' . $imageExtension;
                    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/ncst/public/uploads/reports/';
                    if (move_uploaded_file($tmpName, $uploadDir . $newImageName)) {
                        $profile_pic = $newImageName; 
                    } else {
                        echo "<script>alert('Failed to upload image');</script>";
                    }
                }
            }

        // Prepared statement para safe
        $stmt = $conn->prepare("INSERT INTO Mail_log (from_id, to_id, email, subject, body, attachment, send_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssss", $student_id, $ncst, $email, $subject, $message, $profile_pic, $send_type);

            if ($stmt->execute()) {
                echo "
                    <script>
                        alert('Report sent successfully!');
                        window.location.href = 'userProfile.php';
                    </script>";
            } else {
                echo "<script>alert('Sending failed: " . $stmt->error . "');</script>";
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
        }
        exit();
    }

        echo"
                <form method='POST' autocomplete='off' enctype='multipart/form-data'>
                    <div class='modal-body'>
                    <div class=' p-4 mb-4'>
                        <h2 class='mb-4 text-center'>Student Report Form</h2>
                            <div class='mb-3'>
                                <label for='fromEmail' class='form-label fw-bold'>From</label>
                                <input type='email' class='form-control' id='fromEmail' value='$email' readonly>
                            </div>

                            <div class='mb-3'>
                                <label for='toEmail' class='form-label fw-bold'>To</label>
                                <input type='email' class='form-control' id='toEmail' name='ncst_department' value='StudentAffairs@ncst.edu.ph' readonly>
                            </div>

                            <div class='mb-3'>
                                <label for='subject' class='form-label fw-bold'>Subject</label>
                                <input type='text' class='form-control' id='subject' name='subject' placeholder='Enter subject here'>
                            </div>

                            <div class='mb-3'>
                                <label for='content' class='form-label fw-bold '>Content</label> 
                                <textarea class='form-control' id='content' name='body' placeholder='Write your report here...'></textarea>
                            </div>

                            <div class='mb-4'>
                                    <label for='attachment' class='form-label fw-bold'>Attachment</label>
                                    <input class='form-control' class='form-control' type='file' id='image' name='image' accept='image/*' id='image'>
                                    <div class='form-text'>Maximum file size: 5MB</div>
                            </div>
                    </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-primary' name='sendingMail'>Send Report</button>
                    </div>
                </form>
            ";
        ?>

    </div>
  </div>
</div>

