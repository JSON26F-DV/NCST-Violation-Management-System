
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

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-shield-lock me-2"></i>NCST Admin
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-1  ">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/guest/registrationPage.php">
                            <i class='iconify' data-icon='fluent-color:drafts-24' data-width='30px'></i>
                            <span class="d-none d-lg-inline">New Student</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1  ">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/admin/accountAuditing.php">
                            <i class='iconify' data-icon='fluent-color:people-community-24' data-width='30px'></i>
                            <span class="d-none d-lg-inline">Account Auditing</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/admin/violation_cases.php">
                            <i class='iconify' data-icon='fluent-color:people-list-24' data-width='30px'></i>
                            <span class="d-none d-lg-inline">Records</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1 position-relative">
                        <a class="nav-link d-flex align-items-center flex_centered gap-2" href="/ncst/src/views/admin/admin_Notification.php">
                            <i class='iconify' data-icon='fluent-color:alert-32' data-width='30px'></i>
                            <span class="d-none d-lg-inline">Notifications</span>
                            <span class="position-absolute flex_centered notification-badge bg-danger text-white rounded-circle">1</span>
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


