<?php
session_start();
session_destroy();
header("Location: /src/views/guest/login/loginPage.php");
exit;
?>
