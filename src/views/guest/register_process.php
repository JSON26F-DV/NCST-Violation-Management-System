<?php
    session_start();
    include("../../config/config.php");
            if(isset($_POST["signUp"])) {
            //PERSONAL INFORMATION
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $birthday = $_POST['birthday'];
            $sex = $_POST['sex'];
            $religion = $_POST['religion'];
            $nationality = $_POST['nationality'];
            $guardian = $_POST['guardian'];
            $social_media = $_POST['social_media'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            
            //ACADEMIC INFORMATION
            $student_credits = 100;
            $course = $_POST['course'];
            $year_level = $_POST['year_level'];
            $status = 'Regular';
            $current_gpa = 3.0;

            // DOCUMENTS INFORMATION
            $hasBirthCertificate = isset($_POST['hasBirthCertificate']) ? 1 : 0;
            $hasGoodMoral = isset($_POST['hasGoodMoral']) ? 1 : 0;
            $hasReportCard = isset($_POST['hasReportCard']) ? 1 : 0;
            $hasIDPicture = isset($_POST['hasIDPicture']) ? 1 : 0;
            $hasMedical_record = isset($_POST['hasMedical_record']) ? 1 : 0;
            $hasForm137 = isset($_POST['hasForm137']) ? 1 : 0;
            $tuition_balance = 5000;
            $status = 'active';
            
            //STUDENT ACCOUNT
            $email = $_POST['email'];
            $rawPassword = $_POST['password'];
            $rawConfirm = $_POST['confirm_password'];

            if ($rawPassword !== $rawConfirm) {
                $_SESSION["register_error"] [] = 'Password not match!';
                header("Location: registrationPage.php");
                exit();
            }
            $password = password_hash($rawPassword, PASSWORD_DEFAULT);

            //EMAIL VALIDATION
            $checkEmail = $conn->query("SELECT email FROM students WHERE  email = '$email'");
            if ($checkEmail->num_rows > 0) {
                $_SESSION["register_error"] [] = 'Email is already Registered!';
                header("Location: registrationPage.php");
                exit();
            }else {
                $sql = "INSERT INTO students (
                    first_name, middle_name, last_name, birthday, sex, religion, nationality, 
                    guardian, email, password, social_media, address, contact_number, student_credits, 
                    course, year_level, status, current_gpa, hasBirthCertificate, hasGoodMoral, 
                    hasReportCard, hasIDPicture, hasMedical_record, hasForm137, tuition_balance
                ) VALUES (
                    '$first_name', '$middle_name', '$last_name', '$birthday', '$sex', 
                    '$religion', '$nationality', '$guardian', '$email', '$password', '$social_media', 
                    '$address', '$contact_number', '$student_credits', '$course', '$year_level', 
                    '$status', '$current_gpa', '$hasBirthCertificate', 
                    '$hasGoodMoral', '$hasReportCard', '$hasIDPicture', '$hasMedical_record', '$hasForm137', '$tuition_balance'
                )";
                if($conn->query($sql) == TRUE) {
                    header("location: login/loginPage.php");
                } else {
                    echo "Error".$conn->error;
                }
            }
            exit();
        }
?>