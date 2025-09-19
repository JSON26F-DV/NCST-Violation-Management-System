 <?php
    include_once __DIR__ . '/../layouts/header_admin.php';
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
    a {
        text-decoration: none; 
        color: inherit;        
    }
    a {
        text-decoration: none !important;
        color: #333333;
    }
    </style>

    <div class="container py-4">
        <!-- Header -->
        <header class="mb-5">
            <h1 class="display-5 fw-bold mb-4">Violation Cases</h1>
            
            <!-- Filter Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-4">
                <button id="filter_pending" class="btn btn-outline-primary rounded-pill px-3 filter-btn active">
                    <i class='iconify' data-icon='fluent-color:mail-clock-24' data-width='30px'></i>  Pending 
                </button>
                <button id="filter_ongoing" class="btn btn-outline-primary rounded-pill px-3 filter-btn">
                    <i class='iconify' data-icon='fluent-color:arrow-clockwise-dashes-settings-24' data-width='30px'></i>  Ongoing Judgement
                </button>
                <button id="filter_results" class="btn btn-outline-primary rounded-pill px-3 filter-btn">
                    <i class='iconify' data-icon='fluent-color:text-bullet-list-square-sparkle-24' data-width='30px'></i>  Results
                </button>
            </div>
        </header>

        <!-- Cases Cards -->
        <div class="row g-4">
            <?php
                $sql = 'SELECT * FROM violations';
                $query = $conn->query( $sql);
                while ($row = $query->fetch_object()) {
                    echo "
                        <div class='col-md-6 col-lg-4'>
                            <div class='card border-0 shadow-sm rounded-4 card-hover h-100'>
                                <div class='card-body p-4'>
                                    <div class='d-flex align-items-start mb-3 gap-2'>
                                        <span class='iconify' data-icon='fluent-color:pin-24' data-width='40px'></span>
                                        <div>
                                            <h5 class='card-title mb-1'>{$row->offense}</h5>
                                            <p class='text-muted small mb-2'>{$row->complainant_email} • {$row->date_reported}</p>
                                            <span class='status-badge status-pending'>{$row->status}</span>
                                        </div>
                                    </div>
                                    <a href='#' class='btn btn-link ps-0 mt-2'>View Details <i class='iconify' data-icon='fluent-color:chat-bubbles-question-24' data-width='30px'></i></a>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>

            

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
    include_once __DIR__ . '/../layouts/footer_admin.php';
?>