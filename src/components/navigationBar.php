
<style>
        /* Facebook-style navbar */
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

        /* Navigation items styling */
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
            background-color: #e4e6ea;
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

        /* Notification badge */
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

        /* Profile dropdown */
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

        /* Mobile responsiveness */
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

        /* Content area styling */
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
          right: -54px;
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
    </style>
</head>
<body>
    <!-- Facebook-style Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top facebook-navbar">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="/ncst/public/assets/ncstLogo.png"  alt="NCST Logo" height="35">
            </a>
            <div class="flex_centered mt-2 position-relative">
              <h4>NCST</h4>
                <span class="badge office">office</span>
            </div>
            

            <!-- Mobile toggle button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Student Records -->
                    <li class="nav-item">
                        <a class="nav-link" href="studentRecord.php" title="Student Records">
                            <span class='iconify' data-icon='fluent-color:news-24' data-width='35px'></span>
                        </a>
                    </li>

                    <!-- Reports/Help -->
                    <li class="nav-item">
                        <button  type="button"   class="nav-link" data-bs-toggle="modal" data-bs-target="#reportForm">
                            <span class='iconify' data-icon='fluent-color:chat-bubbles-question-24' data-width='30px'></span>
                        </button>
                    </li>

                    <!-- Notifications -->
                    <li class="nav-item">

                        <button  type="button"   class="nav-link" data-bs-toggle="modal" id="notifBtn">
                        <?php
                        $sql = "SELECT COUNT(*) AS unread 
                                FROM Mail_log 
                                WHERE status != 'pending'
                                AND student_read = 0";
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

                    <!-- Profile Dropdown -->
                    <li class="nav-item">
                        <details class="profile-dropdown">
                            <summary title="Account">
                                <span class='iconify' data-icon='fluent-color:person-28' data-width='25px'></span>
                            </summary>
                            <div class="dropdown-menu-custom">
                                <a href="userProfile.php" class="dropdown-item-custom">
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
                                <a href="../../guest/login/logout.php" class="dropdown-item-custom">
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
        include("reportForm.php");
    ?>