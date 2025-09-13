<?php
include("../../../config/config.php");
if (isset($_POST["logIn"])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // plain input

    $sql = "SELECT * FROM students WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {  
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION["student_id"] = $row["student_id"]; 
            header("Location: ../../authenticated/students/userProfile.php");
            exit();
        } else {
        echo "
            <script>alert('Wrong Email or Password');
                window.location.href = 'loginPage.php';
            </script>
            ";
        }
    } else {
        echo "
            <script>alert('Wrong Email or Password');
                window.location.href = 'loginPage.php';
            </script>
        ";
    }
}
?>
