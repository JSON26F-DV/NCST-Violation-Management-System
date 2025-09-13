<?php
$host = "db";
$user = "user";
$pass = "userpass";
$dbname = "ncst";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
