<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fName = htmlspecialchars($_POST["firstname"]);
    $lName = htmlspecialchars($_POST["lastname"]);
    $pet = htmlspecialchars($_POST["favouritepet"]);

    if (empty($fName)) {
        $err = "required First Name";
        header("Location: ../index.php?err=" . urlencode($err));
        exit();
    }
    echo $fName . "<br>";
    echo $lName . "<br>";
    echo $pet;
    // header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
?>