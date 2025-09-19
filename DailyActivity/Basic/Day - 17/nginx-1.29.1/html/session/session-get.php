<?php
echo "getting session </br>";
session_start();
if (isset($_SESSION['username'])) {
    echo "I am " . $_SESSION['username'] . ". </br>";
    echo "I love " . $_SESSION['favCat'] . ". </br>";
} else {
    echo "please log in first.";
}
?>