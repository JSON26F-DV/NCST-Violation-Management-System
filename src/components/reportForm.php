
<style>
    body {
        background-color: #f0f2f5;
    }
    .card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .header-card {
        background: linear-gradient(135deg, #1877f2 0%, #0d5dbd 100%);
        color: white;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(24, 119, 242, 0.25);
        border-color: #1877f2;
    }
    .btn-primary {
        background-color: #1877f2;
        border-color: #1877f2;
    }
    .btn-outline-secondary {
        border-color: #ced4da;
    }
    textarea {
        min-height: 300px;
        resize: vertical;
    }
    #content {
      height: 200px !important;
    }
    .logo-container {
        background-color: white;
        border-radius: 50%;
        padding: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>


<div class="modal fade" id="reportForm" tabindex="-1" aria-labelledby="reportFormLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <div class="d-flex align-items-center">
            <div class="logo-container me-3">
                <img src="/ncst/public/assets/ncstLogo.png" alt="NCST Logo" width="64" height="64" class="d-block">
            </div>
            <div>
                <h4 class=" mb-1"><strong class='text-white'>NATIONAL COLLEGE OF SCIENCE AND TECHNOLOGY</strong></h4>
                <small class="d-block text-white">Amafel Building, Aguinaldo Highway, Dasmariñas, Cavite 4114</small>
                <small class="d-block text-white">Tel. No.: (046)416-6278 | Telefax: (046) | Mobile No.: +63918-888-6278</small>
            </div>
        </div>
    </div>
        <div class="modal-body">
          <div class="card p-4 mb-4">
              <h2 class="mb-4 text-center">Student Report Form</h2>
              <form method="get">
                  <div class="mb-3">
                      <label for="fromEmail" class="form-label fw-bold">From</label>
                      <input type="email" class="form-control" id="fromEmail" value="student123@ncst.edu.ph" readonly>
                  </div>

                  <div class="mb-3">
                      <label for="toEmail" class="form-label fw-bold">To</label>
                      <input type="email" class="form-control" id="toEmail" value="office@ncst.edu.ph" readonly>
                  </div>

                  <div class="mb-3">
                      <label for="subject" class="form-label fw-bold">Subject</label>
                      <input type="text" class="form-control" id="subject" placeholder="Enter subject here">
                  </div>

                  <div class="mb-3">
                      <label for="content" class="form-label fw-bold ">Content</label> 
                      <textarea class="form-control" id="content" placeholder="Write your report here..."></textarea>
                  </div>

                  <div class="mb-4">
                      <label for="attachment" class="form-label fw-bold">Attachment</label>
                      <input class="form-control" type="file" id="attachment">
                      <div class="form-text">Maximum file size: 5MB</div>
                  </div>
              </form>
          </div>
        </div>
      <div class="modal-footer">
    
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Report</button>
      </div>
    </div>
  </div>
</div>

