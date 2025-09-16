
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
            padding: 2px 5px;
            top: -5px;
            right: -5px;
        }
    </style>
</head>
<body>
    <!-- Fixed Navbar -->
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
                    <li class="nav-item mx-1">
                        <a class="nav-link d-flex align-items-center" href="accountAuditing.php">
                            <i class="bi bi-people me-2"></i>
                            <span class="d-none d-lg-inline">Account Auditing</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link d-flex align-items-center" href="#">
                            <i class="bi bi-chat-left-text me-2"></i>
                            <span class="d-none d-lg-inline">Chat</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1 position-relative">
                        <a class="nav-link d-flex align-items-center" href="admin_Notification.php">
                            <i class="bi bi-bell me-2"></i>
                            <span class="d-none d-lg-inline">Notifications</span>
                            <span class="position-absolute notification-badge bg-danger text-white rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link d-flex align-items-center text-danger" href="../guest/login/logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            <span class="d-none d-lg-inline">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div style="height: 70px;"></div>


