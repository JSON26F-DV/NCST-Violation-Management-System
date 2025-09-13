
<style>
.input_profile {
    border: 2px solid grey; 
    border-radius: 10px;

}
</style>

<!-- Modal -->
 <?php
    if (isset($_POST["updateUser"])) {
        try {
                $email = $_POST['updated_email'];
                $social_media = $_POST['updated_social'];
                $address = $_POST['updated_address'];
                $contact = $_POST['updated_contact'];

                $sql = "UPDATE students SET
                    email = '$email',
                    social_media = '$social_media',
                    address = '$address',
                    contact_number = '$contact'
                    WHERE student_id = '$user_id'";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Record updated successfully!');
                     window.location.href = 'userProfile.php';
                    </script>";
                } else {
                    echo "<script>alert('Record update failed!');
                     window.location.href = 'userProfile.php';
                    </script>";
                }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
        }
    }


    echo "
        <div class='modal fade' id='profileModal' tabindex='-1' aria-labelledby='profileModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered modal-md'>
                <div class='modal-content container-md p-4'>
                    <div class='modal-header border-0 pb-0 flex_centered'>
                        <h5 class='modal-title fs-4' id='profileModalLabel'>Update Profile Details</h5>
                    </div>
                    <div class='modal-body pt-0'>
                        <form action='userProfile.php' method='POST'>
                            <div class='mb-4 text-center'>
                                <div class='text-center text-muted m-5 p-5 input_profile'>
                                    <span class='iconify' data-icon='fluent-color:add-circle-32' data-width='60px'></span>  
                                    <div>Change Profile Picture</div>
                                </div>
                                <div class='input-group'>
                                    <input type='file' class='form-control' id='profileUpload' accept='image/*'>
                                </div>
                            </div>

                            <div class='mb-3'>
                                <label for='email' class='form-label'>Email address</label>
                                <input type='email' class='form-control' name='updated_email' id='updated_email' value='$email'>
                            </div>

                            <div class='mb-3'>
                                <label for='social' class='form-label'>Social Media Link</label>
                                <div class='input-group'>
                                    <span class='input-group-text'><i class='bi bi-link-45deg'>@</i></span>
                                    <input type='text' class='form-control' name='updated_social' id='updated_social' value='$social_media'>
                                </div>
                            </div>

                            <div class='mb-3'>
                                <label for='address' class='form-label'>Address</label>
                                <textarea class='form-control' name='updated_address' id='updated_address' rows='2'>$address</textarea>
                            </div>

                            <div class='mb-4'>
                                <label for='contact' class='form-label'>Contact Number</label>
                                <div class='input-group'>
                                    <span class='input-group-text'><i class='bi bi-telephone'>#</i></span>
                                    <input type='tel' class='form-control' name='updated_contact' id='updated_contact' value='$contact_number' placeholder='$contact_number'>
                                </div>
                            </div>

                            <div class='d-flex justify-content-between modal-footer border-0 px-0 pt-4'>
                                <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Cancel</button>
                                <button type='submit' class='btn btn-primary px-4' name='updateUser'>Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    ";
?>

