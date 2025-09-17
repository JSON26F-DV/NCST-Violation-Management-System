<style>
    #notifDropdown{
        position: fixed !important;
        z-index: 1000 !important;
    }
</style>
<?php
    $sql = "SELECT * FROM Mail_log 
            WHERE from_id = $user_id
            AND status != 'pending'
            ORDER BY created_at DESC";
    $query = $conn->query($sql);

    //MARK ALL AS READ
    if (isset($_POST["marked"])) {
        $sql = "UPDATE Mail_log 
                SET student_read = 1 
                WHERE from_id = $user_id 
                AND student_read = 0";
        $conn->query($sql);
    }
?>

<div id="notifDropdown" class="card shadow-sm position-absolute" style="top: 60px; right: 20px; width: 450px; display: none; z-index: 10; ">
  <div class='card-header d-flex flex-column justify-content-between align-items-start'>
    <span class='fw-bold'>Notifications</span>
    <div class="w-100">
      <form method="post" class="d-flex justify-content-between">
        <div class="form-group">
          <span class='badge bg-primary me-1'>All</span>
          <span class='badge bg-danger'>Unread</span>  
        </div>
        <button type="submit" name="marked" class='badge bg-secondary'>Mark all as read</button>
      </form>
    </div>
  </div>
  <ul class='list-group list-group-flush p-2' style=' max-height: 500px; overflow-y: auto;'>
    <?php
        while ($row = $query->fetch_object()) {
            $statusText = ($row->student_read == 0) ? 'UNREAD' : 'READ';
            $badgeClass = ($row->student_read == 0) ? 'bg-warning' : 'bg-secondary';  
            $state = ($row->status);
            if (isset($state)) {
              switch($state) {
                  case 'accepted':
                      $message='Request accepted by Student Affairs. See more ›';
                      $alertClass = "alert-success";
                      break;
                  case 'declined':
                      $message='Request not approved by Student Affairs. See more</a>';
                      $alertClass = "alert-danger";
                      break;
                  default:
                      $message='Your request is pending review by Student Affairs. View details ›';
                      $alertClass = "alert-secondary";
                      break;
              } 
            }
          
            echo"
              <a href='../../../forms/admin/mail_verdict.php?id={$row->id}'>
                <li class='alert $alertClass  d-flex align-items-start'>
                    <img src='/ncst/public/uploads/profile/officer.png' width='50px' class='rounded-circle me-2' alt='User'>
                    <div class='flex-grow-1'>
                    <div class='fw-bold'>StudentAffairs@ncst.edu.ph</div>
                      <div class='small text-muted'>$message</div>
                      <button class='badge $badgeClass mt-1'>$statusText</span>
                    </div>
                </li>
              </a>
            ";
        }
        ?>
  </ul> 
</div>

<script>
  const btn = document.getElementById('notifBtn');
  const dropdown = document.getElementById('notifDropdown');

  btn.addEventListener('click', () => {
    dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
  });

  document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
      dropdown.style.display = 'none';
    }
  });
</script>
