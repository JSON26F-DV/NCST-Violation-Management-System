<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 3px solid #f0f2f5;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #1877f2;
            box-shadow: 0 0 0 2px rgba(24, 119, 242, 0.2);
        }
        .btn-primary {
            background-color: #1877f2;
            border: none;
            border-radius: 6px;
            padding: 8px 20px;
            font-weight: 600;
        }
        .btn-secondary {
            border-radius: 6px;
            padding: 8px 20px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary m-5" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
        Update Profile
    </button>

    <!-- Modal -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        <div class='modal fade' id='profileModal' tabindex='-1' aria-labelledby='profileModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-lg modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header text-center text-light bg-primary justify-content-center d-flex'>
                        <h5 class='modal-title fw-bold' id='profileModalLabel'>Update Profile Information</h5>
                    </div>
                    <div class='modal-body p-4'>
                        <div class='row g-4'>
                            <!-- Left Column - Profile Picture -->
                            <div class='col-md-5 d-flex flex-column align-items-center'>
                            <div class='mb-4'>
                        <div class='user_content flex_centered position-relative'>
                            <div class='user_picture overflow-hidden'>
                            <img src='/ncst/public/uploads/profile/$profile' alt='profile' width='180px'>
                            </div>
                            <!-- <div class='camera position-absolute end-0' onclick=\"document.getElementById('image').click()\"> -->
                                <span class='iconify' data-icon='fluent-color:camera-20' data-width='30px'></span> 
                            </div>
                            </div>
                            </div>
                            <div class='w-100'>
                            <div class='d-flex justify-content-between align-items-center mb-3 gap-3'>
                            <span class='iconify' data-icon='fluent-color:person-starburst-24' data-width='30px'></span>  
                            <span class='text-muted overflow-hidden'>$first_name $last_name</span>
                            </div>
                            <div class='d-flex justify-content-between align-items-center mb-4 gap-3'>
                            <span class='iconify' data-icon='fluent-color:number-symbol-square-24' data-width='30px'></span>  
                            <span class='text-muted overflow-hidden'>$student_id</span>
                            </div>
                            </div>
                            </div>
                            
                            <div class='col-md-7'>
                                <form action='userProfile.php'  method='POST' autocomplete='off' enctype='multipart/form-data'>
                                </form>
                                    <input class='form-control' type='file' id='image' name='image'  accept='image/*' style='display:none;'>
                                    <div class='mb-3'>
                                        <label for='email' class='form-label fw-semibold'>Email Address</label>
                                        <input type='email' class='form-control' name='updated_email' id='updated_email' value='{$row['email']}'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='socialMedia' class='form-label fw-semibold'>Social Media</label>
                                        <input type='text' class='form-control' name='updated_social' id='updated_social' value='{$row['social_media']}'>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='address' class='form-label fw-semibold'>Address</label>
                                        <textarea class='form-control' name='updated_address' id='updated_address' rows='2'>{$row['address']}</textarea>
                                    </div>
                                    <div class='mb-3'>
                                        <div class='input-group'>
                                            <span class='input-group-text'><i class='bi bi-telephone'>#</i></span>
                                            <input type='tel' class='form-control' name='updated_contact' id='updated_contact' value='{$row['contact_number']}'>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                    <div class='modal-footer border-top-0'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        <button type='submit' class='btn btn-primary' name='updateUser'>Save Changes</button>
                                    </div>
                </div>
            </div>
        </div>