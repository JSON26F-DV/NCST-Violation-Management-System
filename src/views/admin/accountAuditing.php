<?php
    include('../../../header.php');
    include('navbar.php');
?>

    <div class="container my-3">
        <table class="table table-bordered w-100 mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "SELECT * FROM students";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_object()) {
                        echo"
                            <tr>
                                <td>{$row->student_id}</td>
                                <td>{$row->first_name}</td>
                                <td>{$row->last_name}</td>
                                <td>{$row->email}</td>
                                <td>
                                    <a href='../guest/update_Student.php?id={$row->student_id}' class='btn btn-sm btn-primary'>
                                        Edit
                                    </a>
                                    <a href='delete.php?id={$row->student_id}' class='btn btn-sm btn-danger'>
                                        delete
                                    </a>
                                </td>
                            </tr>
                        ";
                    }

                ?>

            </tbody>
        </table>
    </div>

<?php
    include('../../../footer.php');

?>
