<?php
$server = "localhost";
$username = "root";
$password = "user";
$db = "user";

$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    echo mysqli_connect_error();
    die("There has an failure");
}
?>