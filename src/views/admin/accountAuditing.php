<?php
    include('../../../header.php');
    include('navbar.php');
?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        transition: transform 0.2s;
        border: none;
        border-radius: 10px;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .profile-img-container {
        height: 180px;
        background-color: #e9ecef;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }
    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .search-container {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }
    .badge-student {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 0.8rem;
        padding: 5px 10px;
    }
    .contact-info {
        margin-bottom: 8px;
    }
    .contact-info i {
        color: #6c757d;
        margin-right: 10px;
    }
</style>

<div class="container py-5">
    <h1 class="text-center mb-5">Student Account Auditing</h1>
    
    <!-- SEARCH BAR TRALALA -->
    <div class="search-container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nameSearch" class="form-label">Search by Name</label>
                <div class="input-group">
                    <div class="input-group-text"><span class='iconify' data-icon='fluent-color:search-sparkle-24' data-width='30px'></span>  </div>

                
                    <input type="text" class="form-control" id="nameSearch" placeholder="Enter student name">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="idSearch" class="form-label">Search by Student ID</label>
                <div class="input-group">
                    <div class="input-group-text"><span class='iconify' data-icon='fluent-color:contact-card-24' data-width='30px'></span></div>
                    <input type="text" class="form-control" id="idSearch" placeholder="Enter student ID">
                </div>
            </div>
        </div>
    </div>


    <div class="row g-4">

        <?php
            $sql  = ("SELECT * FROM students");
            $result = $conn->query($sql);
            while ($row = $result->fetch_object()){
                $student_id = $row->student_id;
                $row->student_id = substr($student_id, 0, 4) . "-" . substr($student_id, 4);
                echo "
                    <div class='col-sm-6 col-md-4 col-lg-3'>
                        <div class='card shadow-sm h-100'>
                            <div class='profile-img-container position-relative'>
                                <img src='/public/images/default.png' alt='Profile' class='profile-img'>
                                <span class='badge bg-warning text-light badge-student'>STUDENT</span>
                            </div>
                            <div class='card-body'>
                                <h4 class='card-title'>{$row->first_name} {$row->last_name}</h4>
                                <div class='contact-info'>
                                    <span class='iconify' data-icon='fluent-color:mail-24' data-width='30px'></span>
                                    <span class='text-muted'>{$row->email}</span>
                                </div>
                                <div class='contact-info'>
                                    <span class='iconify' data-icon='fluent-color:contact-card-24' data-width='30px'></span>
                                    <span class='text-muted'>{$row->student_id}</span>
                                </div>
                                <div class='contact-info'>
                                    <span class='iconify' data-icon='fluent-color:number-symbol-square-32' data-width='30px'></span>
                                    <span class='text-muted'>{$row->contact_number}</span>
                                </div>
                            </div>
                            <div class='card-footer bg-transparent border-top-0'>
                                <div class='d-grid gap-1 d-md-flex justify-content-md-center'>
                                    <button class='btn btn-outline-success btn-sm me-md-2 rounded-3'><i class='iconify' data-icon='fluent-color:document-edit-24' data-width='30px'></i> Update</button>
                                    <button class='btn btn-outline-primary btn-sm rounded-3'><i class='iconify' data-icon='fluent-color:document-folder-24' data-width='30px' ></i> Manage</button>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
</div>

<?php
    include('../../../footer.php');
?>
