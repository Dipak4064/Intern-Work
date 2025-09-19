<?php
echo "i am destroyer.</br>";
session_start();
session_unset();
session_destroy();
echo "log out!";
?>