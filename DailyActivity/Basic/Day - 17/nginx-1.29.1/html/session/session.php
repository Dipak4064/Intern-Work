<?php
session_start();
$_SESSION['username'] = "dipak";
$_SESSION['favCat'] = "book";
echo "you have saved your session.";
?>