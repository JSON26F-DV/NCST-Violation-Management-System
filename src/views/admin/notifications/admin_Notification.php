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
            position: absolute;
            bottom:  0;
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
    .time {
        right: 12px;
    }
    </style>

<div class="container py-4">
    <?php
    $filter = 'all';  
    if (isset($_GET["Unread"])) {
        $filter = 'unread';
    } elseif (isset($_GET["Read"])) {
        $filter = 'read';
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT m.*, s.profile_pic 
                FROM Mail_log m 
                JOIN students s ON m.from_id = s.student_id 
                ORDER BY created_at DESC";
        if (isset($_GET["Unread"])) {
            $sql = "SELECT m.*, s.profile_pic 
                    FROM Mail_log m 
                    JOIN students s ON m.from_id = s.student_id 
                    WHERE m.status = 'pending' 
                    ORDER BY created_at DESC";
        } elseif (isset($_GET["Read"])) {
            $sql = "SELECT m.*, s.profile_pic 
                    FROM Mail_log m 
                    JOIN students s ON m.from_id = s.student_id 
                    WHERE m.status != 'pending' 
                    ORDER BY created_at DESC";
        }

        $query = $conn->query($sql);
        if (!$query) {
            die("Query failed: " . $conn->error);
        }
    }

    ?>
    <header class="mb-5">
        <h1 class="display-5 fw-bold mb-4">Student Messages</h1>
        <form method="get">
            <div class="d-flex flex-wrap gap-2 mb-4">
                <!-- All button, active state based on PHP logic -->
                <button type="submit" name="All" class="btn btn-outline-primary rounded-pill px-3 filter-btn <?php echo ($filter === 'all') ? 'active' : ''; ?>">
                    <i class="iconify" data-icon="fluent-color:apps-list-detail-24" data-width="30px"></i> All
                </button>
                <!-- Unread button, active state based on PHP logic -->
                <button type="submit" name="Unread" class="btn btn-outline-primary rounded-pill px-3 filter-btn <?php echo ($filter === 'unread') ? 'active' : ''; ?>">
                    <i class="iconify" data-icon="fluent-color:mail-clock-24" data-width="30px"></i> Unread
                </button>
                <!-- Read button, active state based on PHP logic -->
                <button type="submit" name="Read" class="btn btn-outline-primary rounded-pill px-3 filter-btn <?php echo ($filter === 'read') ? 'active' : ''; ?>">
                    <i class="iconify" data-icon="fluent-color:text-bullet-list-square-sparkle-24" data-width="30px"></i> Read
                </button>
            </div>
        </form>
    </header>
    <div class='row g-4'>
        <?php
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
                <div class='col-md-6 col-lg-4'>
                    <a href='/ncst/src/views/mails/shared/student_mail.php?id={$row->id}'>
                        <div class=' border rounded bg-white'>
                            <div >
                                <div class='d-flex  p-3 position-relative'>
                                    <div class='flex-shrink-0'>
                                        <img src='/ncst/public/uploads/profile/{$row->profile_pic}' width='59px' class='rounded-circle' alt='Profile'>
                                    </div>
                                    <div class='flex-grow-1 mx-2'>
                                        <div class='fw-bold  w-75 overflow-hidden'>{$row->subject}</div>
                                        <div class='text-muted small overflow-hidden'></div>
                                        <div class='text-muted small'>{$row->email}</div>
                                    </div>
                                    <p class='status-badge status-pending position-absolute fw-bold'>$statusText </p>
                                    <div class='text-end  small text-muted position-absolute time'>
                                        <div>$timeAgo</div>
                                    </div>
                                </div>
                                </div>
                                <div class='mb-3 p-3'>
                                <textarea class='form-control'  rows='2' disabled>{$row->body}</textarea>
                            </div>  
                        </div>
                    </a>
                </div>
                ";
            }
        ?>

    </div>
</div>

<script>
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove the 'active' class from all filter buttons
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            // Add the 'active' class to the clicked button
            this.classList.add('active');
        });
    });
</script>


<?php
    include_once __DIR__ . '/../layouts/footer_admin.php';
?>

