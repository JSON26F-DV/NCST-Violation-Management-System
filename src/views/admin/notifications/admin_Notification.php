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
            top:  10px;
            right: 10px;
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
    <header class="mb-5">
        <h1 class="display-5 fw-bold mb-4">Student Messages</h1>

        <div class="d-flex flex-wrap gap-2 mb-4">
            <button id="filter_pending" class="btn btn-outline-primary rounded-pill px-3 filter-btn active">
                <i class='iconify' data-icon='fluent-color:apps-list-detail-24' data-width='30px'></i>  All 
            </button>
            <button id="filter_ongoing" class="btn btn-outline-primary rounded-pill px-3 filter-btn">
                <i class='iconify' data-icon='fluent-color:mail-clock-24' data-width='30px'></i>  Unread
            </button>
            <button id="filter_results" class="btn btn-outline-primary rounded-pill px-3 filter-btn">
                <i class='iconify' data-icon='fluent-color:text-bullet-list-square-sparkle-24' data-width='30px'></i>  Read
            </button>
        </div>
    </header>

        <?php
            $sql = "SELECT m.*, s.profile_pic 
                    FROM Mail_log m
                    JOIN students s ON m.from_id = s.student_id ORDER BY created_at DESC";
            $query = $conn->query($sql);
            if(!$query){
                die("Query failed: ".$conn->error);
            }
            
                while($row = $query->fetch_object()) {
                $statusText = ($row->admin_read == 0) ? 'UNREAD' : 'READ';
                
                $createdTime = new DateTime($row->created_at);
                $now = new DateTime();
                $diff = $now->diff($createdTime);

                if($diff->y > 0){
                    $timeAgo = $diff->y . " year" . ($diff->y > 1 ? "s" : "") . " ago";
                } elseif($diff->m > 0){
                    $timeAgo = $diff->m . " month" . ($diff->m > 1 ? "s" : "") . " ago";
                } elseif($diff->d > 0){
                    $timeAgo = $diff->d . " day" . ($diff->d > 1 ? "s" : "") . " ago";
                } elseif($diff->h > 0){
                    $timeAgo = $diff->h . " hour" . ($diff->h > 1 ? "s" : "") . " ago";
                } elseif($diff->i > 0){
                    $timeAgo = $diff->i . " minute" . ($diff->i > 1 ? "s" : "") . " ago";
                } else {
                    $timeAgo = "Just now";
                }
                
            echo "
                <div class='row g-4'>
                    <div class='col-md-6 col-lg-4'>
                    <div class='card border-0 shadow-sm rounded-4 card-hover h-100 position-relative'>
                    <span class='status-badge status-pending position-absolute fw-bold'>$statusText</span>
                            <div class='card-body p-4'>
                                <div class='d-flex align-items-start  gap-2'>
                                    <img src='/ncst/public/uploads/profile/{$row->profile_pic}' width='59px' alt='Student avatar' class='rounded-circle avatar'>
                                    <div class='flex-column'>
                                        <h5 class='card-title '>{$row->subject}</h5>
                                        <h6 class='card-title overflow-hidden mb-2'>{$row->body}</h6>
                                        <p class='text-muted small '>{$row->email} </p>
                                        <a href='../../mails/admin/student_mail.php?id={$row->id}' class='btn btn-link'>
                                            View Details 
                                            <i class='iconify' data-icon='fluent-color:chat-bubbles-question-24' data-width='30px'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        ?>
    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</div>

<?php
    include_once __DIR__ . '/../layouts/footer_admin.php';
?>

