<?php
    include_once __DIR__ . '/../../../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/ncst/src/css/style.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <style>
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .nav-link {
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.2s ease;
        }
        .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.03);
        }
        .notification-badge {
            font-size: 10px;
            width: 20px;
            height: 20px;
            padding: 2px 5px;
            top: -5px;
            right: -5px;
        }
        .flex_centered {
        display: flex;
        justify-content: center;
        align-items: center;
        }
        .rotate-left {
            display: inline-block; 
            transform: rotate(-90deg); 
        }

    </style>
</head>
<body>
<?php
    if (!isset($_SESSION["staff_id"]) || empty($_SESSION["staff_id"])) {
        echo "
            <script>
                alert('Please login first to continue.');
                window.location.href = '/ncst/src/views/guest/login/loginPage.php';
            </script>";
        exit;
    }
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary flex_centered gap-2" href="/ncst/src/views/admin/auditing/accountAuditing.php">
                <i class='iconify' data-icon='fluent-color:globe-shield-24' data-width='30px'></i>NCST Admin
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-1  ">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/admin/actions/registrationPage.php">
                            <i class='iconify' data-icon='fluent-color:drafts-24' data-width='30px'></i>
                            <span class="d-none d-lg-inline">New Student</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1  ">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/admin/auditing/accountAuditing.php">
                            <i class='iconify' data-icon='fluent-color:people-community-24' data-width='30px'></i>
                            <span class="d-none d-lg-inline">Account Auditing</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/admin/violations/violation_cases.php">
                            <i class='iconify' data-icon='fluent-color:people-list-24' data-width='30px'></i>
                            <span class="d-none d-lg-inline">Records</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1 position-relative">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/admin/notifications/admin_Notification.php">
                            <i class='iconify' data-icon='fluent-color:alert-32' data-width='30px'></i>
                            <span class="d-none d-lg-inline">Notifications</span>
                                <?php
                                $sql = "SELECT COUNT(*) AS unread 
                                        FROM Mail_log 
                                        WHERE status = 'pending'
                                        AND admin_read = 0";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $unread = $row['unread'];
                                    if ($unread > 0) {
                                        echo "
                                        <span class='position-absolute flex_centered notification-badge bg-danger text-white rounded-circle'>$unread</span>";
                                    }
                                ?>
                            
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link d-flex align-items-center text-danger flex_centered gap-2" href="/ncst/src/views/guest/login/logout.php">
                            <span class="rotate-left">
                            <i class='iconify' data-icon='fluent-color:share-ios-24' data-width='30px'></i>
                            </span>
                            <span class="d-none d-lg-inline">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 70px;"></div>


