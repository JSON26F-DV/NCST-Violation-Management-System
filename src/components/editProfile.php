<style>
.input_profile {
    border: 2px solid grey; 
    border-radius: 10px;
}
</style>

<?php
if (isset($_POST["updateUser"])) {
    try {
        $email = $_POST['updated_email'];
        $social_media = $_POST['updated_social'];
        $address = $_POST['updated_address'];
        $contact = $_POST['updated_contact'];
        $profile_pic = $row['profile_pic']; 

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] != 4) {
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($imageExtension, $validImageExtension)) {
                echo "<script>alert('Invalid Image Extension');</script>";
            } elseif ($fileSize > 1000000) {
                echo "<script>alert('Image Size Is Too Large');</script>";
            } else {
                $newImageName = uniqid() . '.' . $imageExtension;
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/ncst/public/uploads/profile/';
                if (move_uploaded_file($tmpName, $uploadDir . $newImageName)) {
                    $profile_pic = $newImageName; 
                } else {
                    echo "<script>alert('Failed to upload image');</script>";
                }
            }
        }

        // UPDATE STUDENT INFORMATION
        $sql = "UPDATE students SET
                email = '$email',
                social_media = '$social_media',
                address = '$address',
                contact_number = '$contact',
                profile_pic = '$profile_pic'
                WHERE student_id = '$user_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Profile updated successfully!');
                  window.location.href = 'userProfile.php';
                  </script>";
        } else {
            echo "<script>alert('Profile update failed: " . $conn->error . "');
                  window.location.href = 'userProfile.php';
                  </script>";
        }

    } catch (Exception $e) {
        echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
    }
    exit();
}
echo "
    <div class='modal fade' id='profileModal' tabindex='-1' aria-labelledby='profileModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header text-center bg-primary flex_centered'>
                    <h5 class='modal-title fw-bold mx-auto text-light' id='profileModalLabel'>Update Profile Information</h5>
                </div>
                <div class='modal-body px-4'>
                    <form action='userProfile.php' method='POST' autocomplete='off' enctype='multipart/form-data'>
                        <div class='row g-4'>
                            <!-- Left Column - Profile Picture -->
                            <div class='col-md-5 d-flex flex-column align-items-center'>
                                <div class='mb-4'>
                                    <div class='user_content flex_centered mb-1 position-relative'>
                                        <div class='user_picture overflow-hidden rounded-circle border border-4'>
                                            <img src='/ncst/public/uploads/profile/$profile' alt='profile' width='180' height='180' class='object-fit-cover'>
                                            </div>
                                            <div class='camera position-absolute z-100 bottom-0 end-12  rounded-circle p-2 shadow-sm border border-3 border-light' 
                                                style='cursor: pointer; transform: translate(-10px, -10px);' 
                                                onclick=\"document.getElementById('image').click()\">
                                                <span class='iconify' data-icon='fluent-color:camera-20' data-width='24px'></span>
                                            </div>
                                    </div>
                                    <div class='input-group'>
                                        <input type='file' class='form-control' id='image' name='image' accept='.jpg, .jpeg, .png'>
                                    </div>
                                </div>
                                
                                <!-- User Info Display -->
                                <div class='w-100'>
                                    <div class='d-flex align-items-center mb-2 p-3 bg-light rounded'>
                                        <span class='iconify me-3' data-icon='fluent-color:person-starburst-24' data-width='30px'></span>
                                        <div class='flex-grow-1'>
                                            <small class='text-muted d-block'>Full Name</small>
                                            <span class='fw-semibold'>$first_name $middle_name $last_name</span>
                                        </div>
                                    </div>
                                    <div class='d-flex align-items-center mb-3 p-3 bg-light rounded'>
                                        <span class='iconify me-3' data-icon='fluent-color:number-symbol-square-24' data-width='30px'></span>
                                        <div class='flex-grow-1'>
                                            <small class='text-muted d-block'>Student ID</small>
                                            <span class='fw-semibold'>$student_id</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Column - Form Fields -->
                            <div class='col-md-7'>
                                <div class='mb-3 d-flex justify-content-center flex-column'>
                                    <label for='updated_email' class='form-label fw-semibold'>
                                        <span class='iconify me-2' data-icon='fluent-color:mail-24' data-width='30px'></span>Email Address
                                    </label>
                                    <input type='email' class='form-control' name='updated_email' id='updated_email' value='{$row['email']}' required>
                                </div>
                                
                                <div class='mb-3 d-flex justify-content-center flex-column'>
                                    <label for='updated_social' class='form-label fw-semibold d-flex'>
                                        <span class='iconify me-2' data-icon='fluent-color:people-interwoven-24' data-width='30px'></span>Social Media
                                    </label>
                                    <div class='input-group'>
                                        <span class='input-group-text'>
                                            @
                                        </span>
                                        <input type='text' class='form-control' name='updated_social' id='updated_social' value='{$row['social_media']}' placeholder='e.g., @username'>
                                    </div>
                                </div>
                                
                                <div class='mb-3 d-flex justify-content-center flex-column'>
                                    <label for='updated_address' class='form-label fw-semibold'>
                                        <span class='iconify me-2' data-icon='fluent-color:location-ripple-24' data-width='30px'></span>Address
                                    </label>
                                    <textarea class='form-control' name='updated_address' id='updated_address' rows='3' placeholder='Enter your complete address'>{$row['address']}</textarea>
                                </div>
                                
                                <div class='mb-3 d-flex justify-content-center flex-column'>
                                    <label for='updated_contact' class='form-label fw-semibold'>
                                        <span class='iconify me-2' data-icon='fluent-color:phone-24' data-width='30px'></span>Contact Number
                                    </label>
                                    <div class='input-group'>
                                        <span class='input-group-text'>
                                            #
                                        </span>
                                        <input type='tel' class='form-control' name='updated_contact' id='updated_contact' value='{$row['contact_number']}' placeholder='+63 9XX XXX XXXX'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class='modal-footer border-top mt-4 pt-3'>
                            <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>
                                <i class='bi bi-x-circle me-2'></i>Cancel
                            </button>
                            <button type='submit' class='btn btn-primary' name='updateUser'>
                                <i class='bi bi-check-circle me-2'></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
";
?>