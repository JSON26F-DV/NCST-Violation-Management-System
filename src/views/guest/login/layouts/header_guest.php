<?php
    $configPath = __DIR__ . "/../../../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/ncst/src/css/style.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php
    session_start();

    if (isset($_SESSION["student_id"]) && !empty($_SESSION["student_id"])) {
        header("Location: /ncst/src/views/authenticated/students/userProfile.php");
        exit();
    }
    if (isset($_SESSION["staff_id"]) && !empty($_SESSION["staff_id"])) {
        echo "
        <script>
            window.location.href = '/ncst/src/views/admin/auditing/accountAuditing.php';
        </script>";
        exit;
    }

?>