            <?php
            $id = $_GET['id'] ?? null;
            $result = $conn->query("SELECT * FROM Mail_log WHERE id='$id'");
            $row = $result->fetch_assoc();
            extract($row);
                if($send_type == "request") {
                    include __DIR__ . "/../../mails/student/mail_verdict.php";
                } else {
                    echo "hello world";
                }
            ?>