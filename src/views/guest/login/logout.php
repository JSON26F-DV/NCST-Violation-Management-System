<?php
session_start();
session_destroy();
header("Location:/ncst/src/views/guest/login/loginPage.php");
exit;
?>
