<?php
include("../../../config/config.php");
session_destroy();
header("Location:/ncst/src/views/guest/login/loginPage.php");
exit;
?>
