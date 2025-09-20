<?php
    require_once __DIR__ . "/../../../config/config.php";
    
    if (isset($_POST["logIn"])) {
        $email = $_POST['email'];
        $password = $_POST['password']; 

        // Check in students table
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
                echo "<script>alert('Wrong Email or Password');window.location.href = 'loginPage.php';</script>";
            }
        } else {
            $sql2 = "SELECT * FROM ncst_staff WHERE email=?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("s", $email);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();

                if (password_verify($password, $row2['password'])) {
                    session_start();
                    $_SESSION["user_id"] = $row2["user_id"]; 
                    $_SESSION["	role"] = $row2["role"];
                    header("Location: /ncst/src/views/admin/auditing/accountAuditing.php");
                    exit();
                } else {
                    echo "<script>alert('Wrong Email or Password');window.location.href = 'loginPage.php';</script>";
                }
            } else {
                echo "<script>alert('Wrong Email or Password');window.location.href = 'loginPage.php';</script>";
            }
        }
    }
?>
