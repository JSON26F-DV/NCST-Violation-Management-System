<?php
    session_start();
    include('../../../../header.php');
?>
<!-- Notification Button -->
<button type="button" class="btn btn-light position-relative" id="notifBtn">
  <span class="iconify" data-icon="fluent-color:alert-28" data-width="24"></span>
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    3
  </span>
</button>

<!-- Dropdown-style notification container -->
<div id="notifDropdown" class="card shadow-sm position-absolute" style="top: 50px; right: 20px; width: 320px; display: none; z-index: 1050;">
  <div class="card-header fw-bold">Notifications</div>
  <ul class="list-group list-group-flush" style="max-height: 300px; overflow-y: auto;">
    <li class="list-group-item d-flex align-items-start">
      <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
      <div class="flex-grow-1">
        <div class="fw-bold">John Doe</div>
        <div class="small text-muted">You have a new message</div>
        <span class="badge bg-warning mt-1">UNREAD</span>
      </div>
    </li>
    <li class="list-group-item d-flex align-items-start">
      <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
      <div class="flex-grow-1">
        <div class="fw-bold">Jane Smith</div>
        <div class="small text-muted">Your request was approved</div>
        <span class="badge bg-secondary mt-1">READ</span>
      </div>
    </li>
    <!-- more items -->
  </ul>
  <div class="card-footer text-center">
    <button class="btn btn-link w-100">See All Notifications</button>
  </div>
</div>

<!-- JS to toggle -->
<script>
  const btn = document.getElementById('notifBtn');
  const dropdown = document.getElementById('notifDropdown');

  btn.addEventListener('click', () => {
    dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
  });

  // Optional: close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
      dropdown.style.display = 'none';
    }
  });
</script>




<?php
    include('../../../../footer.php');
?>