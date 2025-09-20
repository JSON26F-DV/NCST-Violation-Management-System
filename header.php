<?php
    include('src/config/config.php');
    include_once __DIR__ . "/src/components/actions/student_status.php";
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
    <style>
            .facebook-navbar {
                background: #ffffff;
                border-bottom: 1px solid #e4e6ea;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                height: 56px;
                z-index: 1000;
            }

            .facebook-navbar .navbar-brand img {
                transition: transform 0.2s ease;
            }

            .facebook-navbar .navbar-brand:hover img {
                transform: scale(1.05);
            }
            .nav-item {
                margin: 0 4px;
            }

            .nav-item .nav-link {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: #e4e6eac2;
                color: #65676b;
                transition: all 0.2s ease;
                position: relative;
                text-decoration: none;
            }

            .nav-item .nav-link:hover {
                background-color: #d8dadf;
                color: #1877f2;
                transform: translateY(-1px);
            }

            .nav-item .nav-link.active {
                background-color: #e7f3ff;
                color: #1877f2;
            }

            .notification-badge {
                position: absolute;
                top: -2px;
                right: -2px;
                background: #e41e3f;
                color: white;
                border-radius: 50%;
                width: 18px;
                height: 18px;
                font-size: 11px;
                font-weight: bold;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px solid white;
            }

            .profile-dropdown {
                position: relative;
            }

            .profile-dropdown summary {
                list-style: none;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: #e4e6ea;
                color: #65676b;
                transition: all 0.2s ease;
            }

            .profile-dropdown summary::-webkit-details-marker {
                display: none;
            }

            .profile-dropdown summary:hover {
                background-color: #d8dadf;
                color: #1877f2;
                transform: translateY(-1px);
            }

            .profile-dropdown[open] summary {
                background-color: #e7f3ff;
                color: #1877f2;
            }

            .dropdown-menu-custom {
                position: absolute;
                top: 50px;
                right: 0;
                background: white;
                border-radius: 8px;
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
                min-width: 200px;
                padding: 8px 0;
                z-index: 1001;
                animation: slideDown 0.2s ease;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .dropdown-item-custom {
                padding: 12px 16px;
                color: #1c1e21;
                text-decoration: none;
                display: flex;
                align-items: center;
                font-size: 15px;
                font-weight: 500;
                transition: background-color 0.1s ease;
            }

            .dropdown-item-custom:hover {
                background-color: #f2f3f4;
                color: #1c1e21;
            }

            .dropdown-item-custom i {
                width: 20px;
                margin-right: 12px;
                color: #65676b;
            }

            .dropdown-divider-custom {
                height: 1px;
                background-color: #e4e6ea;
                margin: 8px 0;
            }

            @media (max-width: 768px) {
                .navbar-nav {
                    flex-direction: row;
                    justify-content: space-around;
                    width: 100%;
                }
                
                .dropdown-menu-custom {
                    right: -20px;
                    min-width: 180px;
                }
            }

            .main-content {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }

            .demo-card {
                background: white;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }
            .office {
                background-color: yellow;
                position: absolute;
                top: -8px;
                right: -60px;
                font-weight: bolder;
                border-bottom-left-radius: 0;
            }
            .notification {
                width: 400px;
                height: 400px;
            }
            .drop-notification {
                width: 400px;
                height: 500px;
            }
            a {
                text-decoration: none;
                color: #333333;
            }
            .top-offset {
                margin-top: 50px;
            }
            a {
                text-decoration: none; 
                color: inherit;        
            }

    </style>
</head>
<body>

    <?php
        // if (!isset($_SESSION["student_id"]) || empty($_SESSION["student_id"])) {
        //     echo "<script>
        //         alert('Please Login first to continue');
        //         window.location.href = '/ncst/src/views/guest/login/loginPage.php';
        //     </script>";
        //     exit;
        // }

        $user_id = $_SESSION["student_id"];
            echo "$user_id";
        $result = $conn->query("SELECT * FROM students WHERE student_id='$user_id'");
        $row = $result->fetch_assoc();
        extract($row);
    ?>

     <nav class="navbar navbar-expand-lg fixed-top facebook-navbar bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/ncst/public/assets/ncstLogo.png"  alt="NCST Logo" height="35">
            </a>
            <div class="flex_centered mt-2 position-relative">
                <h4 class="text-warning">NCST</h4>
                <span class="badge office">OFFICE</span>
            </div>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/ncst/src/views/authenticated/students/studentRecord.php" title="Student Records">
                            <span class='iconify' data-icon='fluent-color:news-24' data-width='35px'></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <button  type="button"   class="nav-link" data-bs-toggle="modal" data-bs-target="#reportForm">
                            <span class='iconify' data-icon='fluent-color:chat-bubbles-question-24' data-width='30px'></span>
                        </button>
                    </li>

                    <li class="nav-item">
                        <button  type="button"   class="nav-link" data-bs-toggle="modal" id="notifBtn">
                        <?php
                            $sql = "SELECT COUNT(*) AS unread 
                                    FROM mail_logs
                                    WHERE status != 'pending' 
                                    AND student_id = '$user_id'";

                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $unread = $row['unread'];
                                echo"
                                    <span class='iconify' data-icon='fluent-color:alert-28' data-width='25px'></span>
                                ";  
                            if ($unread > 0) {
                                echo "<span class='notification-badge'>$unread</span>";
                            }
                        ?>
                        </button>
                    </li>

                    <li class="nav-item">
                        <details class="profile-dropdown">
                            <summary title="Account">
                                <span class='iconify' data-icon='fluent-color:person-28' data-width='25px'></span>
                            </summary>
                            <div class="dropdown-menu-custom">
                                <a href="/ncst/src/views/authenticated/students/userProfile.php" class="dropdown-item-custom">
                                    <i class="fas fa-user"></i>
                                    Profile
                                </a>
                                <a href="#" class="dropdown-item-custom">
                                    <i class="fas fa-star"></i>
                                    Credits
                                </a>
                                <div class="dropdown-divider-custom"></div>
                                <a href="#" class="dropdown-item-custom">
                                    <i class="fas fa-info-circle"></i>
                                    About NCST
                                </a>
                                <a href="#" class="dropdown-item-custom">
                                    <i class="fas fa-cog"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider-custom"></div>
                                <a href="/ncst/src/views/guest/login/logout.php" class="dropdown-item-custom">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Log Out
                                </a>
                            </div>
                        </details>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 

<?php
    include __DIR__ . "/src/components/reportForm.php";
?>