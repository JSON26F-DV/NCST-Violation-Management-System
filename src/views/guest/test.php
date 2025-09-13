<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-5">Student Registration Form</h1>
        
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Extract all form data
            $student_id = $_POST['student_id'];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $birthday = $_POST['birthday'];
            $sex = $_POST['sex'];
            $religion = $_POST['religion'];
            $nationality = $_POST['nationality'];
            $guardian = $_POST['guardian'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $social_media = $_POST['social_media'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            $student_credits = $_POST['student_credits'];
            $course = $_POST['course'];
            $year_level = $_POST['year_level'];
            $status = $_POST['status'];
            $academic_standing = $_POST['academic_standing'];
            $current_gpa = $_POST['current_gpa'];
            $tuition_balance = $_POST['tuition_balance'];
            $next_payment_due = $_POST['next_payment_due'];
            $last_payment = $_POST['last_payment'];
            $scholarship = $_POST['scholarship'];
            
            // Convert checkboxes to boolean
            $hasBirthCertificate = isset($_POST['hasBirthCertificate']) ? 1 : 0;
            $hasGoodMoral = isset($_POST['hasGoodMoral']) ? 1 : 0;
            $hasReportCard = isset($_POST['hasReportCard']) ? 1 : 0;
            $hasIDPicture = isset($_POST['hasIDPicture']) ? 1 : 0;
            $hasMedical_record = isset($_POST['hasMedical_record']) ? 1 : 0;
            $hasForm137 = isset($_POST['hasForm137']) ? 1 : 0;

            $sql = "INSERT INTO students (
                student_id, first_name, middle_name, last_name, birthday, sex, religion, nationality, 
                guardian, email, password, social_media, address, contact_number, student_credits, 
                course, year_level, status, academic_standing, current_gpa, tuition_balance, 
                next_payment_due, last_payment, scholarship, hasBirthCertificate, hasGoodMoral, 
                hasReportCard, hasIDPicture, hasMedical_record, hasForm137
            ) VALUES (
                '$student_id', '$first_name', '$middle_name', '$last_name', '$birthday', '$sex', 
                '$religion', '$nationality', '$guardian', '$email', '$password', '$social_media', 
                '$address', '$contact_number', '$student_credits', '$course', '$year_level', 
                '$status', '$academic_standing', '$current_gpa', '$tuition_balance', 
                '$next_payment_due', '$last_payment', '$scholarship', '$hasBirthCertificate', 
                '$hasGoodMoral', '$hasReportCard', '$hasIDPicture', '$hasMedical_record', '$hasForm137'
            )";
            
            if($conn->query($sql) == TRUE) {
                echo '<div class="alert alert-success">Student registration successful!</div>';
            } else {
                echo '<div class="alert alert-danger">Registration failed: ' . $conn->error . '</div>';
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>