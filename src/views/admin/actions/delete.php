<?php
    include_once __DIR__ . '/../layouts/header_admin.php';
    $sql = "SELECT * FROM students WHERE student_id = ".$_GET['id'];
    $query = $conn->query($sql);
    $result = $query->fetch_object();
?>
    <div class="container my-3">
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $sql = "DELETE FROM students
                    WHERE student_id = ".$_GET['id']."
                ";
                if($conn->query($sql) == TRUE) {
                    echo "<script>window.location.href = 'accountAuditing.php';</script>";
                    exit();
                } else {
                    echo '<div class="alert alert-danger">Record update failed due to an error!</div>';
                }
            }
        ?>
        <form method="POST">
            <div class="alert alert-danger">
                Are your sure you want to delete this record?
            </div>
            <div class="alert alert-info">
                <strong>ID:</strong> <?php echo $result->student_id; ?><br>
                <strong>First Name:</strong> <?php echo $result->first_name; ?><br>
                <strong>Last Name:</strong> <?php echo $result->last_name; ?><br>
                <strong>Email:</strong> <?php echo $result->email; ?><br>
                <strong>Password:</strong> <?php echo $result->password; ?><br>
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-danger px-5">Yes, delete!</button>
                <a href="accountAuditing.php" class="btn btn-secondary px-5">No, go back!</a>
            </div>
        </form>
    </div>
<?php
    include_once __DIR__ . '/../layouts/footer_admin.php';
?>