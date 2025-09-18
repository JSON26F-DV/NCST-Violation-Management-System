 <?php
    include('navbar.php');
    include("../../../header.php");
?>
 
 <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        .card-emoji {
            font-size: 1.5rem;
            margin-right: 12px;
        }
        .status-badge {
            font-size: 0.8rem;
            padding: 4px 8px;
            border-radius: 12px;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-ongoing {
            background-color: #cce5ff;
            color: #004085;
        }
        .status-result {
            background-color: #d4edda;
            color: #155724;
        }
        .filter-btn.active {
            background-color: #0d6efd;
            color: white;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
            transition: all 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Header -->
        <header class="mb-5">
            <h1 class="display-5 fw-bold mb-4">Violation Cases</h1>
            
            <!-- Filter Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-4">
                <button id="filter_pending" class="btn btn-outline-primary rounded-pill px-3 filter-btn active">
                    <i class="bi bi-clock me-1"></i> Pending
                </button>
                <button id="filter_ongoing" class="btn btn-outline-primary rounded-pill px-3 filter-btn">
                    <i class="bi bi-hourglass-split me-1"></i> Ongoing Judgement
                </button>
                <button id="filter_results" class="btn btn-outline-primary rounded-pill px-3 filter-btn">
                    <i class="bi bi-file-earmark-text me-1"></i> Results
                </button>
            </div>
        </header>

        <!-- Cases Cards -->
        <div class="row g-4">
            <!-- Case 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <span class="card-emoji">📌</span>
                            <div>
                                <h5 class="card-title mb-1">Violation: Cutting Classes</h5>
                                <p class="text-muted small mb-2">Juan Dela Cruz • Sep 12, 2025</p>
                                <span class="status-badge status-pending">Pending</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-link ps-0 mt-2">View Details <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>

            <!-- Case 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <span class="card-emoji">🚫</span>
                            <div>
                                <h5 class="card-title mb-1">Violation: Cheating during Exam</h5>
                                <p class="text-muted small mb-2">Maria Santos • Sep 10, 2025</p>
                                <span class="status-badge status-ongoing">Ongoing Judgement</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-link ps-0 mt-2">View Details <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>

            <!-- Case 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <span class="card-emoji">✅</span>
                            <div>
                                <h5 class="card-title mb-1">Violation: Misbehavior in Class</h5>
                                <p class="text-muted small mb-2">Pedro Ramirez • Sep 8, 2025</p>
                                <span class="status-badge status-result">Result: Proven Not Guilty</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-link ps-0 mt-2">View Details <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

<?php
    include("../../../footer.php");
?>