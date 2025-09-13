<?php
session_start();

$_SESSION["username"] = "Jason";
$_SESSION["role"] = "IT Student";
$_SESSION["crush"] = "nenel";
echo "Session set.";
?>