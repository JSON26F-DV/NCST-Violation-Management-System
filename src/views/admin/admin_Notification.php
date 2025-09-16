<?php
    session_start();
    include('../../../header.php');
    include('navbar.php');
?>

<style>
    body {
        background-color: #f8f9fa;
    }
    .notification-card {
        transition: all 0.2s ease;
    }
    .notification-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
    }
    .avatar {
        width: 56px;
        height: 56px;
        object-fit: cover;
    }
    .snippet {
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <!-- Header -->
                <div class="d-flex align-items-center mb-4">
                    <h1 class="h4 mb-0">Student Messages</h1>
                    <span class="badge bg-primary ms-3">5 Unread</span>
                </div>

                <!-- Bulk Actions -->
                <div class="d-flex justify-content-end mb-3">
                    <form action="/admin/notifications/mark-read" method="post" class="d-inline">
                        <button type="submit" class="btn btn-outline-secondary btn-sm">Mark all as read</button>
                    </form>
                </div>
                
                <?php

?>

                <?php
                    $sql = "SELECT m.*, s.profile_pic 
                            FROM Mail_log m
                            JOIN students s ON m.from_id = s.student_id";
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
                        <div class='list-group'>
                            <a href='../../forms/student/student_mail.php?id={$row->id}' class='list-group-item list-group-item-action mb-3 p-3 rounded-3 shadow-sm notification-card text-decoration-none' aria-current='false'>
                                <div class='d-flex gap-3 align-items-start'>
                                    <div class='user_info d-flex justify-content-between w-100'>
                                        <div class='d-flex justify-content-between align-items-start gap-3'>
                                            <img src='/ncst/public/uploads/profile/{$row->profile_pic}' alt='Student avatar' class='rounded-circle avatar'>
                                            <div>
                                                <div class='fw-semibold'>{$row->email}</div>
                                                <div class='text-muted small'>{$row->subject}</div>
                                            </div>
                                        </div>
                                        <div class='text-end'>
                                            <div class='small text-muted'>$timeAgo</div>

                                            <span class='badge bg-warning mt-1'>$statusText</span>
                                        </div>
                                    </div>
                                </div>
                                <div class='flex-grow-1 px-5'>
                                    <div class='mt-2 text-muted small snippet px-4'>
                                        {$row->body}
                                    </div>
                                </div>
                            </a>
                        </div>
                        ";
                    }
                ?>

            </div>
        </div>
    </div>

<?php
    include('../../../footer.php');
?>

