
<?php
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCST Formal Notice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .paper {
            min-height: 297mm;
            max-width: 30   0mm;
            background-color: white;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            position: relative;
        }
        @media (max-width: 768px) {
            .paper {
                max-width: 100%;
            }
        }
    </style>
</head>
<body class="py-5">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="paper  p-4 p-md-5 mx-auto">
                    <!-- Header with Logo -->
                    <div class="d-flex align-items-center mb-4">
                        <img src="http://static.photos/education/200x200/1" alt="NCST Logo" class="me-3" style="width: 80px; height: 80px; object-fit: contain;">
                        <div>
                            <h5 class="mb-1 fw-bold text-uppercase">National College of Science and Technology</h5>
                            <p class="mb-0 small">Amafel Building, Aguinaldo Highway, Dasmariñas, Cavite 4114</p>
                            <p class="small">Tel. No.: (046) 416-6278 | Telefax: (046) 416-6278 | Mobile: +63918-888-6278</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Letter Content -->
                    <div class="mb-4">
                        <p class="mb-4">March 15, 2023</p>
                        
                        <p class="mb-3">Dear <span class="fw-bold">[Student Name]</span>,</p>
                        
                        <p class="mb-3">This is to formally inform you that you are required to visit the Office of the Registrar at the National College of Science and Technology within three (3) working days from receipt of this notice.</p>
                        
                        <p class="mb-3">Your presence is needed to complete important academic documentation and verify your enrollment records for the current semester.</p>
                        
                        <p class="mb-3">Please bring the following requirements:</p>
                        <ul class="mb-3">
                            <li>Valid School ID or any government-issued ID</li>
                            <li>Copy of your registration form</li>
                            <li>Two (2) recent 1x1 ID pictures</li>
                        </ul>
                        
                        <p class="mb-3">Failure to comply may result in temporary hold of your academic records. For any concerns, you may contact the Registrar's Office at registrar@ncst.edu.ph.</p>
                        
                        <p class="mb-3">Thank you for your immediate attention to this matter.</p>
                        
                        <p class="mb-0">Sincerely,</p>
                        <p class="mb-0 fw-bold">Dr. Maria Consuelo R. Santos</p>
                        <p class="mb-0">Registrar</p>
                        <p>National College of Science and Technology</p>
                    </div>

                    <hr class="my-4">

                    <!-- Footer Note -->
                    <div class="small text-muted text-center">
                        <p class="mb-0">This is an official document from NCST. Please present this notice when visiting the office.</p>
                        <p class="mb-0">Reference No.: NCST-2023-03-0015</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    include('footer.php');
?>