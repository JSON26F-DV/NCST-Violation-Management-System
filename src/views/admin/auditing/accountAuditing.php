<?php
    include_once __DIR__ . '/../layouts/header_admin.php';
    include('layouts/navbar.php');
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
        /* background-color: #e9ecef; */
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

<div class="container mb-5">
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
                $id = substr($student_id, 0, 4) . "-" . substr($student_id, 4);
                echo "
                    <div class='col-sm-6 col-md-4 col-lg-3'>
                        <div class='card shadow-sm h-100'>
                        <div class='card-body d-flex flex-column align-content-between justify-content-between'>
                                <div class='profile-img-container position-relative p-1'>
                                    <img src='/ncst/public/uploads/profile/{$row->profile_pic}' alt='Profile' class='profile-img rounded-4'>
                                    <span class='badge bg-warning text-light badge-student'>STUDENT</span>
                                </div>
                                <h4 class='card-title'>{$row->first_name} {$row->last_name}</h4>
                                <div class='contact-info'>
                                    <div class='d-flex justify-content-between align-items-center  gap-3'>
                                        <span class='iconify' data-icon='fluent-color:mail-32' data-width='30px'></span>  
                                        <span class='text-muted overflow-hidden'>{$row->email}</span>
                                    </div>
                                </div>
                                <div class='contact-info'>
                                    <div class='d-flex justify-content-between align-items-center  gap-3'>
                                        <span class='iconify' data-icon='fluent-color:contact-card-24' data-width='30px'></span>
                                        <span class='text-muted'>$id</span>
                                    </div>
                                </div>
                                <div class='contact-info'>
                                    <div class='d-flex justify-content-between align-items-center  gap-3'>
                                        <span class='iconify' data-icon='fluent-color:number-symbol-square-32' data-width='30px'></span>
                                        <span class='text-muted'>{$row->contact_number}</span>
                                    </div>
                                </div>
                                <div class='d-flex gap-1 d-md-flex justify-content-md-center'>
                                    <a href='/ncst/src/views/admin/profile/profileManagement.php?id={$row->student_id}' class='btn btn-outline-success btn-sm rounded-3'><i class='iconify' data-icon='fluent-color:document-edit-24' data-width='30px' ></i> Update</a href='profileManagement.php'>
                                    <a href='/ncst/src/views/admin/actions/student_management.php?id={$row->student_id}' class='btn btn-outline-primary btn-sm rounded-3'><i class='iconify' data-icon='fluent-color:document-folder-24' data-width='30px' ></i> Manage</a href='profileManagement.php'>
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
    include_once __DIR__ . '/../layouts/footer_admin.php';
?>
